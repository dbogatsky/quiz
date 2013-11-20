<?php

class Priority extends BaseModel
{
    public $id;

    public $name;

    public $question_number;

    public $the_limit;

    public static function getPriorities()
    {
        $priorities = self::find('deleted = 0');
        $array_priorities = array();
        foreach ($priorities as $priority)
        {
            $array_priorities[] = array(
                'id' => $priority->id,
                'name' => $priority->name,
                'question_numbers' => $priority->question_numbers,
                'time_limit' => $priority->time_limit
            );
        }

    }
}
