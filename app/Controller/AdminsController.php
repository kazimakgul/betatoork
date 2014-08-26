<?php

App::uses('AppController', 'Controller');

/**
 * Admin Controller
 *
 * @author Emircan Ok
 */
class AdminsController extends AppController {

    public $name = 'Admins';
    var $uses = array(
        'Game',
        'User',
        'Favorite',
        'Subscription',
        'Playcount',
        'Rate',
        'Userstat',
        'Category',
        'Clonebot',
        'Order',
        'Activity',
        'Message',
        'Log'
    );
    public $helpers = array(
        'Html',
        'Form',
        'Upload',
        'Recaptcha.Recaptcha'
    );
    public $components = array(
        'Amazonsdk.Amazon',
        'Recaptcha.Recaptcha',
        'Common'
    );

    public function index() {
        $this->layout = 'ajax';
        echo 'ready';
        if ($_GET['task'] == 'deleteorders') {
            $this->deleteallorders();
        }
        //$this->add_session(245);
        //$this->delete_session(15);
    }

    public function bots() {
        $this->layout = 'adminDashboard';
        $this->set('users', $this->paginate('Clonebot'));
        $authid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $authid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('username', $userName);
    }

    public function deleteallorders() {
        $this->Order->query('DELETE FROM `orders` WHERE 1');
        echo 'deleted orders';
    }

    public function add_session($id) {
        $selectedlist = array();
        $arr = $this->Session->read('User.selectedlst');
        if ($arr != NULL) {
            $selectedlist = $arr;
            array_push($selectedlist, $id);
            $this->Session->write('User.selectedlst', $selectedlist);
        } else {
            array_push($selectedlist, $id);
            $this->Session->write('User.selectedlst', $selectedlist);
        }

        $this->Session->write('User.selectedcount', count($selectedlist));
        print_r($selectedlist);
    }

    public function game_add() {
        $this->layout = 'adminDashboard';
        $authid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $authid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('username', $userName);
        $categories = $this->Game->Category->find('list');
        $this->set(compact('categories'));
    }

    public function game_edit($id = NULL) {
        $this->layout = 'adminDashboard';
        $game = $this->Game->find('first', array(
            'contain' => false,
            'conditions' => array(
                'Game.id' => $id
            )
        ));
        $this->set('game', $game);
        $authid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $authid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('id', $id);
        $this->set('user', $user);
        $this->set('username', $userName);
        $categories = $this->Game->Category->find('list');
        $this->set(compact('categories'));
    }

