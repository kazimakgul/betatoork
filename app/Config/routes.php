<?php
 App::import('Model', 'User');
  App::import('Model', 'Game');
 $User = new User();
 $Game = new Game();

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
//	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	
	Router::connect('/', array('controller' => 'games', 'action' => 'index'));

/*Router::connect(
    '/:id',
    array('controller' => 'games', 'action' => 'usergames'),
    array(
        'pass' => array('id'),
	'id' => '[a-zA-Z0-9]+'
    )
);*/


 $data = $User ->find('all');
 $data2 = $Game ->find('all'); 
    if(!empty ($data)){
        //pr($events);
        foreach ($data as $item) {
        	foreach ($data2 as $item2){
	        	$name=$item['User']['username'];
	        	$game=$item2['Game']['name'];
	            if($name!=""){
	                Router::connect(('/'.$name), array('controller' => 'games', 'action' => 'usergames',$item['User']['id']));
	                Router::connect(('/'.$name.'/'.$game), array('controller' => 'games', 'action' => 'play',$item2['Game']['id']));

	            }
            }
        }
    }



/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
