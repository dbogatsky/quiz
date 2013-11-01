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
        print_r($this->session->get('game')); exit;
    }

    public function playAction($question_number)
    {
        if (!Validate::questionNumber($question_number)) {
            $this->response->redirect('auth');
        }
        if ($this->request->isPost()) {
            $answer_id = $this->request->getPost('answer_id');
            $spent_time = $this->request->getPost('spent_time');
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
        $question = Questions::getWithAnswers($question_number, $this->gameIdentity->topic);
        $time_limit = Priority::getTimeLimit();
        $this->view->setVars(array(
            'question' => $question,
            'time_limit' => $time_limit
        ));
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
