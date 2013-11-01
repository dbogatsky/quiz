<?php

class PlayerIdentity
{
    protected $session;

    public $player_id;
    public $email;
    public $name;

    public function __construct($di)
    {
        $this->session = $di->get('session');
        if ($player = $this->session->get('player'))
        {
            $this->player_id = isset($player['id']) ? $player['id'] : null;
            $this->email = isset($player['email']) ? $player['email'] : null;
            $this->name = isset($player['name']) ? $player['name'] : null;
        }
    }
}
