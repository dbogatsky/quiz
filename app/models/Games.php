<?php
class Games extends BaseModel
{
    public $id;

    public $name;

    public $topic_id;

    public $question_amount;

    public $player_id;

    public $is_winner;

    public function initialize()
    {
        parent::initialize();
        $this->skipAttributesOnCreate(array('stopped_on', 'name', 'question_amount', 'is_winner'));
    }

    public function validation()
    {

    }
}
