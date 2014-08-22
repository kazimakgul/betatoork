<?php

/**
 * Games Controller
 *
 * @property Game $Game
 */
class GamesController extends AppController {

    public $name = 'Games';
    var $uses = array('Game', 'User', 'Favorite', 'Subscription', 'Playcount', 'Rate', 'Userstat', 'Gamestat', 'Category', 'Activity', 'Cloneship');
    public $helpers = array('Html', 'Form', 'Upload', 'Recaptcha.Recaptcha', 'Time');
    public $components = array('Amazonsdk.Amazon', 'Recaptcha.Recaptcha', 'Common');

    //=====Kullanici sisteme login ise=======
    public function isAuthorized($user) {
        if (parent::isAuthorized($user)) {
            return true;
        }

        if (($this->action === 'add3') || ($this->action === 'add2') || ($this->action === 'dashboard') || ($this->action === 'mygames') || ($this->action === 'favorites') ||
                ($this->action === 'start') || ($this->action === 'settings') || ($this->action === 'chains') ||
                ($this->action === 'channel') || ($this->action === 'random_3_game') || ($this->action === 'checkClone')) {
            // All registered users can add posts
            return true;
        }
        if (in_array($this->action, array('edit2', 'delete'))) {
            $gameId = $this->request->params['pass'][0];
            return $this->Game->isOwnedBy($gameId, $user['id']);
        }

        return false;
    }

    public function beforeFilter() {

        parent::beforeFilter();
        $this->noprefixdomain();
    }

    public function afterFilter() {
        //There is no any action!
    }

