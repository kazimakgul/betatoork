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
        'Session',
        'Cookie',
        'DebugKit.Toolbar',
        'RequestHandler',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'games',
                'action' => 'dashboard'
            ),
            'logoutRedirect' => array(
                'controller' => 'games',
                'action' => 'index'
            ),
            'loginAction' => array(
                'controller' => 'games',
                'action' => 'index'
            ),
            'authorize' => array(
                'Controller'
            )
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
            'contain' => array(
                'Game' => array(
                    'fields' => array(
                        'Game.name',
                        'Game.seo_url',
                        'Game.id',
                        'Game.picture',
                        'Game.starsize'
                    ),
                    'User' => array(
                        'fields' => array(
                            'User.username',
                            'User.seo_username'
                        )
                    )
                )
            ),
            'limit' => 16,
            'order' => array(
                'Favorite.recommend' => 'desc',
            ),
        ),
        'Playcount' => array(
            'contain' => array(
                'Game' => array(
                    'fields' => array(
                        'Game.name',
                        'Game.seo_url',
                        'Game.id',
                        'Game.picture',
                        'Game.starsize'
                    ),
                    'User' => array(
                        'fields' => array(
                            'User.username',
                            'User.seo_username'
                        )
                    )
                )
            ),
            'limit' => 16,
            'order' => array(
                'Game.recommend' => 'desc',
            ),
        ),
    );
    public $pure_domain;

    public function beforeFilter() {
        $this->loadModel('User');
        $this->Auth->allow('index', 'checkUser', 'checkUser2', 'FaceUser', 'gatekeeper', 'usernameAvailable', 'view', 'register', 'logout', 'profile', 'playlist', 'search', 'search2', 'display', 'activate', 'follow_card', 'add_subscription', 'sub_check', 'reset_now', 'add_play', 'bestChannels', 'randomAvatar', 'randomPicture', 'connect', 'sync', 'syncallusers', 'incgameplay', 'incscribe', 'togglefav', 'totalrate', 'getgamecount', 'potential', 'message_ajax', 'message_ajax2', 'moreupdates_ajax', 'explore_more_feed', 'moreupdates_ajax2', 'moreupdates_ajax3', 'moreupdates_ajax_my', 'comment_ajax', 'comment_ajax2', 'image_ajax', 'image_ajax_fly', 'get_userdata', 'delete_message_ajax', 'delete_comment_ajax', 'action_ajax', 'action_ajax_bot', 'get_gamedata', 'moreupdates_filter_ajax', 'gamefeed_ajax', 'view_ajax', 'view_ajax2', 'play', 'sync_recommended', 'profile', 'playgame', 'bestchannels2', 'toprated2', 'gameswitch', 'playgameframe', 'get_3_games', 'categorygames2', 'favorite_check', 'game_comment_ajax', 'game_comments_ajax', 'clonegame', 'gamedelete', 'channelfavorites', 'profilegames', 'channelfollowers', 'moreupdates_profile_ajax', 'moreupdates_profile_ajax_home', 'loadprofilefeeds', 'sendmail', 'activationmailsender', 'new_user', 'get_image_link', 'getscreen', 'cropimage', 'addgame_ajax', 'add_virtual_game', 'pushActivity', 'setPermissions', 'activityMessage', 'notificationMessage', 'getFreshActivity', 'getfreshnotification', 'posts', 'getprofileactivity', 'followstatus', 'getnotificationcount', 'togglelast10', 'featuredchannels', 'getOldNotifications', 'hashtag', 'register2', 'login3', 'explore', 'faceregister', 'metacrawler', 'likeswitch', 'getlikestatus', 'sharepost', 'gamerepair', 'Add_Activity', 'Add_Credit', 'Execute_Activity', 'Add_Debt_Activity', 'set_image', 'set_as', 'apply_file', 'mysite', 'category', 'toprated', 'featured', 'mostplayed', 'newgames', 'set_channel_ads', 'remove_ads_field', 'updateData', 'remove_background', 'add_playcount', 'get_one_game', 'get_one_channel', 'set_cookie', 'col_ads', 'get_ads_code', 'serve_ads_frame', 'store_games', 'mobile_detect_js','gamedetail');


        if ($this->params['controller'] == 'games' && in_array($this->action, array('index', 'random_3_game', 'checkClone', 'follow_card', 'clonegame'))) {
            $valid = 1;
        }
        if ($this->params['controller'] == 'users' || $this->params['controller'] == 'pages') {
            $valid = 1;
        }
        if ($this->params['controller'] == 'businesses') {
            $valid = 1;
        }
        if ($this->params['controller'] == 'mobiles') {
            $valid = 1;
        }
        if ($this->params['controller'] == 'subscriptions' && in_array($this->action, array('followstatus', 'add_subscription'))) {
            $valid = 1;
        }
        if ($this->params['controller'] == 'apis' && in_array($this->action, array('notificationMessage'))) {
            $valid = 1;
        }




        /*
          if($valid==1)
          {

          }
          else
          {
          echo 'this action is not valid';break;
          }
         */

        if (!$this->Auth->loggedIn() && $this->Cookie->read('remember_me')) {
            $cookie = $this->Cookie->read('remember_me');

            $user = $this->User->find('first', array(
                'conditions' => array(
                    'OR' => array(
                        'User.email' => $cookie['username'],
                        'User.username' => $cookie['username']
                    ),
                    'User.password' => $cookie['password']
                )
            ));

            if ($user && !$this->Auth->login($user['User'])) {
                $this->redirect('/');
            } else {
                /* echo 'giriş tamam';
                  exit; */
            }
        }


        $this->set('user', $this->Auth->user());


        // $null_user=$this->User->find('all',array('conditions'=>array('User.facebook_id !='=>'')));
    }

    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === '1') {
            return true; //Admin can access every action
        }
        return false; // The rest don't
    }

    public function http_check($str) {

        if (substr($str, 0, 7) != "http://" && substr($str, 0, 8) != "https://") {
            $str = "http://" . $str;
            return $str;
        } else {
            return $str;
        }
    }

    public function set_cname($mapping = NULL, $mapping_domain = NULL) {

        if ($mapping == 1) {
            $this->set('mapping', 1);
            $this->set('mapping_domain', $mapping_domain);
        }
    }

    public function noprefixdomain() {
        $subdomain = array(
            'test'
        );
        if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
            $parts = explode('.', $_SERVER['HTTP_HOST']);
            $count = count($parts);
            if ($parts[0] === 'www') {
                unset($parts[0]);
            }
            if ($count >= 3) {
                if (in_array($parts[$count - 3], $subdomain)) {
                    $parts = array(
                        $parts[$count - 3],
                        $parts[$count - 2],
                        end($parts)
                    );
                } else {
                    $parts = array(
                        $parts[$count - 2],
                        end($parts)
                    );
                }
            }
            $this->pure_domain = implode('.', $parts);

            if ($this->Session->read('mapping') || Configure::read('Domain.cname')) {
                $this->set('pure_domain', 'clone.gs');
            } else {
                $this->set('pure_domain', $this->pure_domain);
            }
        }
    }

    //This functin will get special style settings and store them in session
    public function get_style_settings($id = NULL) {

        /*         * ******** you can change these values for sensitivity ********* */
        /*
          $originalColour = "#323949";
          $darkPercent = -10;
          $lightPercent = 57;
          $lightestPercent = 80;
         */
        /*         * ************************************** */

        $style = $this->User->find('first', array('contain' => false, 'conditions' => array('User.id' => $id), 'fields' => array('User.bg_image,User.bg_color,User.picture')));

        //$bg_color_darker=$this->colourCreator($style['User']['bg_color'], $darkPercent);
        //$bg_color_lighter=$this->colourCreator($style['User']['bg_color'], $lightPercent);
        //$this->set('color_darker',$bg_color_darker);
        //$this->set('color_lighter',$bg_color_lighter);
        $this->set('active_channel_id', $id);
        $this->set('channel_style', $style);
    }

    function colourCreator($colour, $per) {
        $colour = substr($colour, 1); // Removes first character of hex string (#) 
        $rgb = ''; // Empty variable 
        $per = $per / 100 * 255; // Creates a percentage to work with. Change the middle figure to control colour temperature

        if ($per < 0) { // Check to see if the percentage is a negative number 
            // DARKER 
            $per = abs($per); // Turns Neg Number to Pos Number 
            for ($x = 0; $x < 3; $x++) {
                $c = hexdec(substr($colour, (2 * $x), 2)) - $per;
                $c = ($c < 0) ? 0 : dechex($c);
                $rgb .= (strlen($c) < 2) ? '0' . $c : $c;
            }
        } else {
            // LIGHTER         
            for ($x = 0; $x < 3; $x++) {
                $c = hexdec(substr($colour, (2 * $x), 2)) + $per;
                $c = ($c > 255) ? 'ff' : dechex($c);
                $rgb .= (strlen($c) < 2) ? '0' . $c : $c;
            }
        }
        return '#' . $rgb;
    }

    //this convert querystring parameter to named parameter for sorting.
    //Author:Ogi
    //==================================================================
    protected function sync_sorting() {
        if (isset($this->request->params['sort']) && isset($this->request->params['direction']) && $this->request->params['named']['sort'] == NULL) {
            $this->request->params['named']['sort'] = $this->request->params['sort'];
            $this->request->params['named']['direction'] = $this->request->params['direction'];
        }
    }

    public function remove_temporary($id, $type) {
        //===Alakalı tipteki klasörü siler begins.====
        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');

        if ($type == 'avatar_image') {
            $dir = 'upload/users/' . $id;
        } else if ($type == 'cover_image') {
            $dir = 'upload/users/' . $id;
        } else if ($type == 'game_image') {
            $dir = 'upload/games/' . $id;
        } else if ($type == 'new_game') {
            $dir = 'upload/temporary/' . $id;
        } else if ($type == 'game_upload') {
            $dir = 'upload/gamefiles/' . $id;
        }

        $upload_dir = new Folder(WWW_ROOT . $dir);
        $updir = $upload_dir->pwd();
        if ($updir != NULL) {
            $upload_dir->delete();
            //print_r($upload_dir->errors());
        }
        //===Alakalı tipteki klasörü siler ends.====
    }

}
