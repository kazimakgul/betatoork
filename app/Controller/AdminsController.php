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
     * User Roles
     * @var array
     */
    private $role = array(
        'user' => 0,
        'admin' => 1,
        'manager' => 2
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
     * UnBindModel For Channels
     */
    private function channels_model() {
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
    }

    /**
     * Change SQL with filter
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
     * Channel List
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
        $this->layout = 'admin';
        $this->sideBar();
        if ($this->request->is("GET") && isset($this->request->query['q'])) {
            $query = $this->request->query['q'];
            $this->set('query', $query);
        } else {
            $this->redirect(array(
                "controller" => "admins",
                "action" => "games"
            ));
        }
        $data = $this->paginate = array(
            'Game' => array(
                'fields' => array(
                ),
                'conditions' => array(
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
