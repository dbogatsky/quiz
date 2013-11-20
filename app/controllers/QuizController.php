<?php

class QuizController extends BaseController
{
    protected $current_question_id;

    public function initialize()
    {
        \Phalcon\Tag::setTitle('Play Game');
        parent::initialize();
        if (!$this->session->get('player') || !$this->session->get('game')) {
            $this->response->redirect('auth');
        }
    }

    public function rulesAction()
    {

    }

    public function playAction($question_number)
    {
        if ($this->request->isPost()) {
            $answer_id = $this->request->getPost('answer_id');
            $spent_time = $this->request->getPost('spent_time');
            $this->addAskedQuestionInSession($this->gameIdentity->current_question_id);
            if (Answers::isRight($answer_id)) {
                $params = array(
                    'answer_id' => $answer_id,
                    'spent_time' => $spent_time
                );
                GameStatistics::update($params);
                if ($question_number == Questions::getLimit()) {
                    $this->response->redirect('win');
                }
                $this->nextQuestion($question_number);
            } else {
                $this->response->redirect('loose');
            }
        }
        $question = Questions::getWithAnswers($question_number, $this->gameIdentity);
        $this->saveQuestionParamsInSession($question);
        $this->view->setVars(array(
            'question' => $question,
            'time_limit' => $this->gameIdentity->time_limit
        ));
    }

    protected function addAskedQuestionInSession($question_id)
    {
        $game = $this->session->get('game');
        if (!in_array($question_id, $game['asked_questions'])) {
            $game['asked_questions'][] = $question_id;
        }
        $this->session->set('game', $game);
        return $game;
    }

    protected function saveQuestionParamsInSession($question)
    {
        $game = $this->session->get('game');
        $game['current_question_id'] = $question['id'];
        $game['time_limit'] = $question['time_limit'];
        $this->session->set('game', $game);
        return $game;
    }

    public function winAction()
    {
        $params = array('is_winner' => true);
        GameStatistics::update($params);
    }

    public function looseAction()
    {
        $params = array('is_winner' => false);
        GameStatistics::update($params);
    }

    protected function nextQuestion($question_number)
    {
        $this->forward("quiz/player/".++$question_number);
    }
}
