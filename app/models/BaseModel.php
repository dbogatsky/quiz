<?php

class BaseModel extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->skipAttributesOnCreate(array('created_on', 'deleted'));
    }
}

?>
