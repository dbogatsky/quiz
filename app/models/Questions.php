<?php

class Questions extends BaseModel
{
    public $id;

    public $text_en;

    public $text_ru;

    public $priority_id;

    public $asked_amount;

    public static function getWithAnswers($session)
    {
        $asked_questions = '';
        if ($session['question']) {
            $asked_questions = implode($session['question'], ',');
        }

        $priority_id = $session['current_priority'];

        if (!$priority_id) {
            throw new Exception('Invalid priority!');
        }

        // TODO get question
        $filter = array(
            "columns" => "Questions.question_id, count(pq.question_id) as amount",
            "conditions" => "priority_id = ?1",
            "bind" => array(1 => $priority_id),
            "group" => "question_id",
            "leftJoin" => "PlayerQuestions AS pq",
            "order" => "amount",
            "limit" => "1"
        );
        if ($asked_questions) {
            $filter['conditions'] .= ' AND question_id NOT IN ?2';
            $filter['bind'][2] = $asked_questions;
        }
        $question = self::find($filter);

        return $question;
    }
}
