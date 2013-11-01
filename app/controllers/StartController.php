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
            $topic_id = $this->request->getPost('topic_id');
            $game = new Games();
            $game->topic_id = $topic_id;
            $game->player_id = $this->playerIdentity->player_id;
            if (!$game->save()) {
                foreach ($game->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            }
            $this->setGameSession($game->id);
            $this->response->redirect('rules');
        }
        $topics = Topics::find();
        $this->view->setVars(array(
            'topics' => $topics,
            'name' => $this->playerIdentity->name,
            'email' => $this->playerIdentity->email
        ));
    }

    protected function setGameSession($id)
    {
        $this->session->set('game', array(
            'id' => $id,
            'question_number' => 1,
            'is_finished' => 0,
            'is_wait' => 0
        ));
        return $this->session->get('game');
    }
}
