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

        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userid
            ),
            'fields' => array(
                'User.username',
                'User.screenname',
                'User.picture',
                'User.fb_link',
                'User.twitter_link',
                'User.gplus_link',
                'User.description',
                'User.banner'
            ),
            //'contain' => false    //  OĞUZ BAKICAK
                )
        );

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

        $this->paginate = array(
            'Game' => array(
                'conditions' => array(
                    'Game.active' => '1',
                    'Game.user_id' => $userid
                ),
                'limit' => $this->PaginateLimit,
                'order' => array(
                    'Game.recommend' => 'desc'
                ),
                'contain' => array(
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount,Gamestat.channelclone'
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
        $game = $this->Game->find('first', array('conditions' => array('Game.id' => $id), 'fields' => array('Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.picture')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.channelclone')))));
        $this->set('game_link', $game['Game']['link']);
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userid
            ),
            'fields' => array(
                'User.username',
                'User.screenname',
                'User.picture',
                'User.fb_link',
                'User.twitter_link',
                'User.gplus_link',
                'User.description',
                'User.banner'
            ),
            //'contain' => false    //  OĞUZ BAKICAK
                )
        );
        $this->set('user', $user);
        $this->set('user_id', $game['Game']['user_id']);
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
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userid
            ),
            'fields' => array(
                'User.username',
                'User.screenname',
                'User.picture',
                'User.fb_link',
                'User.twitter_link',
                'User.gplus_link',
                'User.description',
                'User.banner'
            ),
            //'contain' => false    //  OĞUZ BAKICAK
                )
        );
        $game = $this->Game->find('first', array('conditions' => array('Game.user_id' => $userid), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.picture')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.channelclone')))));
        $this->paginate = array(
            'Game' => array(
                'contain' => array(
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone'
                        )
                    )
                ),
                'limit' => $this->PaginateLimit,
                'order' => 'Game.id DESC',
                'conditions' => array(
                    'Game.active' => '1',
                    'Game.user_id' => $userid,
                    'OR' => array(
                        'Game.description LIKE' => '%' . $param . '%',
                        'Game.name LIKE' => '%' . $param . '%'
                    ),
        )));
        $cond = $this->paginate('Game');
        $this->set('games', $keys);
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
