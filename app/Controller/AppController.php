<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
// app/Controller/AppController.php
class AppController extends Controller {
    //...


    public $components = array(
        'Session','Cookie',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'games', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'games', 'action' => 'index'),
            'authorize' => array('Controller')
        )
    );

    var $paginate = array(
        'User' => array(
            'limit' => 28,
            'order' => array(
                'User.id' => 'asc',
            ),
        ),
        'Game' => array(
            //'conditions' => array('(Game.starsize * Game.rate_count) >' => '50'),
            'limit' => 28,
            'order' => array(
                'Game.recommend' => 'desc',
            ),
        ),
        'Subscription' => array(
            'limit' => 28,
            'order' => array(
                'Subscription.created' => 'desc',
            ),
        ),
        'Favorite' => array(
            'limit' => 28,
            'order' => array(
                'Game.recommend' => 'desc',
            ),
        ),         
    );


    public function beforeFilter() {
    $this->Auth->allow('index','view','register','login','logout','play','profile','usergames','playlist','search','display','activate','reset_request','reset_now','mostplayed','toprated','categorygames','followers','subscriptions','follow_card','add_subscription','sub_check','add_play','bestChannels','playedgames','play2','randomAvatar','lastadded','allusergames','alluserfavorites','allchannelgames','allchannelfavorites','seoplay','seoplay2','channelgames');

    }
    
    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === '1') {
            return true; //Admin can access every action
        }
        return false; // The rest don't
    }



public function http_check($str)
{

if(substr($str, 0, 7)!="http://")
			{
		$str="http://".$str;
		return $str;
			}
			else
			{
			return $str;
			}
}


}