    public function admin_game_submit() {

        $this->layout = 'ajax';

        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');

        $category_id = $this->request->data['category_id'];
        $fullscreen = $this->request->data['full_screen'];
        $game_description = $this->request->data['game_description'];
        $game_file = $this->request->data['game_file'];
        $game_height = $this->request->data['game_height'];
        $game_link = $this->request->data['game_link'];
        $game_name = $this->request->data['game_name'];
        $game_priority = $this->request->data['game_priority'];
        $game_tags = $this->request->data['game_tags'];
        $game_user_id = $this->request->data['game_user_id'];
        $game_width = $this->request->data['game_width'];
        $mobileready = $this->request->data['mobile_ready'];

        if (isset($this->request->data['image_name'])) {
            $image_name = $this->request->data['image_name'];
        }

        if ($userid = $this->Session->read('Auth.User.id')) {
            //  This area should be exist for upload plugin needs-begins

            if (!empty($image_name)) {

                $file = new File(WWW_ROOT . DS . 'upload' . DS . 'temporary' . DS . $userid . DS . $image_name, false);
                $info = $file->info();
                $filename = $info["filename"];
                $ext = $info["extension"];
                $basename = $info["basename"];
                $dirname = $info["dirname"];
                $newname = $filename . '_toorksize.' . $ext;
                $upload_dir = WWW_ROOT . DS . 'upload' . DS . 'temporary' . DS . $userid . DS;
                rename(
                    $upload_dir . $image_name,
                    $upload_dir . $newname
                );
            }

            //  This area should be exist for upload plugin needs-ends
            if ($game_file != 'empty') {

                $type = $this->Game->get_game_type($game_file);
            } else {

                $type = $this->Game->get_game_type($game_link);
            }
            //============Save Datas To Games Database Begins================
            //*****************************
            //Secure data filtering begins
            //*****************************
            $filtered_data = array(
                'Game' => array(
                    /* 'id' => 563, */
                    'name' => $this->Game->secureSuperGlobalPOST($game_name),
                    'description' => $this->Game->secureSuperGlobalPOST($game_description),
                    /* 'game_link' => $game_link, */
                    'width' => $game_width,
                    'height' => $game_height,
                    'type' => $type,
                    'link' => $game_link,
                    'priority' => $game_priority,
                    'user_id' => $game_user_id,
                    /* 'priority' => 0, */
                    'category_id' => $category_id,
                    'seo_url' => $this->Game->checkDuplicateSeoUrl($game_name),
                    'owner_id' => $game_user_id,
                    'user_id' => $game_user_id,
                    'fullscreen' => $fullscreen,
                    'mobileready' => $mobileready
                )
            );

            $id = $this->request->data['id'];
            if ($id > 0) {
                $filtered_data['Game']['id'] = $id;
            }

            /*$this->Game->save($filtered_data);
            $log = $this->Game->getDataSource()->getLog(false, false);
            debug($log);
            exit;*/

            //*****************************
            //Secure data filtering ends
            //*****************************
            if ($this->Game->save($filtered_data)) {
                $this->requestAction(array(
                    'controller' => 'userstats',
                    'action' => 'getgamecount',
                    $userid
                ));
                $id = $this->Game->getLastInsertId();
                $this->requestAction(array(
                    'controller' => 'wallentries',
                    'action' => 'action_ajax',
                    $id,
                    $userid
                ));
                if (!empty($image_name)) {
                    //=======Upload to aws for Game Image begins===========
                    $feedback = $this->Amazon->S3->create_object(Configure::read('S3.name'), 'upload/games/' . $id . "/" . $newname, array(
                        'fileUpload' => WWW_ROOT . "/upload/temporary/" . $userid . "/" . $newname,
                        'acl' => AmazonS3::ACL_PUBLIC
                    ));
                    //========Upload to aws for Game Image ends==============
                    if ($feedback) {
                        //Set the picture field on db.
                        $this->Game->query('UPDATE games SET picture="' . $image_name . '" WHERE id=' . $id);
                        $this->remove_temporary($userid, 'new_game');
                    }
                }
                $this->gameUpload($game_file, $id, $userid); //Check if any game upload exists 
            }
            //============Save Datas To Games Database Ends================
        }
        $msg = array("title" => 'Game has been saved on s3.' . 'game file:' . $game_file, 'result' => 1);
        $this->set('rtdata', $msg);
        $this->set('_serialize', array('rtdata'));
    }

    function gameUpload($game_file = NULL, $id = NULL, $userid = NULL) {
        if ($game_file != 'empty') {

            $random_number = rand(1000000, 9999999);
            $new_game_file = $random_number . '_' . $game_file;

            //=======Upload to aws for Game Upload begins===========
            $feedback = $this->Amazon->S3->create_object(Configure::read('S3-games.name'), $new_game_file, array(
                'fileUpload' => WWW_ROOT . "upload/gamefiles/" . $userid . "/" . $game_file,
                'acl' => AmazonS3::ACL_PUBLIC
            ));
            //========Upload to aws for Game Upload ends==============
            if ($feedback) {
                //Set the picture field on db.
                $game_link = Configure::read('S3-games.url') . '/' . $new_game_file;
                $this->Game->query('UPDATE games SET link="' . $game_link . '" WHERE id=' . $id);
                $this->remove_temporary($userid, 'game_upload');
            }
        }
    }

    public function delete_session($id) {
        $selectedlist = array();

        $arr = $this->Session->read('User.selectedlst');
        if ($arr != NULL) {
            foreach ($arr as $key => $value) {
                if ($value == $id) {
                    unset($arr[$key]);
                }
            }
        }
        $this->Session->write('User.selectedlst', $arr);
        $this->Session->write('User.selectedcount', count($arr));
        print_r($arr);
    }

