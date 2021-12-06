<?php
require_once APPLICATION_ROOT_PATH . 'models/Index.php';

class ServiceController extends Front_Controller_Action {

    public function preDispatch() {
        $this->view->title = $this->config['sitename'].'主营业务';
        $this->view->keywords = $this->config['sitename'].'主营业务';
        $this->view->description = $this->config['sitename'].'主营业务';
    }

    public function indexAction() {
        $index = new Index();
        $this->view->header= '<link rel="stylesheet" href="'.$this->view->baseUrl.'css/service.css">';
        $this->view->service = $index->tablelistLimit('service',3);
        $this->view->imglist = $index->imglist('service');
        $this->render('index');
    }
}