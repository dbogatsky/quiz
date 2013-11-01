<?php

class BaseController extends Phalcon\Mvc\Controller
{
    protected $lang = 'en';

    protected function initialize()
    {
        $player = $this->session->get('player');
        $this->view->setVar('player', $player);
        if ($this->dispatcher->getControllerName() != 'auth' && !$player) {
            $this->response->redirect('auth');
        }
    }

    protected function forward($uri){
    	$uriParts = explode('/', $uri);
    	return $this->dispatcher->forward(
    		array(
    			'controller' => $uriParts[0],
    			'action' => $uriParts[1]
    		)
    	);
    }

    protected function setParamsModel(&$model)
    {
        $params = $this->request->getPost();
        foreach($params as $key => $param) {
            $model->{$key} = $param;
        }
    }
}
