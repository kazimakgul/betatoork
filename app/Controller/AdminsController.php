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
        'Activity',
        'Message',
        'Log'
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
     * @param integer $id
     * @author Emircan Ok
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
     * Games Delete
     * @param integer $id
     * @author Emircan Ok
     */
    public function games_delete($id) {
        $this->layout = 'admin';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Admin');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

}
