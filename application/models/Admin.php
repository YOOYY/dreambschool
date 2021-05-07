<?php
require_once APPLICATION_ROOT_PATH . 'models/Logs.php';

class Admin{
    public function __construct() {
        $this->_db = Zend_Registry::get('db');
    }
    
    //管理员登陆后台
    public function login($name, $password) {
        if ($this->checkAdminUser(trim($name), $this->_encrypt(trim($password)))) {
            $result = $this->_db->fetchRow('select * from adminuser where name=?', array($name));
            $_SESSION['ADMIN_NAME'] = $result['name'];
            $_SESSION['ADMIN_PASSWORD'] = $result['password'];
            $_SESSION['ADMIN_ID'] = $result['id'];
            $_SESSION['ADMIN_NICKNAME'] = $result['nickname'];
            return true;
        } else {
            return false;
        }
    }

    /**
     * 判断管理员是否登陆
     * @return bool false 未登陆，true 已登陆
     */
    public function checkLogin() {
        if (
            empty($_SESSION['ADMIN_ID']) ||
            empty($_SESSION['ADMIN_NAME']) ||
            empty($_SESSION['ADMIN_PASSWORD']) ||
            !$this->checkAdminUser($_SESSION['ADMIN_NAME'], $_SESSION['ADMIN_PASSWORD'])
        ) {
            return false;
        } else {
            return true;
        }
    }

    //登录验证
    public function checkAdminUser($name, $password) {
        $getpassword = $this->_db->fetchOne('select password from adminuser where name=?', array($name));
        if (empty($getpassword) || $getpassword != $password){
            return false;
        }else{
            return true;
        }
    }

    //密码加密
    public function _encrypt($str) {
        return md5(md5($str));
    }

    public function adminList() {
        return $this->_db->fetchAll('select id,name,nickname from adminuser');
    }

    public function getlist($table) {
        return $this->_db->fetchAll('select * from '.$table);
    }

    public function joinList() {
        // return $this->_db->fetchAll('select t1.*,t2.name as jobplace from joinus t1 left join jobgroup t2 on t1.place = t2.id');
    }

    public function create($table,$opts) {
        $this->_db->insert($table,$opts);
        $id = $this->_db->lastInsertId();
        return array('id'=>$id);
    }

    public function update($table,$id,$opts) {
        $where = $this->_db->quoteInto('id = ?', $id);
        return $this->_db->update($table,$opts,$where);
    }

    public function delete($table,$id) {
        $where = $this->_db->quoteInto('id= ?', $id);
        return $this->_db->delete($table, $where);
    }

    public function upfile($filename,$path,$ext = null,$filetype = null) {
        if(empty($ext)){
            $ext = strrchr($_FILES["multfile"]["name"],'.');
        }
        if (!file_exists($path)) {//检查照片目录是否存在
            throw new Exception('上传位置出错'.$path);
        }
        $msg = '';
        $tmp_name = $_FILES['multfile']['tmp_name'];
        if (!empty($filetype) && !in_array($_FILES['multfile']['type'],$filetype)) {
            $msg .= '文件类型错误，请检查!';
        }
        if ($msg == '') {
            $pathinfo = $path . $filename .$ext;
            if (!move_uploaded_file($tmp_name, $pathinfo)) {
                $msg = '上传失败，请重试';
            }
        }
        if ($msg != '') {
            throw new Exception($msg);
        } else {
            return $filename.$ext;
        }
    }
}
?>