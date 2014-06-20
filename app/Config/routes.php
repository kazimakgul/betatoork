<?php
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
	
/*
 * Routers for side bar function inside dashboard
 * Business clone link system
 */
//
	Router::connect('/dashboard',array('controller'=>'businesses','action'=>'dashboard'));
	Router::connect('/mygames',array('controller'=>'businesses','action'=>'mygames'));
	Router::connect('/favorites',array('controller'=>'businesses','action'=>'favorites'));
	Router::connect('/explore/games',array('controller'=>'businesses','action'=>'exploregames'));
	Router::connect('/following',array('controller'=>'businesses','action'=>'following'));
	Router::connect('/followers',array('controller'=>'businesses','action'=>'followers'));
	Router::connect('/explore/channels',array('controller'=>'businesses','action'=>'explorechannels'));
	Router::connect('/activities',array('controller'=>'businesses','action'=>'activities'));
	Router::connect('/settings/channel',array('controller'=>'businesses','action'=>'channel_settings'));
	Router::connect('/settings/profile',array('controller'=>'businesses','action'=>'settings'));
	Router::connect('/settings/notifications',array('controller'=>'businesses','action'=>'notifications'));
	Router::connect('/settings/ads',array('controller'=>'businesses','action'=>'ads_management'));
	Router::connect('/logout',array('controller'=>'businesses','action'=>'logout'));

  /*
 * Routers for general functions
 * Business clone link system
 */
     //Router::connect('/search',array('controller'=>'businesses','action'=>'search2'));

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

    Router::connect('/games', array('controller' => 'games', 'action' => 'index'));

	/**
 * ...Generatin seo url
 */
	Router::connect('/:channel/:seo_url/play', array('controller' => 'games', 'action' => 'playgameframe'),array('channel' => '[-a-z0-9]+','seo_url' => '[-a-z0-9]+','pass' => array('channel','seo_url')));
	
	Router::connect('/:channel/:seo_url/play2', array('controller' => 'games', 'action' => 'playgame'),array('channel' => '[-a-z0-9]+','seo_url' => '[-a-z0-9]+','pass' => array('channel','seo_url')));
	
	
	//<----New Routing Actions
	Router::connect('/:channel/:seo_url/playframe', array('controller' => 'games', 'action' => 'playgameframe'),array('channel' => '[-a-z0-9]+','seo_url' => '[-a-z0-9]+','pass' => array('channel','seo_url')));
	
	Router::connect('/:channel/:seo_url/playgame', array('controller' => 'games', 'action' => 'playgame'),array('channel' => '[-a-z0-9]+','seo_url' => '[-a-z0-9]+','pass' => array('channel','seo_url')));
	
	Router::connect('/:channel/go', array('controller' => 'games', 'action' => 'profile'),array('channel' => '[-a-z0-9]+','pass' => array('channel')));
	
	//<---/New Routing Actions
	
	Router::connect('/:channel/:seo_url/playgame', array('controller' => 'games', 'action' => 'playgame'),array('channel' => '[-a-z0-9]+','seo_url' => '[-a-z0-9]+','pass' => array('channel','seo_url')));
	
	Router::connect('/:channel/news', array('controller' => 'games', 'action' => 'profile'),array('channel' => '[-a-z0-9]+','pass' => array('channel')));
	
	Router::connect('/:channel/news/:type', array('controller' => 'Wallentries', 'action' => 'profile'),array('channel' => '[-a-z0-9]+','type' => '[-a-z0-9]+','pass' => array('channel','type')));
	
	Router::connect('/:channel', array('controller' => 'games', 'action' => 'profile'),array('channel' => '[-a-z0-9]+','pass' => array('channel')));
	

        
	
	    

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();
	Router::parseExtensions('json');

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';