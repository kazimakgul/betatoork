<?php

App::uses('AppController', 'Controller');

/**
 * Admin Controller
 *
 * @author Emircan Ok
 */
class AdminsController extends AppController {

    /**
     * Name
     * @var string
     * @author Emircan Ok
     */
    public $name = 'Admins';

    /**
     * Uses
     * @var array
     * @author Emircan Ok
     */
    public $uses = array(
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
        'Group',
        'Activity',
        'Message',
        'Log',
        'Country'
    );

    /**
     * Helpers
     * @var array
     * @author Emircan Ok
     */
    public $helpers = array(
        'Html',
        'Form',
        'Upload',
        'Recaptcha.Recaptcha'
    );

    /**
     * Components
     * @var array
     * @author Emircan Ok
     */
    public $components = array(
        'Amazonsdk.Amazon',
        'Recaptcha.Recaptcha',
        'Common'
    );

    /**
     * User Roles
     * @var array
     * @author Emircan Ok
     */
    private $role = array(
        'user' => 0,
        'admin' => 1,
        'manager' => 2
    );

    /**
     * Pagination Limit
     * @var integer
     * @author Emircan Ok
     */
    private $limit = 10;

    /**
     * Side Bar method
     * @author Emircan Ok
     */
    private function sideBar() {
        $userid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'fields' => array(
                'User.id',
                'User.username',
                'User.seo_username',
                'User.picture',
                'User.role'
            ),
            'conditions' => array(
                'User.id' => $userid
            ),
            'contain' => FALSE
        ));
        $this->set('user', $user);
    }

    /**
     * Bind And UnBind Model For Channels
     * @author Emircan Ok
     */
    private function channels_model() {
        //  UnBind
        $unBindModel = array(
            'hasMany' => array(
                'Game'
            ),
            'belongsTo' => array(
                'Country'
            )
        );
        if (!isset($this->request->named['sort']) || $this->request->named['sort'] !== 'Userstat.potential') {
            $unBindModel['hasOne'] = array(
                'Userstat'
            );
        }
        $this->User->unBindModel($unBindModel, FALSE);
        //  Bind
        $this->User->BindModel(array(
            'hasOne' => array(
                'Custom_domain' => array(
                    'className' => 'Custom_domain',
                    'foreignKey' => 'user_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => '',
                    'type' => 'LEFT'
                )
            )
                ), FALSE);
    }

    /**
     * Bind And UnBind Model For Games
     * @author Emircan Ok
     */
    private function games_model() {
        //  UnBind
        $unBindModel = array(
            'hasOne' => array(
                'Gamestat'
            ),
            'belongsTo' => array(
                'Category'
            )
        );
        $this->Game->unBindModel($unBindModel, FALSE);
        //  Bind
        $this->Game->BindModel(array(
            'belongsTo' => array(
                'User' => array(
                    'className' => 'User',
                    'foreignKey' => 'user_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => '',
                    'type' => 'INNER'
                )
            )
                ), FALSE);
    }

    /**
     * Change SQL with filter for channels
     * @author Emircan Ok
     */
    private function channels_filter() {
        if (isset($this->request->named['filter'])) {
            switch ($this->request->named['filter']) {
                case 'cname':
                    $this->paginate['User']['conditions']['NOT']['Custom_domain.domain'] = NULL;
                    break;
                case 'verify':
                    $this->paginate['User']['conditions']['User.verify'] = 1;
                    break;
                case 'manager':
                    $this->paginate['User']['conditions']['User.role'] = $this->role['manager'];
                    break;
                case 'active':
                    $this->paginate['User']['conditions']['User.active'] = 1;
                    break;
            }
            $this->set('active_filter', $this->request->named['filter']);
        } else {
            $this->set('active_filter', 'all');
        }
    }

    /**
     * Change SQL with filter for games
     * @author Emircan Ok
     */
    private function games_filter() {
        if (isset($this->request->named['filter'])) {
            switch ($this->request->named['filter']) {
                case 'clone':
                    $this->paginate['Game']['conditions']['Game.clone'] = 0;
                    break;
                case 'active':
                    $this->paginate['Game']['conditions']['Game.active'] = 1;
                    break;
                case 'fullscreen':
                    $this->paginate['Game']['conditions']['Game.fullscreen'] = 1;
                    break;
                case 'embed':
                    $this->paginate['Game']['conditions']['Game.embed'] = 2;
                    break;
                case 'install':
                    $this->paginate['Game']['conditions']['Game.install'] = 1;
                    break;
                case 'mobile':
                    $this->paginate['Game']['conditions']['Game.mobileready'] = 1;
                    break;
            }
            $this->set('active_filter', $this->request->named['filter']);
        } else {
            $this->set('active_filter', 'all');
        }
    }


    

    /**
     * Channel List
     * @author Emircan Ok
     */
    public function channels() {
        $this->layout = 'admin';
        $this->sideBar();
        $this->channels_model();
        $this->paginate = array(
            'User' => array(
                'fields' => array(
                    'User.id',
                    'User.username',
                    'User.picture',
                    'User.email',
                    'User.priority',
                    'Custom_domain.domain'
                ),
                'limit' => $this->limit
            )
        );
        $this->channels_filter();
        $data = $this->paginate('User');
        $this->set('data', $data);
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    /**
     * Channnels Search
     * @author Emircan Ok
     */
    public function channels_search() {
        $this->layout = 'admin';
        $this->sideBar();
        if ($this->request->is("GET") && isset($this->request->query['q']) && !empty($this->request->query['q'])) {
            $query = $this->request->query['q'];
            $this->set('query', $query);
        } else {
            $this->redirect(array(
                "controller" => "admins",
                "action" => "channels"
            ));
        }
        $this->channels_model();
        $this->paginate = array(
            'User' => array(
                'fields' => array(
                    'User.id',
                    'User.username',
                    'User.picture',
                    'User.email',
                    'Custom_domain.domain'
                ),
                'conditions' => array(
                    'OR' => array(
                        'User.id' => $query,
                        'User.priority' => $query,
                        'User.username LIKE' => '%' . $query . '%'
                    )
                ),
                'limit' => $this->limit
            )
        );
        $this->channels_filter();
        $data = $this->paginate('User');
        $this->set('data', $data);
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('channels');
    }

    /**
     * Channel Edit
     * @param integer $id
     * @author Emircan Ok
     */
    public function channels_edit($id) {

        $this->layout = 'admin';
        $this->sideBar();

        $groups=$this->Group->find('list');
        $this->set(compact('groups'));

        //  User Data
        $data = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $id
            ),
            'contain' => FALSE
        ));
        $this->set('data', $data);

        //  Countries Data
        $this->Country->unBindModel(array(
            'hasMany' => array(
                'User'
            )
        ));
        $countries = $this->Country->find('all', array(
            'order' => array(
                'Country.name' => 'asc'
            )
        ));
        $this->set('countries', $countries);

        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    /**
     * Save Channel Edit Data
     */
    public function channels_edit_post() {
        $data = array(
            'id' => $this->request->data['id'],
            'screenname' => $this->request->data['screenname'],
            'description' => $this->request->data['description'],
            'bg_color' => $this->request->data['bg_color'],
            'analitics' => $this->request->data['analitics'],
            'username' => $this->secureSuperGlobalPOST(str_replace(' ', '', $this->request->data['username'])),
            'seo_username' => strtolower($this->secureSuperGlobalPOST(str_replace(' ', '', $this->request->data['username']))),
            'email' => $this->request->data['email'],
            'birth_date' => $this->request->data['birth_date'],
            'gender' => $this->request->data['gender'],
            'country' => $this->request->data['country'],
            'group_id' => $this->request->data['groups'],
            'role' => $this->request->data['role'],
            'fb_link' => $this->request->data['fb_link'],
            'twitter_link' => $this->request->data['twitter_link'],
            'gplus_link' => $this->request->data['gplus_link'],
            'website' => $this->request->data['website'],
            'active' => $this->request->data['active'],
            'verify' => $this->request->data['verify'],
            'priority' => $this->request->data['priority']
        );
        if (!empty($this->request->data['password']) && !empty($this->request->data['password_again']) && $this->request->data['password'] === $this->request->data['password_again']) {
            $data['password'] = $this->request->data['password'];
        }
        if ($this->User->save($data)) {
            $this->set('result', TRUE);
            $this->set('message', 'Channel Updated');
        } else {
            $this->set('result', FALSE);
            $this->set('message', 'Channel Not Updated');
        }
        $this->set('_serialize', array('result', 'message'));
    }

    /**
     * Channel Delete
     * @param integer $id
     * @author Emircan Ok
     */
    public function channels_delete($id) {
        if ($this->User->delete($id)) {
            $this->set('result', TRUE);
            $this->set('message', 'Channel Deleted');
        } else {
            $this->set('result', FALSE);
            $this->set('message', 'Channel Not Deleted');
        }
        $this->set('_serialize', array('result', 'message'));
    }

    /**
     * Games List
     * @author Emircan Ok
     */
    public function games() {
        $this->layout = 'admin';
        $this->sideBar();
        $this->games_model();
        $data = $this->paginate = array(
            'Game' => array(
                'fields' => array(
                    'Game.id',
                    'Game.priority',
                    'Game.seo_url',
                    'Game.name',
                    'Game.picture',
                    'User.username'
                ),
                'limit' => $this->limit
            )
        );
        $this->games_filter();
        $data = $this->paginate('Game');
        $this->set('data', $data);
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    /**
     * Games Search
     * @author Emircan Ok
     */
    public function games_search() {
        $this->layout = 'admin';
        $this->sideBar();
        if ($this->request->is("GET") && isset($this->request->query['q']) && !empty($this->request->query['q'])) {
            $query = $this->request->query['q'];
            $this->set('query', $query);
        } else {
            $this->redirect(array(
                "controller" => "admins",
                "action" => "games"
            ));
        }
        $this->games_model();
        $data = $this->paginate = array(
            'Game' => array(
                'fields' => array(
                    'Game.id',
                    'Game.name',
                    'Game.picture',
                    'User.username'
                ),
                'conditions' => array(
                    'OR' => array(
                        'Game.id' => $query,
                        'Game.priority' => $query,
                        'Game.name LIKE' => '%' . $query . '%',
                        'User.username LIKE' => '%' . $query . '%',
                    )
                ),
                'limit' => $this->limit
            )
        );
        $this->games_filter();
        $data = $this->paginate('Game');
        $this->set('data', $data);
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('games');
    }

    /**
     * Games Edit
     * @param integer $id
     * @author Emircan Ok
     */
    public function games_edit($id) {
        $this->layout = 'admin';
        $this->sideBar();
        $this->games_model();
        $data = $this->Game->find('first', array(
            'fields' => array(
                'Game.id',
                'Game.name',
                'Game.link',
                'Game.description',
                'Game.active',
                'Game.user_id',
                'Game.width',
                'Game.height',
                'Game.priority',
                'Game.category_id',
                'Game.picture',
                'Game.mobileready',
                'Game.fullscreen',
                'Game.featured',
                'Game.install'
            ),
            'conditions' => array(
                'Game.id' => $id
            )
        ));
        debug($data);
        if ($data['Game']['install']) {
            $this->loadModel('Applink');
            $and = NULL;
            $ios = NULL;
            $app = $this->Applink->find('all', array('conditions' => array('Applink.game_id' => $id)));
            foreach ($app as $platform) {
                if ($platform['Applink']['platform_id'] == 1) {
                    $and = $platform['Applink']['link'];
                }
                if ($platform['Applink']['platform_id'] == 2) {
                    $ios = $platform['Applink']['link'];
                }
            }
            $this->set('and', $and);
            $this->set('ios', $ios);
            debug($and);
            debug($ios);
        }
        $this->set('data', $data);
        $categories = $this->Category->find('all', array(
            'order' => array(
                'Category.name' => 'asc'
            )
        ));
        debug($categories);
        $this->set('categories', $categories);
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    /**
     * Save Game Edit Data
     */
    public function games_edit_post() {
        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');
        $user_id = $this->Auth->user('id');
        $id = $this->request->data['id'];
        $game_link = $this->request->data['link'];
        $image_name = $this->request->data['image_name'];
        $game_file = $this->request->data['game_file'];
        if ($image_name != 'current' && $image_name != 'empty') {
            $file = new File(WWW_ROOT . "/upload/temporary/" . $user_id . "/" . $image_name, false);
            $info = $file->info();
            $filename = $info["filename"];
            $ext = $info["extension"];
            $basename = $info["basename"];
            $dirname = $info["dirname"];
            $newname = $filename . '_toorksize.' . $ext;
            rename(WWW_ROOT . "/upload/temporary/" . $user_id . "/" . $image_name, WWW_ROOT . "/upload/temporary/" . $user_id . "/" . $newname);
        }
        if ($game_file != 'empty') {
            $type = $this->Game->get_game_type($game_file);
        } else {
            $type = $this->Game->get_game_type($game_link);
        }

        //  SET INSTALLABLE
        $installable = $this->request->data['installable'];
        if ($installable == 1) {
            $installable = 0;
            if (!empty($this->request->data['android'])) {
                $game_link = $this->request->data['android'];
                $installable = 1;
            }
            if (!empty($this->request->data['ios'])) {
                $game_link = $this->request->data['ios'];
                $installable = 1;
            }
            $mobileready = 1;
        }

        //  GAME UPDATE DATA
        $data = array(
            'Game' => array(
                'id' => $id,
                'name' => $this->Game->secureSuperGlobalPOST($this->request->data['name']),
                'description' => $this->Game->secureSuperGlobalPOST($this->request->data['description']),
                'link' => empty($this->request->data['link']) ? NULL : $this->request->data['link'],
                'width' => empty($this->request->data['width']) ? NULL : $this->request->data['width'],
                'height' => empty($this->request->data['height']) ? NULL : $this->request->data['height'],
                'category_id' => $this->request->data['category_id'],
                'priority' => empty($this->request->data['priority']) ? 0 : $this->request->data['priority'],
                'user_id' => $this->request->data['user_id'],
                'active' => $this->request->data['active'],
                'fullscreen' => $this->request->data['fullscreen'],
                'mobileready' => isset($mobileready) ? $mobileready : $this->request->data['mobileready'],
                'install' => $installable,
                'seo_url' => $this->Game->checkDuplicateSeoUrl($this->request->data['name'], $id),
                'type' => $type,
            )
        );

        //  GAME UPDATE
        if ($this->Game->save($data)) {

            //  INSTALLABLE DATA
            if ($installable) {
                $android = $this->request->data['android'];
                $ios = $this->request->data['ios'];
                $this->loadModel('Applink');
                //  ANDROID
                if (!empty($and)) {
                    $android_data = $this->Applink->find('first', array(
                        'conditions' => array(
                            'Applink.game_id' => $id,
                            'Applink.platform_id' => 1
                        )
                    ));
                    if (!is_null($android_data)) {
                        $this->Applink->id = $android_data['Applink']['id'];
                    }
                    $applinkdata['Applink']['game_id'] = $id;
                    $applinkdata['Applink']['platform_id'] = 1;
                    $applinkdata['Applink']['link'] = $android;
                    $this->Applink->save($applinkdata);
                }
                //  IOS
                if (!empty($ios)) {
                    $ios_data = $this->Applink->find('first', array(
                        'conditions' => array(
                            'Applink.game_id' => $id,
                            'Applink.platform_id' => 2
                        )
                    ));
                    if (!is_null($ios_data)) {
                        $this->Applink->id = $ios_data['Applink']['id'];
                    }
                    $applinkdata['Applink']['game_id'] = $id;
                    $applinkdata['Applink']['platform_id'] = 2;
                    $applinkdata['Applink']['link'] = $ios;
                    $this->Applink->save($applinkdata);
                }
            }

            //  AMAZON S3
            if ($image_name != 'current' && $image_name != 'empty') {
                $feedback = $this->Amazon->S3->create_object(
                        Configure::read('S3.name'), 'upload/games/' . $id . "/" . $newname, array(
                    'fileUpload' => WWW_ROOT . "/upload/temporary/" . $user_id . "/" . $newname,
                    'acl' => AmazonS3::ACL_PUBLIC
                        )
                );
                if ($feedback) {
                    $this->Game->query('UPDATE games SET picture="' . $image_name . '" WHERE id=' . $id);
                    $this->remove_temporary($user_id, 'new_game');
                }
            }

            $this->gameUpload($game_file, $id, $user_id);
            $this->set('result', TRUE);
            $this->set('message', "Game Updated");
        } else {
            $this->set('result', FALSE);
            $this->set('message', "Game Not Updated");
        }
        $this->set('_serialize', array('result', 'message'));
    }

    /**
     * Games Delete
     * @param integer $id
     * @author Emircan Ok
     */
    public function games_delete($id) {
        if ($this->Game->delete($id)) {
            $this->set('result', TRUE);
            $this->set('message', 'Game Deleted');
        } else {
            $this->set('result', FALSE);
            $this->set('message', 'Game Not Deleted');
        }
        $this->set('_serialize', array('result', 'message'));
    }

    /**
     * Game Upload method
     *
     * @param Request => array()
     * @return Game upload and db data insert
     */
    private function gameUpload($game_file = NULL, $id = NULL, $userid = NULL) {
        if ($game_file != 'empty') {

            $random_number = rand(1000000, 9999999);
            $new_game_file = $random_number . '_' . $game_file;

            //=======Upload to aws for Game Upload begins===========
            $feedback = $this->Amazon->S3->create_object(
                    Configure::read('S3-games.name'), $new_game_file, array(
                'fileUpload' => WWW_ROOT . "upload/gamefiles/" . $userid . "/" . $game_file,
                'acl' => AmazonS3::ACL_PUBLIC
                    )
            );
            //========Upload to aws for Game Upload ends==============
            if ($feedback) {
                //Set the picture field on db.
                $game_link = Configure::read('S3-games.url') . '/' . $new_game_file;
                $this->Game->query('UPDATE games SET link="' . $game_link . '" WHERE id=' . $id);
                $this->remove_temporary($userid, 'game_upload');
            }
        }
    }

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




    private function secureSuperGlobalPOST($value) {
        $string = preg_replace('/[^\w\d_ -]/si', '', $value);
        $string = htmlspecialchars(stripslashes($string));
        $string = str_replace("script", "blocked", $string);
        $string = mysql_escape_string($string);
        $string = htmlentities($string);
        $string = str_replace("_", "", $string);
        return $string;
    }


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







}
