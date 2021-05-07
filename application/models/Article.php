<?php
require_once APPLICATION_ROOT_PATH . 'models/Logs.php';

class Article{
    public function __construct() {
        $this->_db = Zend_Registry::get('db');
    }

    public function getList($start=0, $limit = 8) {
        return $this->_db->fetchAll('select id,title,des,time from article order by weight desc,id desc limit ' . ($start*$limit) . ',' . $limit);
    }

    public function getNum() {
        return $this->_db->fetchOne('select count(*) from article');
    }

    public function getExt() {
        return $this->_db->fetchRow("select name from banner");
    }

    public function getInfo($id) {
        $info =  $this->_db->fetchRow('select id,title,time,content,reader from article where id='.$id);
        $next = $prev = '';
        $nextinfo = $this->_db->fetchRow('select id,title from article t1 where t1.id < ? order by t1.id desc limit 1', array($id));
        if (!empty($nextinfo)) {
            $next = $nextinfo;
        }

        $previnfo = $this->_db->fetchRow('select t1.id,t1.title from article t1 where t1.id > ? order by t1.id asc limit 1', array($id));
        if (!empty($previnfo)) {
            $prev = $previnfo;
        }
        return array('info'=>$info,'next'=>$next,'prev'=>$prev);
    }

    public function updateReader($id,$reader) {
        $where = $this->_db->quoteInto('id = ?', $id);
        $opts = array('reader'=>$reader);
        return $this->_db->update('article',$opts,$where);
    }
}
?>