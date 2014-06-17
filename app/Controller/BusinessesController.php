<?php

App::uses('AppController', 'Controller');

/**
 * Business Controller
 *
 * @property Business $Game
 */
class BusinessesController extends AppController {

    public $name = 'Businesses';
    var $uses = array('Businesses', 'Game', 'User', 'Favorite', 'Subscription', 'Playcount', 'Rate', 'Userstat', 'Gamestat', 'Category', 'Activity', 'Cloneship', 'CakeEmail', 'Network/Email', 'Adsetting', 'Adcode');
    public $helpers = array('Html', 'Form', 'Upload', 'Recaptcha.Recaptcha', 'Time');
    public $components = array('Amazonsdk.Amazon', 'Recaptcha.Recaptcha', 'Common');

    //=====Kullanici sisteme login ise=======
    public function isAuthorized($user) {
        if (parent::isAuthorized($user)) {
            return true;
        }

        //permissons for logged in users
        if (in_array($this->action, array('startup', 'dashboard','mygames','favorites','exploregames','settings','channel_settings','following','followers','explorechannels','activities','app_status','steps2launch','ads_management','notifications','add_ads','game_add','mygames_search','exploregames_search','following_search','followers_search','mygames_search','favorites_search','explorechannels_search'))) {
           return true;
        }


        //Edit yaparken duzenle
        if (in_array($this->action, array('edit2', 'delete'))) {
            $gameId = $this->request->params['pass'][0];
            return $this->Game->isOwnedBy($gameId, $user['id']);
        }

        return false;
    }
    
    public function beforeFilter() {
      $this->noprefixdomain();
    }    

    public function afterFilter() {
        
    }

    /*     * ****************************************************************************** */
    /*     * ****************************************************************************** */
    /*     * *************          GLOBAL FUNTIONS          ****************************** */
    /*     * ****************************************************************************** */
    /*     * ****************************************************************************** */

    /**
     * checkUser method
     *
     * @param user Id
     * @return 1=>true or 0=>false
     */
    public function checkUser($userid) {
        if ($this->User->find('first', array('conditions' => array('User.id' => $userid)))) {
            return 0;
        } else {
            return 1;
        }
    }

    /**
     * Update Form Request method
     *
     * @param Request => array()
     * @return success=>"Message" or Error=>id
     */
    public function updateData() {
        if (isset($this->request->data['attr']) && $this->Auth->user('id')) {
            $attr = $this->request->data['attr'];
            $user_id = $this->Auth->user('id');
            if ($attr == "profile_update") {
                $gender = $this->request->data['gender'];
                $time = $this->request->data['time'];
                $cont = $this->request->data['cont'];

                $this->User->query('UPDATE users SET gender="' . $gender . '", birth_date="' . $time . '", country_id="' . $cont . '" WHERE id=' . $user_id);
                $this->set('success', "Profile Settings Updated.");
                $this->set('_serialize', array('success'));
            } elseif ($attr == "notification_update") {
                if ($this->request->is('post')) {
                    $permids = $this->request->data['permdata'];
                    $this->User->Query('DELETE FROM mailpermissions WHERE user_id=' . $user_id . '');
                    foreach ($permids as $permid) {
                        $this->User->Query('INSERT INTO mailpermissions (user_id,type_id) VALUES (' . $user_id . ',' . $permid . ')');
                    }
                    $this->set('success', "Notifications Updated.");
                    $this->set('_serialize', array('success'));
                }
            } elseif ($attr == "channel_update") {
                $title = $this->request->data['title'];
                $desc = $this->request->data['desc'];
                $bgColor = $this->request->data['bgColor'];
                $analitics = $this->request->data['analitics'];

                $this->User->query('UPDATE users SET screenname="' . $title . '", description="' . $desc . '", bg_color="' . $bgColor . '", analitics="' . $analitics . '" WHERE id=' . $user_id);
                $this->set('success', "Channel Settings Updated.");
                $this->set('_serialize', array('success'));
            } elseif ($attr == "edit_ads") {
                $filtered_data['Adcode']['name'] = $this->request->data['title'];
                $filtered_data['Adcode']['code'] = $this->request->data['desc'];
                $this->Adcode->id = $this->request->data['ad_id'];
                $this->Adcode->save($filtered_data);


                $category = json_decode($this->request->data['category'], true);
                $cat_del = array('home_banner_top', 'home_banner_middle', 'home_banner_bottom', 'game_banner_top', 'game_banner_bottom');
                //Düzenlenicek
                for ($i = 0; $i <= count($cat_del) - 1; $i++) {
                    $this->User->Query('UPDATE adsettings SET ' . $cat_del[$i] . '="NULL" WHERE user_id=' . $user_id . ' AND ' . $cat_del[$i] . '=' . $this->request->data["ad_id"]);
                }

                if (count($category) > 0) {
                    foreach ($category as $value) {
                        $filtered_data['Adsetting'][$value] = $this->request->data['ad_id'];
                        $id = $this->Adsetting->find('first', array('contain' => false, 'conditions' => array('Adsetting.user_id' => $user_id), 'fields' => array('Adsetting.id')));
                        $this->Adsetting->id = $id;
                        $this->Adsetting->save($filtered_data);
                    }
                }

                $this->set('success', "Ads Settings Updated.");
                $this->set('_serialize', array('success'));
            } else {
                
            }
        } else {
            $id = 1;
            $this->set('error', $id);
            $this->set('_serialize', array('error'));
        }
    }

