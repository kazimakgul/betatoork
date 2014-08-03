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

    public function index($userid) {
        $this->layout = 'Mobile/mobile';
        $this->set('title_for_layout', 'Clone Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        

     if(Configure::read('Domain.cname'))
     {
     $cdomain=Configure::read('Domain.c_root');
    
     if ($userid == NULL) {

            $user_data=$this->Game->query('SELECT * from custom_domains WHERE domain ="'.$cdomain.'"');
            $c_userid = $user_data[0]['custom_domains']['user_id'];
            $userid = $c_userid;
        }

    }else{//Cname not exists. 

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

        //This line gets user selected channel styles
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
        $this->paginate = array(
            'Game' => array(
                'conditions' => array(
                    'Game.active' => 1,
                    'Game.mobileready' => 1,
                    'Game.user_id' => $userid
                ),
                'limit' => $this->PaginateLimit,
                'order' => array(
                    'Game.recommend' => 'desc'
                ),
                'contain' => array(
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount',
                            'Gamestat.channelclone'
                        )
                    )
                )
            )
        );
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
    }

    public function play($id = NULL) {
        $this->layout = 'Mobile/mobile';
        $this->set('title_for_layout', 'Clone Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
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
        if (empty($user['Userstat']['subscribe'])) {
            $this->set('followers', 0);
        } else {
            $this->set('followers', $user['Userstat']['subscribe']);
        }
        if (empty($user['Userstat']['subscribeto'])) {
            $this->set('following', 0);
        } else {
            $this->set('following', $user['Userstat']['subscribeto']);
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
        if (!empty($user['User']['fb_link'])) {
            $this->set('facebook', $user['User']['fb_link']);
        }
        if (!empty($user['User']['twitter_link'])) {
            $this->set('twitter', $user['User']['twitter_link']);
        }
        if (!empty($user['User']['gplus_link'])) {
            $this->set('googleplus', $user['User']['gplus_link']);
        }
        $this->set('game_link', $game['Game']['link']);
        $this->set('user', $user);
        $this->set('user_id', $game['Game']['user_id']);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        $this->set('cover', $user['User']['banner']);
        $this->set('picture', $user['User']['picture']);
    }

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
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userid
            ),
            'fields' => array(
                '*'
            )
        ));
        $this->paginate = array(
            'Game' => array(
                'contain' => array(
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount',
                            'Gamestat.favcount',
                            'Gamestat.totalclone'
                        )
                    )
                ),
                'limit' => $this->PaginateLimit,
                'order' => 'Game.id DESC',
                'conditions' => array(
                    'Game.active' => 1,
                    'Game.mobileready' => 1,
                    'Game.user_id' => $userid,
                    'OR' => array(
                        'Game.description LIKE' => '%' . $param . '%',
                        'Game.name LIKE' => '%' . $param . '%'
                    ),
                )
            )
        );
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->set('user', $user);
        $this->set('user_id', $userid);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        $this->set('cover', $user['User']['banner']);
        $this->set('picture', $user['User']['picture']);
        if (empty($user['Userstat']['subscribe'])) {
            $this->set('followers', 0);
        } else {
            $this->set('followers', $user['Userstat']['subscribe']);
        }
        if (empty($user['Userstat']['subscribeto'])) {
            $this->set('following', 0);
        } else {
            $this->set('following', $user['Userstat']['subscribeto']);
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
        $this->render('index');
    }

}
