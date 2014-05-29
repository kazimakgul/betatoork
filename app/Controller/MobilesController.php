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
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userid
            ),
            'fields' => array(
                '*'
            )
                )
        );
        $this->set('user_id', $userid);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        if (!empty($user['User']['fb_link'])) {
            $this->set('facebook', $user['User']['fb_link']);
        }
        if (!empty($user['User']['twitter_link'])) {
            $this->set('twitter', $user['User']['twitter_link']);
        }
        if (!empty($user['User']['gplus_link'])) {
            $this->set('googleplus', $user['User']['gplus_link']);
        }
        $PaginateLimit = 9;
        $this->paginate = array(
            'Game' => array(
                'conditions' => array(
                    'Game.active' => '1',
                    'Game.user_id' => $userid
                ),
                'limit' => $PaginateLimit,
                'order' => array(
                    'Game.recommend' => 'desc'
                ),
                'contain' => array(
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone'
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
        $game = $this->Game->find('first', array('conditions' => array('Game.id' => $id), 'fields' => array('Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.picture')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
        $this->set('game_link', $game['Game']['link']);
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $game['Game']['user_id']
            ),
            'fields' => array(
                '*'
            )
                )
        );
        $this->set('user_id', $game['Game']['user_id']);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
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

    public function search2($userid) {
        $this->layout = 'Mobile/mobile';
        if ($this->request->is("GET") && isset($this->request->query['srch-term'])) {
            $param = $this->request->query['srch-term'];
        } else {
            $this->redirect(array("controller" => "mobiles", "action" => "index", $userid));
        }
        $keys = $this->Game->query("SELECT * FROM games as Game JOIN gamestats as Gamestat ON Gamestat.game_id = Game.id WHERE (Game.description like '%" . $param . "%' or Game.name like '%" . $param . "%') and user_id=$userid");
        $PaginateLimit = 9;
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*')));
        $game = $this->Game->find('first', array('conditions' => array('Game.user_id' => $userid), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.picture')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
        $limit = 12;
        $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $game['Game']['user_id']), 'limit' => $limit, 'order' => array('Game.recommend' => 'desc')));
        $cond = $this->paginate('Game');
        $this->set('games', $keys);
        $this->set('user_id', $userid);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        $this->render('index');
    }

    public function toprated($userid) {
        $this->layout = 'Mobile/mobile';
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*')));
        $this->set('user_id', $userid);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        if (!empty($user['User']['fb_link'])) {
            $this->set('facebook', $user['User']['fb_link']);
        }
        if (!empty($user['User']['twitter_link'])) {
            $this->set('twitter', $user['User']['twitter_link']);
        }
        if (!empty($user['User']['gplus_link'])) {
            $this->set('googleplus', $user['User']['gplus_link']);
        }
        $PaginateLimit = 9;
        $this->paginate = array(
            'Game' => array(
                'conditions' => array(
                    'Game.active' => '1',
                    'Game.user_id' => $userid
                ),
                'limit' => $PaginateLimit,
                'order' => array(
                    'Game.starsize' => 'desc'
                ),
                'contain' => array(
                    'Category' => array(
                        'fields' => array(
                            'Category.name'
                        )
                    ),
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone'
                        )
                    )
                )
            )
        );
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->render('index');
    }

    public function mostplayed($userid) {
        $this->layout = 'Mobile/mobile';
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*')));
        $this->set('user_id', $userid);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        if (!empty($user['User']['fb_link'])) {
            $this->set('facebook', $user['User']['fb_link']);
        }
        if (!empty($user['User']['twitter_link'])) {
            $this->set('twitter', $user['User']['twitter_link']);
        }
        if (!empty($user['User']['gplus_link'])) {
            $this->set('googleplus', $user['User']['gplus_link']);
        }
        $PaginateLimit = 9;
        $this->paginate = array(
            'Game' => array(
                'conditions' => array(
                    'Game.active' => '1',
                    'Game.user_id' => $userid
                ),
                'limit' => $PaginateLimit,
                'order' => array(
                    'Gamestat.playcount' => 'desc'
                ),
                'contain' => array(
                    'Category' => array(
                        'fields' => array(
                            'Category.name'
                        )
                    ),
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone'
                        )
                    )
                )
            )
        );
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->render('index');
    }

    public function newgames($userid) {
        $this->layout = 'Mobile/mobile';
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*')));
        $this->set('user_id', $userid);
        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        if (!empty($user['User']['fb_link'])) {
            $this->set('facebook', $user['User']['fb_link']);
        }
        if (!empty($user['User']['twitter_link'])) {
            $this->set('twitter', $user['User']['twitter_link']);
        }
        if (!empty($user['User']['gplus_link'])) {
            $this->set('googleplus', $user['User']['gplus_link']);
        }
        $PaginateLimit = 9;
        $this->paginate = array(
            'Game' => array(
                'conditions' => array(
                    'Game.active' => '1',
                    'Game.user_id' => $userid
                ),
                'limit' => $PaginateLimit,
                'order' => array(
                    'Game.id' => 'desc'
                ),
                'contain' => array(
                    'Category' => array(
                        'fields' => array(
                            'Category.name'
                        )
                    ),
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone'
                        )
                    )
                )
            )
        );
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->render('index');
    }

}