    /**
     * New Form Request method
     *
     * @param Request => array()
     * @return success=>"Message" or Error=>id
     */
    public function newData() {
        if (isset($this->request->data['attr']) && $this->Auth->user('id')) {
            $attr = $this->request->data['attr'];
            $user_id = $this->Auth->user('id');
            if ($attr == "new_ads") {
                $filtered_data['Adcode']['name'] = $this->request->data['title'];
                $filtered_data['Adcode']['code'] = $this->request->data['desc'];
                $filtered_data['Adcode']['user_id'] = $user_id;
                $this->Adcode->save($filtered_data);

                $category = $this->request->data['category'];
                if ($category != '0') {

                    $filtered_data['Adsetting'][$category] = $this->Adcode->getLastInsertID();
                    $id = $this->Adsetting->find('first', array('contain' => false, 'conditions' => array('Adsetting.user_id' => $user_id), 'fields' => array('Adsetting.id')));
                    $this->Adsetting->id = $id;
                    $this->Adsetting->save($filtered_data);
                }
                $this->set('success', "Ads Code Added");
                $this->set('_serialize', array('success'));
			}
			elseif($attr == "game_add"){
                $filtered_data['Game']['name'] = $this->request->data['name'];
                $filtered_data['Game']['description'] = $this->request->data['desc'];
                $filtered_data['Game']['link'] = $this->request->data['link'];
                $filtered_data['Game']['width'] = $this->request->data['width'];
                $filtered_data['Game']['height'] = $this->request->data['height'];
				$filtered_data['Game']['category_id'] = $this->request->data['category'];
                $filtered_data['Game']['fullscreen'] = $this->request->data['fullscreen']=='on'?1:0;
				$filtered_data['Game']['mobileready'] = $this->request->data['mobile']=='on'?1:0;
				$filtered_data['Game']['user_id'] = $user_id;
				$filtered_data['Game']['created'] = date('Y-m-d H:i:s');
				$filtered_data['Game']['owner_id'] = $user_id;
				$filtered_data['Game']['seo_url'] = strtolower(str_replace(' ', '-', $this->request->data['name']));
			//	$filtered_data['Game']['picture'] = $this->request->data['picture'];

				//print_r($filtered_data);
				if($this->Game->save($filtered_data))
				{
				$this->set('success', "Game Added");
                $this->set('_serialize', array('success'));
				}
				
			}
			else{
            $id = 1;
            $this->set('error', $id);
            $this->set('_serialize', array('error'));
			}
			
			
			

		} else {

            $id = 1;
            $this->set('error', $id);
            $this->set('_serialize', array('error'));
        }
    }

    /**
     * Delete Form Request method
     *
     * @param Request => array()
     * @return success=>"Message" or Error=>id
     */
    public function deleteData() {
        if (isset($this->request->data['attr']) && $this->Auth->user('id')) {
            $attr = $this->request->data['attr'];
            $user_id = $this->Auth->user('id');
            if ($attr == "edit_ads") {
                $id = $this->request->data['id'];
                $this->Adcode->query('DELETE FROM adcodes WHERE id=' . $id . ' AND user_id=' . $user_id);
                $this->set('success', "Ads Code Deleted");
                $this->set('_serialize', array('success'));
            }elseif($attr == "edit_game"){
                $id = $this->request->data['id'];
                $this->Adcode->query('DELETE FROM games WHERE id=' . $id . ' AND user_id=' . $user_id);
                $this->set('success', "Game Deleted");
                $this->set('_serialize', array('success'));          	
            }
        }
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

    /**
     * Logout method
     *
     * @param 
     * @return Logout
     */
    public function logout() {
        $userid = $this->Session->read('Auth.User.id');
        $this->Cookie->delete('User');
        $this->Session->destroy();
        $this->redirect(array('controller' => 'businesses', 'action' => 'mysite', $userid));
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

    /**
     * Check Kontrol method
     *
     * @param $table => table name, $authUser => Logined User, $gameId => Check Game id
     * @return array table
     */
    public function checkControl($Table, $AuthUser, $GameId) {
        return $this->Game->query('SELECT id FROM ' . $Table . ' WHERE user_id=' . $AuthUser . ' AND game_id=' . $GameId);
    }

    public function contactmail($user_id) {
        $this->User->id = $user_id;
        $user = $this->User->find('first', array('conditions' => array('User.id' => $user_id)));
        if ($user === false) {
            $this->Session->setFlash('This mail is not registered.');
            debug(__METHOD__ . " failed to retrieve User data for user.id: {$user_id}");
            return false;
        }
        $email = new CakeEmail();
        // Set data for the "view" of the Email
        $email->viewVars(array(
            'username' => $user['User']['username'],
            'name' => $this->request->data["firstname"],
            'surname' => $this->request->data["lastname"],
            'e-mail' => $this->request->data["email"],
            'subject' => $this->request->data["subject"],
            'message' => $this->request->data["comment"])
        );
        $email->config('smtp')
                ->template('business/contact') //I'm assuming these were created
                ->emailFormat('html')
                ->to($user["User"]["email"])
                ->from(array('no-reply@clone.gs' => 'Clone'))
                ->subject($subject)
                ->send();
    }

    public function headerlogin() {
        $userid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
        $userName = $user['User']['username'];

        $this->set('user', $user);
        $this->set('username', $userName);
    }

    /*     * ****************************************************************************** */
    /*     * ****************************************************************************** */
    /*     * *************         DASHBOARD SECTION         ****************************** */
    /*     * ****************************************************************************** */
    /*     * ****************************************************************************** */

    /**
     * Side Bar method
     *
     * @param 
     * @return array() $user
     */
    public function sideBar() {
        $userid = $this->Session->read('Auth.User.id');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*')));
        $this->set('user', $user);
    }

    /**
     * Dashboard method
     *
     * @param 
     * @return Dashboard Page
     */
    public function dashboard() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business Dashboard');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/index');
    }

