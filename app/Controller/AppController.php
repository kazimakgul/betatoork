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


    public $components = array(
        'Session','Cookie','RequestHandler',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'games', 'action' => 'dashboard'),
            'logoutRedirect' => array('controller' => 'games', 'action' => 'index'),
            'loginAction' => array('controller' => 'games', 'action' => 'index'),
            'authorize' => array('Controller')
        )
    );

    var $paginate = array(
        'User' => array(//List of Bestchannels on Bestchannels Page 
            'limit' => 18,
            'order' => array(
                'Userstat.potential' => 'desc',
            ),
        ),
        'Game' => array(
            'limit' => 16,
            'order' => array(
                'Game.recommend' => 'desc',
            ),
        ),
        'Subscription' => array(
            'limit' => 18,
            'order' => array(
                'Subscription.created' => 'asc',
            ),
        ),
        'Favorite' => array(
		'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize'),'User'=>array('fields'=>array('User.username','User.seo_username')))),
            'limit' => 16,
            'order' => array(
                'Favorite.recommend' => 'desc',
            ), 
        ),
        'Playcount' => array(
		'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize'),'User'=>array('fields'=>array('User.username','User.seo_username')))),
            'limit' => 16,
            'order' => array(
                'Game.recommend' => 'desc',
            ),
        ), 
    );


    public function beforeFilter() {
		$this->loadModel('User');
		$this->Auth->allow('index','checkUser','checkUser2','FaceUser','gatekeeper','usernameAvailable','view','register','logout','play','profile','usergames','playlist',
            'search','search2','display','activate','reset_request','reset_now','mostplayed','toprated','categorygames','followers',
            'subscriptions','follow_card','add_subscription','sub_check','add_play','bestChannels','playedgames','play2',
            'randomAvatar','randomPicture','lastadded','allusergames','alluserfavorites','allchannelgames','allchannelfavorites','seoplay',
            'seoplay2','channelgames','connect','sync','syncallusers','incgameplay','incscribe','togglefav','totalrate',
            'getgamecount','potential','message_ajax','message_ajax2','moreupdates_ajax','explore_more_feed','moreupdates_ajax2','moreupdates_ajax3','moreupdates_ajax_my',
            'comment_ajax','comment_ajax2','image_ajax','image_ajax_fly','get_userdata','delete_message_ajax','delete_comment_ajax','action_ajax',
            'get_gamedata','moreupdates_filter_ajax','gamefeed_ajax','view_ajax','view_ajax2',
            'sync_recommended','profile','playgame','bestchannels2','toprated2','gameswitch','playgameframe','get_3_games',
            'categorygames2','favorite_check','game_comment_ajax','game_comments_ajax','clonegame','gamedelete','channelfavorites','profilegames',
            'channelfollowers','moreupdates_profile_ajax','moreupdates_profile_ajax_home','loadprofilefeeds','sendmail','activationmailsender','new_user',
            'get_image_link','getscreen','cropimage','addgame_ajax','add_virtual_game','pushActivity','setPermissions','activityMessage',
            'notificationMessage','getFreshActivity','getfreshnotification','posts','getprofileactivity','followstatus','getnotificationcount',
            'togglelast10','featuredchannels','getOldNotifications','hashtag','register2','login3','explore','faceregister','fblogin','metacrawler');

		$this->set('user',$this->Auth->user());
		

			  // $null_user=$this->User->find('all',array('conditions'=>array('User.facebook_id !='=>'')));

    }
    

	
	
	
	
	
    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === '1') {
            return true; //Admin can access every action
        }
        return false; // The rest don't
    }



public function http_check($str)
{

if(substr($str, 0, 7)!="http://" && substr($str, 0, 8)!="https://")
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
