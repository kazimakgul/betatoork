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

        /**
         * Kullanılan Layout
         */
        $this->layout = 'Mobile/mobile';

        /**
         * Layout Değişkenleri
         */
        $this->set('title_for_layout', 'Clone Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');

        /**
         * Kullanıcı Bilgileri
         */
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userid
            ),
            'fields' => array(
                '*'
            )
                )
        );

        //  print_r($user);
        //  exit;

        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);

        $PaginateLimit = 6;
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

        //  $keys = $this->Game->query("SELECT * FROM games as Game WHERE user_id=$userid and description like '%" . $param . "%' or name like '%" . $param . "%'");
        
    }

    public function play($id = NULL) {
        
        //  Getting Random Game Data

        $this->layout = 'Mobile/mobile';
        
        $game = $this->Game->find('first', array('conditions' => array('Game.id' => $id),'fields'=>array('Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username,User.adcode,User.picture')),'Gamestat'=>array('fields'=>array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
        
        $this->set('game_link', $game['Game']['link']);
        
        /**
         * Kullanıcı Bilgileri
         */
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $game['Game']['user_id']
            ),
            'fields' => array(
                '*'
            )
                )
        );

        //  print_r($user);
        //  exit;

        $this->set('screenname', $user['User']['screenname']);
        $this->set('username', $user['User']['username']);
        $this->set('description', $user['User']['description']);
        
        $this->set('title_for_layout', 'Clone Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        
    }

}
