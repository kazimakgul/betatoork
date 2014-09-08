<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public $components = array('AutoLogin', 'Email', 'Amazonsdk.Amazon', 'Recaptcha.Recaptcha', 'Common');
    public $helpers = array('Html', 'Form', 'Upload', 'Recaptcha.Recaptcha');
    var $uses = array('Game', 'Subscription', 'Userstat', 'Category', 'Activity', 'CakeEmail', 'Network/Email', 'Ad_setting');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->authenticate = array('Custom');





        // cookie autologin 
        if (!$this->Auth->user('id')) {
            $cookie = $this->Cookie->read('User');

            if ($cookie) {
                $this->request->data['User']['username'] = $cookie['username'];
                $this->request->data['User']['password'] = $cookie['password'];
                $this->Auth->login();
            }
        }

        //auto login
    }

    public function isAuthorized($user) {
        if (parent::isAuthorized($user)) {

            return true;
        }
//her kayitli userin user add fonksiyonunu kullanmasi gibi birsey vardi.Iptal ettim.
//	    if (($this->action === 'add')){
        // All registered users can add posts
        //        return true;
        // }


        if (in_array($this->action, array('edit', 'password', 'password2', 'settings'))) {
            $userId = $this->request->params['pass'][0];
            return $this->User->isOwnedBy($userId, $user['id']);
        }

        return false;
    }

    public function activate($user_id = null, $in_hash = null) {
        $this->layout = "ajax";
        $this->User->id = $user_id;

        if ($this->User->exists() && ($in_hash == $this->User->getActivationHash())) {
            // Update the active flag in the database
            $this->User->saveField('active', 1);

            // Let the user know they can now log in!
            $this->Session->setFlash('Your account has been activated.');
            $this->set('activated', 1);
            $this->redirect('/');
        } else {
            $this->Session->setFlash('Activation code is not valid!');
            $this->set('activated', 0);
            $this->redirect('/');
        }

        // Activation failed, render '/views/user/activate.ctp' which should tell the user.
    }

    public function email_test()
    {
        $this->layout = 'Emails/html/default';
        $user = $this->User->findById(2);
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('userid', $userid);
        $this->set('username', $userName);
        return $this->render('/Emails/html/forgot_password');
    }


    public function reset_now($user_id = null, $in_hash = null) {

        $this->layout='Business/dashboard';
        $userid = $user_id;
        $this->User->id = $user_id;

        if ($this->User->exists() && ($in_hash == $this->User->getActivationHash())) {
            //password reset begin


            if ($this->request->is('post') || $this->request->is('put')) {

                if ($this->request->data["User"]["new_password"] != "") {

                    $this->request->data["User"]["password"] = $this->request->data["User"]["new_password"];
                    $this->request->data["User"]["confirm_password"] = $this->request->data["User"]["new_password"];
                }

                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('Your password has been reset, Please login with your new password');
                    $this->redirect('/');
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            } else {

                //request is not post
            }



            //password reset ends
        }//user exist and hash
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('userid', $userid);
        $this->set('username', $userName);
    }

    public function __sendResetEmail($user_id) {

        $this->User->id = $user_id;
        $user = $this->User->find('first', array('conditions' => array('User.id' => $user_id)));

        if ($user === false) {
            $this->Session->setFlash('This mail is not registered.');
            debug(__METHOD__ . " failed to retrieve User data for user.id: {$user_id}");
            return false;
        }

        $email = new CakeEmail();
        // Set data for the "view" of the Email
        $email->viewVars(array('reset_url' => 'http://clone.gs/users/reset_now/' . $user['User']['id'] . '/' . $this->User->getActivationHash(), 'username' => $user["User"]["username"]));
        $email->config('smtp')
                ->template('forgot_password') //I'm assuming these were created
                ->emailFormat('html')
                ->to($user["User"]["email"])
                ->from(array('no-reply@clone.gs' => 'Clone'))
                ->subject('Clone - Password Reset')
                ->send();
    }

    public function sendmail() {
        $email = new CakeEmail();
        $email->viewVars(array('username' => 12345));
        $email->config('smtp')
                ->template('simple_mail') //I'm assuming these were created
                ->emailFormat('html')
                ->to('hoaltan@hotmail.com')
                ->from(array('no-reply@clone.gs' => 'Clone'))
                ->subject('Welcome To Clone')
                ->send();
    }

    public function activationmailsender($user_id = NULL) {

        $user = $this->User->find('first', array('contain' => false, 'conditions' => array('User.id' => $user_id), 'fields' => array('User.username', 'User.email', 'User.id')));
        // Set data for the "view" of the Email
        $this->set('activate_url', 'http://clone.gs/users/activate/' . $user['User']['id'] . '/' . $this->User->getActivationHash());
        $this->set('username', $user["User"]["username"]);
        $this->User->id = $user_id;
        $email = new CakeEmail();
        $email->viewVars(array('username' => $user["User"]["username"], 'activate_url' => 'http://clone.gs/users/activate/' . $user['User']['id'] . '/' . $this->User->getActivationHash()));
        $email->config('smtp')
                ->template('register') //I'm assuming these were created
                ->emailFormat('html')
                ->to($user['User']['email'])
                ->from(array('no-reply@clone.gs' => 'Clone'))
                ->subject('Welcome To Clone')
                ->send();
    }

    public function login2() {
        $this->layout = 'unauth';

        $this->set('title_for_layout', 'Clone - Login');
        $this->set('description_for_layout', 'Login to Clone');

        if ($this->request->is('post')) {
            if (empty($this->data['User']['username'])) {
                $this->User->validationErrors['username'] = "Please enter your username";
            }
            if (empty($this->data['User']['password'])) {
                $this->User->validationErrors['password'] = "Please enter your password";
            } else if ($this->Auth->login()) {


                $results = $this->User->find('first', array('conditions' => array('OR' => array('User.email' => $this->data['User']['username'], 'User.username' => $this->data['User']['username'])), array('fields' => array('User.active'))));
                if ($results['User']['active'] == 0) {
                    $this->Session->setFlash('Your account has not been activated yet! Please check your email to activate your account');
                    $this->Auth->logout();
                    $this->redirect('/');
                } else {

                    if ($this->data['User']['remember'] == 1) {

                        $cookie = array();
                        $cookie['username'] = $this->request->data['User']['username'];
                        $cookie['password'] = $this->request->data['User']['password'];
                        $this->Cookie->write('User', $cookie, true, '+2 weeks');
                    }
                    $this->redirect($this->Auth->loginRedirect);
                    //$this->redirect($this->Auth->redirect(array('controller' => 'games', 'action' => 'channel')));
                }
            } else {
                $this->Session->setFlash('Please enter a valid username and password');
                $this->redirect('/');
            }
        }
    }

    public function login3() {
        $this->layout = 'landing';

        $this->set('title_for_layout', 'Clone - Login');
        $this->set('description_for_layout', 'Login to Clone');

        if ($this->request->is('post')) {
            if (empty($this->data['User']['username'])) {
                $this->User->validationErrors['username'] = "Please enter your username";
            }
            if (empty($this->data['User']['password'])) {
                $this->User->validationErrors['password'] = "Please enter your password";
            } else if ($this->Auth->login()) {


                $results = $this->User->find('first', array('conditions' => array('OR' => array('User.email' => $this->data['User']['username'], 'User.username' => $this->data['User']['username'])), array('fields' => array('User.active'))));
                if ($results['User']['active'] == 0) {
                    $this->Session->setFlash('Your account has not been activated yet! Please check your email to activate your account');
                    $this->Auth->logout();
                    $this->redirect('/');
                } else {

                    if ($this->data['User']['remember'] == 1) {

                        $cookie = array();
                        $cookie['username'] = $this->request->data['User']['username'];
                        $cookie['password'] = $this->request->data['User']['password'];
                        $this->Cookie->write('User', $cookie, true, '+2 weeks');
                    }
                    $this->redirect($this->Auth->loginRedirect);
                    //$this->redirect($this->Auth->redirect(array('controller' => 'games', 'action' => 'channel')));
                }
            } else {
                $this->Session->setFlash('Please enter a valid username and password');
                $this->redirect('/');
            }
        }
    }

    public function logout() {
        $this->Cookie->delete('User');
        $this->Cookie->delete('remember_me');
        $this->Session->destroy();
        if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
            if ($this->Session->read('mapping')) {
                $redirect = $this->Html->url('http://' . $this->Session->read('mapping_domain'));
            } else {
                $redirect = $this->Html->url('http://' . $user['User']['seo_username'] . '.' . $pure_domain);
            }
        } else {
            $redirect = $this->Html->url(array('controller' => 'businesses', 'action' => 'mysite', $user['User']['id']));
        }
        $this->redirect($this->Auth->logout($redirect));
    }

    public function profile() {
        if ($this->Session->check('Auth.User')) {
            return true;
        } else {
            $this->logout();
        }
    }

    public function randomAvatar() {
        $pic_number = rand(1, 77);
        return $pic_number;
        //$this->set('randomAvatar' , $random['Game']['id']);
    }

    public function randomPicture($number) {
        $pic_number = rand(1, $number);
        return $pic_number;
        //$this->set('randomAvatar' , $random['Game']['id']);
    }

    //List of Bestchannel Names 
    public function bestChannels() {

        $this->loadModel('Game');
        $limit = 20;
        $users = $this->User->find('all', array('limit' => $limit, 'order' => array('Userstat.potential' => 'desc')));
        return $users;
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    function secureSuperGlobalPOST($value) {
        $string = preg_replace('/[^\w\d_ -]/si', '', $value);
        $string = htmlspecialchars(stripslashes($string));
        $string = str_replace("script", "blocked", $string);
        $string = mysql_escape_string($string);
        $string = htmlentities($string);
        $string = str_replace("_", "", $string);
        return $string;
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {

            $this->request->data['User']['username'] = $this->secureSuperGlobalPOST($this->request->data['User']['username']);


            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function register() {
        $this->layout = 'unauth';
        if ($this->request->is('post')) {

            $this->request->data['User']['username'] = $this->secureSuperGlobalPOST($this->request->data['User']['username']);
            $this->request->data['User']['username'] = str_replace(' ', '', $this->request->data['User']['username']);

            //seousername begins
            $this->request->data['User']['seo_username'] = str_replace('.', '', strtolower($this->request->data['User']['username']));
            //seousername ends

            $this->User->create();
            if ($this->User->save($this->request->data)) {

                /* 	Bu blok direk calisiyor

                  $this->Email->from  = 'root@toork.com';
                  $this->Email->to   = 'denemeli@faros.com.tr';
                  $this->Email->subject = 'deniyorum';
                  $this->Email->send('Hello message body!');
                 */
                $this->__sendActivationEmail($this->User->getLastInsertID());
                $this->Session->setFlash('You are successfully registered. Please check your email to verify your account');
                $this->redirect(array('controller' => 'games', 'action' => 'index'));
            } else {
                //$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $validationErrors = $this->User->invalidFields();
                $value = key($validationErrors);
                $this->Session->setFlash($validationErrors[$value][0]);
                $this->redirect(array('controller' => 'games', 'action' => 'index'));
            }
        }
    }

    /* public function set_channel_ads($ads_type = NULL, $ads_id = NULL) {
      Configure::write('debug', 0);

      $adcode_id = $this->request->data['adcode_id'];
      $target_ad_area = $this->request->data['target_ad_area'];

      if ($auth_id = $this->Auth->user('id')) {//Auth Control Begins
      $setting_exist = $this->Ad_setting->find('first', array('contain' => false, 'conditions' => array('Ad_setting.user_id' => $auth_id), 'fields' => array('Ad_setting.id')));
      if ($setting_exist != NULL) {
      $message = 'exist' . $setting_exist['Ad_setting']['id'];
      $this->Ad_setting->id = $setting_exist['Ad_setting']['id'];
      } else {
      $message = 'not exist';
      $filtered_data['Ad_setting']['user_id'] = $auth_id;
      }

      if ($target_ad_area == 'homeBannerTop')
      $filtered_data['Ad_setting']['home_banner_top'] = $adcode_id;
      else if ($target_ad_area == 'homeBannerMiddle')
      $filtered_data['Ad_setting']['home_banner_middle'] = $adcode_id;
      else if ($target_ad_area == 'homeBannerBottom')
      $filtered_data['Ad_setting']['home_banner_bottom'] = $adcode_id;

      if ($this->Ad_setting->save($filtered_data)) {
      $msg = array("title" => 'Ads has been updated.' . $adcode_id . $target_ad_area . $message, 'result' => 1);
      }
      } else {//Auth Control Ends
      //if user unlogged
      $msg = array("title" => 'You have to log in first', 'result' => 0);
      }//Unlogged control ends


      $this->set('rtdata', $msg);
      $this->set('_serialize', array('rtdata'));
      } */

    public function remove_background() {
        Configure::write('debug', 0);
        if ($auth_id = $this->Auth->user('id')) {//Auth Control Begins
            $this->User->id = $auth_id;
            $filtered_data['User']['bg_image'] = "";
            if ($this->User->save($filtered_data)) {
                $msg = array("title" => 'Background has been removed.', 'result' => 1);
            }
        } else {//Auth Control Ends	
            //if user unlogged
            $msg = array("title" => 'You have to log in first', 'result' => 0);
        }//Unlogged control ends

        $this->set('rtdata', $msg);
        $this->set('_serialize', array('rtdata'));
    }

    public function register2() {
        $this->layout = 'landing';
        if ($this->request->is('post')) {

            $this->request->data['User']['username'] = $this->secureSuperGlobalPOST($this->request->data['User']['username']);
            $this->request->data['User']['username'] = str_replace(' ', '', $this->request->data['User']['username']);

            //seousername begins
            $this->request->data['User']['seo_username'] = str_replace('.', '', strtolower($this->request->data['User']['username']));
            //seousername ends

            $this->User->create();
            if ($this->User->save($this->request->data)) {

                /* 	Bu blok direk calisiyor

                  $this->Email->from  = 'root@toork.com';
                  $this->Email->to   = 'denemeli@faros.com.tr';
                  $this->Email->subject = 'deniyorum';
                  $this->Email->send('Hello message body!');
                 */
                $this->__sendActivationEmail($this->User->getLastInsertID());
                $this->Session->setFlash('You are successfully registered. Please check your email to verify your account');
                $this->redirect(array('controller' => 'games', 'action' => 'index'));
            } else {
                //$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $validationErrors = $this->User->invalidFields();
                $value = key($validationErrors);
                $this->Session->setFlash($validationErrors[$value][0]);
                $this->redirect(array('controller' => 'games', 'action' => 'index'));
            }
        }
        $this->set('title_for_layout', 'Register for Clone');
        $this->set('description_for_layout', 'Create your Clone account for free');
    }

    public function faceregister() {
        $this->layout = 'landing';
        if ($this->request->is('post')) {

            $this->request->data['User']['username'] = $this->secureSuperGlobalPOST($this->request->data['User']['username']);
            $this->request->data['User']['username'] = str_replace(' ', '', $this->request->data['User']['username']);

            //seousername begins
            $this->request->data['User']['seo_username'] = str_replace('.', '', strtolower($this->request->data['User']['username']));
            //seousername ends

            $this->User->create();
            if ($this->User->save($this->request->data)) {

                /* 	Bu blok direk calisiyor

                  $this->Email->from  = 'root@toork.com';
                  $this->Email->to   = 'denemeli@faros.com.tr';
                  $this->Email->subject = 'deniyorum';
                  $this->Email->send('Hello message body!');
                 */
                $this->__sendActivationEmail($this->User->getLastInsertID());
                $this->Session->setFlash('You are successfully registered. Please check your email to verify your account');
                $this->redirect(array('controller' => 'games', 'action' => 'index'));
            } else {
                //$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $validationErrors = $this->User->invalidFields();
                $value = key($validationErrors);
                $this->Session->setFlash($validationErrors[$value][0]);
                $this->redirect(array('controller' => 'games', 'action' => 'index'));
            }
        }
        $this->set('title_for_layout', 'Register for Clone');
        $this->set('description_for_layout', 'Create your Clone account for free');
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
//this gets channel suggestions
    public function get_suggestions($restrict) {
        $top50 = $this->User->query('SELECT user_id from userstats ORDER BY potential desc LIMIT ' . $restrict);
        $list50 = array();
        $i = 0;
        foreach ($top50 as $oneof50) {
            $list50[$i] = $oneof50['userstats']['user_id'];
            $i++;
        }
        return $list50;
    }

    public function get_last_activities() {
        if (1 == 2) { //openning of auth_id control
            $auth_id = $this->Session->read('Auth.User.id');
            $subscribed_ids = $this->Subscription->find('list', array('contain' => false, 'fields' => array('Subscription.subscriber_to_id'), 'conditions' => array('Subscription.subscriber_id' => $auth_id)));
            $activityData = $this->Activity->find('all', array('contain' => array('PerformerUser' => array('fields' => array('PerformerUser.id', 'PerformerUser.username', 'PerformerUser.screenname', 'PerformerUser.seo_username')), 'Game' => array('fields' => array('Game.id', 'Game.name', 'Game.seo_url', 'Game.embed')), 'ChannelUser' => array('fields' => array('ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username'))), 'fields' => array('Activity.id', 'Activity.performer_id', 'Activity.game_id', 'Activity.channel_id', 'Activity.msg_id', 'Activity.seen', 'Activity.notify', 'Activity.email', 'Activity.type', 'Activity.replied', 'Activity.created', 'PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username', 'ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username', 'Game.id', 'Game.name', 'Game.seo_url', 'Game.embed'), 'conditions' => array('Activity.performer_id' => $subscribed_ids), 'limit' => 15, 'order' => 'Activity.created DESC'));
            $this->set('lastactivities', $activityData);
        } else {//closing of auth_id control
            //if user is no logged in,get all activity data
            $activityData = $this->Activity->find('all', array('contain' => array('PerformerUser' => array('fields' => array('PerformerUser.id', 'PerformerUser.username', 'PerformerUser.screenname', 'PerformerUser.seo_username')), 'Game' => array('fields' => array('Game.id', 'Game.name', 'Game.seo_url', 'Game.embed')), 'ChannelUser' => array('fields' => array('ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username'))), 'fields' => array('Activity.id', 'Activity.performer_id', 'Activity.game_id', 'Activity.channel_id', 'Activity.msg_id', 'Activity.seen', 'Activity.notify', 'Activity.email', 'Activity.type', 'Activity.replied', 'Activity.created', 'PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username', 'ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username', 'Game.id', 'Game.name', 'Game.seo_url', 'Game.embed'), 'limit' => 15, 'order' => 'Activity.created DESC'));
            $this->set('lastactivities', $activityData);
        }
    }

    public function set_notify_count2() {

        if ($this->Auth->user('id')) { //openning of auth_id control
            $auth_id = $this->Session->read('Auth.User.id');
            $count = $this->Activity->find('count', array('contain' => false, 'conditions' => array('Activity.channel_id' => $auth_id, 'Activity.notify' => 1, 'Activity.seen' => 0)));
            $this->set('notifycount', $count);
        } else {
            $this->set('notifycount', 0);
        }
    }

    public function set_notify() {
        if ($this->Auth->user('id')) { //openning of auth_id control
            $auth_id = $this->Session->read('Auth.User.id');
            $freshdata = $this->Activity->find('all', array('contain' => array('PerformerUser' => array('fields' => array('PerformerUser.id', 'PerformerUser.username', 'PerformerUser.screenname', 'PerformerUser.seo_username')), 'Game' => array('fields' => array('Game.id', 'Game.name', 'Game.seo_url', 'Game.embed')), 'ChannelUser' => array('fields' => array('ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username'))), 'fields' => array('Activity.id', 'Activity.performer_id', 'Activity.game_id', 'Activity.channel_id', 'Activity.msg_id', 'Activity.seen', 'Activity.notify', 'Activity.email', 'Activity.type', 'Activity.replied', 'Activity.created', 'PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username', 'ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username', 'Game.id', 'Game.name', 'Game.seo_url', 'Game.embed'), 'conditions' => array('Activity.notify' => 1, 'Activity.seen' => 0, 'Activity.channel_id' => $auth_id), 'limit' => 10, 'order' => 'Activity.id DESC'));
            $this->set('lastnotifies', $freshdata);
        }
    }

    public function set_suggested_channels() {
//Set first situation of flags
        $restrict = 50;
        $status = 'normal';
        $counter = 0;
        $limit = 20;
        $authid = $this->Session->read('Auth.User.id');
        //Repeat it to get data
        $listofmine = $this->Subscription->find('list', array('conditions' => array('Subscription.subscriber_id' => $authid), 'fields' => array('Subscription.subscriber_to_id')));
        do {
            $suggestdata = $this->User->find('all', array('limit' => $limit, 'order' => 'rand()', 'conditions' => array('User.id' => $this->get_suggestions($restrict), 'NOT' => array('User.id' => $listofmine))));
            if ($suggestdata == NULL) {
                $status = 'empty';
                $restrict+=10;
                $counter++;
            } else {
                $status = 'normal';
            }
            if ($counter == 3)
                break;
        }while ($status == 'empty');
        $category = $this->Category->find('all');
        $this->set('category', $category);
        $this->set('channels', $suggestdata);
        $this->Common->get_last_activities();
        $this->set_notify_count2();
        $this->set_notify();
    }

    public function setPermissions() {
        $this->layout = "ajax";

        if ($this->Auth->user('id')) { //openning of auth_id control
            $auth_id = $this->Session->read('Auth.User.id');

            if ($this->request->is('post')) {
                $permids = $this->request->data['permdata'];

                $this->User->Query('DELETE FROM mailpermissions
WHERE user_id=' . $auth_id . '');

                foreach ($permids as $permid) {

                    $this->User->Query('INSERT INTO mailpermissions
(user_id,type_id) VALUES (' . $auth_id . ',' . $permid . ')');
                }
            }
        }//closing of auth_id control	  
    }

    public function settings($id = null) {
        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');


        $this->set_suggested_channels();
        $this->layout = 'dashboard';
        $this->loadModel('Subscription');

        $userid = $id;

        //============Get Current Permissions=============
        $permissions = $this->User->query('SELECT * FROM mailpermissions WHERE user_id=' . $userid . '');
        if ($permissions) {
            $user_perms = array();
            foreach ($permissions as $permission) {
                array_push($user_perms, $permission['mailpermissions']['type_id']);
            }
            $this->set('user_perms', $user_perms);
        }
        //============/Get Current Permissions============



        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            //$this->request->data['User']['username']=$this->secureSuperGlobalPOST($this->request->data['User']['username']);
            //$this->request->data['User']['username']=str_replace(' ','',$this->request->data['User']['username']);
            $myval = $this->request->data["User"]["edit_picture"]["name"];
            $channelbanner = $this->request->data["User"]["banner"]["name"];

            if ($myval != "") {

                //remove objects from S3
                $prefix = 'upload/users/' . $id;
                $opt = array(
                    'prefix' => $prefix,
                );
                $bucket = Configure::read('S3.name');
                $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
                foreach ($objs as $obj) {
                    //$response=$this->Amazon->S3->delete_object(Configure::read('S3.name'), $obj);
                    //print_r($response);
                }
                //remove objects from S3
                //Folder Formatting begins
                $dir = new Folder(WWW_ROOT . "/upload/users/" . $id);
                $files = $dir->find('.*');
                foreach ($files as $file) {
                    $file = new File($dir->pwd() . DS . $file);
                    $file->delete();
                    $file->close();
                }
                //Folder Formatting ends
                //$this->request->data["User"]["banner2"]="naber.jpg";
                $this->request->data["User"]["picture"] = $this->request->data["User"]["edit_picture"];
            }


            if ($channelbanner != "") {
                //remove objects from S3
                $prefix = 'upload/users/' . $id;


                $opt = array(
                    'prefix' => $prefix,
                );
                $bucket = Configure::read('S3.name');
                $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
                foreach ($objs as $obj) {
                    //$response=$this->Amazon->S3->delete_object(Configure::read('S3.name'), $obj);
                    //print_r($response);
                }
                //remove objects from S3
                //Folder Formatting begins
                $dir = new Folder(WWW_ROOT . "/upload/users/" . $id);
                $files = $dir->find('.*');
                foreach ($files as $file) {
                    $file = new File($dir->pwd() . DS . $file);
                    $file->delete();
                    $file->close();
                }
                //Folder Formatting ends

                $save_picture = $this->User->find('first', array('conditions' => array('User.id' => $id), 'fields' => array('User.picture')));

                $this->request->data["User"]["picture"] = $this->request->data["User"]["banner"];
                $banner_var = $this->request->data["User"]["banner"]["name"];


                $noextension = rtrim($banner_var, '.' . $this->getExtension($banner_var));

                $yesextension = $noextension . '_original.' . $this->getExtension($banner_var);


                $sluggedname = Inflector::slug(substr($yesextension, 0, strrpos($yesextension, '.'))) . // filename
                        substr($yesextension, strrpos($yesextension, '.'));
                $this->request->data["User"]["banner"] = $sluggedname;
            }


            //seousername begins
            //$this->request->data['User']['seo_username']=str_replace('.','',strtolower($this->request->data['User']['username']));
            //seousername ends
            //*********************
            //Secure data filtering
            //*********************
            if ($this->Auth->user('role') == 0) {
                $filtered_data = array('User' => array(
                        'screenname' => $this->request->data['User']['screenname'],
                        'description' => $this->request->data['User']['description'],
                        'website' => $this->request->data['User']['website'],
                        'fb_link' => $this->request->data['User']['fb_link'],
                        'twitter_link' => $this->request->data['User']['twitter_link'],
                        'gplus_link' => $this->request->data['User']['gplus_link'],
                        'website' => $this->request->data['User']['website']));
            } else {
                $filtered_data = array('User' => array(
                        'screenname' => $this->request->data['User']['screenname'],
                        'description' => $this->request->data['User']['description'],
                        'website' => $this->request->data['User']['website'],
                        'adcode' => $this->request->data['User']['adcode'],
                        'fb_link' => $this->request->data['User']['fb_link'],
                        'twitter_link' => $this->request->data['User']['twitter_link'],
                        'gplus_link' => $this->request->data['User']['gplus_link'],
                        'website' => $this->request->data['User']['website']));
            }

            if ($myval != "") {
                $filtered_data['User']['picture'] = $this->request->data["User"]["picture"];
            }
            if ($channelbanner != "") {
                $filtered_data['User']['picture'] = $this->request->data["User"]["picture"];
                $filtered_data['User']['banner'] = $this->request->data["User"]["banner"];
            }



            if ($this->User->save($filtered_data)) {
                $this->Session->setFlash(__('You successfully updated your channel'));
                if ($channelbanner != "")
                    $this->User->saveField('picture', $save_picture['User']['picture']);

                //$this->rollback_image($save_picture,$id);
                //Upload to aws begins
                $dir = new Folder(WWW_ROOT . "/upload/users/" . $id);
                $files = $dir->find('.*');
                foreach ($files as $file) {
                    $file = new File($dir->pwd() . DS . $file);
                    $info = $file->info();
                    $basename = $info["basename"];
                    echo $basename;
                    $dirname = $info["dirname"];
                    //echo $file;
                    $this->Amazon->S3->create_object(
                            Configure::read('S3.name'), 'upload/users/' . $id . "/" . $basename, array(
                        'fileUpload' => WWW_ROOT . "/upload/users/" . $id . "/" . $basename,
                        'acl' => AmazonS3::ACL_PUBLIC
                            )
                    );
                }
                //Upload to aws ends

                $this->redirect(array('action' => 'settings', $this->Session->read('Auth.User.id')));
            } else {
                $validationErrors = $this->User->invalidFields();
                $value = key($validationErrors);
                $this->Session->setFlash($validationErrors[$value][0]);
                $this->redirect(array('controller' => 'users', 'action' => 'settings', $userid));
            }
        } else {

            $this->request->data = $this->User->read(array('screenname', 'username', 'description', 'website', 'adcode', 'fb_link', 'twitter_link', 'gplus_link', 'seo_username'), $id);
            $this->request->data["User"]["password"] = "";
        }
        $countries = $this->User->Country->find('list');
        $this->set(compact('countries'));


        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*')));
        $isActive = $user['User']['active'];
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('userid', $userid);
        $this->set('username', $userName);
        $subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
        $subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
        $this->set('subscribe', $subscribe);
        $this->set('subscribeto', $subscribeto);
        $this->set('isActive', $isActive);


        $this->set('title_for_layout', 'Edit Channel');
        $this->set('description_for_layout', 'Edit Your Channel');
    }

    function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

    public function rollback_image($picture = NULL, $id = NULL) {
        if ($picture != NULL && $id != NULL) {
            $this->User->id = $id;
            $this->User->saveField('picture', $picture);
        }
    }

    public function crop_game_image($game_name, $id) {
        $command3 = "mkdir /home/ubuntu/test/" . $id . " && convert /var/www/betatoork/app/webroot/upload/users/" . $id . "/" . $game_name . " -quiet  -crop 200x110+30+30  +repage  /home/ubuntu/test/" . $id . "/" . $game_name . "";
        exec($command3, $output3, $ret3);
        //print_r($output3);print_r($ret3);
        return $ret3;
    }

    public function adminedit($id = null) {

        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');

        $this->layout = 'base';
        $this->loadModel('Subscription');
        $userid = $id;
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            $this->request->data['User']['username'] = $this->secureSuperGlobalPOST($this->request->data['User']['username']);
            $this->request->data['User']['username'] = str_replace(' ', '', $this->request->data['User']['username']);
            $myval = $this->request->data["User"]["edit_picture"]["name"];

            if ($myval != "") {

                //remove objects from S3
                $prefix = 'upload/users/' . $id;


                $opt = array(
                    'prefix' => $prefix,
                );
                $bucket = Configure::read('S3.name');
                $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
                foreach ($objs as $obj) {
                    $response = $this->Amazon->S3->delete_object(Configure::read('S3.name'), $obj);
                    //print_r($response);
                }
                //remove objects from S3
                //Folder Formatting begins
                $dir = new Folder(WWW_ROOT . "/upload/users/" . $id);
                $files = $dir->find('.*');
                foreach ($files as $file) {
                    $file = new File($dir->pwd() . DS . $file);
                    $file->delete();
                    $file->close();
                }
                //Folder Formatting ends

                $this->request->data["User"]["picture"] = $this->request->data["User"]["edit_picture"];
            }

            //seousername begins
            //$this->request->data['User']['seo_username']=str_replace('.','',strtolower($this->request->data['User']['username']));
            //seousername ends


            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('You successfully updated your channel'));


                //Upload to aws begins
                $dir = new Folder(WWW_ROOT . "/upload/users/" . $id);
                $files = $dir->find('.*');
                foreach ($files as $file) {
                    $file = new File($dir->pwd() . DS . $file);
                    $info = $file->info();
                    $basename = $info["basename"];
                    $dirname = $info["dirname"];
                    //echo $file;
                    $this->Amazon->S3->create_object(
                            Configure::read('S3.name'), 'upload/users/' . $id . "/" . $basename, array(
                        'fileUpload' => WWW_ROOT . "/upload/users/" . $id . "/" . $basename,
                        'acl' => AmazonS3::ACL_PUBLIC
                            )
                    );
                }
                //Upload to aws ends


                $this->redirect(array('action' => 'useredit', $this->Session->read('Auth.User.id')));
            } else {
                $validationErrors = $this->User->invalidFields();
                $value = key($validationErrors);
                $this->Session->setFlash($validationErrors[$value][0]);
                $this->redirect(array('action' => 'useredit', $this->Session->read('Auth.User.id')));
            }
        } else {

            $this->request->data = $this->User->read(null, $id);
            $this->request->data["User"]["password"] = "";
        }
        $countries = $this->User->Country->find('list');
        $this->set(compact('countries'));


        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('userid', $userid);
        $this->set('username', $userName);
        $subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
        $subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
        $this->set('subscribe', $subscribe);
        $this->set('subscribeto', $subscribeto);
    }

    public function password2($id = null) {
        $this->layout = 'dashboard';

        $userid = $id;
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->request->data["User"]["new_password"] != "") {
                if (Security::hash(Configure::read('Security.salt') . $this->request->data['User']['old_password']) == $this->User->field('password')) {
                    $this->request->data["User"]["password"] = $this->request->data["User"]["new_password"];
                    $this->request->data["User"]["confirm_password"] = $this->request->data["User"]["new_password"];
                } else {
                    $this->Session->setFlash("Old password is wrong");
                    $this->redirect('/users/password2/' . $id);
                }
            }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('You successfully changed your password'));
                $this->redirect('/users/settings/' . $id);
                //$this->redirect(array('action' => 'password',$this->Session->read('Auth.User.id')));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $validationErrors = $this->User->invalidFields();
                $value = key($validationErrors);
                $this->Session->setFlash($validationErrors[$value][0]);
                $this->redirect(array('controller' => 'users', 'action' => 'password2', $id));
            }
        } else {

            $this->request->data = $this->User->read(null, $id);
            $this->request->data["User"]["password"] = "";
        }

        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('userid', $userid);
        $this->set('username', $userName);

        $this->set('title_for_layout', 'Change Password');
        $this->set('description_for_layout', 'Change your password');
        $this->set_suggested_channels();
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'profile'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'profile'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->layout = "ajax";
        $this->User->recursive = 0;
        $this->set('users', $this->paginate('User'));
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function affected($id, $value) {
        $this->User->Game->updateAll(array('active' => $value), array('user_id' => $id));
        $this->Session->setFlash(__('The user has been updated all games of this user has been affected'));
    }

    public function useredit() {
        $this->layout = 'adminDashboard';
        if ($this->request->isPost()) {
            //i�

            $this->User->id = $this->request->data["User"]["id"];
            $id = $this->request->data["User"]["id"];
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->User->save($this->request->data)) {

                    if ($this->request->data["User"]["affect"] == 1) {
                        $value = $this->request->data["User"]["active"];
                        $this->affected($id, $value);
                    } else {
                        $this->Session->setFlash(__('The user has been updated'));
                    }


                    $this->redirect(array('action' => 'useredit'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            } else {
                $this->request->data = $this->User->read(null, $id);
            }

            //dis
        }
        $this->User->recursive = 0;
        $this->set('users', $this->paginate('User'));
        $authid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $authid)));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('username', $userName);
    }

    /**
     * admin_delete method
     *
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    function check_cname($userid) {
        //check cname
        $cdata = $this->Game->query('SELECT * from custom_domains WHERE user_id=' . $userid . '');
        if ($cdata != NULL) {
            $this->Session->write('mapping', 1);
            $this->Session->write('mapping_domain', $cdata[0]['custom_domains']['domain']);
        }
    }

    public function checkUser() {
        $this->loadModel('Userstat');
        Configure::write('debug', 0);



        $dt = $this->request->data['dt'];
        $attr = $this->request->data['attr'];

        if ($attr == "txt_signusername") {
            if ($this->User->find('first', array('conditions' => array('User.username' => $dt)))) {
                $this->set('rtdata', 'This Username is alredy been taken. Please try another one.');
            }
        } else if ($attr == "txt_signemail") {
            if ($this->User->find('first', array('conditions' => array('User.email' => $dt)))) {
                $this->set('rtdata', 'This email is already registered. Please try another one.');
            }
        } else if ($attr == "recaptcha_response_field") {
            $privatekey = "6LebitISAAAAAEY3ntRWxcpvMtPyNxRkvpFrRO8h";
            $userip = $_SERVER["REMOTE_ADDR"];
            $challenge = $this->request->data['c'];

            $ch = curl_init("http://www.google.com/recaptcha/api/verify");

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "privatekey=$privatekey&remoteip=$userip&challenge=$challenge&response=$dt");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($ch);
            curl_close($ch);

            $resp = explode("\n", $output);
            $this->set('rtdata', $resp[0]);
            if ($resp[0] == "true") {
                $this->User->create();
                $this->request->data['User']['username'] = $this->secureSuperGlobalPOST(str_replace(' ', '', $this->request->data['un']));
                $this->request->data['User']['email'] = $this->request->data['um'];
                $this->request->data['User']['password'] = $this->request->data['up'];
                $this->request->data['User']['seo_username'] = strtolower($this->secureSuperGlobalPOST(str_replace(' ', '', $this->request->data['un'])));
                $this->request->data['User']['confirm_password'] = $this->request->data['up'];
                $this->request->data['User']['active'] = 1;
                //$this->request->data['User']['userstat'] = 0; //buraya bak�lacak yeni alan i�in

                if ($this->User->save($this->request->data)) {
                    $this->request->data['Userstat']['user_id'] = $this->User->getLastInsertID();
                    $this->Userstat->save($this->request->data);
                    $this->set('rtdata', 'true');
                } else {
                    $this->checkUsernameEmail($this->request->data['User']['username'], $this->request->data['User']['email']); //Check availability
                    //$this->set('rtdata', 'Can not register. Please try again.');
                }
            }
        } else if ($attr == "txt_logusername") {
            $this->request->data['User']['username'] = $this->request->data['un'];
            $this->request->data['User']['password'] = $this->request->data['ps'];
            $this->request->data['User']['remember'] = $this->request->data['rm'];
            if ($this->Auth->login()) {
                if ($this->request->data['User']['remember'] == 1) {
                    unset($this->request->data['User']['remember']);
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
                    $this->Cookie->write('remember_me', $this->request->data['User'], true, '2 weeks');
                }
                $results = $this->User->find('first', array(
                    'conditions' => array(
                        'OR' => array(
                            'User.email' => $this->request->data['User']['username'],
                            'User.username' => $this->request->data['User']['username']
                        )
                    ),
                    array(
                        'fields' => array(
                            'User.active',
                            'User.id'
                        )
                    )
                ));
                $this->User->id = $results['User']['id'];
                $this->User->saveField('last_login', date('Y-m-d H:i:s'));
                $msg = array(
                    "msgid" => '1',
                    "msg" => Router::url(array(
                        "controller" => "dashboard"
                    ))
                    //  "msg" => $this->webroot . $this->Auth->loginRedirect['controller'] . '/' . $this->Auth->loginRedirect['action']
                );
                $this->set('rtdata', $msg);

                $this->check_cname($results['User']['id']);
            } else {
                $msg = array("msgid" => '2', "msg" => 'The username-password combination you entered is incorrect.');
                $this->set('rtdata', $msg);
            }
        } else if ($attr == "t_regbox_logemail") {
            if (isset($dt) && $dt != '') {
                $user = $this->User->find('first', array('conditions' => array('OR' => array('User.email' => $dt, 'User.username' => $dt))));
                if ($user === false) {
                    $this->set('rtdata', 'This email is not registered to Clone yet.');
                } else {
                    $this->__sendResetEmail($user["User"]["id"]);
                }
            } else {
                $this->set('rtdata', 'Please Enter A Valid Email!');
            }
        } else {
            $this->set('rtdata', 'Please Enter A Valid Email!');
        }

        $this->set('_serialize', array('rtdata'));
    }

    public function checkUsername($username) {

        if ($this->User->find('first', array('conditions' => array('User.username' => $username)))) {
            return 0;
        } else {
            return 1;
        }
    }

    public function checkEmail($email) {
        if ($this->User->find('first', array('conditions' => array('User.email' => $email)))) {
            return 0;
        } else {
            return 1;
        }
    }

    public function checkUsernameEmail($username = NULL, $email = NULL) {

        if (!$this->checkUsername($username) && $this->checkEmail($email)) {
            $this->set('rtdata', 'This Username is alredy been taken. Please try another one.');
        } elseif ((!$this->checkEmail($email)) && ($this->checkUsername($username))) {
            $this->set('rtdata', 'This email is already registered. Please try another one.');
        } elseif ((!$this->checkUsername($username)) && (!$this->checkEmail($email))) {
            $this->set('rtdata', 'This Username and email already registered. Please try another one.');
        } else {
            $this->set('rtdata', 'Can not register. There is something wrong with the inputs. Please try something else.');
        }
    }

    public function usernameAvailable() {
        $this->loadModel('Userstat');
        Configure::write('debug', 0);

        $dt = $this->request->data['dt'];
        $attr = $this->request->data['attr'];

        if ($attr == "check_username") {
            if (!$this->User->find('first', array('contain' => false, 'conditions' => array('User.username' => $dt)))) {
                $this->set('rtdata', 1);
            }
        }

        if ($attr == "check_email") {
            if (!$this->User->find('first', array('contain' => false, 'conditions' => array('User.email' => $dt)))) {
                $this->set('rtdata', 1);
            } else {
                $this->set('rtdata', 0);
            }
        }

        $this->set('_serialize', array('rtdata'));
    }

    public function checkUser2() {
        $this->loadModel('Userstat');
        Configure::write('debug', 0);

        $dt = $this->request->data['dt'];
        $attr = $this->request->data['attr'];

        if ($attr == "txt_signusername") {
            if ($this->User->find('first', array('conditions' => array('User.username' => $dt)))) {
                $this->set('rtdata', 'This Username is already been taken. Please try another one.');
            }
        } else if ($attr == "txt_signemail") {
            if ($this->User->find('first', array('conditions' => array('User.email' => $dt)))) {
                $this->set('rtdata', 'This email is already registered. Please try another one.');
            }
        } else if ($attr == "fast_register") {
            $this->User->create();
            $this->request->data['User']['username'] = $this->secureSuperGlobalPOST(str_replace(' ', '', $this->request->data['un']));
            $this->request->data['User']['email'] = $this->request->data['um'];
            $this->request->data['User']['password'] = $this->request->data['up'];
            $this->request->data['User']['seo_username'] = strtolower($this->secureSuperGlobalPOST(str_replace(' ', '', $this->request->data['un'])));
            $this->request->data['User']['confirm_password'] = $this->request->data['up'];
            $this->request->data['User']['active'] = 0;
            $this->request->data['User']['last_login'] = date('Y-m-d H:i:s');
            //$this->request->data['User']['userstat'] = 0; //buraya bak�lacak yeni alan i�in
            if ($this->User->save($this->request->data)) {
                //userstat data for new user
                $userstat_data = array('Userstat' => array(
                        'user_id' => $this->User->getLastInsertID(),
                        'totalrate' => 0,
                        'favoritecount' => 0,
                        'subscribe' => 0,
                        'subscribeto' => 0,
                        'uploadcount' => 0,
                        'playcount' => 0,
                        'potential' => 0));

                //$this->request->data['Userstat']['user_id'] = $this->User->getLastInsertID();
                $this->Userstat->save($userstat_data);
                $this->set('rtdata', 'true');
                $this->Session->write('FirstLogin', $this->User->getLastInsertID());
            } else {
                $this->set('rtdata', 'Can not register. Please try again.');
                $this->checkUsernameEmail($this->request->data['User']['username'], $this->request->data['User']['email']); //Check availability
            }
        } else if ($attr == "facebook_register") {


            $this->User->create();
            $this->request->data['User']['screenname'] = $this->secureSuperGlobalPOST($this->request->data['sn']);
            $this->request->data['User']['username'] = $this->secureSuperGlobalPOST(str_replace(' ', '', $this->request->data['un']));
            $this->request->data['User']['email'] = $this->request->data['um'];
            $this->request->data['User']['password'] = $this->request->data['up'];
            $this->request->data['User']['seo_username'] = strtolower($this->secureSuperGlobalPOST(str_replace(' ', '', $this->request->data['un'])));
            $this->request->data['User']['confirm_password'] = $this->request->data['up'];
            $this->request->data['User']['active'] = 0;
            $this->request->data['User']['facebook_id'] = $this->request->data['fi'];
            $this->request->data['User']['access_token'] = $this->request->data['at'];
            $this->request->data['User']['fb_link'] = 'https://www.facebook.com/' . $this->request->data['User']['facebook_id'];
            $this->request->data['User']['last_login'] = date('Y-m-d H:i:s');

            //-----Get some from fb graph api--------
            //$pageContent = file_get_contents('http://graph.facebook.com/1157251270');
            //$parsedJson  = json_decode($pageContent);
            //echo $parsedJson->username;
            //-----//Get some from fb graph api--------
            //$this->request->data['User']['userstat'] = 0; //buraya bak�lacak yeni alan i�in

            if ($this->User->save($this->request->data)) {
                $lastinsertid = $this->User->getLastInsertID();
                //userstat data for new user
                $userstat_data = array('Userstat' => array(
                        'user_id' => $lastinsertid,
                        'totalrate' => 0,
                        'favoritecount' => 0,
                        'subscribe' => 0,
                        'subscribeto' => 0,
                        'uploadcount' => 0,
                        'playcount' => 0,
                        'potential' => 0));

                //$this->request->data['Userstat']['user_id'] = $this->User->getLastInsertID();
                $this->Userstat->save($userstat_data);

                //-----Download Facebook Image-----
                $randomimageid = rand(100000, 99999999);
                $this->Game->query('UPDATE users SET picture="' . $randomimageid . '.jpg" WHERE id=' . $lastinsertid . ';');
                $url = 'https://graph.facebook.com/' . $this->request->data['User']['facebook_id'] . '/picture?width=120&height=160';
                $img = '/home/ubuntu/test/' . $randomimageid . '_original.jpg';
                file_put_contents($img, file_get_contents($url));
                //-----/Download Facebook Image-----
                //================Throw to S3==================
                $this->Amazon->S3->create_object(
                        Configure::read('S3.name'), 'upload/users/' . $lastinsertid . '/' . $randomimageid . '_original.jpg', array(
                    'fileUpload' => "/home/ubuntu/test/" . $randomimageid . "_original.jpg",
                    'acl' => AmazonS3::ACL_PUBLIC
                        )
                );
                //============/Throw to S3==========================

                $this->set('rtdata', 'true');
                $this->Session->write('FirstLogin', $this->User->getLastInsertID());
            } else {
                //$this->set('rtdata', 'Can not register. Please try again.');
                $this->checkUsernameEmail($this->request->data['User']['username'], $this->request->data['User']['email']); //Check availability
            }
        } else if ($attr == "txt_logusername") {
            $this->request->data['User']['username'] = $this->request->data['un'];
            $this->request->data['User']['password'] = $this->request->data['ps'];
            if ($this->Auth->login() == true) {
                $results = $this->User->find('first', array('conditions' => array('OR' => array('User.email' => $this->request->data['User']['username'], 'User.username' => $this->request->data['User']['username'])), array('fields' => array('User.active'))));
                if ($results['User']['active'] == 0) {
                    $this->Auth->logout();
                    $msg = array("msgid" => '0', "msg" => 'Your account has not been activated yet! Please check your email to activate your account');
                    $this->set('rtdata', $msg);
                } else {
                    $msg = array("msgid" => '1', "msg" => $this->webroot . $this->Auth->loginRedirect['controller'] . '/' . $this->Auth->loginRedirect['action']);
                    $this->set('rtdata', $msg);
                }
            } else {
                $msg = array("msgid" => '2', "msg" => 'Wrong Username or Password. Please enter a valid username and password');
                $this->set('rtdata', $msg);
            }
        } else if ($attr == "t_regbox_logemail") {
            if (isset($dt) && $dt != '') {
                $user = $this->User->find('first', array('conditions' => array('User.email' => $dt)));
                if ($user === false) {
                    $this->set('rtdata', 'This email is not registered to Clone yet.');
                } else {
                    $this->__sendResetEmail($user["User"]["id"]);
                }
            } else {
                $this->set('rtdata', 'Please Enter A Valid Email!');
            }
        } else {
            
        }

        $this->set('_serialize', array('rtdata'));
    }

    public function FaceUser() {
        $this->loadModel('Userstat');
        Configure::write('debug', 0);

        $accesstoken = $this->request->data['at'];
        $facebook_id = $this->request->data['ui'];

        //Accesstoken sistemde kayitlimi degilmi kayitli degilse yeni register paneline y�nlendir.Kayitliysa sisteme login olmasini sagla.

        $user_exists = $this->User->find('first', array('contain' => false, 'conditions' => array('User.facebook_id' => $facebook_id), 'fields' => array('User.id')));
        if ($user_exists != NULL) {
            //Update the access token and redirect to logged in.

            $user = $this->User->find('first', array('conditions' => array('User.facebook_id' => $facebook_id)));
            if ($user != NULL)
                $this->Auth->login($user['User']); //Variable name has to be "user" for manual login.




                
//Enter last login data!
            $this->User->id = $user_exists['User']['id'];
            $this->User->saveField('last_login', date('Y-m-d H:i:s'));

            $msg = array('status' => 'user exists', 'msgid' => '1', 'msg' => 'Just a moment.<br>You will be redirected to your personal channel now..', 'location' => $this->webroot . '/dashboard');
        }else {
            //redirect to social register page with facebook id and access token.
            $msg = array("status" => 'user no exists', 'msgid' => '2', 'msg' => 'Just a moment.<br>You will be redirected to register panel..', 'location' => $this->webroot . 'users/' . 'faceregister');
        }

        $this->set('rtdata', $msg);

        $this->set('_serialize', array('rtdata'));
    }

    public function gatekeeper() {
        $this->loadModel('Userstat');
        Configure::write('debug', 0);

        $dt = $this->request->data['dt'];
        $attr = $this->request->data['attr'];

        if ($attr == "txt_signusername") {
            if ($this->User->find('first', array('conditions' => array('User.username' => $dt)))) {
                $this->set('rtdata', 'This Username is alredy been taken. Please try another one.');
            }
        } else if ($attr == "txt_signemail") {
            if ($this->User->find('first', array('conditions' => array('User.email' => $dt)))) {
                $this->set('rtdata', 'This email is already registered. Please try another one.');
            }
        } else if ($attr == "recaptcha_response_field") {
            $privatekey = "6LebitISAAAAAEY3ntRWxcpvMtPyNxRkvpFrRO8h";
            $userip = $_SERVER["REMOTE_ADDR"];
            $challenge = $this->request->data['c'];

            $ch = curl_init("http://www.google.com/recaptcha/api/verify");

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "privatekey=$privatekey&remoteip=$userip&challenge=$challenge&response=$dt");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($ch);
            curl_close($ch);

            $resp = explode("\n", $output);
            $this->set('rtdata', $resp[0]);
            if ($resp[0] == "true") {
                $this->User->create();
                $this->request->data['User']['username'] = $this->secureSuperGlobalPOST(str_replace(' ', '', $this->request->data['un']));
                $this->request->data['User']['email'] = $this->request->data['um'];
                $this->request->data['User']['password'] = $this->request->data['up'];
                $this->request->data['User']['seo_username'] = strtolower($this->secureSuperGlobalPOST(str_replace(' ', '', $this->request->data['un'])));
                $this->request->data['User']['confirm_password'] = $this->request->data['up'];
                $this->request->data['User']['active'] = 1;
                //$this->request->data['User']['userstat'] = 0; //buraya bak�lacak yeni alan i�in

                if ($this->User->save($this->request->data)) {
                    $this->request->data['Userstat']['user_id'] = $this->User->getLastInsertID();
                    $this->Userstat->save($this->request->data);
                    $this->set('rtdata', 'true');
                } else {
                    $this->set('rtdata', 'Can not register. Please try again.');
                }
            }
        } else if ($attr == "txt_logusername") {
            $this->request->data['User']['username'] = $this->request->data['un'];
            $this->request->data['User']['password'] = $this->request->data['ps'];
            if ($this->Auth->login() == true) {
                $results = $this->User->find('first', array('conditions' => array('OR' => array('User.email' => $this->request->data['User']['username'], 'User.username' => $this->request->data['User']['username'])), array('fields' => array('User.active'))));
                if ($results['User']['active'] == 0) {
                    $this->Auth->logout();
                    $msg = array("msgid" => '0', "msg" => 'Your account has not been activated yet! Please check your email to activate your account');
                    $this->set('rtdata', $msg);
                } else {
                    $msg = array("msgid" => '1', "msg" => $this->webroot . $this->Auth->loginRedirect['controller'] . '/' . $this->Auth->loginRedirect['action']);
                    $this->set('rtdata', $msg);
                }
            } else {
                $msg = array("msgid" => '2', "msg" => 'Wrong Username or Password. Please enter a valid username and password');
                $this->set('rtdata', $msg);
            }
        } else if ($attr == "t_regbox_logemail") {
            if (isset($dt) && $dt != '') {
                $user = $this->User->find('first', array('conditions' => array('User.email' => $dt)));
                if ($user === false) {
                    $this->set('rtdata', 'This email is not registered to Clone yet.');
                } else {
                    $this->__sendResetEmail($user["User"]["id"]);
                }
            } else {
                $this->set('rtdata', 'Please Enter A Valid Email!');
            }
        } else {
            
        }

        $this->set('_serialize', array('rtdata'));
    }

    public function set_cookie($data) {
        $this->layout = 'ajax';

        //$_COOKIE['CAKEPHP']=$data;
        setcookie("CAKEPHP", $data, time() + 3600, '/', env("HTTP_HOST"));
        echo 'sCookiehas been set.Id:' . $data;
    }

}
