<?php

App::uses('AppController', 'Controller');

/**
 * Business Controller
 *
 * @property Business $Game
 */
class MobilesController extends AppController {

    public $name = 'Mobiles';
    var $uses = array('Mobiles', 'Game', 'User', 'Favorite', 'Subscription', 'Playcount', 'Rate', 'Userstat', 'Gamestat', 'Category', 'Activity', 'Cloneship', 'CakeEmail', 'Network/Email');
    public $helpers = array('Html', 'Form', 'Upload', 'Recaptcha.Recaptcha', 'Time');
    public $components = array('Amazonsdk.Amazon', 'Recaptcha.Recaptcha', 'Common');
    private $PaginateLimit = 12;

    //=====Kullanici sisteme login ise=======
    public function isAuthorized($user) {
        if (parent::isAuthorized($user)) {
            return true;
        }
        if (($this->action === 'play') || ($this->action === 'index')) {
            // All registered users can add posts
            return true;
        }
        if (in_array($this->action, array('edit2', 'delete'))) {
            $gameId = $this->request->params['pass'][0];
            return $this->Game->isOwnedBy($gameId, $user['id']);
        }
        return false;
    }
    
    public function afterFilter() {
        //There is no any action!
    }

    /**
     * Oyunları listeliyor.
     * 
     * @param integer $userid
     * @author Emircan OK
     */
    public function index($userid = NULL) {
        $this->layout = 'Mobile/mobile';
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->sync_sorting();
        if (Configure::read('Domain.cname')) {
            $cdomain = Configure::read('Domain.c_root');
            if ($userid == NULL) {
                $user_data = $this->Game->query('SELECT * from custom_domains WHERE domain ="' . $cdomain . '"');
                $c_userid = $user_data[0]['custom_domains']['user_id'];
                $userid = $c_userid;
            }
        } else {
            if ($userid == NULL) {
                $subdomain = Configure::read('Domain.subdomain');
                $user_data = $this->User->find('first', array(
                    'contain' => false,
                    'conditions' => array(
                        'User.seo_username' => $subdomain
                    ),
                    'fields' => array(
                        'User.id'
                    )
                ));
                $userid = $user_data['User']['id'];
            }
        }
        $this->get_style_settings($userid);
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userid
            ),
            'fields' => array(
                '*'
            )
        ));
        $this->set('user', $user);
        $this->set('user_id', $userid);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        $this->set('cover', $user['User']['banner']);
        $this->set('picture', $user['User']['picture']);
        $this->set_user_data($user);
        
        //Author:Ogi
        //Bound applinks to games with hasMany
        $this->Game->bindModel(
                array(
                    'hasMany' => array(
                        'Applink' => array(
                            'className' => 'Applink',
                            'foreignKey' => 'game_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
                        )
                    )
                )
        );

        $this->paginate = array(
            'Game' => array(
                'contain' => array(
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount'
                        )
                    ), 'Applink'
                ),
                'conditions' => array(
                    'Game.active' => 1,
                    'Game.mobileready' => 1,
                    'Game.user_id' => $userid
                ),
                'order' => array(
                    'Gamestat.potential' => 'DESC'
                ),
                'limit' => $this->PaginateLimit
            )
        );
        $this->set('title_for_layout', 'Play mobile games on '.$user['User']['username']);
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->get_style_settings($userid);
    }


 /**
     * Game details page.
     * 
     * @param integer $userid
     * @author Kazim Akgul,Ogi
     */
    public function gamedetail($id = NULL) {
        $this->layout = 'Mobile/mobile';
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        if (Configure::read('Domain.cname')) {
            $cdomain = Configure::read('Domain.c_root');
            $user_data = $this->Game->query('SELECT * from custom_domains WHERE domain ="' . $cdomain . '"');
            $userid = $user_data[0]['custom_domains']['user_id'];
            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $userid
                ),
                'fields' => array(
                    'User.id',
                    'User.username',
                    'User.verify'
                ),
                'contain' => false
            ));
            $game = $this->Game->find('first', array(
                'conditions' => array(
                    'Game.seo_url' => $id,
                    'Game.user_id' => $user['User']['id']
                ),
                'fields' => array(
                    'Game.id'
                ),
                'contain' => false
            ));
            $id = $game['Game']['id'];
        } else {
            if (!is_numeric($id)) {
                $subdomain = Configure::read('Domain.subdomain');
                $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.seo_username' => $subdomain
                    ),
                    'fields' => array(
                        'User.id'
                    ),
                    'contain' => false
                ));
                $game = $this->Game->find('first', array(
                    'conditions' => array(
                        'Game.seo_url' => $id,
                        'Game.user_id' => $user['User']['id']
                    ),
                    'fields' => array(
                        'Game.id'
                    )
                ));
                $id = $game['Game']['id'];
            }
        }

        //Author:Ogi
        //Bound applinks to games with hasMany
        $this->Game->bindModel(
                array(
                    'hasMany' => array(
                        'Applink' => array(
                            'className' => 'Applink',
                            'foreignKey' => 'game_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
                        )
                    )
                )
        );

        $game = $this->Game->find('first', array(
            'conditions' => array(
                'Game.id' => $id
            ),
            'fields' => array(
                'Game.name',
                'Game.user_id',
                'Game.link',
                'Game.starsize',
                'Game.rate_count',
                'Game.embed',
                'Game.description',
                'Game.id',
                'Game.install',
                'Game.active',
                'Game.picture',
                'Game.seo_url',
                'Game.clone',
                'Game.owner_id'
            ),
            'contain' => array(
                'User' => array(
                    'fields' => array(
                        'User.username',
                        'User.seo_username',
                        'User.adcode',
                        'User.picture'
                    )
                ),
                'Gamestat' => array(''
                    . 'fields' => array(
                        'Gamestat.playcount',
                        'Gamestat.channelclone'
                    )
                ),'Applink'
            )
        ));
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $game['Game']['user_id']
            ),
            'fields' => array(
                '*'
            )
        ));
        $this->set('title_for_layout', 'Play '.$game['Game']['name'].' on '.$user['User']['username'].' Channel');
        $this->set_user_data($user);
        $this->set('game', $game);
        $this->set('game_id', $game['Game']['id']);
        $this->set('game_link', $game['Game']['link']);
        $this->set('user', $user);
        $this->set('user_id', $game['Game']['user_id']);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        $this->set('cover', $user['User']['banner']);
        $this->set('picture', $user['User']['picture']);
        $this->get_style_settings($game['Game']['user_id']);
    }


    /**
     * Oyun sayfası
     * 
     * @param integer $id
     * @author Emircan OK
     */
    public function play($id = NULL) {
        $this->layout = 'Mobile/mobile';
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        if (Configure::read('Domain.cname')) {
            $cdomain = Configure::read('Domain.c_root');
            $user_data = $this->Game->query('SELECT * from custom_domains WHERE domain ="' . $cdomain . '"');
            $userid = $user_data[0]['custom_domains']['user_id'];
            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $userid
                ),
                'fields' => array(
                    'User.id',
                    'User.username',
                    'User.verify'
                ),
                'contain' => false
            ));
            $game = $this->Game->find('first', array(
                'conditions' => array(
                    'Game.seo_url' => $id,
                    'Game.user_id' => $user['User']['id']
                ),
                'fields' => array(
                    'Game.id'
                ),
                'contain' => false
            ));
            $id = $game['Game']['id'];
        } else {
            if (!is_numeric($id)) {
                $subdomain = Configure::read('Domain.subdomain');
                $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.seo_username' => $subdomain
                    ),
                    'fields' => array(
                        'User.id'
                    ),
                    'contain' => false
                ));
                $game = $this->Game->find('first', array(
                    'conditions' => array(
                        'Game.seo_url' => $id,
                        'Game.user_id' => $user['User']['id']
                    ),
                    'fields' => array(
                        'Game.id'
                    )
                ));
                $id = $game['Game']['id'];
            }
        }
        $game = $this->Game->find('first', array(
            'conditions' => array(
                'Game.id' => $id
            ),
            'fields' => array(
                'Game.name',
                'Game.user_id',
                'Game.link',
                'Game.starsize',
                'Game.rate_count',
                'Game.embed',
                'Game.description',
                'Game.id',
                'Game.active',
                'Game.picture',
                'Game.seo_url',
                'Game.clone',
                'Game.owner_id'
            ),
            'contain' => array(
                'User' => array(
                    'fields' => array(
                        'User.username',
                        'User.seo_username',
                        'User.adcode',
                        'User.picture'
                    )
                ),
                'Gamestat' => array(''
                    . 'fields' => array(
                        'Gamestat.playcount',
                        'Gamestat.channelclone'
                    )
                )
            )
        ));
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $game['Game']['user_id']
            ),
            'fields' => array(
                '*'
            )
        ));

        $this->set('title_for_layout', 'Play '.$game['Game']['name'].' on '.$user['User']['username'].' channel');
        $this->set_user_data($user);
        $this->set('game', $game);
        $this->set('game_id', $game['Game']['id']);
        $this->set('game_link', $game['Game']['link']);
        $this->set('user', $user);
        $this->set('user_id', $game['Game']['user_id']);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        $this->set('cover', $user['User']['banner']);
        $this->set('picture', $user['User']['picture']);
        $this->get_style_settings($game['Game']['user_id']);
    }

    /**
     * This functions gets installable games.
     * 
     * @param integer $userid
     * @author Ogi
     */
    public function store_games($userid = NULL) {
        $this->layout = 'Mobile/mobile';
        $this->loadModel('Applink');

        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->sync_sorting();
        if (Configure::read('Domain.cname')) {
            $cdomain = Configure::read('Domain.c_root');
            if ($userid == NULL) {
                $user_data = $this->Game->query('SELECT * from custom_domains WHERE domain ="' . $cdomain . '"');
                $c_userid = $user_data[0]['custom_domains']['user_id'];
                $userid = $c_userid;
            }
        } else {
            if ($userid == NULL) {
                $subdomain = Configure::read('Domain.subdomain');
                $user_data = $this->User->find('first', array(
                    'contain' => false,
                    'conditions' => array(
                        'User.seo_username' => $subdomain
                    ),
                    'fields' => array(
                        'User.id'
                    )
                ));
                $userid = $user_data['User']['id'];
            }
        }
        $this->get_style_settings($userid);
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userid
            ),
            'fields' => array(
                '*'
            )
        ));
        $this->set('user', $user);
        $this->set('user_id', $userid);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        $this->set('cover', $user['User']['banner']);
        $this->set('picture', $user['User']['picture']);
        $this->set_user_data($user);


        //Author:Ogi
        //Bound applinks to games with hasMany
        $this->Game->bindModel(
                array(
                    'hasMany' => array(
                        'Applink' => array(
                            'className' => 'Applink',
                            'foreignKey' => 'game_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
                        )
                    )
                )
        );


        $this->paginate = array(
            'Game' => array(
                'contain' => array(
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount'
                        )
                    ), 'Applink'
                ),
                'conditions' => array(
                    'Game.active' => 1,
                    'Game.mobileready' => 1,
                    'Game.install' => 1,
                    'Game.user_id' => $userid
                ),
                'order' => array(
                    'Gamestat.potential' => 'DESC'
                ),
                'limit' => $this->PaginateLimit
            )
        );

        $this->set('title_for_layout', 'App store games on '.$user['User']['username']);
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->get_style_settings($userid);
    }

    /**
     * Arama sayfası
     * 
     * @param integer $userid
     * @author Emircan OK
     */
    public function search2($userid) {
        $this->layout = 'Mobile/mobile';
        if ($this->request->is("GET") && isset($this->request->query['srch-term'])) {
            $param = $this->request->query['srch-term'];
        } else {
            $this->redirect(array(
                "controller" => "mobiles",
                "action" => "index",
                $userid
            ));
        }
        if (Configure::read('Domain.cname')) {
            $cdomain = Configure::read('Domain.c_root');
            if ($userid == NULL) {
                $user_data = $this->Game->query('SELECT * from custom_domains WHERE domain ="' . $cdomain . '"');
                $c_userid = $user_data[0]['custom_domains']['user_id'];
                $userid = $c_userid;
            }
        } else {
            if ($userid == NULL) {
                $subdomain = Configure::read('Domain.subdomain');
                $user_data = $this->User->find('first', array(
                    'contain' => false,
                    'conditions' => array(
                        'User.seo_username' => $subdomain
                    ),
                    'fields' => array(
                        'User.id'
                    )
                ));
                $userid = $user_data['User']['id'];
            }
        }
        $this->get_style_settings($userid);
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userid
            ),
            'fields' => array(
                '*'
            )
        ));

        //Author:Ogi
        //Bound applinks to games with hasMany
        $this->Game->bindModel(
                array(
                    'hasMany' => array(
                        'Applink' => array(
                            'className' => 'Applink',
                            'foreignKey' => 'game_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
                        )
                    )
                )
        );

        $this->paginate = array(
            'Game' => array(
                'contain' => array(
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount'
                        )
                    ), 'Applink'
                ),
                'conditions' => array(
                    'Game.active' => 1,
                    'Game.mobileready' => 1,
                    'Game.user_id' => $userid,
                    'OR' => array(
                        'Game.name LIKE' => '%' . $param . '%',
                        'Game.description LIKE' => '%' . $param . '%'
                    ),
                ),
                'order' => array(
                    'Gamestat.potential' => 'DESC'
                ),
                'limit' => $this->PaginateLimit
            )
        );
        $this->set('title_for_layout', 'Search results for: '.$param);
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->set('user', $user);
        $this->set('user_id', $userid);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        $this->set('cover', $user['User']['banner']);
        $this->set('picture', $user['User']['picture']);
        $this->set_user_data($user);
        $this->render('index');
        $this->get_style_settings($userid);
    }

    /**
     * Sidebarda yer alan user bilgilerini oluşturur.
     * 
     * @param array $user
     * @author Emircan Ok
     */
    private function set_user_data($user) {
        if (empty($user['Userstat']['subscribeto'])) {
            $this->set('followers', 0);
        } else {
            $this->set('followers', $user['Userstat']['subscribeto']);
        }
        if (empty($user['Userstat']['subscribe'])) {
            $this->set('following', 0);
        } else {
            $this->set('following', $user['Userstat']['subscribe']);
        }
        if (empty($user['Userstat']['favoritecount'])) {
            $this->set('favorites', 0);
        } else {
            $this->set('favorites', $user['Userstat']['favoritecount']);
        }
        if (empty($user['Userstat']['uploadcount'])) {
            $this->set('gamescount', 0);
        } else {
            $this->set('gamescount', $user['Userstat']['uploadcount']);
        }
        if (!empty($user['User']['fb_link'])) {
            $this->set('facebook', $user['User']['fb_link']);
        }
        if (!empty($user['User']['twitter_link'])) {
            $this->set('twitter', $user['User']['twitter_link']);
        }
        if (!empty($user['User']['gplus_link'])) {
            $this->set('googleplus', $user['User']['gplus_link']);
        }
    }

    public function mobile_detect_js($domain) {
        header('Content-Type: text/javascript');
        $this->layout = 'ajax';
        $this->set('domain', $domain);
    }

}
