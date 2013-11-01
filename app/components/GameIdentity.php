<?php
class GameIdentity
{
    protected $session;

    public $game_id;
    public $question_number;
    public $question_id;
    public $is_finished;
    public $is_wait;
    public $time_limit;

    public function __construct($di)
    {
        $this->session = $di->get('session');
        if ($game = $this->session->get('game'))
        {
            $this->game_id = isset($game['id']) ? $game['id'] : null;
            $this->question_number = isset($game['question_number']) ? $game['question_number'] : null;
            $this->question_id = isset($game['question_id']) ? $game['question_id'] : null;
            $this->is_finished = isset($game['is_finished']) ? $game['is_finished'] : null;
            $this->is_wait = isset($game['is_wait']) ? $game['is_wait'] : null;
            $this->time_limit = isset($game['time_limit']) ? $game['time_limit'] : null;
        }
    }
}
