<?php
require_once APPLICATION_ROOT_PATH . 'models/Index.php';

class AboutusController extends Front_Controller_Action
{

    public function preDispatch()
    {
        $this->view->title = $this->config['sitename'] . '关于我们';
        $this->view->keywords = $this->config['sitename'] . '关于我们';
        $this->view->description = $this->config['sitename'] . '关于我们';
        $this->view->header = '<link rel="stylesheet" href="' . $this->view->baseUrl . 'css/aboutus.css">';
        $this->view->footer = '<script src="' . $this->view->baseUrl . 'js/aboutus.js"></script>';
    }

    public function indexAction()
    {
        $index = new Index();
        $this->view->list = $index->tablelist('joinus');
        $this->view->index = $index->tableRow('service', 'id=4')['content'];
        $this->view->imglist = $index->imglist('aboutus');
        $this->render('index');
    }
}