    public function do_pwd_changes() {
        $this->layout = 'ajax';

        $password = $_POST['password'];

        if ($password != NULL) {

            $arr = $this->Session->read('User.selectedlst');
            if ($arr != NULL) {
                foreach ($arr as $ar) {
                    $this->User->id = $ar;
                    if ($this->User->saveField('password', $password)) {
                        //echo '<br>Password changed for '.$ar;
                    }
                }
            }//Arr is not null
            //Get usernames for ids.
            $userinfos = $this->User->find('all', array(
                'contain' => false,
                'fields' => array(
                    'User.username',
                    'User.id'
                ),
                'conditions' => array(
                    'User.id' => $arr
                )
            ));
            echo '<ul>';
            foreach ($userinfos as $userinfo) {
                echo '<li>' . $userinfo['User']['username'] . '(' . $userinfo['User']['id'] . ')</li>';
            }
            echo '<ul>';


            //Remove Sessions
            $this->Session->delete('User.selectedlst');
            $this->Session->delete('User.selectedcount');
        } else {//End of null control
            echo 'Error:You have to enter password in field!';
        }
    }

    public function filepicker() {
        $this->layout = 'adminDashboard';
        echo 'filepicker ready';
    }

    public function do_adcode_changes() {
        $this->layout = 'ajax';

        $adcode = $_POST['adcode'];

        if ($adcode != NULL) {

            $arr = $this->Session->read('User.selectedlst');
            if ($arr != NULL) {
                foreach ($arr as $ar) {
                    $this->User->id = $ar;
                    if ($this->User->saveField('adcode', $adcode)) {
                        //echo '<br>Password changed for '.$ar;
                    }
                }
            }//Arr is not null
            //Get usernames for ids.
            $userinfos = $this->User->find('all', array(
                'contain' => false,
                'fields' => array(
                    'User.username',
                    'User.id'
                ),
                'conditions' => array(
                    'User.id' => $arr
                )
            ));
            echo '<ul>';
            foreach ($userinfos as $userinfo) {
                echo '<li>' . $userinfo['User']['username'] . '(' . $userinfo['User']['id'] . ')</li>';
            }
            echo '<ul>';


            //Remove Sessions
            $this->Session->delete('User.selectedlst');
            $this->Session->delete('User.selectedcount');
        } else {//End of null control
            echo 'Error:You have to enter ad code in field!';
        }
    }

    public function remove_selections() {
        //Remove Sessions
        $this->Session->delete('User.selectedlst');
        $this->Session->delete('User.selectedcount');
        echo 'All removed';
    }

    public function mass_pwd_change($role = NULL) {
        $this->layout = 'adminDashboard';


        $arr = $this->Session->read('User.selectedlst');
        if ($arr != NULL) {
            $this->set('checkedlist', $arr);
        }

        $selectedcount = $this->Session->read('User.selectedcount');
        if ($selectedcount != NULL) {
            $this->set('selectedcount', $selectedcount);
        }

        if ($role != NULL)
            $this->paginate = array(
                'conditions' => array(
                    'User.role' => $role
                )
            );

        $this->User->recursive = 0;
        $this->set('users', $this->paginate('User'));
        $authid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $authid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('username', $userName);
    }

    /**
     * Users Management method
     *
     * @param $role => which type of user will be listed,
     * @return no return,set some values
     */
    public function users($role = NULL) {
        $this->layout = 'adminDashboard';

        if ($role != NULL)
            $this->paginate = array(
                'conditions' => array(
                    'User.role' => $role
            ));

        $this->User->recursive = 0;
        $this->set('users', $this->paginate('User'));
        $authid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $authid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('username', $userName);
    }

    /**
     * Games Management method
     *
     * @param $role => which type of user will be listed,
     * @return no return,set some values
     */
    public function games() {
        $this->layout = 'adminDashboard';

        $this->Game->recursive = 0;
        $this->set('games', $this->paginate('Game'));
        $authid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $authid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('username', $userName);
    }

    public function affected($id, $value) {
        $this->User->Game->updateAll(array('active' => $value), array('user_id' => $id));
        $this->Session->setFlash(__('The user has been updated all games of this user has been affected'));
    }

