<?php
//tét
App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array(
        'Session', 'RequestHandler',
        'DebugKit.Toolbar',
        'Paginator',
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Controller',
                'Actions' => array('actionPath' => 'controllers'),
                'Authorize.Acl' => array('actionPath' => 'Models/')
            ))
    );
    public $helpers = array('Session',
        'Js',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator')
    );
    public $uses = array('Course', 'CoursesRoom');

    public function beforeRender() {
        parent::beforeRender();
    }

    function beforeFilter() {

        if (!empty($this->params['prefix'])) {
            $this->layout = $this->params['prefix'];
        }
        if (in_array($this->action, array('home', 'login', 'new_courses','getLastMessage','xem_thong_bao'))||$this->params['prefix']=='guest') {
            $this->Auth->allow($this->action);
        }

        $this->Auth->loginAction = array(
            'controller' => 'users',
            'action' => 'login',
            'admin' => false,
            'plugin' => false
        );
        $this->Auth->logoutRedirect = array(
            'controller' => 'dashboards',
            'action' => 'home',
            'admin' => false,
            'plugin' => false
        );
        $this->Auth->loginRedirect = array(
            'controller' => 'dashboards',
            'action' => 'home',
            'admin' => false,
            'plugin' => false
        );
        $this->__checkCompleteCourse();
    }

    public function isAuthorized($user) {

        return $this->Auth->loggedIn();
    }

    public function elfinder() {

        $this->TinymceElfinder->elfinder();
    }

    public function connector() {
        $this->TinymceElfinder->connector();
    }

    public function __checkCompleteCourse() {
        $uncomplete_courses = $this->Course->getCoursesUnCompleted();
        if (!empty($uncomplete_courses)) {
            $khoa_con_buoi = $this->CoursesRoom->layKhoaConBuoi();

            $id_giong = array_intersect($uncomplete_courses, $khoa_con_buoi);
            $khoa_hoan_thanh = Set::diff($uncomplete_courses, $id_giong);
            if (!empty($khoa_hoan_thanh)) {
                $this->Course->updateAll(array('Course.status' => COURSE_COMPLETED), array('Course.id' => $khoa_hoan_thanh));
            }
        }
    }

}