    public function index() {

        if ($this->Session->check('Auth.User')) {
            $this->redirect(array("controller" => "businesses", "action" => "dashboard"));
        }

        $this->layout = 'landing';

        $this->set('title_for_layout', 'Clone Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    //Bu fonksiyon channel id si olmayan oyunlara yeni bir channel id atar.
    public function gamerepair($targetid = NULL, $newid = NULL) {
        $this->layout = 'ajax';

        echo '<span style=" color:green;">-Target Game Id:' . $targetid . '</span>';
        echo '<br><span style=" color:green;">-New Channel Id:' . $newid . '</span>';
        echo '<br><span style=" color:green;">-Repairman is ready</span>';


        if (is_numeric($targetid)) {
            $games = $this->Game->find('all', array('conditions' => array('Game.user_id' => $targetid), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.picture')))));
        }


        foreach ($games as $game) {
            echo '<br><br><span style=" color:green;">' . $game['Game']['name'] . '(' . $game['Game']['id'] . ')</span>';

            if ($game['User']['username'] == NULL && $game['User']['id'] == NULL) {
                echo '<br><span style=" color:green;">-We cannot find any channel user for this game</span>';

                if ($targetid == NULL || $newid == NULL) {
                    echo '<br><span style=" color:red;">-Please enter a target id and new id.</span>';
                } else {
                    $this->Game->query('UPDATE games SET user_id=' . $newid . ' WHERE id=' . $game['Game']['id'] . '');
                    echo '<br><span style=" color:green;">-Data Has been replaced.</span>';
                }
            } else {
                echo '<br><span style=" color:green;">-Game data is correct.</span>';
                echo '<br><span style=" color:green;">-Game Name:' . $game['Game']['name'] . '</span>';
                echo '<br><span style=" color:green;">-Channel Name:' . $game['User']['username'] . '(' . $game['User']['id'] . ')</span>';
            }
        }
    }

    //====Bu fonksiyon categorygames2 tarafindan kullaniliyor.======
    public function leftpanel() {
        $this->Game->recursive = 0;
        if ($this->Session->read('LeftPanel.data') == NULL)
            $this->Session->write('LeftPanel.data', $this->Game->Category->find('all'));

        $this->set('category', $this->Session->read('LeftPanel.data'));
    }

//Yeni Sistem-GamesControlerina bagli sayfalar i�in last activityleri getirir.Component yapilabilir.
    public function get_last_activities() {
        if ($this->Auth->user('id')) { //openning of auth_id control
            $auth_id = $this->Session->read('Auth.User.id');
            $subscribed_ids = $this->Subscription->find('list', array('contain' => false, 'fields' => array('Subscription.subscriber_to_id'), 'conditions' => array('Subscription.subscriber_id' => $auth_id)));
            $activityData = $this->Activity->find('all', array('contain' => array('PerformerUser' => array('fields' => array('PerformerUser.id', 'PerformerUser.username', 'PerformerUser.screenname', 'PerformerUser.seo_username')), 'Game' => array('fields' => array('Game.id', 'Game.name', 'Game.seo_url', 'Game.embed')), 'ChannelUser' => array('fields' => array('ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username'))), 'fields' => array('Activity.id', 'Activity.performer_id', 'Activity.game_id', 'Activity.channel_id', 'Activity.msg_id', 'Activity.seen', 'Activity.notify', 'Activity.email', 'Activity.type', 'Activity.replied', 'Activity.created', 'PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username', 'ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username', 'Game.id', 'Game.name', 'Game.seo_url', 'Game.embed'), 'conditions' => array('Activity.performer_id' => $subscribed_ids), 'limit' => 15, 'order' => 'Activity.created DESC'));
            $this->set('lastactivities', $activityData);
        } else {//closing of auth_id control
            //if user is no logged in,get all activity data
            $activityData = $this->Activity->find('all', array('contain' => array('PerformerUser' => array('fields' => array('PerformerUser.id', 'PerformerUser.username', 'PerformerUser.screenname', 'PerformerUser.seo_username')), 'Game' => array('fields' => array('Game.id', 'Game.name', 'Game.seo_url', 'Game.embed')), 'ChannelUser' => array('fields' => array('ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username'))), 'fields' => array('Activity.id', 'Activity.performer_id', 'Activity.game_id', 'Activity.channel_id', 'Activity.msg_id', 'Activity.seen', 'Activity.notify', 'Activity.email', 'Activity.type', 'Activity.replied', 'Activity.created', 'PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username', 'ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username', 'Game.id', 'Game.name', 'Game.seo_url', 'Game.embed'), 'limit' => 15, 'order' => 'Activity.created DESC'));
            $this->set('lastactivities', $activityData);
        }
    }

//Yeni Sistem-Kullanicinin ka� tane notificationu oldugunun bilgisini saglar.
    public function set_notify_count() {
        if ($this->Auth->user('id')) { //openning of auth_id control
            $auth_id = $this->Session->read('Auth.User.id');
            $count = $this->Activity->find('count', array('contain' => false, 'conditions' => array('Activity.channel_id' => $auth_id, 'Activity.notify' => 1, 'Activity.seen' => 0)));
            $this->set('notifycount', $count);
        } else {
            $this->set('notifycount', 0);
        }
    }

//Yeni Sistem-Notification bilgisini getirir.
    public function set_notify() {
        if ($this->Auth->user('id')) { //openning of auth_id control
            $auth_id = $this->Session->read('Auth.User.id');
            $freshdata = $this->Activity->find('all', array('contain' => array('PerformerUser' => array('fields' => array('PerformerUser.id', 'PerformerUser.username', 'PerformerUser.screenname', 'PerformerUser.seo_username')), 'Game' => array('fields' => array('Game.id', 'Game.name', 'Game.seo_url', 'Game.embed')), 'ChannelUser' => array('fields' => array('ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username'))), 'fields' => array('Activity.id', 'Activity.performer_id', 'Activity.game_id', 'Activity.channel_id', 'Activity.msg_id', 'Activity.seen', 'Activity.notify', 'Activity.email', 'Activity.type', 'Activity.replied', 'Activity.created', 'PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username', 'ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username', 'Game.id', 'Game.name', 'Game.seo_url', 'Game.embed'), 'conditions' => array('Activity.notify' => 1, 'Activity.seen' => 0, 'Activity.channel_id' => $auth_id), 'limit' => 10, 'order' => 'Activity.id DESC'));
            $this->set('lastnotifies', $freshdata);
        }
    }

//Yeni Sistem-En iyi channellari getirir.(Potential)
    public function set_suggested_channels() {
//Set first situation of flags
        $restrict = 50;
        $status = 'normal';
        $counter = 0;
        $limit = 20;
        $authid = $this->Session->read('Auth.User.id');
        //Repeat it to get data
        $listofmine = $this->Subscription->find('list', array('conditions' => array('Subscription.subscriber_id' => $authid), 'fields' => array('Subscription.subscriber_to_id')));
        do {
            $suggestdata = $this->User->find('all', array('limit' => $limit, 'order' => 'rand()', 'conditions' => array('User.id' => $this->get_suggestions($restrict), 'NOT' => array('User.id' => $listofmine))));
            if ($suggestdata == NULL) {
                $status = 'empty';
                $restrict+=10;
                $counter++;
            } else {
                $status = 'normal';
            }
            if ($counter == 3)
                break;
        }while ($status == 'empty');
        $category = $this->Category->find('all');
        $this->set('category', $category);
        $this->set('channels', $suggestdata);

        $this->Common->get_last_activities();
        $this->set_notify_count();
        $this->set_notify();
    }

//Yeni Sistem-this gets channel suggestions
    public function get_suggestions($restrict) {
        $top50 = $this->User->query('SELECT user_id from userstats ORDER BY potential desc LIMIT ' . $restrict);
        $list50 = array();
        $i = 0;
        foreach ($top50 as $oneof50) {
            $list50[$i] = $oneof50['userstats']['user_id'];
            $i++;
        }
        return $list50;
    }

    public function lucky_number() {

        if ($this->Session->check('Dashboard.randomKey')) {
            $key = $this->Session->read('Dashboard.randomKey');
        } else {
            $key = mt_rand();
            $this->Session->write('Dashboard.randomKey', $key);
        }
        return $key;
    }

//Yeni sistem-Homepage
    public function dashboard() {

        $this->layout = 'dashboard';
        $linkParam = isset($this->request->params['pass'][0]);
        if ($linkParam == "welcome")
            $this->set('welcome', 1);

        if ($this->Session->read('FirstLogin') != NULL) {
            $this->requestAction(array('controller' => 'users', 'action' => 'activationmailsender', $this->Session->read('FirstLogin')));
            $this->Session->write('FirstLogin', NULL);
            $this->Session->delete('FirstLogin');
        }

        if (isset($_GET['q']) && $_GET['q'] == "sendactivation") {
            $this->requestAction(array('controller' => 'users', 'action' => 'activationmailsender', $this->Session->read('Auth.User.id')));
            $this->set('resend', 1);
        }


        $userid = $this->Session->read('Auth.User.id');
        $this->requestAction(array('controller' => 'userstats', 'action' => 'new_user', $userid));
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
        $userName = $user['User']['username'];
        $isActive = $user['User']['active'];


//**********************This functions redirect managers and admins to business area*********************************
//Bu fonksiyon tamamen geçicidir.Yeni sisteme geçildikten sonra silinecek.
        if ($user['User']['role'] == 1)
//$this->redirect(array("controller" => "businesses","action" => "dashboard"));
//*******************************************************************************************************************
            $limit = 16;
        $this->paginate = array('Game' => array('contain' => array('User' => array('fields' => 'User.seo_username,User.username,User.id')), 'conditions' => array('Game.active' => '1', 'Game.id' => $this->get_game_suggestions('Game.recommend')), 'limit' => $limit));
        $this->paginate = array('order' => sprintf('rand(%f)', $this->lucky_number()));
        $data = $this->paginate('Game');
        $this->set('top_rated_games', $data);

        if ($this->RequestHandler->isAjax()) {
            $this->layout = "ajax";
            $this->render('/Elements/NewPanel/gamebox/dashboard_game_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }

        //New Wall Getting Started Below.
        App::import('Vendor', 'wallscript/config');
        $this->set('gravatar', 1);
        $this->set('base_url', 'http://localhost/wall/');
        $this->set('perpage', 10);
        App::import('Vendor', 'wallscript/Wall_Updates');
        App::import('Vendor', 'wallscript/tolink');
        App::import('Vendor', 'wallscript/textlink');
        App::import('Vendor', 'wallscript/htmlcode');
        App::import('Vendor', 'wallscript/Expand_URL');

        //Session starts
        if ($this->Auth->user('id'))
            $session_uid = $this->Auth->user('id');
        if (!empty($session_uid)) {
            $uid = $session_uid;
            $this->set('uid', $uid);
        } else {
            //echo 'please login';
        }
        //Session Ends


        $Wall = new Wall_Updates();
        $this->set('Wall', $Wall);


        $this->set_suggested_channels();
        $this->set('user', $user);
        $this->set('username', $userName);
        $this->set('isActive', $isActive);
        $this->set('title_for_layout', 'Dashboard - Clone Channel Manager');
        $this->set('description_for_layout', 'Your Dashboard knows what you want and helps you do everything easier.');
    }

    //Yeni sistem-Explore sayfasi
    public function explore() {

        $this->layout = 'dashboard';

        $linkParam = isset($this->request->params['pass'][0]);
        if ($linkParam == "welcome")
            $this->set('welcome', 1);

        if ($this->Session->read('FirstLogin') != NULL) {
            $this->requestAction(array('controller' => 'users', 'action' => 'activationmailsender', $this->Session->read('FirstLogin')));
            $this->Session->write('FirstLogin', NULL);
            $this->Session->delete('FirstLogin');
        }

        if ($this->Auth->user('id')) {
            $userid = $this->Session->read('Auth.User.id');
            $this->requestAction(array('controller' => 'userstats', 'action' => 'new_user', $userid));
            $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
            $userName = $user['User']['username'];
            $isActive = $user['User']['active'];
        } else {
            $isActive = 1;
        }

        $limit = 16;
        $this->paginate = array('Game' => array('contain' => array('User' => array('fields' => 'User.seo_username,User.username,User.id')), 'conditions' => array('Game.active' => '1', 'Game.id' => $this->get_game_suggestions('Game.recommend')), 'limit' => $limit));
        $this->paginate = array('order' => sprintf('rand(%f)', $this->lucky_number()));
        $data = $this->paginate('Game');
        $this->set('top_rated_games', $data);

        if ($this->RequestHandler->isAjax()) {
            $this->layout = "ajax";
            $this->render('/Elements/NewPanel/gamebox/dashboard_game_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }

        //New Wall Getting Started Below.
        App::import('Vendor', 'wallscript/config');
        $this->set('gravatar', 1);
        $this->set('base_url', 'http://localhost/wall/');
        $this->set('perpage', 10);
        App::import('Vendor', 'wallscript/Wall_Updates');
        App::import('Vendor', 'wallscript/tolink');
        App::import('Vendor', 'wallscript/textlink');
        App::import('Vendor', 'wallscript/htmlcode');
        App::import('Vendor', 'wallscript/Expand_URL');

        //Session starts
        if ($this->Auth->user('id'))
            $session_uid = $this->Auth->user('id');
        if (!empty($session_uid)) {
            $uid = $session_uid;
            $this->set('uid', $uid);
        } else {
            //echo 'please login';
        }
        //Session Ends


        $Wall = new Wall_Updates();
        $this->set('Wall', $Wall);


        $this->set_suggested_channels();

        if (isset($user))
            $this->set('user', $user);

        if (isset($userName))
            $this->set('username', $userName);


        $this->set('isActive', $isActive);
        $this->set('title_for_layout', 'Dashboard - Clone Channel Manager');
        $this->set('description_for_layout', 'Your Dashboard knows what you want and helps you do everything easier.');
    }

//Yeni sistem-Auth kullanicinin favorites bilgileri
    public function favorites() {
        $this->layout = 'dashboard';
        $userid = $this->Session->read('Auth.User.id');
        $userName = $this->Session->read('Auth.User.username');
        $this->headerlogin();


        $limit = 16;
        $this->paginate = array('Favorite' => array('conditions' => array('Favorite.active' => 1, 'Favorite.user_id' => $userid), 'limit' => $limit, 'order' => array('Favorite.recommend' => 'desc'), 'contain' => array('Game' => array('fields' => array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize,Game.embed'), 'User' => array('fields' => array('User.username', 'User.seo_username,User.id'))))));
        $cond2 = $this->paginate('Favorite');


        $this->set('favorites', $cond2);

        $this->set('title_for_layout', $userName . '- All Favorite Games');
        $this->set('description_for_layout', 'Find all the games that are favorited by ' . $userName);
        $this->set_suggested_channels();
    }

//Yeni sistem-Auth kullanicinin chain bilgileri
    public function chains() {

        $this->layout = 'dashboard';
        $this->headerlogin();

        $userid = $this->Session->read('Auth.User.id');
        $userName = $this->Session->read('Auth.User.username');

        $this->set('title_for_layout', $userName . ' - Chains');
        $this->set('description_for_layout', $userName . ' - All the chains of ' . $userName);

        $this->set_suggested_channels();
        //$this->set('followers', $this->paginate('Subscription',array('Subscription.subscriber_id' => $userid)));

        $limit = 18;
        $this->paginate = array('Subscription' => array('contain' => array('User'), 'conditions' => array('Subscription.subscriber_id' => $userid), 'limit' => $limit, 'order' => array('created' => 'desc')));
        $this->set('followers', $this->paginate('Subscription'));
    }

    //Yeni Sistem-Toprated Games
    public function toprated2() {
        $this->layout = 'dashboard';
        $this->headerlogin();

        $limit = 16;
        $this->paginate = array('Game' => array('contain' => array('User' => array('fields' => 'User.seo_username,User.username,User.id')), 'conditions' => array('Game.active' => '1'), 'limit' => $limit));
        $data = $this->paginate('Game');
        $this->set('top_rated_games', $data);

        if ($this->RequestHandler->isAjax()) {
            $this->layout = "ajax";
            $this->render('/Elements/NewPanel/gamebox/toprated_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }



        $this->set('title_for_layout', 'Clone - Top Rated Games');
        $this->set('description_for_layout', 'Find the best and toprated online games and play and rate popular games online');


        $this->set_suggested_channels();
    }

//Yeni Sistem- Bu fonksiyon oyunlari kategorilere g�re siralar.
    public function categorygames2() {
        $this->layout = 'dashboard';
        $this->leftpanel();
        $this->headerlogin();
        $this->set_suggested_channels();
        $catid = $this->request->params['pass'][0];
        $category = $this->Category->find('first', array('conditions' => array('Category.id' => $catid)));
        $catName = $category['Category']['name'];

        $limit = 16;
        $this->paginate = array('Game' => array('contain' => array('User' => array('fields' => 'User.seo_username,User.username')), 'conditions' => array('Game.active' => '1', 'Game.category_id' => $catid), 'limit' => $limit));
        $data = $this->paginate('Game');
        $this->set('top_rated_games', $data);

        if ($this->RequestHandler->isAjax()) {
            $this->layout = "ajax";
            $this->render('/Elements/NewPanel/gamebox/dashboard_game_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }


        $this->set('catName', $catName);

        $this->set('title_for_layout', $catName . ' - Top Rated ' . $catName . ' Games - Clone');
        if ($catName == 'Action') {
            $this->set('description_for_layout', 'An action game requires players to use quick reflexes, accuracy, and timing to overcome obstacles.');
        } elseif ($catName == 'Adventure') {
            $this->set('description_for_layout', 'Adventure games put little pressure on the player in the form of action-based challenges or time constraints, adventure games have had the unique ability to appeal to people who do not normally play video games');
        } elseif ($catName == 'Race') {
            $this->set('description_for_layout', 'Racing games typically place the player in the drivers seat of a high-performance vehicle and require the player to race against other drivers or sometimes just time.');
        } elseif ($catName == 'Shooting') {
            $this->set('description_for_layout', 'First-person shooter video games, commonly known as FPSs, emphasize shooting and combat from the perspective of the character controlled by the player.');
        } elseif ($catName == 'Board') {
            $this->set('description_for_layout', 'Many popular board games have computer versions. AI opponents can help improve ones skill at traditional games. Chess, Checkers, Othello and Backgammon have world class computer programs.');
        } elseif ($catName == 'Multiplayer') {
            $this->set('description_for_layout', 'Party games are video games developed specifically for multiplayer games between many players. Normally, party games have a variety of mini-games that range between collecting more of a certain item than other players or having the fastest time at something.');
        } elseif ($catName == 'Puzzle') {
            $this->set('description_for_layout', 'Puzzle games require the player to solve logic puzzles or navigate complex locations such as mazes. They are well suited to casual play, and tile-matching puzzle games are among the most popular casual games.');
        } elseif ($catName == 'Card') {
            $this->set('description_for_layout', 'All popular card games have computer versions. AI opponents can help improve ones skill at traditional games. ');
        } elseif ($catName == '3D') {
            $this->set('description_for_layout', 'Play real time 3d games which are choosen by experienced players');
        } elseif ($catName == 'Kids') {
            $this->set('description_for_layout', 'Kids games are safe for kids under 13. Enjoy these kids games');
        } elseif ($catName == 'Girls') {
            $this->set('description_for_layout', 'Games especially designed for girls');
        } elseif ($catName == 'Word') {
            $this->set('description_for_layout', 'Play most popular word games');
        } elseif ($catName == 'Role-Playing') {
            $this->set('description_for_layout', 'Role-playing video games draw their gameplay from traditional role-playing games. Most cast the player in the role of one or more adventurers who specialize in specific skill sets while progressing through a predetermined storyline.');
        } elseif ($catName == 'Fighting') {
            $this->set('description_for_layout', 'Fighting games emphasize one-on-one combat between two characters, one of which may be computer controlled. These games are usually played by linking together long chains of button presses on the controller to use physical attacks to fight.');
        } elseif ($catName == 'MMORPG') {
            $this->set('description_for_layout', 'Massively multiplayer online role-playing games, or MMORPGs, emerged in the mid to late 1990s as a commercial, graphical variant of text-based MUDs, which had existed since 1978.');
        } elseif ($catName == 'Sports') {
            $this->set('description_for_layout', 'Sports games emulate the playing of traditional physical sports. Some emphasize actually playing the sport, while others emphasize the strategy behind the sport.');
        } elseif ($catName == 'Social') {
            $this->set('description_for_layout', 'Social simulation games base their gameplay on the social interaction between multiple artificial lives.');
        } else {
            $this->set('description_for_layout', $catName . ' - Best games in this category');
        }
    }

//Yeni Sistem-Kullanicinin oyunlarini getirir.
    public function my_games() {

        $this->layout = 'dashboard';
        $userid = $this->Session->read('Auth.User.id');
        $this->headerlogin();

        $limit = 16;

        $this->paginate = array('Game' => array('conditions' => array('Game.user_id' => $userid), 'fields' => array('Game.name,Game.seo_url,Game.fullscreen,Game.id,Game.picture,Game.starsize,Game.embed,Game.clone,User.seo_username'), 'limit' => $limit, 'order' => array('Game.created' => 'desc')));
        $cond = $this->paginate('Game');
        $this->set('mygames', $cond);

        $this->set('title_for_layout', 'Clone - Create your own game channel');
        $this->set('description_for_layout', 'Clone is a social network for online gamers. With Clone, you will be able to create your own game channel.');
        $this->set_suggested_channels();
    }

//Yeni Sistem-Kullanicinin oyunlarini getirir.
    public function mygames() {

        $this->layout = 'dashboard';
        $userid = $this->Session->read('Auth.User.id');
        $this->headerlogin();


        $limit = 16;

        if ($this->params['pass'][0] != NULL && $this->params['pass'][0] == 'search' && $q = $this->params['pass'][1]) {

            $this->paginate = array('Game' => array('conditions' => array('Game.user_id' => $userid, 'Game.name LIKE' => "%$q%"), 'fields' => array('Game.name,Game.seo_url,Game.id,Game.fullscreen,Game.picture,Game.starsize,Game.rate_count,Game.embed,Game.clone,Game.created,User.seo_username,Game.description'), 'limit' => $limit, 'order' => array('Game.created' => 'desc')));
        } elseif ($this->params['pass'][0] != NULL && $this->params['pass'][0] == 'clones') {
            $this->paginate = array('Game' => array('conditions' => array('Game.user_id' => $userid, 'Game.clone' => 1), 'fields' => array('Game.name,Game.seo_url,Game.id,Game.fullscreen,Game.picture,Game.starsize,Game.rate_count,Game.embed,Game.clone,Game.created,User.seo_username,Game.description', 'Gamestat.playcount', 'Gamestat.favcount', 'Gamestat.channelclone', 'Gamestat.potential'), 'limit' => $limit, 'order' => array('Game.id' => 'DESC')));
        } else {
            $this->paginate = array('Game' => array('conditions' => array('Game.user_id' => $userid), 'fields' => array('Game.name,Game.seo_url,Game.id,Game.fullscreen,Game.picture,Game.starsize,Game.rate_count,Game.embed,Game.clone,Game.created,User.seo_username,Game.description', 'Gamestat.playcount', 'Gamestat.favcount', 'Gamestat.channelclone', 'Gamestat.potential'), 'limit' => $limit, 'order' => array('Game.id' => 'DESC')));
        }

        //Get userstat info
        $stats = $this->Userstat->find('first', array('contain' => false, 'conditions' => array('Userstat.user_id' => $userid), 'fields' => array('Userstat.playcount', 'Userstat.favoritecount')));

        $cond = $this->paginate('Game');
        $top = 0;
        foreach ($cond as $item) {
            $userclone+=$item['Gamestat']['channelclone'];
        }


        $this->set('mygames', $cond);
        $this->set('stats', $stats);
        $this->set('userclone', $userclone);
        $this->set('title_for_layout', 'Clone - Create your own game channel');
        $this->set('description_for_layout', 'Clone is a social network for online gamers. With Clone, you will be able to create your own game channel.');
        $this->set_suggested_channels();
    }

    //pasif???-emin degilim!
    public function recommend() {
        break;
        $this->loadModel('User');
        $this->loadModel('Subscription');
        $this->layout = 'dashboard';

        //Get best channels
        $authid = $this->Session->read('Auth.User.id');
        //Get the list of subscriptions of auth user.
        if ($authid != NULL) {
            $listofmine = $this->Subscription->find('list', array('conditions' => array('Subscription.subscriber_id' => $authid), 'fields' => array('Subscription.subscriber_to_id')));
            $listofuser = $this->Subscription->find('list', array('conditions' => array('Subscription.subscriber_id' => $userid), 'fields' => array('Subscription.subscriber_to_id')));
            $mutuals = array_intersect($listofmine, $listofuser); //Gereksiz sorguyu sil.
            $this->set('mutuals', $mutuals);
        } else {
            $this->set('mutuals', NULL);
        }

        //Set first situation of flags
        $restrict = 10;
        $status = 'normal';
        $counter = 0;
        //Repeat it to get data
        do {
            $suggestdata = $this->User->find('all', array('limit' => 5, 'order' => 'rand()', 'conditions' => array('User.id' => $this->get_suggestions($restrict), 'NOT' => array('User.id' => $listofmine))));
            if ($suggestdata == NULL) {
                $status = 'empty';
                $restrict+=10;
                $counter++;
            } else {
                $status = 'normal';
            }
            if ($counter == 3)
                break;
        }while ($status == 'empty');
        $this->set('users', $suggestdata);

        //Actions About Best Games On Right Sidebar
        $suggestedgames = $this->Game->find('all', array('limit' => 5, 'order' => 'rand()', 'conditions' => array('Game.id' => $this->get_game_suggestions())));
        $this->set('suggestedgames', $suggestedgames);

        //get channel description
        $channeldata = $this->User->find('first', array('contain' => false, 'conditions' => array('id' => $authid), 'field' => array('User.description', 'User.id')));
        $this->set('channeldata', $channeldata);
    }

//pasif???-emin degilim!
    public function channelfavorites() {
        $this->layout = "ajax";
        $userid = $this->request->params['pass'][0];

        $limit = 12;
        $this->paginate = array('Favorite' => array('conditions' => array('Favorite.active' => 1, 'Favorite.user_id' => $userid), 'limit' => $limit, 'order' => array('Favorite.recommend' => 'desc'), 'contain' => array('Game' => array('fields' => array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize,Game.embed'), 'User' => array('fields' => array('User.username', 'User.seo_username'))))));
        $cond2 = $this->paginate('Favorite');
        $this->set('favorites', $cond2);
    }

    public function profilegames() {
        $this->layout = "ajax";
        $userid = $this->request->params['pass'][0];

        $limit = 12;
        $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid), 'limit' => $limit, 'order' => array('Game.recommend' => 'desc'
        )));
        $cond = $this->paginate('Game');
        $this->set('profilegames', $cond);
    }

//pasif???-emin degilim!
    public function channelfollowers() {
        $this->layout = "ajax";
        $userid = $this->request->params['pass'][0];

        $limit = 18;
        $this->paginate = array('Subscription' => array('contain' => array('User' => array('fields' => 'User.seo_username,User.username')), 'conditions' => array('Subscription.subscriber_to_id' => $userid), 'limit' => $limit));
        $data = $this->paginate('Subscription');
        $this->set('followers', $data);
    }

//Yeni Sistem
    public function getprofileactivity() {
        $this->layout = "ajax";
        $userid = $this->request->params['pass'][0];
        if ($userid != NULL) {
            $limit = 20;
            $activityData = $this->Activity->find('all', array('contain' => array('PerformerUser' => array('fields' => array('PerformerUser.id', 'PerformerUser.username', 'PerformerUser.screenname', 'PerformerUser.seo_username')), 'Game' => array('fields' => array('Game.id', 'Game.name', 'Game.seo_url', 'Game.embed')), 'ChannelUser' => array('fields' => array('ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username'))), 'fields' => array('Activity.id', 'Activity.performer_id', 'Activity.game_id', 'Activity.channel_id', 'Activity.msg_id', 'Activity.seen', 'Activity.notify', 'Activity.email', 'Activity.type', 'Activity.replied', 'Activity.created', 'PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username', 'ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username', 'Game.id', 'Game.name', 'Game.seo_url', 'Game.embed'), 'conditions' => array('Activity.channel_id' => $userid), 'limit' => $limit, 'order' => 'Activity.created DESC'));
            $this->set('lastactivities', $activityData);
        }
    }

//Yeni Sistem
    public function loadprofilefeeds() {
        $this->layout = "ajax";
        $userid = $this->request->params['pass'][0];

//New Wall Getting Started Below.
        App::import('Vendor', 'wallscript/config');
        $this->set('gravatar', 1);
        $this->set('base_url', 'http://localhost/wall/');
        $this->set('perpage', 10);
        App::import('Vendor', 'wallscript/Wall_Updates');
        App::import('Vendor', 'wallscript/tolink');
        App::import('Vendor', 'wallscript/textlink');
        App::import('Vendor', 'wallscript/htmlcode');
        App::import('Vendor', 'wallscript/Expand_URL');

        //Session starts
        if ($this->Auth->user('id'))
            $session_uid = $this->Auth->user('id');
        if (!empty($session_uid)) {
            $uid = $session_uid;
            $this->set('uid', $uid);
        } else {
            //echo 'please login';
        }
        //Session Ends

        $Wall = new Wall_Updates();
        $this->set('Wall', $Wall);

        $this->set('profile_uid', $userid);
    }

    //  Yeni Sistem-Channel Sayfalari
    public function profile() {

        $this->layout = 'dashboard';
        $userid = $this->request->params['pass'][0];
        $authid = $this->Session->read('Auth.User.id');

        if (!is_numeric($userid)) {
            $userconvert = $this->User->find('first', array('contain' => false, 'conditions' => array('User.seo_username' => $userid)));
            $userid = $userconvert['User']['id'];
        }

        $user = $this->User->find('first', array('conditions' => array('User.id' => $authid), 'fields' => array('*')));
        $publicUser = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*')));
        $isActive = $user['User']['active'];

        if ($publicUser == NULL) {
            $this->redirect('/');
        }
        $userName = $user['User']['username'];
        $publicName = $publicUser['User']['username'];
        $screenName = $publicUser['User']['screenname'];
        $publicDesc = $publicUser['User']['description'];

        if ($screenName == NULL) {
            $screenName = $publicName;
        }


        $limit = 12;
        $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid), 'limit' => $limit, 'order' => array('Game.recommend' => 'desc'
        )));
        $cond = $this->paginate('Game');
        $this->set('mygames', $cond);
        if ($this->RequestHandler->isAjax()) {
            $this->layout = "ajax";
            $this->render('/Elements/NewPanel/profile/channel_game_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }


        //========Get Current Subscription===============
        if ($authid) {
            $subscribebefore = $this->Subscription->find("first", array("contain" => false, "conditions" => array("Subscription.subscriber_id" => $authid, "Subscription.subscriber_to_id" => $userid)));
            if ($subscribebefore != NULL) {
                $this->set('follow', 1);
            } else {
                $this->set('follow', 0);
            }
        } else {
            $this->set('follow', 1);
        }
        //=======/Get Current Subscription===============
        //New Wall Getting Started Below.
        App::import('Vendor', 'wallscript/config');
        $this->set('gravatar', 1);
        $this->set('base_url', 'http://localhost/wall/');
        $this->set('perpage', 10);
        App::import('Vendor', 'wallscript/Wall_Updates');
        App::import('Vendor', 'wallscript/tolink');
        App::import('Vendor', 'wallscript/textlink');
        App::import('Vendor', 'wallscript/htmlcode');
        App::import('Vendor', 'wallscript/Expand_URL');

        //Session starts
        if ($this->Auth->user('id'))
            $session_uid = $this->Auth->user('id');
        if (!empty($session_uid)) {
            $uid = $session_uid;
            $this->set('uid', $uid);
        } else {
            //echo 'please login';
        }
        //Session Ends


        $Wall = new Wall_Updates();
        $this->set('Wall', $Wall);
        $this->set('profile_uid', $userid);
        $this->set('top_rated_games', $this->Game->find('all', array('conditions' => array('Game.active' => '1'), 'limit' => $limit, 'order' => array('Game.recommend' => 'desc'))));
        $this->set('username', $userName);
        $this->set('publicname', $publicName);
        $this->set('screenname', $screenName);
        $this->set('userid', $userid);
        $this->set('user', $user);
        $this->set('publicuser', $publicUser);
        $this->set('isActive', $isActive);

        $this->set_suggested_channels();
        $this->set('title_for_layout', $publicName . ' Game Channel - Clone');
        $this->set('description_for_layout', 'Play games on ' . $publicName . ' : ' . $publicDesc);
    }

//Yeni Sistem
    public function hashtag() {

        $this->layout = 'dashboard';
        $hashtag = $this->request->params['pass'][0];
        $authid = $this->Session->read('Auth.User.id');

        $yesterday = date("Y-m-d", time() - 60 * 60 * 24);

        $idList = $this->Game->find('list', array('contain' => false, 'conditions' => array('Game.seo_url' => $hashtag), 'fields' => array('Game.id')));
        if ($idList != NULL) {
            //it is a game
            $limit = 20;
            $activityData = $this->Activity->find('all', array('contain' => array('PerformerUser' => array('fields' => array('PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username')), 'Game' => array('fields' => array('Game.id', 'Game.name', 'Game.seo_url', 'Game.embed')), 'ChannelUser' => array('fields' => array('ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username'))), 'fields' => array('Activity.id', 'Activity.performer_id', 'Activity.game_id', 'Activity.channel_id', 'Activity.msg_id', 'Activity.seen', 'Activity.notify', 'Activity.email', 'Activity.type', 'Activity.replied', 'Activity.created', 'PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username', 'ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username', 'Game.id', 'Game.name', 'Game.seo_url', 'Game.embed'), 'conditions' => array('Activity.game_id' => $idList), 'limit' => $limit, 'order' => 'Activity.created DESC'));
            $this->set('tagActivities', $activityData);
            $play_id = array_rand($idList, 1);
            $game = $this->Game->find('first', array('contain' => array('User' => array('fields' => array('User.seo_username'))), 'conditions' => array('Game.id' => $play_id), 'fields' => array('Game.id', 'Game.seo_url', 'Game.embed', 'Game.name', 'Game.picture')));
            $this->set('game', $game);
        } else {
            //it is not a game
        }


        //=====Get Trendy Hastags==========

        $trends = $this->Activity->query('SELECT hashtag,id FROM hashcount WHERE date="' . $yesterday . '" ORDER BY count DESC LIMIT 13');
        $t_count = count($trends);
        $t_total = 13;
        $missing = $t_total - $t_count;

        $i = 0;
        $t_ids = array();
        foreach ($trends as $trend) {
            $t_ids[$i] = $trend['hashcount']['hashtag'];
            $i++;
        }
        $comma_separated = implode(",", $t_ids);

        if ($t_count >= 13) {
            $this->set('trends', $trends);
        } else {
            if ($comma_separated != NULL)
                $trendsother = $this->Activity->query('SELECT hashtag,id FROM hashcount  WHERE hashtag NOT IN ("' . $comma_separated . '") GROUP BY hashtag ORDER BY count DESC LIMIT ' . $missing . '');
            else
                $trendsother = $this->Activity->query('SELECT id,hashtag FROM hashcount GROUP BY hashtag ORDER BY count DESC LIMIT 13');

            if ($trendsother != NULL) {
                $merged = array_merge($trends, $trendsother);
                $this->set('trends', $merged);
            } else {
                $this->set('trends', $trends);
            }
        }

        //=====//Get Trendy Hastags==========
        //New Wall Getting Started Below.
        App::import('Vendor', 'wallscript/config');
        $this->set('gravatar', 1);
        $this->set('base_url', 'http://localhost/wall/');
        $this->set('perpage', 10);
        App::import('Vendor', 'wallscript/Wall_Updates');
        App::import('Vendor', 'wallscript/tolink');
        App::import('Vendor', 'wallscript/textlink');
        App::import('Vendor', 'wallscript/htmlcode');
        App::import('Vendor', 'wallscript/Expand_URL');

        //Session starts
        if ($this->Auth->user('id'))
            $session_uid = $this->Auth->user('id');
        if (!empty($session_uid)) {
            $uid = $session_uid;
            $this->set('uid', $uid);
        } else {
            //echo 'please login';
        }
        //Session Ends

        $user = $this->User->find('first', array('conditions' => array('User.id' => $authid), 'fields' => array('*')));
        $userName = $user['User']['username'];
        $userDesc = $user['User']['description'];

        $Wall = new Wall_Updates();
        $this->set('Wall', $Wall);
        $this->set('profile_uid', $authid);
        $this->set('username', $userName);
        $this->set('userid', $authid);
        $this->set('user', $user);

        $this->set('hashtag', $hashtag);

        $this->set_suggested_channels();
        $this->set('title_for_layout', $hashtag . ' Game Channel - Clone');
        $this->set('description_for_layout', 'All information about ' . $hashtag);
    }

    public function bestchannels2() {
        //More Buttonu ile gpaginate edilecek...

        $this->layout = 'dashboard';
        $this->headerlogin();
        $authid = $this->Session->read('Auth.User.id');
        //Get the list of subscriptions of auth user.
        if ($authid != NULL) {
            $listofmine = $this->Subscription->find('list', array('conditions' => array('Subscription.subscriber_id' => $authid), 'fields' => array('Subscription.subscriber_to_id')));
            $listofuser = $this->Subscription->find('list');
            $mutuals = array_intersect($listofmine, $listofuser);
            $this->set('mutuals', $mutuals);
        } else {
            $listofmine = "null";
            $this->set('mutuals', NULL);
        }

        $this->set('title_for_layout', 'Clone - Best Online Game Channels ');
        $this->set('description_for_layout', 'Clone has all the best channels for games and gamers');
        $this->set('user_id', $authid);

        $limit = 15;
        $this->paginate = array('User' => array('conditions' => array('NOT' => array('User.id' => $listofmine)), 'contain' => array('Userstat'), 'limit' => $limit, 'order' => array(
                    'Userstat.potential' => 'desc')));
        $users = $this->paginate('User');
        $this->set('users', $users);

        if ($this->RequestHandler->isAjax()) {
            $this->layout = "ajax";
            $this->render('/Elements/NewPanel/bestchannel_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }


        $this->set_suggested_channels();
    }

    public function featuredchannels() {
        //More Buttonu ile gpaginate edilecek...

        $this->layout = 'dashboard';
        $this->headerlogin();
        $authid = $this->Session->read('Auth.User.id');
        //Get the list of subscriptions of auth user.
        if ($authid != NULL) {
            $listofmine = $this->Subscription->find('list', array('conditions' => array('Subscription.subscriber_id' => $authid), 'fields' => array('Subscription.subscriber_to_id')));
            $listofuser = $this->Subscription->find('list');
            $mutuals = array_intersect($listofmine, $listofuser);
            $this->set('mutuals', $mutuals);
        } else {
            $listofmine = "null";
            $this->set('mutuals', NULL);
        }

        $this->set('title_for_layout', 'Clone - Best Online Game Channels ');
        $this->set('description_for_layout', 'Clone has all the best channels for games and gamers');
        $this->set('user_id', $authid);

        $limit = 15;
        $this->paginate = array('User' => array('conditions' => array('NOT' => array('User.id' => $listofmine)), 'contain' => array('Userstat'), 'fields' => array('*'), 'limit' => $limit, 'order' => array(
                    'Userstat.potential' => 'desc')));
        $users = $this->paginate('User');
        $this->set('users', $users);

        if ($this->RequestHandler->isAjax()) {
            $this->layout = "ajax";
            $this->render('/Elements/NewPanel/featured_channel_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }


        $this->set_suggested_channels();
    }

    public function start() {
        //More Buttonu ile gpaginate edilecek...

        $this->layout = 'starter';
        $this->headerlogin();
        $authid = $this->Session->read('Auth.User.id');
        //Get the list of subscriptions of auth user.
        if ($authid != NULL) {
            $listofmine = $this->Subscription->find('list', array('conditions' => array('Subscription.subscriber_id' => $authid), 'fields' => array('Subscription.subscriber_to_id')));
            $listofuser = $this->Subscription->find('list', array('conditions' => array('Subscription.subscriber_id' => $userid), 'fields' => array('Subscription.subscriber_to_id')));
            $mutuals = array_intersect($listofmine, $listofuser);
            $this->set('mutuals', $mutuals);
        } else {
            $this->set('mutuals', NULL);
        }

        $this->set('title_for_layout', 'Clone - Best Online Game Channels ');
        $this->set('description_for_layout', 'Clone has all the best channels for games and gamers');
        $this->set('user_id', $userid);
        $users = $this->User->find('all', array('conditions' => array('NOT' => array('User.id' => $listofmine)), 'contain' => array('Userstat'), 'limit' => 10, 'order' => array(
                'Userstat.potential' => 'desc')));
        $this->set('users', $users);
        $this->set_suggested_channels();
    }

    public function get_3_games($channel_id = NULL) {
        //This function gets 3 random games for determined channel id.
        $count = 3;
        $games = $this->Game->find('all', array('conditions' => array('Game.user_id' => $channel_id), 'contain' => array('User'), 'order' => 'RAND()', 'limit' => $count));
        return $games;
    }

    public function follow_card($userid) {

        $channelstat = $this->User->find('first', array('contain' => 'Userstat', 'conditions' => array('User.id' => $userid)));

        $gamenumber = $channelstat['Userstat']['uploadcount'];
        $favoritenumber = $channelstat['Userstat']['favoritecount'];
        $subscribe = $channelstat['Userstat']['subscribe'];
        $subscribeto = $channelstat['Userstat']['subscribeto'];
        $playcount = $channelstat['Userstat']['playcount'];
        $userName = $channelstat['User']['username'];
        $userUrl = $channelstat['User']['seo_username'];
        return array($userName, $gamenumber, $favoritenumber, $subscribe, $subscribeto, $playcount, $channelstat, $userUrl);
    }

//This clone of search function fill be used for dashboard layout.
    public function search2() {
        $this->layout = 'dashboard';
        $this->headerLogin();
        if ($this->request->is("GET") && isset($this->request->params['pass'][0])) {
            $param = $this->request->params['pass'][0];
        }

//search i�in veri girilmemisse ana sayfaya y�nlendir.
        if (!isset($param) || $param == "") {
            $this->redirect(array("controller" => "games", "action" => "index"));
        } else {



//$this->set('search', $this->paginate('Game',$cond));

            $limit = 16;
            $cond = array('AND' => array('OR' => array('Game.name LIKE' => '%' . $param . '%', 'Game.description LIKE' => '%' . $param . '%', 'User.username LIKE' => '%' . $param . '%'), 'Game.active' => '1'));
            $this->paginate = array('Game' => array('contain' => array('User' => array('fields' => 'User.seo_username,User.username')), 'conditions' => $cond, 'limit' => $limit));
            $data = $this->paginate('Game');
            $this->set('search', $data);

            if ($this->RequestHandler->isAjax()) {
                $this->layout = "ajax";
                $this->render('/Elements/NewPanel/gamebox/search_game_box_ajax');   // Render a special view for ajax pagination
                return;  // return the ajax paginated content without a layout
            }


            $this->set('mygames', $cond);

            $this->set('title_for_layout', 'Clone - Game Search Engine');
            $this->set('description_for_layout', 'Clone - Game Search Engine powered by Google. Clone Search is specially designed for searching games');
        }


        $this->leftpanel();
        //$this->logedin_user_panel();

        $key = $param;
        $this->set('myParam', $key);
        $userid = $this->Session->read('Auth.User.id');


        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
        $userName = $user['User']['username'];
        $limit = 120;
        $this->set('limit', $limit);

        $this->set('username', $userName);
        $this->set('user_id', $userid);
        $this->set_suggested_channels();
    }

    public function random() {
        $random = $this->Game->find('first', array(
            'conditions' => array(
                'Game.active' => 1,
            ),
            'order' => 'rand()',
            'contain' => array('User' => array('fields' => array('User.seo_username'))),
            'fields' => array('Game.id,Game.seo_url')
        )); //Recoded
        $this->Session->write('Random.flag', 1);
        $this->Session->write('Random.game', $random['Game']['seo_url']);
        $this->Session->write('Random.user', $random['User']['seo_username']);
    }

    public function random2() {
        $random2 = $this->Game->find('first', array(
            'conditions' => array(
                'Game.active' => 1,
            ),
            'order' => 'rand()',
            'contain' => array('User' => array('fields' => array('User.seo_username'))),
            'fields' => array('Game.id,Game.seo_url', 'Game.embed', 'Game.name')
        )); //Recoded
        $this->Session->write('Random2.flag', 1);
        $this->Session->write('Random2.game', $random2);
    }

    public function view($id = null) {
        $this->Game->id = $id;
        if (!$this->Game->exists()) {
            throw new NotFoundException(__('Invalid game'));
        }
        $this->set('game', $this->Game->read(null, $id));
    }

    public function fav_check($game_id) {
        $user_id = $this->Auth->user('id');
        $favbefore = $this->Game->Favorite->find("first", array("conditions" => array("Favorite.user_id" => $user_id, "Favorite.game_id" => $game_id), "fields" => array("Favorite.user_id", "Favorite.game_id", "Favorite.id")));
        if (empty($favbefore)) {
            $this->set("heartwidth", 0);
        } else {
            $this->set("heartwidth", 100);
        }
    }

    public function favorite_check($game_id) {
        $this->layout = "ajax";
        $user_id = $this->Auth->user('id');
        $favbefore = $this->Game->Favorite->find("first", array("contain" => false, "conditions" => array("Favorite.user_id" => $user_id, "Favorite.game_id" => $game_id), "fields" => array("Favorite.user_id", "Favorite.game_id", "Favorite.id")));
        if (empty($favbefore)) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function playgame($channel = NULL, $seo_url = NULL) {

        //Getting Random Game Data
        if ($this->Session->read('Random2.flag') != 1) {
            $this->random2();
            $this->set('randomgame', $this->Session->read('Random2.game'));
        } else {
            $this->set('randomgame', $this->Session->read('Random2.game'));
        }

        $this->layout = 'dashboard';
        $this->headerLogin();

        $gameid = $this->request->params['pass'][0];
        if (is_numeric($gameid)) {
            $game = $this->Game->find('first', array('conditions' => array('Game.id' => $gameid), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.type,Game.width,Game.height,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.picture'))))); //Recoded
        } else {
            $channel_id = $this->User->find('first', array('conditions' => array('User.seo_username' => $channel), 'fields' => array('User.id'), 'contain' => false));
            $game = $this->Game->find('first', array('conditions' => array('Game.seo_url' => $seo_url, 'Game.user_id' => $channel_id['User']['id']), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.type,Game.width,Game.height,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.fb_link,User.twitter_link,User.gplus_link,User.website,User.picture'), 'conditions' => array('User.seo_username' => $channel)))));
            $gameid = $game['Game']['id'];
        }

        //==========Get Post Information About Game===========
        $singlepost = $this->Game->query('SELECT * FROM messages WHERE type=1 AND game_id=' . $gameid . '');
        if ($singlepost != NULL) {
            $msg_id = $singlepost[0]['messages']['msg_id'];
            $message = $singlepost[0]['messages']['message'];
            $user_id = $singlepost[0]['messages']['uid_fk'];
            $created = $singlepost[0]['messages']['created'];
            $type = $singlepost[0]['messages']['type'];
            $game_id = $singlepost[0]['messages']['game_id'];
            $likecount = $singlepost[0]['messages']['likecount'];
            $gamePost = array('id' => $msg_id, 'message' => $message, 'user_id' => $user_id, 'created' => $created, 'type' => $type, 'game_id' => $game_id, 'likecount' => $likecount);
            $this->set('gamepost', $gamePost);
        }
        //=========//Get Post Information About Game===========
        //Oyun clonesa bu oyunun sahibinin adsense bilgilerini getir.
        if ($game['Game']['clone'] == 1) {
            $original = $this->User->find('first', array('conditions' => array('User.id' => $game['Game']['owner_id']), 'fields' => array('User.adcode'), 'contain' => false));
            $game['User']['adcode'] = $original['User']['adcode'];
        }

        $this->set('game', $game);
        $this->set('title_for_layout', $game['Game']['name'] . ' - ' . $game['User']['seo_username'] . ' - Clone');
        $this->set('description_for_layout', 'Play ' . $game['Game']['name'] . ' for free: ' . $game['Game']['description']);
        $this->set_suggested_channels();

        //Recommended Games bolumu icin.
        $limit = 4;
        $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $game['User']['id']), 'limit' => $limit, 'order' => array('Game.recommend' => 'desc'
        )));
        $condnew = $this->paginate('Game');
        $this->set('mygames', $condnew);
        //Recommended Games bolumu icin.
        //=====Get Game Specified Activity=======
        $limit = 4;
        $activityData = $this->Activity->find('all', array('contain' => array('PerformerUser' => array('fields' => array('PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username')), 'Game' => array('fields' => array('Game.id', 'Game.name', 'Game.seo_url', 'Game.embed')), 'ChannelUser' => array('fields' => array('ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username'))), 'fields' => array('Activity.id', 'Activity.performer_id', 'Activity.game_id', 'Activity.channel_id', 'Activity.msg_id', 'Activity.seen', 'Activity.notify', 'Activity.email', 'Activity.type', 'Activity.replied', 'Activity.created', 'PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username', 'ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username', 'Game.id', 'Game.name', 'Game.seo_url', 'Game.embed'), 'conditions' => array('Activity.game_id' => $gameid), 'limit' => $limit, 'order' => 'Activity.created DESC'));
        $this->set('tagActivities', $activityData);
        //=====//Get Game Specified Activity=======
        //New Wall Getting Started Below.
        App::import('Vendor', 'wallscript/config');
        $this->set('gravatar', 1);
        $this->set('base_url', 'http://localhost/wall/');
        $this->set('perpage', 10);
        App::import('Vendor', 'wallscript/Wall_Updates');
        App::import('Vendor', 'wallscript/tolink');
        App::import('Vendor', 'wallscript/textlink');
        App::import('Vendor', 'wallscript/htmlcode');
        App::import('Vendor', 'wallscript/Expand_URL');

        //Session starts
        if ($this->Auth->user('id'))
            $session_uid = $this->Auth->user('id');
        if (!empty($session_uid)) {
            $uid = $session_uid;
            $this->set('uid', $uid);
        } else {
            //echo 'please login';
        }
        //Session Ends


        $Wall = new Wall_Updates();
        $this->set('Wall', $Wall);

        //Set random game after rendering
        $this->render();
        if ($this->Session->read('Random2.flag') == 1)
            $this->random2();
    }

    public function gameswitch($id = null) {
        $gameid = $this->request->params['pass'][0];
        $game = $this->Game->find('first', array('conditions' => array('Game.id' => $gameid), 'fields' => array('Game.embed'), 'contain' => false)); //Recoded
        if ($game['Game']['embed'] == null) {
            $this->redirect(array('controller' => 'games', 'action' => 'playgameframe', $gameid));
        } else {
            $this->redirect(array('controller' => 'games', 'action' => 'playgame', $gameid));
        }
    }

    public function playgameframe($channel = NULL, $seo_url = NULL) {

        //Getting Random Game Data
        if ($this->Session->read('Random2.flag') != 1) {
            $this->random2();
            $this->set('randomgame', $this->Session->read('Random2.game'));
        } else {
            $this->set('randomgame', $this->Session->read('Random2.game'));
        }


        $this->layout = 'playgameframe';
        $this->headerLogin();

        $gameid = $this->request->params['pass'][0];
        if (is_numeric($gameid)) {
            $game = $this->Game->find('first', array('conditions' => array('Game.id' => $gameid), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.picture'))))); //Recoded
        } else {
            $channel_id = $this->User->find('first', array('conditions' => array('User.seo_username' => $channel), 'fields' => array('User.id'), 'contain' => false));
            $game = $this->Game->find('first', array('conditions' => array('Game.seo_url' => $seo_url, 'Game.user_id' => $channel_id['User']['id']), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.fb_link,User.twitter_link,User.gplus_link,User.website,User.picture'), 'conditions' => array('User.seo_username' => $channel)))));
        }
        $gameid = $game['Game']['id'];

        //==========Get Post Information About Game===========
        $singlepost = $this->Game->query('SELECT msg_id FROM messages WHERE type=1 AND game_id=' . $gameid . '');
        if ($singlepost != NULL) {
            $msg_id = $singlepost[0]['messages']['msg_id'];
            $gamePost = array('id' => $msg_id);
            $this->set('gamepost', $gamePost);
        }
        //=========//Get Post Information About Game===========       


        $this->set('game', $game);
        $this->set('title_for_layout', $game['Game']['name'] . ' - ' . $game['User']['seo_username'] . ' - Clone');
        $this->set('description_for_layout', 'Play ' . $game['Game']['name'] . ' for free: ' . $game['Game']['description']);
        $this->set_suggested_channels();

        //Set random game after rendering
        $this->render();
        if ($this->Session->read('Random2.flag') == 1)
            $this->random2();
    }

    public function headerlogin() {
        $userid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
        $userName = $user['User']['username'];

        $this->set('user', $user);
        $this->set('username', $userName);
    }

    //this gets game suggestions
    public function get_game_suggestions($order) {
        $top50 = $this->Game->find('all', array('contain' => array('User' => array('fields' => 'User.seo_username,User.username')), 'conditions' => array('Game.active' => '1'), 'limit' => 100, 'order' => array($order => 'desc'
        )));

        $list50 = array();
        $i = 0;
        foreach ($top50 as $oneof50) {
            $list50[$i] = $oneof50['Game']['id'];
            $i++;
        }
        return $list50;
    }

    function secureSuperGlobalPOST($value) {
        //$string = preg_replace('/[^\w\d_ -]/si', '', $value);<br />
        //Nokta ve virg�l� de engelleyen kod iptal edildi.
        $string = htmlspecialchars(stripslashes($value));
        $string = str_ireplace("script", "blocked", $string);
        $string = mysql_escape_string($string);
        //$string = htmlentities($string);
        return $string;
    }

    function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

    public function cloneS3Folder($old_id = NULL, $new_id = NULL) {


        //get objects from S3
        $prefix = 'upload/games/' . $old_id . '/';
        $opt = array(
            'prefix' => $prefix,
        );
        $bucket = Configure::read('S3.name');
        $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
        foreach ($objs as $obj) {

            $string = $obj;
            $prefix = "/" . $old_id . "/";
            $index = strpos($string, $prefix) + strlen($prefix);
            $result = substr($string, $index);
            //echo $result; 
            //=========================
            //Aws S3 image copy process
            //=========================
            $response = $this->Amazon->S3->copy_object(
                    array(// Source
                'bucket' => Configure::read('S3.name'),
                'filename' => $obj
                    ), array(// Destination
                'bucket' => Configure::read('S3.name'),
                'filename' => 'upload/games/' . $new_id . "/" . $result
                    ), array('acl' => AmazonS3::ACL_PUBLIC)
            );
            //print_r($response);
        }
    }

    public function add_clonelog($game_id = NULL, $user_id = NULL, $root_id = NULL, $cloned_id = NULL) {
        $filtered_data = array('Cloneship' => array(
                'game_id' => $game_id,
                'user_id' => $user_id,
                'root_id' => $root_id,
                'cloned_id' => $cloned_id));
        $this->Cloneship->save($filtered_data);
    }

    //Get root_id of game
    //Bu fonksiyon mu daha hizli yoksa direk games tablosuna root_id eklemek mi?test et'Kiyasla!
    public function get_game_root($game_id = NULL) {
        $clone_info = $this->Cloneship->find('first', array('contain' => false, 'fields' => array('Cloneship.root_id'), 'conditions' => array('Cloneship.cloned_id' => $game_id)));
        if ($clone_info != NULL)
            return $clone_info['Cloneship']['root_id'];
        else
            return NULL;
    }

    //Chain functions clones game items on games table.
    public function clonegame($game_id = NULL) {
        $this->layout = "ajax";
        $userId = $this->Session->read('Auth.User.id');
        $targetGame = $this->Game->find('first', array('conditions' => array('Game.id' => $game_id), 'fields' => array('Game.id,Game.name,Game.link,Game.description,Game.active,Game.user_id,Game.category_id,Game.picture,Game.width,Game.height,Game.fullscreen,Game.mobileready,Game.priority,Game.embed,Game.seo_url,Game.clone,Game.owner_id','Game.install'), 'contain' => false));
        $gameUser = $targetGame['Game']['user_id'];
        if ($targetGame != NULL) {
            $this->request->data['Game']['name'] = $targetGame['Game']['name'];
            $this->request->data['Game']['link'] = $targetGame['Game']['link'];
            $this->request->data['Game']['description'] = $targetGame['Game']['description'];
            $this->request->data['Game']['active'] = 1;
            $this->request->data['Game']['user_id'] = $userId;
            $this->request->data['Game']['category_id'] = $targetGame['Game']['category_id'];
            $this->request->data['Game']['width'] = $targetGame['Game']['width'];
            $this->request->data['Game']['height'] = $targetGame['Game']['height'];
            $this->request->data['Game']['fullscreen'] = $targetGame['Game']['fullscreen'];
            $this->request->data['Game']['mobileready'] = $targetGame['Game']['mobileready'];
            $this->request->data['Game']['install'] = $targetGame['Game']['install'];

            if($targetGame['Game']['priority']==NULL)
            $this->request->data['Game']['priority'] = 0;
            else
            $this->request->data['Game']['priority'] = $targetGame['Game']['priority'];    

            //$this->request->data['Game']['picture'] = $targetGame['Game']['picture'];
            $this->request->data['Game']['starsize'] = 0;
            $this->request->data['Game']['rate_count'] = 0;
            $this->request->data['Game']['embed'] = $targetGame['Game']['embed'];
            $this->request->data['Game']['seo_url'] = $this->Game->checkDuplicateSeoUrl($this->request->data['Game']['name']);
            $this->request->data['Game']['clone'] = 1;
            if ($targetGame['Game']['owner_id'] != NULL && $targetGame['Game']['clone'] == 1) {
                $this->request->data['Game']['owner_id'] = $targetGame['Game']['owner_id'];
                $clone = 1;
            } else {
                $this->request->data['Game']['owner_id'] = $targetGame['Game']['user_id'];
                $clone = 0;
            }

            $this->Game->create();
            $this->Game->validate = array(); //This line disabled validation rules for game add action.
            Configure::write('debug', 0);
            if ($this->Game->save($this->request->data)) {
                $this->requestAction(array('controller' => 'userstats', 'action' => 'getgamecount', $userId));
                $id = $this->Game->getLastInsertId();



                //======if cloned game is installable so clone applink infos==========
                if($targetGame['Game']['install'])
                {
                    $this->loadModel('Applink');
                    $android_data=$this->Applink->find('first',array('conditions'=>array('Applink.game_id'=>$game_id,'Applink.platform_id'=>1)));
                    if($android_data!=NULL)
                    {    
                    $this->Applink->create();
                    $applinkdata['Applink']['game_id']=$id;
                    $applinkdata['Applink']['platform_id']=1;
                    $applinkdata['Applink']['link']=$android_data['Applink']['link'];
                    $this->Applink->save($applinkdata);
                    }
                    $ios_data=$this->Applink->find('first',array('conditions'=>array('Applink.game_id'=>$game_id,'Applink.platform_id'=>2)));
                    if($ios_data!=NULL)
                    {   
                        $this->Applink->create();
                        $applinkdata2['Applink']['game_id']=$id;
                        $applinkdata2['Applink']['platform_id']=2;
                        $applinkdata2['Applink']['link']=$ios_data['Applink']['link'];
                        $this->Applink->save($applinkdata2);
                    }    
                }    
                //=====//if cloned game is installable so clone applink infos==========



                //Upload plugin make some changes on image file name.This harm image path.As a solution.I will edit picture field with query.
                $this->Game->query('UPDATE games SET picture="' . $targetGame['Game']['picture'] . '" WHERE id=' . $id);

                //================Add Cloneships begins=====================
                if ($clone)
                    $this->add_clonelog($game_id, $userId, $this->get_game_root($game_id), $id);
                else
                    $this->add_clonelog($game_id, $userId, $game_id, $id);
                //================Add Cloneships ends=====================
                //$this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax',$id,$userId)); Standart game publish feed
                $this->Gamestat->sync_channel_clone($game_id);
                $this->requestAction(array('controller' => 'wallentries', 'action' => 'action_ajax', $game_id, $userId, 7, 1));
                echo 1; //this means games has been clonned properly.
            }else {
                echo 0; //this means there are some problems.
            }
            $this->cloneS3Folder($game_id, $id);
        }
    }

    private static function make_absolute($url, $base) {
        // Return base if no url
        if (!$url)
            return $base;

        // Return if already absolute URL
        if (parse_url($url, PHP_URL_SCHEME) != '')
            return $url;

        // Urls only containing query or anchor
        if ($url[0] == '#' || $url[0] == '?')
            return $base . $url;

        // Parse base URL and convert to local variables: $scheme, $host, $path
        extract(parse_url($base));

        // If no path, use /
        if (!isset($path))
            $path = '/';

        // Remove non-directory element from path
        $path = preg_replace('#/[^/]*$#', '', $path);

        // Destroy path if relative url points to root
        if ($url[0] == '/')
            $path = '';

        // Dirty absolute URL
        $abs = "$host$path/$url";

        // Replace '//' or '/./' or '/foo/../' with '/'
        $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
        for ($n = 1; $n > 0; $abs = preg_replace($re, '/', $abs, -1, $n)) {
            
        }

        // Absolute URL is ready!
        return $scheme . '://' . $abs;
    }

    public function get_image_link($url = NULL) {
        $this->layout = 'ajax';

        $request = curl_init();

        curl_setopt_array($request, array
            (
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HEADER => FALSE,
            CURLOPT_SSL_VERIFYPEER => TRUE,
            CURLOPT_CAINFO => 'cacert.pem',
            CURLOPT_FOLLOWLOCATION => TRUE,
            CURLOPT_MAXREDIRS => 10,
        ));



        $response = curl_exec($request);
        curl_close($request);
//print_r($response);

        $base = "http://127.0.0.1/betatoorkson/";

        $document = new DOMDocument();

//print_r($response);
        if ($response) {
            libxml_use_internal_errors(true);
            $document->loadHTML($response);
            libxml_clear_errors();
        }
//echo $document->saveXML();

        $images = array();

        foreach ($document->getElementsByTagName('img') as $img) {
            // Extract what we want
            $image = array
                (
                'src' => $this->make_absolute($img->getAttribute('src'), $base)
            );

            // Skip images without src
            if (!$image['src'])
                continue;

            // Add to collection. Use src as key to prevent duplicates.
            $images[$image['src']] = $image;
        }
        $images = array_values($images);

        foreach ($images as $image) {
            echo '<a href="' . $image['src'] . '"><img width="130px" src="' . $image['src'] . '"></a>';
        }
    }

    public function add_virtual_game() {
        $this->layout = 'ajax';
        $fileName = rand(100, 100000);
        $this->request->data['Game']['name'] = "SOntihOnHouse" . $fileName;
        $this->request->data['Game']['description'] = "this is a description";
        $this->request->data['Game']['user_id'] = $this->Auth->user('id');
        $this->request->data['Game']['link'] = "http://www.mil" . $fileName . "liyet.com";
        $this->request->data['Game']['picture'] = "nbrrr.png";
        //seourl begins
        $this->request->data['Game']['seo_url'] = strtolower(str_replace(' ', '-', $this->request->data['Game']['name']));
        //seourl ends
        $this->Game->create();
        $this->Game->validate = array();

        if ($this->Game->save($this->request->data)) {
            $this->Session->setFlash(__('You have successfully added a game to your channel.'));
        }
    }

    public function addgame_ajax($url = 'http://www.imdb.com') {
        $this->layout = 'ajax';
        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');


        if ($userid = $this->Session->read('Auth.User.id')) {
            $basic_info = $this->get_meta($url);
            echo $basic_info['title'] . '<br>';
            echo $basic_info['description'];

            if (empty($basic_info['title']))
                $basic_info['title'] = 'Write A Title';
            if (empty($basic_info['description']))
                $basic_info['description'] = 'Write A Desc';
            //----------------------------
            //=============Get ScreenShot==================		
            $fileName = rand(100, 100000);

            $command = "xvfb-run --server-args='-screen 0, 1024x768x24' /usr/bin/wkhtmltopdf " . $url . " /home/ubuntu/test/" . $fileName . ".pdf";
            exec($command, $output, $ret);
            print_r($output);
            print_r($ret);
            $command2 = "convert /home/ubuntu/test/" . $fileName . ".pdf -append /home/ubuntu/test/" . $fileName . "_toorksize.png";
            exec($command2, $output2, $ret2);
            $command3 = "convert /home/ubuntu/test/" . $fileName . "_toorksize.png -quiet  -crop 640x350+30+30  +repage  /home/ubuntu/test/" . $fileName . "_toorksize.png";
            exec($command3, $output3, $ret3);


            //=============/Get ScreenShot=================		


            $this->request->data['Game']['name'] = $this->secureSuperGlobalPOST($basic_info['title']);
            $this->request->data['Game']['description'] = $this->secureSuperGlobalPOST($basic_info['description']);
            $this->request->data['Game']['user_id'] = $this->Auth->user('id');
            $this->request->data['Game']['link'] = $url;
            $this->request->data['Game']['picture'] = $fileName . ".png";
            //seourl begins
            $this->request->data['Game']['seo_url'] = strtolower(str_replace(' ', '-', $basic_info['title']));
            //seourl ends

            $this->Game->create();
            $this->Game->validate = array();

            if ($this->Game->save($this->request->data)) {
                $this->requestAction(array('controller' => 'userstats', 'action' => 'getgamecount', $userid));
                $this->Session->setFlash(__('You have successfully added a game to your channel.'));

                $id = $this->Game->getLastInsertId();
                $this->requestAction(array('controller' => 'wallentries', 'action' => 'action_ajax', $id, $userid));

                //================Throw to S3==================
                $this->Amazon->S3->create_object(
                        Configure::read('S3.name'), 'upload/games/' . $id . '/' . $fileName . '_toorksize.png', array(
                    'fileUpload' => "/home/ubuntu/test/" . $fileName . "_toorksize.png",
                    'acl' => AmazonS3::ACL_PUBLIC
                        )
                );
                //============/Throw to S3==========================
                //============Folder Formatting begins============
                $dir = new Folder("/home/ubuntu/test");
                $files = $dir->find('.*');
                foreach ($files as $file) {
                    $file = new File($dir->pwd() . DS . $file);
                    $file->delete();
                    $file->close();
                }
                //============/Folder Formatting ends============	


                $this->redirect(array('action' => 'mygames'));
            } else {
                $validationErrors = $this->Game->invalidFields();
                $value = key($validationErrors);
                $this->Session->setFlash($validationErrors[$value][0]);
                echo $validationErrors[$value][0];
            }

            //----------------------------
        }
        /*
          if ($ret) {
          die;
          }
         */
    }

    public function getscreen($url, $name) {
        $this->layout = 'ajax';

        if (!isset($url) || !isset($name))
            break;


        $command = "xvfb-run --server-args='-screen 0, 1024x768x24' /usr/bin/wkhtmltopdf " . $url . " /home/ubuntu/test/" . $name . ".pdf";
        exec($command, $output, $ret);
        print_r($output);
        print_r($ret);
        $command2 = "convert /home/ubuntu/test/" . $name . ".pdf -append /home/ubuntu/test/" . $name . ".png";
        exec($command2, $output2, $ret2);
        $command3 = "convert /home/ubuntu/test/" . $name . ".png -quiet  -crop 400x220+30+30  +repage  /home/ubuntu/test/" . $name . ".png";
        exec($command3, $output3, $ret3);
        if ($ret) {
            die;
        }
    }

    public function get_meta($url = NULL) {
        //Get Meta tags
        $tags = get_meta_tags($url);
        //print_r($tags);
        //Get title
        preg_match("/<title>(.+)<\/title>/siU", file_get_contents($url), $matches);
        $title = $matches[1];
        $basic_info = array('title' => $title, 'description' => $tags['description']);
        return $basic_info;
    }

    public function add2() {

        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');
        $this->layout = 'dashboard';
        $this->headerlogin();
        $userid = $this->Session->read('Auth.User.id');

        $limit = 12;
        $cond = $this->Game->find('all', array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid), 'limit' => $limit, 'order' => array('Game.recommend' => 'desc'
        )));
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
        $isActive = $user['User']['active'];
        if ($this->request->is('post')) {


            //Replace Name of Picture Begins
            $ext = "." . $this->getExtension($this->request->data["Game"]["picture"]["name"]);
            $this->request->data["Game"]["picture"]["name"] = "toork_" . $this->request->data['Game']['name'] . $ext;
            //Replace Name of Picture Ends

            $this->request->data['Game']['name'] = $this->secureSuperGlobalPOST($this->request->data['Game']['name']);
            $this->request->data['Game']['description'] = $this->secureSuperGlobalPOST($this->request->data['Game']['description']);

            $this->request->data['Game']['user_id'] = $this->Auth->user('id');


            //seourl begins
            $this->request->data['Game']['seo_url'] = strtolower(str_replace(' ', '-', $this->request->data['Game']['name']));
            //seourl ends

            $this->Game->create();


            if ($this->Game->save($this->request->data)) {
                $this->requestAction(array('controller' => 'userstats', 'action' => 'getgamecount', $userid));
                $this->Session->setFlash(__('You have successfully added a game to your channel.'));

                $id = $this->Game->getLastInsertId();
                $this->requestAction(array('controller' => 'wallentries', 'action' => 'action_ajax', $id, $userid));

                //Upload to aws begins
                $dir = new Folder(WWW_ROOT . "/upload/games/" . $id);
                $files = $dir->find('.*');
                foreach ($files as $file) {
                    $file = new File($dir->pwd() . DS . $file);
                    $info = $file->info();
                    $basename = $info["basename"];
                    $dirname = $info["dirname"];
                    //echo $file;
                    $this->Amazon->S3->create_object(
                            Configure::read('S3.name'), 'upload/games/' . $id . "/" . $basename, array(
                        'fileUpload' => WWW_ROOT . "/upload/games/" . $id . "/" . $basename,
                        'acl' => AmazonS3::ACL_PUBLIC
                            )
                    );
                }
                //Upload to aws ends




                $this->redirect(array('action' => 'mygames'));
            } else {
                $validationErrors = $this->Game->invalidFields();
                $value = key($validationErrors);
                $this->Session->setFlash($validationErrors[$value][0]);
            }
        }

        $this->set('mygames', $cond);
        $this->set('limit', $limit);
        $users = $this->Game->User->find('list');
        $categories = $this->Game->Category->find('list');
        $this->set(compact('users2', 'categories'));
        $this->set('user', $user);
        $this->set('isActive', $isActive);
        $this->set('title_for_layout', 'Add New Game');
        $this->set('description_for_layout', 'You are able to add a new game');
        $this->set_suggested_channels();
    }

    public function add3() {

        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');
        $this->layout = 'dashboard';
        $this->headerlogin();

        $userid = $this->Session->read('Auth.User.id');

        $limit = 12;
        $cond = $this->Game->find('all', array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid), 'limit' => $limit, 'order' => array('Game.recommend' => 'desc'
        )));
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));


        $clone = 0;
        $this->set("clone", $clone);

        $isActive = $user['User']['active'];

        if ($this->request->is('post') || $this->request->is('put')) {

            $this->request->data['Game']['name'] = substr($this->secureSuperGlobalPOST($this->request->data['Game']['name']), 0, 25);
            $this->request->data['Game']['description'] = $this->secureSuperGlobalPOST($this->request->data['Game']['description']);

            //$this->request->data['Game']['link']=$this->http_check($this->request->data['Game']['link']);


            $ext_image = $this->request->data["Game"]["external_image"];
            if ($ext_image != "") {
                //if there is an external image from link.
            }


            $myval = $this->request->data["Game"]["edit_picture"]["name"];

            if ($myval != "") {
                /*
                  //Folder Formatting begins
                  $dir = new Folder(WWW_ROOT ."/upload/games/".$id);
                  $files = $dir->find('.*');
                  foreach ($files as $file) {
                  $file = new File($dir->pwd() . DS . $file);
                  $file->delete();
                  $file->close();
                  }
                  //Folder Formatting ends
                 */

                $this->request->data["Game"]["picture"] = $this->request->data["Game"]["edit_picture"];


                //Replace Name of Picture Begins
                $ext = "." . $this->getExtension($this->request->data["Game"]["picture"]["name"]);
                $this->request->data["Game"]["picture"]["name"] = "toork_" . $this->request->data['Game']['name'] . $ext;
                //Replace Name of Picture Ends
            }


            //seourl begins
            $this->request->data['Game']['seo_url'] = $this->Game->checkDuplicateSeoUrl($this->request->data['Game']['name']);
            //seourl ends
            //*********************
            //Secure data filtering
            //*********************
            $filtered_data = array('Game' => array(
                    'name' => $this->request->data['Game']['name'],
                    'description' => $this->request->data['Game']['description'],
                    'category_id' => $this->request->data['Game']['category_id'],
                    'user_id' => $userid,
                    'seo_url' => $this->request->data['Game']['seo_url']));
            //if game is not clone,submits link & embed datas otherwise not!
            if (!$clone) {
                $filtered_data['Game']['link'] = $this->request->data['Game']['link'];
                $filtered_data['Game']['embed'] = $this->request->data['Game']['embed'];
            }
            //if new image exists,submit,otherwise not!
            if ($myval != "") {
                $filtered_data['Game']['picture'] = $this->request->data["Game"]["picture"];
            }

            if ($this->Game->save($filtered_data)) {
                $this->requestAction(array('controller' => 'userstats', 'action' => 'getgamecount', $userid));
                $this->Session->setFlash(__('You have successfully added a game to your channel.'));
                $id = $this->Game->getLastInsertId();
                $this->requestAction(array('controller' => 'wallentries', 'action' => 'action_ajax', $id, $userid));

                //Settings of external image	
                $external_img = $this->request->data["Game"]["external_image"];
                if ($external_img != "" && $myval == "") {//beginning of external condition	
                    //-----Download Facebook Image-----
                    $randomimageid = rand(100000, 99999999);
                    $this->Game->query('UPDATE games SET picture="' . $randomimageid . '.png" WHERE id=' . $id . ';');
                    $url = $external_img;
                    $img = '/home/ubuntu/test/' . $randomimageid . '_toorksize.png';
                    file_put_contents($img, file_get_contents($url));
                    //-----/Download Facebook Image-----
                    $ret4 = $this->crop_game_image2($randomimageid . '_toorksize.png', 0);
                    //================Throw to S3==================
                    $this->Amazon->S3->create_object(
                            Configure::read('S3.name'), 'upload/games/' . $id . '/' . $randomimageid . '_toorksize.png', array(
                        'fileUpload' => "/home/ubuntu/test/" . $randomimageid . "_toorksize.png",
                        'acl' => AmazonS3::ACL_PUBLIC
                            )
                    );
                    //============/Throw to S3==========================
                } else {//else for external condition	
                    //Upload to aws begins
                    $dir = new Folder(WWW_ROOT . "/upload/games/" . $id);
                    $files = $dir->find('.*');
                    foreach ($files as $file) {
                        $file = new File($dir->pwd() . DS . $file);
                        $info = $file->info();
                        $basename = $info["basename"];
                        if (strpos($basename, "toorksize") != false) {
                            echo $basename;
                            $ret3 = $this->crop_game_image($basename, $id);
                        }
                        $dirname = $info["dirname"];
                        //echo $file;
                        $this->Amazon->S3->create_object(
                                Configure::read('S3.name'), 'upload/games/' . $id . "/" . $basename, array(
                            'fileUpload' => WWW_ROOT . "/upload/games/" . $id . "/" . $basename,
                            'acl' => AmazonS3::ACL_PUBLIC
                                )
                        );
                    }
                    //Upload to aws ends
                }//end of external condition	
                //if ($ret3) {
                //die;
                //}

                $this->redirect(array('action' => 'mygames'));
            } else {
                $validationErrors = $this->Game->invalidFields();
                $value = key($validationErrors);
                $this->Session->setFlash($validationErrors[$value][0]);
            }
        }

        $this->set('mygames', $cond);
        $this->set('limit', $limit);
        $users = $this->Game->User->find('list');
        $categories = $this->Game->Category->find('list');
        $this->set(compact('users2', 'categories'));
        $this->set('user', $user);
        $this->set('isActive', $isActive);
        $this->set('title_for_layout', 'Add New Game');
        $this->set('description_for_layout', 'You are able to add a new game');
        $this->set_suggested_channels();
    }

//====Yeni sisteme ait edit game fonksiyonu=====
    public function edit2($id = null) {
        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');

        $this->layout = 'dashboard';
        $this->headerlogin();
        $userid = $this->Session->read('Auth.User.id');
        $limit = 12;
        $cond = $this->Game->find('all', array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid), 'limit' => $limit, 'order' => array('Game.recommend' => 'desc'
        )));


        $this->Game->id = $id;
        $clone = $this->Game->field('clone');
        $this->set('clone', $clone);

        $game = $this->Game->find('first', array('conditions' => array('Game.id' => $id)));
        $this->set("game", $game);
        if (!$this->Game->exists()) {
            throw new NotFoundException(__('Invalid game'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            $this->request->data['Game']['name'] = substr($this->secureSuperGlobalPOST($this->request->data['Game']['name']), 0, 25);
            $this->request->data['Game']['description'] = $this->secureSuperGlobalPOST($this->request->data['Game']['description']);

            //$this->request->data['Game']['link']=$this->http_check($this->request->data['Game']['link']);

            $myval = $this->request->data["Game"]["edit_picture"]["name"];

            if ($myval != "") {
                /*
                  //Folder Formatting begins
                  $dir = new Folder(WWW_ROOT ."/upload/games/".$id);
                  $files = $dir->find('.*');
                  foreach ($files as $file) {
                  $file = new File($dir->pwd() . DS . $file);
                  $file->delete();
                  $file->close();
                  }
                  //Folder Formatting ends
                 */

                $this->request->data["Game"]["picture"] = $this->request->data["Game"]["edit_picture"];


                //Replace Name of Picture Begins
                $ext = "." . $this->getExtension($this->request->data["Game"]["picture"]["name"]);
                $this->request->data["Game"]["picture"]["name"] = "toork_" . $this->request->data['Game']['name'] . $ext;
                //Replace Name of Picture Ends
            }


            //seourl begins
            $this->request->data['Game']['seo_url'] = $this->Game->checkDuplicateSeoUrl($this->request->data['Game']['name']);
            //seourl ends
            //*********************
            //Secure data filtering
            //*********************
            $filtered_data = array('Game' => array(
                    'name' => $this->request->data['Game']['name'],
                    'description' => $this->request->data['Game']['description'],
                    'category_id' => $this->request->data['Game']['category_id'],
                    'seo_url' => $this->request->data['Game']['seo_url']));
            //if game is not clone,submits link & embed datas otherwise not!
            if (!$clone) {
                $filtered_data['Game']['link'] = $this->request->data['Game']['link'];
                $filtered_data['Game']['embed'] = $this->request->data['Game']['embed'];
            }
            //if new image exists,submit,otherwise not!
            if ($myval != "") {
                $filtered_data['Game']['picture'] = $this->request->data["Game"]["picture"];
            }

            if ($this->Game->save($filtered_data)) {
                $this->Session->setFlash('You have successfully updated your game.');



                //Upload to aws begins
                $dir = new Folder(WWW_ROOT . "/upload/games/" . $id);
                $files = $dir->find('.*');
                foreach ($files as $file) {
                    $file = new File($dir->pwd() . DS . $file);
                    $info = $file->info();
                    $basename = $info["basename"];
                    if (strpos($basename, "toorksize") != false) {
                        echo $basename;
                        $ret3 = $this->crop_game_image($basename, $id);
                    }
                    $dirname = $info["dirname"];
                    //echo $file;
                    $this->Amazon->S3->create_object(
                            Configure::read('S3.name'), 'upload/games/' . $id . "/" . $basename, array(
                        'fileUpload' => WWW_ROOT . "/upload/games/" . $id . "/" . $basename,
                        'acl' => AmazonS3::ACL_PUBLIC
                            )
                    );
                }
                //Upload to aws ends
                //if ($ret3) {
                //die;
                //}

                $this->redirect(array('action' => 'mygames'));
            } else {
                $validationErrors = $this->Game->invalidFields();
                $value = key($validationErrors);
                $this->Session->setFlash($validationErrors[$value][0]);
            }
        } else {
            $this->request->data = $this->Game->read(null, $id);
        }

        $this->set('mygames', $cond);
        $this->set('limit', $limit);
        $this->set('id', $id);
        $users = $this->Game->User->find('list');
        $categories = $this->Game->Category->find('list');
        $this->set(compact('users2', 'categories'));

        $this->set('title_for_layout', 'Edit Your Game');
        $this->set('description_for_layout', 'You are able to edit your game');
        $this->set_suggested_channels();
    }

    public function crop_game_image($game_name, $id) {

        $command3 = "mkdir /home/ubuntu/test/" . $id . " && convert /var/www/betatoork/app/webroot/upload/games/" . $id . "/" . $game_name . " -quiet  -crop 200x110+30+30  +repage  /home/ubuntu/test/" . $id . "/" . $game_name . "";
        exec($command3, $output3, $ret3);
//print_r($output3);print_r($ret3);

        return $ret3;
    }

    public function crop_game_image2($game_name, $id) {

        $command3 = "convert /home/ubuntu/test/" . $game_name . " -resize 200x110!  /home/ubuntu/test/" . $game_name . "";
        exec($command3, $output3, $ret3);
//print_r($output3);print_r($ret3);

        return $ret3;
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->Game->id = $id;
        $userid = $this->Game->field('user_id');
        if (!$this->Game->exists()) {
            throw new NotFoundException(__('Invalid game'));
        }
        if ($this->Game->delete()) {
            $this->Session->setFlash(__('You have deleted your game successfully, That game will no longer be visible'));
            $this->requestAction(array('controller' => 'userstats', 'action' => 'getgamecount', $userid));
            $this->redirect(array('action' => 'mygames'));
        }
        $this->Session->setFlash(__('Your game was not deleted'));
        $this->redirect(array('action' => 'mygames'));
    }

    public function deleteS3Image($id = NULL) {

        //remove objects from S3
        $prefix = 'upload/games/' . $id . '/';
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
    }

    /*     * ************************************
     * delete method with toork remote api
     * ************************************ */

    public function gamedelete($id = null) {
        $this->layout = 'ajax';
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->Game->id = $id;
        $userid = $this->Game->field('user_id');
        if (!$this->Game->exists()) {
            //throw new NotFoundException(__('Invalid game'));
            echo 0;
            break;
        }
        if ($this->Game->delete()) {
            echo 1;
            $this->Game->query('DELETE FROM messages WHERE uid_fk=' . $userid . ' AND game_id=' . $id . '');
            $this->requestAction(array('controller' => 'userstats', 'action' => 'getgamecount', $userid));
            $this->deleteS3Image($id);
        } else {
            echo 0;
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Game->recursive = 0;
        $this->set('games', $this->paginate());
    }

    public function gameedit() {
        $this->layout = 'adminTry';
        if ($this->request->isPost()) {
            //i�

            $this->Game->id = $this->request->data["Game"]["id"];
            $id = $this->request->data["Game"]["id"];
            if (!$this->Game->exists()) {
                throw new NotFoundException(__('Invalid game'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Game->save($this->request->data)) {

                    if ($this->request->data["Game"]["affect"] == 1) {
                        $value = $this->request->data["Game"]["active"];
                        $this->affected($id, $value);
                    } else {
                        $this->Session->setFlash(__('The user has been updated'));
                    }


                    $this->redirect(array('action' => 'gameedit'));
                } else {
                    $this->Session->setFlash(__('The game could not be saved. Please, try again.'));
                }
            } else {
                $this->request->data = $this->User->read(null, $id);
            }

            //dis
        }


        $this->Game->recursive = 0;
        $this->set('games', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Game->id = $id;
        if (!$this->Game->exists()) {
            throw new NotFoundException(__('Invalid game'));
        }
        $this->set('game', $this->Game->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Game->create();
            if ($this->Game->save($this->request->data)) {
                $this->Session->setFlash(__('The game has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The game could not be saved. Please, try again.'));
            }
        }
        $users = $this->Game->User->find('list');
        $categories = $this->Game->Category->find('list');
        $this->set(compact('users', 'categories'));
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Game->id = $id;
        if (!$this->Game->exists()) {
            throw new NotFoundException(__('Invalid game'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Game->save($this->request->data)) {
                $this->Session->setFlash(__('The game has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The game could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Game->read(null, $id);
        }
        $users = $this->Game->User->find('list');
        $categories = $this->Game->Category->find('list');
        $this->set(compact('users', 'categories'));
    }

    /**
     * admin_delete method
     *
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Game->id = $id;
        if (!$this->Game->exists()) {
            throw new NotFoundException(__('Invalid game'));
        }
        if ($this->Game->delete()) {
            $this->Session->setFlash(__('Game deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Game was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Check Game Clone For User
     * @param integer $userid
     * @param integer $gameid
     * @author Emircan Ok
     */
    public function checkClone($userid, $gameid) {
        if ($this->Auth->user('id')) {
            $result = $this->Cloneship->find('count', array(
                'conditions' => array(
                    'Cloneship.game_id' => $gameid,
                    'Cloneship.user_id' => $userid,
                )
            ));
            if ($result > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Get 3 random game for one user
     * @param integer $userid
     * @return array
     * @author Emircan Ok
     */
    public function random_3_game($userid) {
        $result = $this->Game->find('all', array(
            'fields' => array(
                'Game.id',
                'Game.name',
                'Game.picture',
                'Game.seo_url'
            ),
            'conditions' => array(
                'Game.user_id' => $userid,
            ),
            'limit' => 3,
            'order' => 'rand()'
        ));
        return $result;
    }

}
