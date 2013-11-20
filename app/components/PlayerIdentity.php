<?php

class PlayerIdentity
{
    protected $session;

    protected $available_properties = array(
        'player_id',
        'email',
        'name'
    );

    public function __construct($di)
    {
        $this->session = $di->get('session');
        if ($player = $this->session->get('player'))
        {
            foreach ($player as $key => $param) {
                if (in_array($key, $this->available_properties)) {
                    $this->{$key} = $param;
                }
            }
        }
    }
}