    /**
     * Dummy startup wizard function
     * Cloned from dashboard method
     *
     * @param 
     * @return startup Page
     * @author Kazim Akgul
     */
    public function startup() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business Dashboard');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->noprefixdomain();
        $this->render('/Businesses/dashboard/startup');
    }

    /**
     * Game add method
     *
     * @param 
     * @return Game add Page
     */
    public function game_add() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
 		$categories = $this->Game->Category->find('list');
		$this->set(compact('categories'));
		$this->set('title_for_layout', 'Clone Business Game Add');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/game_add');
    }

    /**
     * Dummy tools and docs function
     * Cloned from app_status method
     *
     * @param 
     * @return toolsNdocs Page
     * @author Kazim Akgul
     */
    public function toolsNdocs() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business Dashboard');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/toolsNdocs');
    }

    /**
     * Dummy billing function
     * Cloned from toolsNdocs method
     *
     * @param 
     * @return billing Page
     * @author Kazim Akgul
     */
    public function billing() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business Billing');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/billing');
    }

    /**
     * Dummy pricing function
     * Cloned from toolsNdocs method
     *
     * @param 
     * @return pricing Page
     * @author Kazim Akgul
     */
    public function pricing() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business Pricing');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/pricing');
    }

    /**
     * Dummy tools and docs function
     * Cloned from app_status method
     *
     * @param 
     * @return steps2launch Page
     * @author Kazim Akgul
     */
    public function steps2launch() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business Dashboard');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/steps2launch');
    }

    /**
     * Dummy App_Status function
     * Cloned from dashboard method
     *
     * @param 
     * @return AppStatus Page
     * @author Kazim Akgul
     */
    public function app_status() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business App Status');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/app_status');
    }

    /**
     * Dummy Profile function
     * Cloned from dashboard method
     *
     * @param 
     * @return Dashboard Page
     * @author Kazim Akgul
     */
    public function profile() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business Profile');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/profile');
    }

    /**
     * Settings method
     *
     * @param 
     * @return Settings Page
     * @author Volkan Celiloğlu
     */
    public function settings() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $countries = $this->User->Country->find('list');
        $this->set(compact('countries'));
        $this->set('title_for_layout', 'Clone Business Settings');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/settings');
    }

    /** Ads Management method
     *
     * @param 
     * @return Ads Management Page
     * @author Volkan Celiloğlu
     */
    public function ads_management() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $userid = $this->Session->read('Auth.User.id');
        $this->get_ads_info($userid, $userid);
        $this->set('title_for_layout', 'Clone Business Add Management');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/ads_management');
    }

    /** Ads Add method
     *
     * @param 
     * @return Ads Add Page
     * @author Volkan Celiloğlu
     */
    public function add_ads() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $userid = $this->Session->read('Auth.User.id');
        $this->get_ads_info($userid, $userid);
        $this->set('title_for_layout', 'Clone Business Add ads');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/add_ads');
    }

    /**
     * Edit Ads Function
     *
     * @param ads id
     * @return ads edit page
     * @author Volkan Celiloğlu
     */
    public function edit_ads($id) {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $userid = $this->Session->read('Auth.User.id');
        $adcodes = $this->Adcode->find('first', array('conditions' => array('Adcode.id' => $id), 'contain' => false));
        $adsetting = $this->Adsetting->find('first', array('conditions' => array('Adsetting.user_id' => $userid), 'contain' => false, 'fields' => ('home_banner_top,home_banner_middle,home_banner_bottom,game_banner_top,game_banner_bottom')));

        $this->set('Ads', $adcodes);
        $this->set('Ads_set', $adsetting);
        $this->set('title_for_layout', 'Clone Business Edit Ads');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/edit_ads');
    }

    /** Notifications method
     *
     * @param 
     * @return Notifications Page
     * @author Volkan Celiloğlu
     */
    public function notifications() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $userid = $this->Session->read('Auth.User.id');
        //============Get Current Permissions=============
        $permissions = $this->User->query('SELECT * FROM mailpermissions WHERE user_id=' . $userid . '');
        if ($permissions) {
            $user_perms = array();
            foreach ($permissions as $permission) {
                array_push($user_perms, $permission['mailpermissions']['type_id']);
            }
            $this->set('user_perms', $user_perms);
        }
        //============/Get Current Permissions============

        $this->set('title_for_layout', 'Clone Business Notifications');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/notifications');
    }

    /** Channel_Settings method
     *
     * @param 
     * @return Channel_Settings Page
     * @author Volkan Celiloğlu
     */
    public function channel_settings() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $countries = $this->User->Country->find('list');
        $this->set(compact('countries'));
        $this->set('title_for_layout', 'Clone Business Channel Settings');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/channel_settings');
    }

    /*     * ****************************************************************************** */
    /*     * ****************************************************************************** */
    /*     * *************           MYSITE SECTION          ****************************** */
    /*     * ****************************************************************************** */
    /*     * ****************************************************************************** */

    public function mysite($userid = NULL) {
        $this->layout = 'Business/business';
        $authid = $this->Auth->user('id');

        if ($userid == NULL) {

            $subdomain = Configure::read('Domain.subdomain');
            $user_data = $this->User->find('first', array('contain' => false, 'conditions' => array('User.seo_username' => $subdomain), 'fields' => array('User.id')));
            $userid = $user_data['User']['id'];
        }

        //subdomain actions
        //http://stackoverflow.com/questions/5808441/routing-a-subdomain-in-cakephp-with-html-helper
        //echo 'sundimain:'.$this->request->host();
        //$http_host=$this->request->host();
        //echo 'wow:'.env("HTTP_HOST");
        //$subdomain = substr( env("HTTP_HOST"), 0, strpos(env("HTTP_HOST"), ".") );echo 'last domain:'.$subdomain;
        //This line gets user selected channel styles
        $this->get_style_settings($userid);

        //========Get Current Subscription===============
        if ($authid) {
            $subscribebefore = $this->Subscription->find("first", array("contain" => false, "conditions" => array("Subscription.subscriber_id" => $authid, "Subscription.subscriber_to_id" => $userid)));
            if ($subscribebefore != NULL) {
                $this->set('follow', 1);
            } else {
                $this->set('follow', 0);
            }
        } else {
            $this->set('follow', 0);
        }

        $PaginateLimit = 12;
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*')));
        $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid), 'limit' => $PaginateLimit, 'order' => array('Game.recommend' => 'desc'), 'contain' => array('Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone')))));
        $cond = $this->paginate('Game');
        $category = $this->Game->query('SELECT categories.id as id, categories.name FROM games join categories ON games.category_id = categories.id WHERE user_id=' . $userid . ' group by games.category_id');

        $this->get_ads_info($userid, $authid);

        $limit = 9;
        $this->set('top_rated_games', $this->Game->find('all', array('conditions' => array('Game.active' => '1'), 'limit' => $limit, 'order' => array('Game.recommend' => 'desc'))));
        $this->set('newgames', $this->Game->find('all', array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid), 'limit' => $PaginateLimit, 'order' => array('Game.id' => 'desc'), 'contain' => array('Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone'))))));
        $this->set('hotgames', $this->Game->find('all', array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid), 'limit' => $PaginateLimit, 'order' => array('Game.starsize' => 'desc'), 'contain' => array('Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone'))))));
        $this->set('category', $category);
        $this->set('games', $cond);
        $this->set('user', $user);

        $this->set('title_for_layout', $user['User']['username'] . ' Game Channel - Clone');
        $this->set('description_for_layout', 'Play games on ' . $user['User']['username'] . ' : ' . $user['User']['description'] );
        $this->set('author_for_layout', 'Clone');

        if ($this->checkUser($userid) == 1) {
            $this->render('/Businesses/404');
        }
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

    function get_ads_info($userid = NULL, $authid = NULL) {
        //======Getting ads datas======
        $addata = $this->Adsetting->find('all', array('contain' => array('homeBannerTop', 'homeBannerMiddle', 'homeBannerBottom'), 'conditions' => array('Adsetting.user_id' => $userid)));
        $this->set('addata', $addata);

        if ($authid == $userid) {
            //======Getting all ads codes======
            $adcodes = $this->Adcode->find('all', array('conditions' => array('Adcode.user_id' => $authid)));
            $this->set('adcodes', $adcodes);
            $this->set('channel_owner', 1);
        }
        if ($_GET['mode'] == 'visitor') {
            $this->set('channel_owner', 0);
        }
    }

    /**
     * Search method
     *
     * @param $userid =>user.id
     * @return Search Page
     */
    public function search2($userid) {
        $this->layout = 'Business/business';
        if ($this->request->is("GET") && isset($this->request->query['srch-term'])) {
            $param = $this->request->query['srch-term'];
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "mysite"));
        }

        //This line gets user selected channel styles
        $this->get_style_settings($userid);

        //========Get Current Subscription===============
        $authid = $this->Session->read('Auth.User.id');
        if ($authid) {
            $subscribebefore = $this->Subscription->find("first", array("contain" => false, "conditions" => array("Subscription.subscriber_id" => $authid, "Subscription.subscriber_to_id" => $userid)));
            if ($subscribebefore != NULL) {
                $this->set('follow', 1);
            } else {
                $this->set('follow', 0);
            }
        } else {
            $this->set('follow', 0);
        }
        $category = $this->Game->query('SELECT categories.id as id, categories.name FROM games join categories ON games.category_id = categories.id WHERE user_id=' . $userid . ' group by games.category_id');
        $this->paginate = array('Game' => array(
                'contain' => array('Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone'))),
                'limit' => 12,
                'order' => 'Game.id DESC',
                'conditions' => array(
                    'Game.active' => '1',
                    'Game.user_id' => $userid,
                    'OR' => array('Game.description LIKE' => '%' . $param . '%', 'Game.name LIKE' => '%' . $param . '%'),
        )));
        $PaginateLimit = 30;
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*')));
        $game = $this->Game->find('first', array('conditions' => array('Game.user_id' => $userid), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.picture')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone'))))); //Recoded
        $limit = 12;
        $cond = $this->paginate('Game');
        $this->set('title_for_layout', 'Clone - Game Search Engine');
        $this->set('description_for_layout', 'Clone - Game Search Engine powered by Google. Clone Search is specially designed for searching games');
        $this->set('searchVal', $param);
        $this->set('category', $category);
        $this->set('query', $cond);
        $this->set('game', $game);
        $this->set('user', $user);
    }

    /**
     * Play method
     *
     * @param $id =>game.id
     * @return Play Page
     */
    public function play($id = NULL) {


        if (!is_numeric($id)) {
            $subdomain = Configure::read('Domain.subdomain');
            $user = $this->User->find('first', array('conditions' => array('User.seo_username' => $subdomain), 'fields' => array('User.id', 'User.username'), 'contain' => false));
            $game = $this->Game->find('first', array('conditions' => array('Game.seo_url' => $id, 'Game.user_id' => $user['User']['id']), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.fb_link,User.twitter_link,User.gplus_link,User.website,User.picture'), 'conditions' => array('User.seo_username' => $subdomain)), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
        } else {
            $game = $this->Game->find('first', array('conditions' => array('Game.id' => $id), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.picture')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone'))))); //Recoded
            $user = $this->User->find('first', array('conditions' => array('User.id' => $game['Game']['user_id']), 'fields' => array('*')));
        }


        $this->layout = 'Business/business';
        if ($game['Game']['clone'] == 1) {
            $original = $this->User->find('first', array('conditions' => array('User.id' => $game['Game']['owner_id']), 'fields' => array('User.adcode'), 'contain' => false));
            $game['User']['adcode'] = $original['User']['adcode'];
        }
        //it is a game
        $limit = 10;
        $activityData = $this->Activity->find('all', array('contain' => array('PerformerUser' => array('fields' => array('PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username')), 'Game' => array('fields' => array('Game.id', 'Game.name', 'Game.seo_url', 'Game.embed')), 'ChannelUser' => array('fields' => array('ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username'))), 'fields' => array('Activity.id', 'Activity.performer_id', 'Activity.game_id', 'Activity.channel_id', 'Activity.msg_id', 'Activity.seen', 'Activity.notify', 'Activity.email', 'Activity.type', 'Activity.replied', 'Activity.created', 'PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username', 'ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username', 'Game.id', 'Game.name', 'Game.seo_url', 'Game.embed'), 'conditions' => array('Activity.game_id' => $game['Game']['id']), 'limit' => $limit, 'order' => 'Activity.created DESC'));
        $this->set('tagActivities', $activityData);

        //This line gets user selected channel styles
        $this->get_style_settings($game['User']['id']);

        $limit = 12;
        $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $game['Game']['user_id']), 'limit' => $limit, 'order' => array('Game.recommend' => 'desc')));
        $cond = $this->paginate('Game');
        $user_id = $this->Auth->user('id');
        $game_id = $game['Game']['id'];
        if ($user_id) {
            $this->set('auth_user', $user_id);
            $fav_check = $this->checkControl('favorites', $user_id, $game_id);
            $clone_check = $this->checkControl('cloneships', $user_id, $game_id);
        } else {
            $fav_check = NULL;
            $clone_check = NULL;
        }

        $authid = $this->Auth->user('id');
        $this->get_ads_info($game['Game']['user_id'], $authid);

        $this->set('ownuser', $fav_check);
        $this->set('ownclone', $clone_check);
        $this->set('games', $cond);
        $this->set('user', $user);
        $this->set('game', $game);
        $this->set('title_for_layout', $game['Game']['name'] . ' - ' . $game['User']['seo_username'] . ' - Clone');
        $this->set('description_for_layout', 'Play ' . $game['Game']['name'] . ' for free: ' . $game['Game']['description']);
        $this->set('author_for_layout', 'Clone');
        if ($game['Game']['embed'] == NULL) {
            $this->render('/Businesses/playframe');
        }
    }

    /**
     * Category method
     *
     * @param $userid =>user.id, $categoryid => category.id
     * @return Category Page
     */
    public function category($userid, $categoryid) {



        $this->layout = 'Business/business';
        $PaginateLimit = 12;
        //$user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*')));




        if (!is_numeric($userid)) {

            $category_name = $userid;
            $subdomain = Configure::read('Domain.subdomain');
            $user = $this->User->find('first', array('conditions' => array('User.seo_username' => $subdomain), 'fields' => array('*'), 'contain' => array('Userstat')));

            $cat_data = $this->Category->find('first', array('contain' => false, 'conditions' => array('Category.name' => $category_name), 'fields' => array('Category.id')));

            $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $user['User']['id'], 'Game.category_id' => $cat_data['Category']['id']), 'limit' => $PaginateLimit, 'order' => array('Game.recommend' => 'desc'), 'contain' => array('Category' => array('fields' => array('Category.name')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone')))));
            $userid = $user['User']['id'];
        } else {

            $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*'), 'contain' => array('Userstat')));
            $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid, 'Game.category_id' => $categoryid), 'limit' => $PaginateLimit, 'order' => array('Game.recommend' => 'desc'), 'contain' => array('Category' => array('fields' => array('Category.name')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone')))));
        }

        $cond = $this->paginate('Game');
        $category = $this->Game->query('SELECT categories.id as id, categories.name FROM games join categories ON games.category_id = categories.id WHERE user_id=' . $userid . ' group by games.category_id');

        //This line gets user selected channel styles
        $this->get_style_settings($userid);

        $authid = $this->Auth->user('id');
        $this->get_ads_info($userid, $authid);
        //========Get Current Subscription===============
        if ($authid) {
            $subscribebefore = $this->Subscription->find("first", array("contain" => false, "conditions" => array("Subscription.subscriber_id" => $authid, "Subscription.subscriber_to_id" => $userid)));
            if ($subscribebefore != NULL) {
                $this->set('follow', 1);
            } else {
                $this->set('follow', 0);
            }
        } else {
            $this->set('follow', 0);
        }
        //=======/Get Current Subscription===============

        $this->set('category', $category);
        $this->set('games', $cond);
        $this->set('user', $user);

        $this->set('title_for_layout', 'Clone Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    /**
     * Top Rated method
     *
     * @param $userid =>user.id
     * @return Top Rated Page
     */
    public function toprated($userid) {

        $this->layout = 'Business/business';
        $PaginateLimit = 12;

         //print_r($this->request->params);
         //Pagination with GET parameters
         //http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html#pagination-with-get-parameters

        if($this->request->params['named']['sort']==NULL)
        {
            $this->request->params['named']['sort']=$this->request->params['sort'];
            $this->request->params['named']['direction']=$this->request->params['direction'];
        }   

        if (!is_numeric($userid)) {
            $subdomain = Configure::read('Domain.subdomain');
            $user = $this->User->find('first', array('contain' => false, 'conditions' => array('User.seo_username' => $subdomain), 'fields' => array('*')));
            $userid = $user['User']['id'];
        } else {
            $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*')));
        }

        $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid), 'limit' => $PaginateLimit, 'order' => array('Game.recommend' => 'desc'), 'contain' => array('Category' => array('fields' => array('Category.name')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone')))));
        $cond = $this->paginate('Game');
        
        $category = $this->Game->query('SELECT categories.id as id, categories.name FROM games join categories ON games.category_id = categories.id WHERE user_id=' . $userid . ' group by games.category_id');

        //This line gets user selected channel styles
        $this->get_style_settings($userid);

        //========Get Current Subscription===============
        $authid = $this->Session->read('Auth.User.id');
        $this->get_ads_info($userid, $authid);
        if ($authid) {
            $subscribebefore = $this->Subscription->find("first", array("contain" => false, "conditions" => array("Subscription.subscriber_id" => $authid, "Subscription.subscriber_to_id" => $userid)));
            if ($subscribebefore != NULL) {
                $this->set('follow', 1);
            } else {
                $this->set('follow', 0);
            }
        } else {
            $this->set('follow', 0);
        }
        //=======/Get Current Subscription===============

        $this->set('category', $category);
        $this->set('games', $cond);
        $this->set('user', $user);

        $this->set('title_for_layout', 'Clone Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
    }

    /**
     * 
     * EMIRCAN
     * OK
     * 
     */
    public function mygames() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $userid = $this->Session->read('Auth.User.id');
        $limit = 16;
        $this->paginate = array(
            'Game' => array(
                'conditions' => array(
                    'Game.user_id' => $userid
                ),
                'fields' => array(
                    'Game.name',
                    'Game.seo_url',
                    'Game.id',
                    'Game.fullscreen',
                    'Game.picture',
                    'Game.starsize',
                    'Game.rate_count',
                    'Game.embed',
                    'Game.clone',
                    'Game.created',
                    'User.seo_username',
                    'Game.description',
                    'Gamestat.playcount',
                    'Gamestat.favcount',
                    'Gamestat.channelclone',
                    'Gamestat.potential'
                ),
                'limit' => $limit,
                'order' => array(
                    'Game.id' => 'DESC'
                )
            )
        );
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->set('title_for_layout', 'Clone Business My Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/mygames');
    }

    public function mygames_search() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        if ($this->request->is("GET") && isset($this->request->query['q'])) {
            $query = $this->request->query['q'];
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "mygames"));
        }
        $userid = $this->Session->read('Auth.User.id');
        $limit = 16;
        $this->paginate = array(
            'Game' => array(
                'conditions' => array(
                    'Game.user_id' => $userid,
                    'OR' => array(
                        'Game.description LIKE' => '%' . $query . '%',
                        'Game.name LIKE' => '%' . $query . '%'
                    )
                ),
                'fields' => array(
                    'Game.name',
                    'Game.seo_url',
                    'Game.id',
                    'Game.fullscreen',
                    'Game.picture',
                    'Game.starsize',
                    'Game.rate_count',
                    'Game.embed',
                    'Game.clone',
                    'Game.created',
                    'User.seo_username',
                    'Game.description',
                    'Gamestat.playcount',
                    'Gamestat.favcount',
                    'Gamestat.channelclone',
                    'Gamestat.potential'
                ),
                'limit' => $limit,
                'order' => array(
                    'Game.id' => 'DESC'
                )
            )
        );
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->set('title_for_layout', 'Clone Business My Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/mygames');
    }

    public function favorites() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $userid = $this->Session->read('Auth.User.id');
        $limit = 16;
        $this->paginate = array(
            'Favorite' => array(
                'conditions' => array(
                    'Favorite.active' => 1,
                    'Favorite.user_id' => $userid
                ),
                'limit' => $limit,
                'order' => array(
                    'Favorite.recommend' => 'desc'
                ),
                'contain' => array(
                    'Game' => array(
                        'fields' => array(
                            'Game.name',
                            'Game.seo_url',
                            'Game.id',
                            'Game.picture',
                            'Game.starsize',
                            'Game.embed'
                        ),
                        'User' => array(
                            'fields' => array(
                                'User.username',
                                'User.seo_username',
                                'User.id'
                            )
                        )
                    )
                )
            )
        );
        $cond = $this->paginate('Favorite');
        $this->set('games', $cond);
        $this->set('title_for_layout', 'Clone Business Favorites');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/favorites');
    }

    public function favorites_search() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        if ($this->request->is("GET") && isset($this->request->query['q'])) {
            $query = $this->request->query['q'];
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "favorites"));
        }
        $userid = $this->Session->read('Auth.User.id');
        $limit = 16;
        $this->paginate = array(
            'Favorite' => array(
                'conditions' => array(
                    'Favorite.active' => 1,
                    'Favorite.user_id' => $userid,
                    'OR' => array(
                        'Game.description LIKE' => '%' . $query . '%',
                        'Game.name LIKE' => '%' . $query . '%'
                    )
                ),
                'limit' => $limit,
                'order' => array(
                    'Favorite.recommend' => 'desc'
                ),
                'contain' => array(
                    'Game' => array(
                        'fields' => array(
                            'Game.name',
                            'Game.seo_url',
                            'Game.id',
                            'Game.picture',
                            'Game.starsize',
                            'Game.embed'
                        ),
                        'User' => array(
                            'fields' => array(
                                'User.username',
                                'User.seo_username',
                                'User.id'
                            )
                        )
                    )
                )
            )
        );
        $cond = $this->paginate('Favorite');
        $this->set('games', $cond);
        $this->set('title_for_layout', 'Clone Business Favorites');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/favorites');
    }

    public function exploregames() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $limit = 16;
        $this->paginate = array(
            'Game' => array(
                'fields' => array(
                    'Game.name',
                    'Game.seo_url',
                    'Game.id',
                    'Game.fullscreen',
                    'Game.picture',
                    'Game.starsize',
                    'Game.rate_count',
                    'Game.embed',
                    'Game.clone',
                    'Game.created',
                    'User.seo_username',
                    'Game.description',
                    'Gamestat.playcount',
                    'Gamestat.favcount',
                    'Gamestat.channelclone',
                    'Gamestat.potential',
                    'User.id',
                    'User.username',
                    'User.seo_username'
                ),
                'limit' => $limit,
                'order' => array(
                    'Game.id' => 'DESC'
                )
            )
        );
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->set('title_for_layout', 'Clone Business Explore Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/exploregames');
    }

    public function exploregames_search() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        if ($this->request->is("GET") && isset($this->request->query['q'])) {
            $query = $this->request->query['q'];
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "exploregames"));
        }
        $limit = 16;
        $this->paginate = array(
            'Game' => array(
                'fields' => array(
                    'Game.name',
                    'Game.seo_url',
                    'Game.id',
                    'Game.fullscreen',
                    'Game.picture',
                    'Game.starsize',
                    'Game.rate_count',
                    'Game.embed',
                    'Game.clone',
                    'Game.created',
                    'User.seo_username',
                    'Game.description',
                    'Gamestat.playcount',
                    'Gamestat.favcount',
                    'Gamestat.channelclone',
                    'Gamestat.potential',
                    'User.id',
                    'User.username',
                    'User.seo_username'
                ),
                'limit' => $limit,
                'order' => array(
                    'Game.id' => 'DESC'
                ),
                'conditions' => array(
                    'OR' => array(
                        'Game.description LIKE' => '%' . $query . '%',
                        'Game.name LIKE' => '%' . $query . '%'
                    )
                )
            )
        );
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->set('title_for_layout', 'Clone Business Explore Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/exploregames');
    }

    public function following() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $userid = $this->Session->read('Auth.User.id');
        $limit = 18;


        $this->Subscription->bindModel(
                array(
                    'belongsTo' => array(
                        'User' => array(
                            'className' => 'User',
                            'foreignKey' => 'subscriber_to_id'
                        )
                    )
                )
        );


        $this->paginate = array(
            'Subscription' => array(
                'conditions' => array(
                    'Subscription.subscriber_id' => $userid
                ),
                'contain' => array(
                    'User' => array(
                        'fields' => array(
                            'User.seo_username',
                            'User.username'
                        ), 'Userstat'
                    )
                ),
                'limit' => $limit
            )
        );
        $data = $this->paginate('Subscription');
        $this->set('following', $data);
        $this->set('title_for_layout', 'Clone Business Following');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/following');
    }

    public function following_search() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        if ($this->request->is("GET") && isset($this->request->query['q'])) {
            $query = $this->request->query['q'];
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "following"));
        }
        $userid = $this->Session->read('Auth.User.id');
        $limit = 18;

        //$this->Subscription->recursive=2;
        //$weird_datas=$this->Subscription->find('all');print_r($weird_datas);

        $this->Subscription->bindModel(
                array(
                    'belongsTo' => array(
                        'User' => array(
                            'className' => 'User',
                            'foreignKey' => 'subscriber_id'
                        )
                    )
                )
        );
        $this->paginate = array(
            'Subscription' => array(
                'conditions' => array(
                    'Subscription.subscriber_to_id' => $userid,
                    'User.username LIKE' => '%' . $query . '%'
                ),
                'contain' => array(
                    'User' => array(
                        'fields' => array(
                            'User.username',
                            'User.seo_username'
                        )
                    )
                ),
                'limit' => $limit
            )
        );
        $data = $this->paginate('Subscription');
        $this->set('following', $data);
        $this->set('title_for_layout', 'Clone Business Following');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/following');
    }

    public function followers() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $userid = $this->Session->read('Auth.User.id');
        $limit = 18;
        $this->Subscription->bindModel(
                array(
                    'belongsTo' => array(
                        'User' => array(
                            'className' => 'User',
                            'foreignKey' => 'subscriber_id'
                        )
                    )
                )
        );
        $this->paginate = array(
            'Subscription' => array(
                'conditions' => array(
                    'Subscription.subscriber_to_id' => $userid
                ),
                'contain' => array(
                    'User' => array(
                        'fields' => array(
                            'User.seo_username',
                            'User.username'
                        ), 'Userstat'
                    )
                ),
                'limit' => $limit
            )
        );
        $data = $this->paginate('Subscription');
        $this->set('followers', $data);
        $this->set('title_for_layout', 'Clone Business Followers');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/followers');
    }

    public function followers_search() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        if ($this->request->is("GET") && isset($this->request->query['q'])) {
            $query = $this->request->query['q'];
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "followers"));
        }
        $userid = $this->Session->read('Auth.User.id');
        $limit = 18;
        $this->Subscription->bindModel(
                array(
                    'belongsTo' => array(
                        'User' => array(
                            'className' => 'User',
                            'foreignKey' => 'subscriber_id'
                        )
                    )
                )
        );
        $this->paginate = array(
            'Subscription' => array(
                'conditions' => array(
                    'Subscription.subscriber_to_id' => $userid,
                    'User.username LIKE' => '%' . $query . '%'
                ),
                'contain' => array(
                    'User' => array(
                        'fields' => array(
                            'User.seo_username',
                            'User.username'
                        )
                    )
                ),
                'limit' => $limit
            )
        );
        $data = $this->paginate('Subscription');
        $this->set('followers', $data);
        $this->set('title_for_layout', 'Clone Business Followers');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/followers');
    }

    public function explorechannels() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $userid = $this->Session->read('Auth.User.id');
        $limit = 18;
        $this->paginate = array(
            'User' => array(
                'fields' => array(
                    'User.id',
                    'User.username',
                    'User.seo_username',
                    'User.picture'
                ),
                'contain' => array(
                    'Userstat' => array(
                        'fields' => array(
                            'Userstat.subscribe',
                            'Userstat.subscribeto',
                            'Userstat.uploadcount'
                        )
                    )
                ),
                'order' => array(
                    'User.id' => 'DESC'
                ),
                'limit' => $limit
            )
        );
        $data = $this->paginate('User');
        $this->set('following', $data);
        $this->set('title_for_layout', 'Clone Business Explore Channels');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/explorechannels');
    }

    public function explorechannels_search() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        if ($this->request->is("GET") && isset($this->request->query['q'])) {
            $query = $this->request->query['q'];
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "followers"));
        }
        $userid = $this->Session->read('Auth.User.id');
        $limit = 18;
        $this->paginate = array(
            'User' => array(
                'fields' => array(
                    'User.id',
                    'User.username',
                    'User.seo_username',
                    'User.picture'
                ),
                'contain' => array(
                    'Userstat' => array(
                        'fields' => array(
                            'Userstat.subscribe',
                            'Userstat.subscribeto',
                            'Userstat.uploadcount'
                        )
                    )
                ),
                'order' => array(
                    'User.id' => 'DESC'
                ),
                'limit' => $limit,
                'conditions' => array(
                    'User.username LIKE' => '%' . $query . '%'
                ),
            )
        );
        $data = $this->paginate('User');
        $this->set('following', $data);
        $this->set('title_for_layout', 'Clone Business Explore Channels');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/explorechannels');
    }

    /**
     * Dummy Latest Activity function
     * Cloned from profile method
     *
     * @param 
     * @return Activities Page
     * @author Kazim Akgul
     */
    public function activities() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business Dashboard');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');

        $userid = $this->Session->read('Auth.User.id');
        $limit = 18;
        $this->paginate = array(
            'Activity' => array(
                'contain' => array(
                    'PerformerUser' => array(
                        'fields' => array(
                            'PerformerUser.id',
                            'PerformerUser.username',
                            'PerformerUser.screenname',
                            'PerformerUser.seo_username'
                        )
                    ),
                    'Game' => array(
                        'fields' => array(
                            'Game.id',
                            'Game.name',
                            'Game.seo_url',
                            'Game.embed'
                        )
                    ),
                    'ChannelUser' => array(
                        'fields' => array(
                            'ChannelUser.id',
                            'ChannelUser.username',
                            'ChannelUser.seo_username'
                        )
                    )
                ),
                'fields' => array(
                    'Activity.id',
                    'Activity.performer_id',
                    'Activity.game_id',
                    'Activity.channel_id',
                    'Activity.msg_id',
                    'Activity.seen',
                    'Activity.notify',
                    'Activity.email',
                    'Activity.type',
                    'Activity.replied',
                    'Activity.created',
                    'PerformerUser.id',
                    'PerformerUser.username',
                    'PerformerUser.seo_username',
                    'ChannelUser.id',
                    'ChannelUser.username',
                    'ChannelUser.seo_username',
                    'Game.id',
                    'Game.name',
                    'Game.seo_url',
                    'Game.embed'
                ),
                'conditions' => array(
                    'Activity.channel_id' => $userid,
                    'Activity.notify' => 1
                ),
                'limit' => $limit,
                'order' => 'Activity.id DESC'
            )
        );
        $data = $this->paginate('Activity');
        /*
        print_r($data);
        exit;
        */
        
        $this->set('data', $data);
        $this->render('/Businesses/dashboard/activities');
    }

}
