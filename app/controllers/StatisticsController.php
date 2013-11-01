<?php

class StatisticsController extends BaseController
{
    public function initialize()
    {
        \Phalcon\Tag::setTitle('Play Game');
        parent::initialize();
        if (!Session::isAuthorized() || !Quiz::matchPlayer()) {
            $this->response->redirect('auth');
        }
    }

    public function indexAction()
    {
        $full_statistics = GameStatistics::getAll();
        $this->view->setVar('full_statistics', $full_statistics);
    }

    public function playerAction($id)
    {
        $statistics_by_player = GameStatistics::get($id);
        $this->view->setVar('statistics_by_player', $statistics_by_player);
    }
}
