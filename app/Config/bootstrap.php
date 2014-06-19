<?php

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

CakePlugin::load('BoostCake');
CakePlugin::load('Authorize');
CakePlugin::load('AclManager', array('bootstrap' => true));
CakePlugin::load('DebugKit');
CakePlugin::load('Upload');
CakePlugin::load('TinymceElfinder');
CakePlugin::load('Dropbox');
Configure::write('Dispatcher.filters', array(
    'AssetDispatcher',
    'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
    'engine' => 'File',
    'types' => array('notice', 'info', 'debug'),
    'file' => 'debug',
));
CakeLog::config('error', array(
    'engine' => 'File',
    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
    'file' => 'error',
));
/* System Configuration */
Configure::write('System.name', 'Hệ thống quản lý Công tác Tập huấn giáo viên');
/* User default group */

/* System Configuration */
Configure::write('SEND_MAIL_WHEN_CANCEL_COURSE', 0);

Configure::write('SEND_MAIL_WHEN_ENROLLED_COURSE', 0);
/* System Configuration */
Configure::write('SEND_MAIL_WHEN_OPEN_COURSE', 0);

/* System Configuration */
Configure::write('SEND_MAIL_WHEN_HAS_CERT', 0);

if (!defined("EMAIL_FROM_ADDRESS")) {
    define("EMAIL_FROM_ADDRESS", 'thaitoan2210@gmail.com');
}
if (!defined("EMAIL_FROM_NAME")) {
    define("EMAIL_FROM_NAME", 'Trường ĐH Trà Vinh, Trung tâm HT - PT Dạy & Học - Hệ thống Quản lý Tập huấn Giáo viên');
}
if (!defined("SITE_URL")) {
    define("SITE_URL", Router::url('/', true));
}
if (!defined("SEND_REGISTRATION_MAIL")) {
    define("SEND_REGISTRATION_MAIL", false);
}
if (!defined("EMAIL_VERIFICATION")) {
    define("EMAIL_VERIFICATION", false);
}



if (!defined("COURSE_REGISTERING")) {
    define("COURSE_REGISTERING", 1);
}
if (!defined("COURSE_OPENABLE")) {
    define("COURSE_OPENABLE", 2);
}
if (!defined("COURSE_UNCOMPLETED")) {
    define("COURSE_UNCOMPLETED", 3);
}

/*Có định nghĩa cứng trong model User vitualFields: coursesCompleted*/
if (!defined("COURSE_COMPLETED")) {
    define("COURSE_COMPLETED", 4);
}
if (!defined("COURSE_CANCELLED")) {
    define("COURSE_CANCELLED", 5);
}

if (!defined("MIN_COURSE_STUDENT_NUMBER")) {
    define("MIN_COURSE_STUDENT_NUMBER", 15);
}
/*Thời gian tối đa của buổi học là 4 tiếng*/

if (!defined("THOI_GIAN_MOT_BUOI_HOC")) {
    define("THOI_GIAN_MOT_BUOI_HOC", 4);
}

if (!defined("FILE_DIR")) {
    define("FILE_DIR", 'files');
}