    //<<<<<<<<<<Logs function begins>>>>>>>>>
    public function logs() {
        $this->layout = 'adminDashboard';
        $orderdata = $this->paginate('Log');
        $this->set('logs', $orderdata);
        $authid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $authid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('username', $userName);
    }

    //<<<<<<<<<<Logs function ends>>>>>>>>>
    //<<<<<<<<<<Orders function begins>>>>>>>>>
    public function orders() {
        $this->layout = 'adminDashboard';
        $orderdata = $this->paginate('Order');
        $this->set('orders', $orderdata);
        $authid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $authid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('username', $userName);
    }

    //<<<<<<<<<<Orders function ends>>>>>>>>>
    //<<<<<<<<<<Activities function begins>>>>>>>>>
    public function activities() {
        $this->layout = 'adminDashboard';
        $orderdata = $this->paginate('Activity');
        $this->set('activities', $orderdata);
        $authid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $authid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('username', $userName);
    }

    //<<<<<<<<<<Activities function ends>>>>>>>>>
    //<<<<<<<<<<Messages function begins>>>>>>>>>
    public function messages() {
        $this->layout = 'adminDashboard';
        $orderdata = $this->paginate('Message');
        $this->set('messages', $orderdata);
        $authid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $authid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('username', $userName);
    }

