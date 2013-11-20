<?php

class StartController extends BaseController
{
    public function initialize()
    {
        \Phalcon\Tag::setTitle('Start Game');
        parent::initialize();
    }

    public function topicsAction()
    {
        if ($this->request->isPost()) {
            $game = new Games();
            $game->topic_id = $this->request->getPost('topic_id');
            $game->player_id = $this->playerIdentity->player_id;
            if (!$game->save()) {
                foreach ($game->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            }
            $this->setGameSession($game);
            $this->response->redirect('rules');
        }
        $topics = Topics::find();
        $this->view->setVars(array(
            'topics' => $topics,
            'name' => $this->playerIdentity->name,
            'email' => $this->playerIdentity->email
        ));
    }

    protected function setGameSession($game)
    {
        $priorities = Priority::find('deleted = 0');
        $this->session->set('game', array(
            'id' => $game->id,
            'topic_id' => $game->topic_id,
            'question_number' => 0,
            'asked_questions' => array(),
            'current_question_id' => null,
            'is_finished' => 0,
            'is_wait' => 0,
            'time_limit' => 0,
            'priorities' => $priorities
        ));
        return $this->session->get('game');
    }
}
