<?php
class GameIdentity
{
    protected $session;

    public $di;
    public $questions = array();

    protected $available_properties = array(
        'di',
        'game_id',
        'topic_id',
        'question_number',
        'asked_questions',
        'current_question_id',
        'is_finished',
        'is_wait',
        'time_limit',
        'priorities', // object
    );

    public function __construct($di)
    {
        $this->di = $di;
        $this->session = $di->get('session');
        if ($game = $this->session->get('game'))
        {
            foreach ($game as $key => $param) {
                if (in_array($key, $this->available_properties)) {
                    $this->{$key} = $param;
                }
            }
        }
    }
}
