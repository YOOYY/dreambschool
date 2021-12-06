<?php
require_once APPLICATION_ROOT_PATH . 'models/Admin.php';
require_once APPLICATION_ROOT_PATH . 'models/Util.php';
/**
 * 后台管理主页
 * @package admin
 */
class AdminController extends Front_Controller_Action {

    public function preDispatch() {
        $this->_admin = new Admin();
        $this->util = new Util();
    }

    public function indexAction() {
        $this->render('index');
    }

    //管理员登陆后台
    public function loginAction() {
        $req = json_decode(file_get_contents('php://input'));
        $name = $req->name;
        $password = $req->password;
        try {
            $res = $this->_admin->login($name,$password);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function adminlistAction() {
        try {
            $res = $this->_admin->adminList();
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function createadminAction() {
        try {
            $req = json_decode(file_get_contents('php://input'),true);
            $req['password'] = $this->_admin->_encrypt($req['password']);
            $res = $this->_admin->create('adminuser',$req);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function updateadminAction() {
        try {
            $req = json_decode(file_get_contents('php://input'),true);
            $id = $req['id'];
            if(isset($req['password'])){
                $req['password'] = $this->_admin->_encrypt($req['password']);
            }
            $res = $this->_admin->update('adminuser',$id,$req);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }
    
    public function deladminAction() {
        try {
            $req = json_decode(file_get_contents('php://input'),true);
            $id = $req['id'];
            $res = $this->_admin->delete('adminuser',$id);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function bannerAction() {
        $name = $this->getRequest()->getPost('name');
        $path = $this->getRequest()->getPost('path');
        $id = (int)$this->getRequest()->getPost('id');

        $path = dirname(dirname(dirname(__FILE__))) . '/htdocs/imgs/'.$path.'/';
        $type = array('image/jpeg','image/png');

        try {
            $res = $this->_admin->upfile($name,$path,null,$type);
            $res = $res."?".mktime();
            $this->_admin->update('banner',$id,array('name'=>$res));
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function bannerlistAction() {
        try {
            $res = $this->_admin->getlist('banner');
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function uploadfileAction() {
        $name = uniqid();
        $table = $_POST['table'];
        $path = dirname(dirname(dirname(__FILE__))) . '/htdocs/imgs/'.$table.'/';

        try {
            $filename = $this->_admin->upfile($name,$path);
            $res = $this->view->imgUrl.$table.'/'.$filename;
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function servicelistAction() {
        try {
            $res = $this->_admin->getlist('service');
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function updateserviceAction() {
        $req = json_decode(file_get_contents('php://input'),true);
        $id = $req['id'];
        try {
            $res = $this->_admin->update('service',$id,$req);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function joinlistAction() {
        try {
            $res = $this->_admin->getlist('joinus');
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function createjoinAction() {
        $req = json_decode(file_get_contents('php://input'),true);
        try {
            $res = $this->_admin->create('joinus',$req);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function updatejoinAction() {
        $req = json_decode(file_get_contents('php://input'),true);
        $id = $req['id'];
        try {
            $res = $this->_admin->update('joinus',$id,$req);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function deljoinAction() {
        $id = json_decode(file_get_contents('php://input'))->id;

        try {
            $res = $this->_admin->delete('joinus',$id);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    
    public function articlelistAction() {
        try {
            $res = $this->_admin->getlist('article');
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function createarticleAction() {
        $req = json_decode(file_get_contents('php://input'),true);
        try {
            $res = $this->_admin->create('article',$req);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function updatearticleAction() {
        $req = json_decode(file_get_contents('php://input'),true);
        $id = $req['id'];
        try {
            $res = $this->_admin->update('article',$id,$req);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function delarticleAction() {
        $id = json_decode(file_get_contents('php://input'))->id;

        try {
            $res = $this->_admin->delete('article',$id);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function peoplelistAction() {
        try {
            $res = $this->_admin->getlist('people');
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function createpeopleAction() {
        $req = json_decode(file_get_contents('php://input'),true);
        try {
            $res = $this->_admin->create('people',$req);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function updatepeopleAction() {
        $req = json_decode(file_get_contents('php://input'),true);
        $id = $req['id'];
        try {
            $res = $this->_admin->update('people',$id,$req);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }

    public function delpeopleAction() {
        $id = json_decode(file_get_contents('php://input'))->id;

        try {
            $res = $this->_admin->delete('people',$id);
            $res = ['error'=>0,'data'=>$res];
        } catch (Exception $e) {
            $res = $this->util->err($e);
        }
        echo json_encode($res);
    }
}
