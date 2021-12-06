<?php
require_once APPLICATION_ROOT_PATH . 'models/Logs.php';

class Index
{
    public function __construct()
    {
        $this->_db = Zend_Registry::get('db');
    }

    public function tablelist($table)
    {
        return $this->_db->fetchAll('select * from ' . $table);
    }

    public function imglist($type)
    {
        return $this->_db->fetchCol('select name from banner where path = "'.$type.'"');
    }

    public function tablelistLimit($table,$limit)
    {
        return $this->_db->fetchAll('select * from ' . $table . ' limit '.$limit);
    }
    public function tableRow($table,$where)
    {
        return $this->_db->fetchRow('select * from ' . $table . ' where '.$where);
    }
    public function tablecount($table,$where)
    {
        return $this->_db->fetchOne('select count(*) from ' . $table . ' where ' . $where);
    }

    public function peoplelist($type)
    {
        return $this->_db->fetchAll('select * from people where type = '.$type);
    }
}
