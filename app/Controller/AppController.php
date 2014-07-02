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
    public $uses = array('Course', 'CoursesRoom','User');

    function beforeFilter() {

        if (!empty($this->params['prefix'])) {
            $this->layout = $this->params['prefix'];
        }
        if (in_array($this->action, array('home', 'login', 'new_courses', 'getLastMessage', 'xem_thong_bao')) || $this->params['prefix'] == 'guest') {
            $this->Auth->allow($this->action);
        }

        if ($this->Auth->loggedIn()) {
            $this->User->id = $this->Auth->user('id');
            $department_id = ($this->User->field('User.department_id'));
            $birthday = (($this->User->field('birthday')));
            $birthplace = (($this->User->field('birthplace')));
            $action = (in_array($this->request->action, array( 'logout', 'student_edit_profile')));
            $show = ((!$department_id || empty($birthday) || empty($birthplace)) && !$action);
            if ($show) {
                $this->Session->setFlash('Vui lòng cập nhật đầy đủ thông tin cá nhân', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect(array('student' => true, 'controller' => 'users', 'action' => 'edit_profile', $this->Auth->user('id')));
            }
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

    public function beforeRender() {
        parent::beforeRender();
        if ($this->Auth->loggedIn() && ($this->User->isAdmin() || $this->User->isManager())) {
            $this->check_expire_course();
        }
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
    public function check_expire_course() {
        $expired_courses = $this->Course->getCoursesExpired();
        $prefix='manager';
        if (!empty($expired_courses)) {
            $this->Session->setFlash('Có khóa học đã hết hạn đăng ký <a href="' .Router::url('/',true). $prefix . '/courses/expired_courses"> chi tiết</a>', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning', 'escape' => false));
        }
    }

}
