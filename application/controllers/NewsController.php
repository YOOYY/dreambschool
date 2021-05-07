<?php

require_once APPLICATION_ROOT_PATH . 'models/Article.php';
require_once APPLICATION_ROOT_PATH . 'models/Util.php';

class NewsController extends Front_Controller_Action {

    public function preDispatch() {
        $this->_article = new Article();
        $this->util = new Util();
        
        $this->view->title = $this->config['sitename'].'媒体中心';
        $this->view->keywords = $this->config['sitename'].'媒体中心';
        $this->view->description = $this->config['sitename'].'媒体中心';
        $this->view->header= '<link rel="stylesheet" href="'.$this->view->baseUrl.'css/news.css">';
    }

    public function indexAction() {
        $page = (int) $this->_getParam('page', '1');
        $type = 1;$limit = 4;$start = $page-1;
        $totalList = $this->_article->getNum($type);
        $totalNum = ceil($totalList/$limit);
        $apiUrl = "{$this->view->baseUrl}news/api/";

        $this->view->list = $this->_article->getList($type,$start,$limit);
        $this->view->footer= <<<EOF
        <script>
        var imgUrl = '{$this->view->imgUrl}';
        </script>
        <script src='{$this->view->baseUrl}js/pageMe.js'></script>
        <script>
          $('#page').paging({
              pageNum: $page, // 当前页面
              totalNum: $totalNum, // 总页码
              totalList: $totalList, // 记录总数量
              callback: function (num) { //回调函数
                var url = '$apiUrl'+'start/'+(num-1),
                baseUrl = '{$this->view->baseUrl}',
                mimgUrl = '{$this->view->aimgUrl}';
                $.get(url,function(res){
                    res = JSON.parse(res);
                    if(res.error === 0){
                        res = res.data;
                    }else{
                        alert(res.data);
                        return;
                    }
                    console.log(res);
                    var l = res.length,html='';
                    for(var i=0;i<l;i++){
                        var val = res[i],date = val.time.split(' ')[0],en = '{$this->view->en}';
                        if(en){
                            var title = val['title_en'] || val['title'];
                            var des = val['des_en'] || val['des'];
                        }else{
                            var title = val['title'];
                            var des = val['des'];
                        }

                        html += '<tr>\
                        <td class="thumb">\
                          <a href="news/news/id/'+val['id']+'">\
                            <img src="'+val['thumb']+'"></a></td>\
                        <td class="list">\
                          <a href="news/news/id/'+val['id']+'">\
                            <h2 class="singletext">'+title+'</h2>\
                            <p class="time">'+date+'</p>\
                            <p class="des singletext">'+des+'</p>\
                          </a>\
                        </td>\
                      </tr>';
                    }
                    $('#news .content').html(html);
                })
              }
          });
        </script>
EOF;
        $this->render('index');
    }

    public function articleAction() {
        $id = $this->_getParam('id', '1');
        $res = $this->_article->getinfo($id);
        $this->view->info = $res['info'];
        $this->view->prev = $res['prev'];
        $this->view->next = $res['next'];
        $this->render('article');
    }

    public function apiAction() {
        $type = (int) $this->_getParam('type', 1);
        $start = (int) $this->_getParam('start', 0);
        $limit = (int) $this->_getParam('limit', 4);
        try {
            $res = $this->_article->getlist($type,$start,$limit);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
           $this->util->err($e);
           $res = ['error'=>1,'data'=>'获取列表失败，请稍后再试'];
        }
        echo json_encode($res);
    }

    public function updatereaderAction() {
        $id = (int) $this->_getParam('id');
        $reader = (int) $this->_getParam('reader');
        try {
            $this->_article->updateReader($id,$reader);
        } catch (Exception $e) {
           $this->util->err($e);
        }
        echo '';
    }

    public function legalAction() {
        $this->render('legal');
    }

    public function privacyAction() {
        $this->render('privacy');
    }

    public function serviceAction() {
        $this->render('service');
    }
}
