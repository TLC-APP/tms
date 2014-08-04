<?php

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'dashboards', 'action' => 'home'));
Router::connect('/guest', array('controller' => 'courses', 'action' => 'new_courses'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

Router::connect(
    '/admin',
    array('controller' => 'dashboards', 'action' => 'home', 'admin' => true)
);
Router::connect(
    '/teacher',
    array('controller' => 'dashboards', 'action' => 'home', 'teacher' => true)
);

Router::connect(
    '/student',
    array('controller' => 'dashboards', 'action' => 'home', 'student' => true)
);

Router::connect(
    '/boss',
    array('controller' => 'dashboards', 'action' => 'home', 'boss' => true)
);
Router::connect(
    '/manager',
    array('controller' => 'dashboards', 'action' => 'home', 'manager' => true)
);
Router::connect(
    '/fields_manager',
    array('controller' => 'dashboards', 'action' => 'home', 'fields_manager' => true)
);


/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */

Router::mapResources('courses_rooms');
Router::parseExtensions('json');

CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
