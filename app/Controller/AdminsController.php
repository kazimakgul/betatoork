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
     */
    public $name = 'Admins';

    /**
     * Uses
     * @var array
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
        'Activity',
        'Message',
        'Log'
    );

    /**
     * Helpers
     * @var array
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
     */
    public $components = array(
        'Amazonsdk.Amazon',
        'Recaptcha.Recaptcha',
        'Common'
    );

    /**
     * Pagination Limit
     * @var integer
     */
    private $limit = 10;

    /**
     * Side Bar method
     *
     * @param
     * @return array() $user
     */
    private function sideBar() {
        $userid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array(
            'fields' => array(
                'User.id',
                'User.username',
                'User.seo_username',
                'User.picture'
            ),
            'conditions' => array(
                'User.id' => $userid
            ),
            'contain' => FALSE
        ));
        $this->set('user', $user);
    }

    /**
     * Channel List
     */
    public function channels() {
        $this->layout = 'admin';
        $this->sideBar();
        $this->paginate = array(
            'User' => array(
                'fields' => array(
                    'User.id',
                    'User.username',
                    'User.picture',
                    'User.website',
                    'User.email'
                ),
                'limit' => $this->limit,
                'contain' => FALSE
            )
        );
        $data = $this->paginate('User');
        $this->set('data', $data);
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    /**
     * Channnels Search
     */
    public function channels_search() {
        
    }

    /**
     * Channel Edit
     */
    public function channels_edit($id) {
        $this->layout = 'admin';
        $this->sideBar();
        $data = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $id
            ),
            'contain' => FALSE
        ));
        $this->set('data', $data);
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    /**
     * Channel Delete
     */
    public function channels_delete($id) {
        $this->layout = 'admin';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    /**
     * Games List
     */
    public function games() {
        $this->layout = 'admin';
        $this->sideBar();
        $data = $this->paginate = array(
            'Game' => array(
                'fields' => array(
                ),
                'limit' => $this->limit,
                'contain' => FALSE
            )
        );
        $data = $this->paginate('Game');
        $this->set('data', $data);
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    /**
     * Games Search
     */
    public function games_search() {
        
    }

    /**
     * Games Edit
     */
    public function games_edit($id) {
        $this->layout = 'admin';
        $this->sideBar();
        $data = $this->Game->find('first', array(
            'conditions' => array(
                'Game.id' => $id
            ),
            'contain' => FALSE
        ));
        $this->set('data', $data);
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    /**
     * Games Delete
     */
    public function games_delete($id) {
        $this->layout = 'admin';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

}
