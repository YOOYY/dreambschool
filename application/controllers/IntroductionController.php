<?php

class IntroductionController extends Front_Controller_Action
{

    public function preDispatch()
    {
        $this->view->title = $this->config['sitename'] . '集团介绍';
        $this->view->keywords = $this->config['sitename'] . '集团介绍';
        $this->view->description = $this->config['sitename'] . '集团介绍';

        $this->view->mimgUrl = $this->view->imgUrl . 'introduction/';
        $this->view->header = '<link rel="stylesheet" href="' . $this->view->baseUrl . 'css/introduction.css">';
    }

    public function indexAction()
    {
        $this->render('index');
    }
}
