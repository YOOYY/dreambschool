<?php
require_once APPLICATION_ROOT_PATH . 'models/Index.php';

class AboutusController extends Front_Controller_Action
{

    public function preDispatch()
    {
        $this->view->title = $this->config['sitename'] . '院长寄语';
        $this->view->keywords = $this->config['sitename'] . '院长寄语';
        $this->view->description = $this->config['sitename'] . '院长寄语';
    }

    public function indexAction()
    {
        $index = new Index();
        $this->view->header =
            '<link rel="stylesheet" href="' . $this->view->baseUrl . 'css/edslider.css">
            <link rel="stylesheet" href="' . $this->view->baseUrl . 'css/aboutus.css">
            <link rel="stylesheet" href="' . $this->view->baseUrl . 'css/idangerous.swiper2.7.6.css">
            <script src="' . $this->view->baseUrl . 'js/idangerous.swiper2.7.6.js"></script>';
        $this->view->footer =
            '<script src="' . $this->view->baseUrl . 'js/aboutus.js"></script>
        <script src="' . $this->view->baseUrl . 'js/jquery.edslider.js"></script>';

        $this->view->teachers = $index->peoplelist(1);
        $this->view->students = $index->peoplelist(2);
        $this->view->article = $index->tablelist('article');
        $this->view->service = $index->tablelistLimit('service', 3);
        $this->view->bannerlist = $index->tablelistLimit('banner', 4);
        $num = $index->tablecount('people', 'type = 1');
        $this->view->count = $num / 3 === 0 ? 1 : ceil($num / 3);
        $this->view->num = $num;
        $this->render('index');
    }
}
