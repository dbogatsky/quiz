<?php

class AuthController extends BaseController
{
    protected $email;
    protected $name;

    public function initialize()
    {
        \Phalcon\Tag::setTitle('Authorization');
        parent::initialize();
        if ($this->request->isPost()) {
            $this->email = $this->request->getPost('email', 'email');
            $this->name = $this->request->getPost('name', array('striptags', 'string'));
        }
    }

    public function startAction()
    {
        if ($this->session->get('player')
            || ($this->request->isPost() && $this->authorize()))
        {
            $game = $this->session->get('game');
            if ($game && !$game['is_finished']) {
                $this->response->redirect("play/{$game['question_number']}");
            }
            $this->response->redirect('start');
        }
    }

    public function endAction()
    {
        $this->session->destroy();
        $this->response->redirect('auth');
    }

    protected function authorize()
    {
        // authorize already existing
        if ($player = Players::getByEmail($this->email)) {
            return $this->setPlayerSession($player->id);
        }
        // create a new player
        $player = new Players();
        $player->name = $this->name;
        $player->email = $this->email;
        if (!$player->save()) {
            foreach ($player->getMessages() as $message) {
                $this->flash->error((string) $message);
            }
        } else {
            return $this->setPlayerSession($player->id);
        }
        return false;
    }

    protected function setPlayerSession($id)
    {
        $this->session->set('player', array(
            'id' => $id,
            'email' => $this->email,
            'name' => $this->name
        ));
        return $this->session->get('player');
    }
}