    //<<<<<<<<<<Messages function ends>>>>>>>>>
    //<<<<<<<<<<useredit function begins>>>>>>>>>
    public function useredit() {
        $this->layout = 'adminDashboard';
        if ($this->request->isPost()) {
            //iç

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
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $authid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('username', $userName);
    }

    //<<<<<<<<<<useredit function ends>>>>>>>>>
    //<<<<<<<<<<adminedit function begins>>>>>>>>>>>>
    public function adminedit($id = null) {

        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');

        $this->layout = 'adminDashboard';
        $userid = $id;
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            $this->request->data['User']['username'] = $this->Common->secureSuperGlobalPOST($this->request->data['User']['username']);
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
                    $this->Amazon->S3->create_object(Configure::read('S3.name'), 'upload/users/' . $id . "/" . $basename, array(
                        'fileUpload' => WWW_ROOT . "/upload/users/" . $id . "/" . $basename,
                        'acl' => AmazonS3::ACL_PUBLIC
                    ));
                }
                //Upload to aws ends


                $this->redirect(array(
                    'action' => 'useredit',
                    $this->Session->read('Auth.User.id')
                ));
            } else {
                $validationErrors = $this->User->invalidFields();
                $value = key($validationErrors);
                $this->Session->setFlash($validationErrors[$value][0]);
                $this->redirect(array(
                    'action' => 'useredit',
                    $this->Session->read('Auth.User.id')
                ));
            }
        } else {

            $this->request->data = $this->User->read(null, $id);
            $this->request->data["User"]["password"] = "";
        }
        $countries = $this->User->Country->find('list');
        $this->set(compact('countries'));


        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userid
            )
        ));
        $userName = $user['User']['username'];
        $this->set('user', $user);
        $this->set('users', $this->paginate());
        $this->set('userid', $userid);
        $this->set('username', $userName);
        $subscribe = $this->Subscription->find('count', array(
            'conditions' => array(
                'Subscription.subscriber_id' => $userid
            )
        ));
        $subscribeto = $this->Subscription->find('count', array(
            'conditions' => array(
                'Subscription.subscriber_to_id' => $userid
            )
        ));
        $this->set('subscribe', $subscribe);
        $this->set('subscribeto', $subscribeto);
    }

    //<<<<<<<<<<adminedit function ends>>>>>>>>>>>>
    //<<<<<<<<<<adminview function ends>>>>>>>>>>>>
    public function view($id = null) {
        $this->layout = 'adminDashboard';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    //<<<<<<<<<<adminview function ends>>>>>>>>>>>>
    //<<<<<<<<<<Remote functions starts>>>>>>>>>>>>
    //<<<<<<<<<<edit user form function starts>>>>>>>>>>>>
    public function edit_user_form($id = null) {
        $this->layout = 'ajax';

        $user = $this->User->find('all', array(
            'joins' => array(
                array(
                    'table' => 'botcredits',
                    'alias' => 'Botcred',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Botcred.user_id' => 'User.id'
                    )
                )
            ),
            'conditions' => array(
                'User.id' => $id
            ),
            'fields' => array(
                'Botcred.credit',
                'User.id',
                'User.screenname',
                'User.username',
                'User.email',
                'User.role',
                'User.picture',
                'User.verify'
            )
        ));

        //Is this user bot?
        $bot_info = $this->User->query('SELECT user_id from clonebots WHERE user_id=' . $id . '');
        if ($bot_info != NULL)
            $bot = 1;
        else
            $bot = 0;


        if ($bot == 1)
            $this->set('bot', 1);
        else
            $this->set('bot', 0);

        $this->set('user', $user);
    }

    //<<<<<<<<<<edit user form function ends>>>>>>>>>>>>
    //<<<<<<<<<<edit user submit function starts>>>>>>>>>>>>
    public function edit_user_submit() {
        $this->layout = 'ajax';
        echo 'submit ready';

        $id = $_POST['id'];
        $screenname = $_POST['screenname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $credit = $_POST['credit'];
        $bot = $_POST['bot'];
        $verify = $_POST['verify'];

        $this->User->id = $id;

        echo 'id:' . $id . '<br>';
        echo 'screenname:' . $screenname . '<br>';
        echo 'username:' . $username . '<br>';
        echo 'email:' . $email . '<br>';
        echo 'role:' . $role . '<br>';
        echo 'credit:' . $credit . '<br>';
        echo 'bot:' . $bot . '<br>';

        //Screenname cannot be null
        if ($screenname == NULL)
            $screenname = $username;

        $filtered_data = array(
            'User' => array(
                'screenname' => $screenname,
                'username' => $username,
                'email' => $email,
                'verify' => $verify,
                'role' => $role
            )
        );
        if ($this->User->save($filtered_data)) {
            echo 'saved userdata';
        }

        //Is there any data on credit table before
        $creditbefore = $this->User->query('SELECT * FROM botcredits WHERE user_id=' . $id . '');
        if ($creditbefore != NULL) {
            //If user already has credit data before.
            $this->User->query('UPDATE botcredits SET credit=' . $credit . ' WHERE user_id=' . $id . '');
        } else {
            //If user has no credit data before.
            $this->User->Query('INSERT INTO botcredits (user_id,credit) VALUES (' . $id . ',' . $credit . ')');
        }

        //Check bot status from clonebots table
        $clonebot_data = $this->User->query('SELECT * FROM clonebots WHERE user_id=' . $id . '');
        if ($bot == 1) {
            if ($clonebot_data != NULL) {
                //is already bot,we are okey,go ahaed!
            } else {
                //Add this user as bot!
                $this->User->Query('INSERT INTO clonebots (user_id) VALUES (' . $id . ')');
            }
        } else {

            if ($clonebot_data != NULL) {
                //we have to remove it here!
                $this->User->Query('DELETE FROM clonebots WHERE user_id=' . $id . '');
            } else {
                //We'r okey here,go ahaed!
            }
        }//bot variable control ends here.	
    }

    //<<<<<<<<<<edit user submit function ends>>>>>>>>>>>>
    //<<<<<<<<<<get search users function begins>>>>>>>>>>>>
    public function get_search_users($rendertype = 1, $keywords = NULL) {
        $this->layout = 'ajax';

        $users = $this->User->find('all', array(
            'contain' => false,
            'conditions' => array(
                'User.username LIKE' => '%' . $keywords . '%'
            ),
            'fields' => array(
                'User.username',
                'User.id',
                'User.screenname',
                'User.created',
                'User.picture',
                'User.seo_username',
                'User.email',
                'User.role',
                'User.last_login'
            )
        ));
        $this->set('users', $users);

        if ($rendertype == 2) {
            $arr = $this->Session->read('User.selectedlst');
            if ($arr != NULL) {
                $this->set('checkedlist', $arr);
            }
            $this->render('mass_users_change');
        }
    }

    //<<<<<<<<<<get search users function ends>>>>>>>>>>>>
    //<<<<<<<<<<Remote functions ends>>>>>>>>>>>>
}
