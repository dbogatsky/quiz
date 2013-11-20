<?php

class Questions extends BaseModel
{
    public $id;

    public $text_en;

    public $text_ru;

    public $priority_id;

    public static function getWithAnswers($question_number, $gameIdentity)
    {
        $asked_questions = self::getAlreadyAskedQuestions($gameIdentity->asked_questions);

        $priority_id = self::getPriorityId($question_number, $gameIdentity->priorities);
        if (!$priority_id) {
            throw new Exception('Invalid priority!');
        }

        $andWhere = "q.deleted = 0 AND q.priority_id = {$priority_id} AND q.topic_id = {$gameIdentity->topic_id}";
        if ($asked_questions) {
            $andWhere .= " AND pq.question_id NOT IN ({$asked_questions})";
        }

        $question = new Questions();
        $question = $question->getModelsManager()->createBuilder()
            ->columns('q.id, count(pq.question_id) AS amount, q.text_en, p.time_limit')
            ->addFrom('Questions', 'q')
            ->join('Priority', "p.id = {$priority_id}", 'p')
            ->leftJoin('PlayerQuestions', 'q.id = pq.question_id', 'pq')
            ->andWhere($andWhere)
            ->limit(1)
            ->groupBy('q.id')
            ->orderBy('amount')
            ->getQuery()
            ->execute()
            ->toArray();

        $question = $question[0];

        $question = self::getAnswers($question);

        return $question;
    }

    protected static function getAnswers($question)
    {
        if (isset($question['id'])) {
            $answers = Answers::find("question_id = {$question['id']} AND deleted = 0");
            foreach ($answers as $answer) {
                $question['answers'][] = array(
                    'id' => $answer->id,
                    'text_en' => $answer->text_en,
                    'text_ru' => $answer->text_ru,
                    'is_right' => $answer->is_right
                );
            }
        }
        return $question;
    }

    protected static function getAlreadyAskedQuestions($questions)
    {
        if ($questions) {
            return implode($questions, ',');
        }
        return null;
    }

    protected static function getPriorityId($question_number, $priorities)
    {
        foreach ($priorities as $priority) {
            $interval = explode('-', $priority->question_numbers);
            if ($interval[0] <= $question_number && $interval[1] > $question_number) {
                return $priority->id;
            }
        }
        return null;
    }
}
