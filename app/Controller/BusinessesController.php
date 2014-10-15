<?php

App::uses('AppController', 'Controller');

/**
 * Business Controller
 *
 * @property Business $Business
 */
class BusinessesController extends AppController {

    public $name = 'Businesses';
    var $uses = array('Businesses', 'Game', 'User', 'Favorite', 'Subscription', 'Playcount', 'Rate', 'Userstat', 'Gamestat', 'Category', 'Activity', 'Cloneship', 'CakeEmail', 'Network/Email', 'Ad_setting', 'Adcode', 'Ad_area');
    public $helpers = array('Html', 'Form', 'Upload', 'Recaptcha.Recaptcha', 'Time');
    public $components = array('Amazonsdk.Amazon', 'Recaptcha.Recaptcha', 'Common');

    //=====Kullanici sisteme login ise=======
    public function isAuthorized($user) {
        if (parent::isAuthorized($user)) {
            $auth_id = $this->Session->read('Auth.User.id');
            $this->set('notifycount', $this->Activity->find('count', array('contain' => false, 'conditions' => array('Activity.channel_id' => $auth_id, 'Activity.notify' => 1, 'Activity.seen' => 0))));
            return true;
        }

        //permissons for logged in users
        if (in_array($this->action, array('startup', 'dashboard', 'mygames', 'favorites', 'exploregames', 'settings', 'channel_settings', 'following', 'followers', 'explorechannels', 'activities', 'app_status', 'steps2launch', 'ads_management', 'notifications', 'add_ads', 'game_add', 'game_edit', 'mygames_search', 'exploregames_search', 'following_search', 'followers_search', 'mygames_search', 'favorites_search', 'explorechannels_search', 'featured_toggle', 'newData', 'deleteData', 'social_management', 'faq', 'edit_ads', 'password_change', 'updateData', 'main_search', 'edit_set_ads', 'remove_ads_field', 'add_mapping', 'remove_mapping','switch_publish','support'))) {
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
        parent::beforeFilter();
        $this->noprefixdomain();
        if (isset($_COOKIE['view'])) {
            $this->set('view', $_COOKIE['view']);
        }
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
            } elseif ($attr == "channel_update_start") {
                $title = $this->request->data['title'];
                $desc = $this->request->data['desc'];
                $bgColor = $this->request->data['bgColor'];

                //we will detect this cookie if user didnt complete tutorial
                $this->Cookie->delete('tutorial');

                $this->User->query('UPDATE users SET screenname="' . $title . '", description="' . $desc . '", bg_color="' . $bgColor . '" WHERE id=' . $user_id);
                $this->set('success', "Channel Settings Updated.");
                $this->set('_serialize', array('success'));
            } elseif ($attr == "edit_ads") {
                $ad_code_id = $this->request->data['ad_id'];
                $filtered_data['Adcode']['name'] = $this->request->data['title'];
                $filtered_data['Adcode']['code'] = $this->request->data['desc'];
                $this->Adcode->id = $ad_code_id;
                $this->Adcode->save($filtered_data);

                $category = json_decode($this->request->data['category'], true);
                $this->Ad_setting->Query('DELETE FROM ad_settings WHERE user_id=' . $user_id . ' AND ad_code_id =' . $ad_code_id);
                if (!empty($category)) {
                    foreach ($category as $value) {
                        $filtered_data1['Ad_setting']['ad_area_id'] = $value;
                        $filtered_data1['Ad_setting']['ad_code_id'] = $ad_code_id;
                        $filtered_data1['Ad_setting']['user_id'] = $user_id;
                        $this->Ad_setting->create(); //looplarda unutma
                        $this->Ad_setting->save($filtered_data1);
                    }
                }

                $this->set('success', "Ads Settings Updated.");
                $this->set('_serialize', array('success'));
            } elseif ($attr == "social_management") {
                $fb_link = $this->request->data['fb_link'];
                $twitter_link = $this->request->data['twitter_link'];
                $gplus_link = $this->request->data['gplus_link'];
                $website = $this->request->data['website'];

                $this->User->query('UPDATE users SET fb_link="' . $fb_link . '", twitter_link="' . $twitter_link . '", gplus_link="' . $gplus_link . '", website="' . $website . '" WHERE id=' . $user_id);
                $this->set('success', "Social settings Updated.");
                $this->set('_serialize', array('success'));
            } elseif ($attr == "password_change") {
                $old_password_data = $this->User->query('SELECT password FROM users WHERE ID="' . $user_id . '" LIMIT 1');
                $old_password = $old_password_data[0]['users']['password'];
                if (Security::hash(Configure::read('Security.salt') . $this->request->data['old_pass']) == $old_password) {
                    $filtered_data["User"]["password"] = $this->request->data["new_pass"];
                    $filtered_data["User"]["confirm_password"] = $this->request->data["new_pass"];
                    $this->User->id = $user_id;
                    if ($this->User->save($filtered_data)) {
                        $this->set('success', "Password changed");
                        $this->set('_serialize', array('success'));
                    } else {
                        $this->set('error', "Old password wrong");
                        $this->set('_serialize', array('error'));
                    }
                } else {
                    $this->set('error', "Old password wrong");
                    $this->set('_serialize', array('error'));
                }
            } else {
                
            }
        } else {
            $id = 1;
            $this->set('error', $id);
            $this->set('_serialize', array('error'));
        }
    }

    /**
     * Set/Unset Featured Game Request method
     *
     * @param Request => game_id
     * @return success=>"Message" or Error=>id
     */
    public function featured_toggle() {
        Configure::write('debug', 0);

        if ($auth_id = $this->Auth->user('id')) {//Auth control begins here
            $game_id = $this->request->data['game_id'];

            $game_data = $this->Game->find('first', array('contain' => false, 'conditions' => array('Game.id' => $game_id, 'Game.user_id' => $auth_id), 'fields' => array('Game.id', 'Game.featured')));
            if ($game_data != NULL) {
                if ($game_data['Game']['featured'] == 0) {
                    $filtered_data['Game']['featured'] = 1;
                    $this->set('success', "Game set as featured.");
                    $this->set('act_type', 1);
                    $this->set('_serialize', array('success', 'act_type'));
                } else {
                    $filtered_data['Game']['featured'] = 0;
                    $this->set('success', "Game unset from featured list.");
                    $this->set('act_type', 0);
                    $this->set('_serialize', array('success', 'act_type'));
                }
                $this->Game->id = $game_id;
                $this->Game->save($filtered_data);
            }





            //Auth control ends here
        } else {//if user is not logged in
            $this->set('error', 'You have to login first.');
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
        Configure::write('debug', 0);
        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');

        if (isset($this->request->data['attr']) && $this->Auth->user('id')) {
            $attr = $this->request->data['attr'];
            $user_id = $this->Auth->user('id');
            if ($attr == "new_ads") {
                $filtered_data['Adcode']['name'] = $this->request->data['title'];
                $filtered_data['Adcode']['code'] = $this->request->data['desc'];
                $filtered_data['Adcode']['user_id'] = $user_id;
                $this->Adcode->save($filtered_data);
                $category = json_decode($this->request->data['category'], true);
                if (!empty($category)) {
                    $last_id = $this->Adcode->getLastInsertID();

                    foreach ($category as $value) {
                        $this->Ad_setting->Query('Delete FROM ad_settings WHERE ad_area_id="' . $value . '" AND user_id="' . $user_id . '"');
                        $this->Ad_setting->Query('INSERT INTO ad_settings (ad_area_id,ad_code_id,user_id,skip) VALUES (' . $value . ',' . $last_id . ',' . $user_id . ',0)');
                    }
                }
                $this->set('success', "Ads Code Added");
                $this->set('_serialize', array('success'));
            } elseif ($attr == "game_add") {
                $game_name = $this->request->data['name'];
                if (isset($this->request->data['active'])) {
                    $game_active = $this->request->data['active'];
                }
                
                $game_description = $this->request->data['desc'];
                $game_link = $this->request->data['game_link'];
                $game_width = $this->request->data['width'];
                $game_height = $this->request->data['height'];
                $game_priority = 0;
                $category_id = $this->request->data['category'];
                $tags = $this->request->data['tags'];
                $android = $this->request->data['android'];
                $ios = $this->request->data['ios'];
                $fullscreen = $this->request->data['fullscreen'];
                $mobileready = $this->request->data['mobile'];
                $installable = $this->request->data['installable'];
                $game_user_id = $user_id;
                $created = date('Y-m-d H:i:s');
                $game_owner_id = $user_id;
                $image_name = $this->request->data['image_name'];
                $game_file = $this->request->data['game_file'];
                $new_game = $this->request->data['new_game'];

                if ($new_game == 0) {
                    $game_id = $this->request->data['game_id'];
                    $this->Game->id = $game_id;
                } else {
                    $game_id = NULL;
                }


                if ($image_name != 'current' && $image_name != 'empty') {
                    //This area should be exist for upload plugin needs-begins  
                    $file = new File(WWW_ROOT . "/upload/temporary/" . $user_id . "/" . $image_name, false);
                    $info = $file->info();
                    $filename = $info["filename"];
                    $ext = $info["extension"];
                    $basename = $info["basename"];
                    $dirname = $info["dirname"];
                    $newname = $filename . '_toorksize.' . $ext;
                    rename(WWW_ROOT . "/upload/temporary/" . $user_id . "/" . $image_name, WWW_ROOT . "/upload/temporary/" . $user_id . "/" . $newname);
                    //This area should be exist for upload plugin needs-ends    
                }

                if ($game_file != 'empty') {
                    $type = $this->Game->get_game_type($game_file);
                } else {
                    $type = $this->Game->get_game_type($game_link);
                }

                /*
                // Add game tags
                if ($tags != '' && $tags != NULL) {
                    $tags = str_replace("  ", " ", $_POST['tags']);
                    $tags = str_replace(", ", ",", $_POST['tags']);
                    $tag_array = explode(",", $tags);
                }
                */

                if ($installable) {

                    if ($android != NULL)
                        $game_link = $android;
                    else
                        $game_link = $ios;

                    $mobileready = 1;
                }

                //============Save Datas To Games Database Begins================
                //*****************************
                //Secure data filtering begins
                //*****************************
                $filtered_data = array('Game' => array(
                        'name' => $game_name = $this->Game->secureSuperGlobalPOST($game_name),
                        'description' => $this->Game->secureSuperGlobalPOST($game_description),
                        'link' => $game_link,
                        'width' => $game_width,
                        'height' => $game_height,
                        'type' => $type,
                        'link' => $game_link,
                        'active' => isset($game_active) ? $game_active : 1,
                        'user_id' => $game_user_id,
                        'category_id' => $category_id,
                        'seo_url' => $this->Game->checkDuplicateSeoUrl($game_name, $game_id),
                        'user_id' => $game_user_id,
                        'fullscreen' => $fullscreen,
                        'install' => $installable,
                        'mobileready' => $mobileready));

                 if ($new_game != 0) { 
                 $filtered_data['Game']['priority']=0; 
                 $filtered_data['Game']['owner_id']=$user_id; 
                 }

                //*****************************
                //Secure data filtering ends
                //*****************************
                //print_r($filtered_data);
                if ($this->Game->save($filtered_data)) {

                    $this->requestAction(array('controller' => 'userstats', 'action' => 'getgamecount', $user_id));

                    if ($new_game == 0) {
                        $id = $game_id;
                    } else {
                        $id = $this->Game->getLastInsertId();
                        //$this->add_tags($tag_array, $id);
                    }

                    $this->requestAction(array('controller' => 'wallentries', 'action' => 'action_ajax', $id, $user_id));


                    //if installable details panel opened!!
                    if ($installable) {
                        $this->loadModel('Applink');

                        if ($new_game == 0) {
                            $android_data = $this->Applink->find('first', array('conditions' => array('Applink.game_id' => $id, 'Applink.platform_id' => 1)));
                            if ($android_data != NULL) {
                                $this->Applink->id = $android_data['Applink']['id'];
                            }
                        } else {
                            $this->Applink->create();
                        }


                        $applinkdata['Applink']['game_id'] = $id;
                        $applinkdata['Applink']['platform_id'] = 1;
                        $applinkdata['Applink']['link'] = $android;
                        $this->Applink->save($applinkdata);


                        if ($new_game == 0) {
                            $android_data2 = $this->Applink->find('first', array('conditions' => array('Applink.game_id' => $id, 'Applink.platform_id' => 2)));
                            if ($android_data2 != NULL) {
                                $this->Applink->id = $android_data2['Applink']['id'];
                            }
                        } else {
                            $this->Applink->create();
                        }


                        $applinkdata2['Applink']['game_id'] = $id;
                        $applinkdata2['Applink']['platform_id'] = 2;
                        $applinkdata2['Applink']['link'] = $ios;
                        $this->Applink->save($applinkdata2);
                    }
                    //Installable details ends

                    if ($image_name != 'current' && $image_name != 'empty') {//if user didnt change the game image
                        //=======Upload to aws for Game Image begins===========
                        $feedback = $this->Amazon->S3->create_object(
                                Configure::read('S3.name'), 'upload/games/' . $id . "/" . $newname, array(
                            'fileUpload' => WWW_ROOT . "/upload/temporary/" . $user_id . "/" . $newname,
                            'acl' => AmazonS3::ACL_PUBLIC
                                )
                        );
                        //========Upload to aws for Game Image ends==============
                        if ($feedback) {
                            //Set the picture field on db.
                            $this->Game->query('UPDATE games SET picture="' . $image_name . '" WHERE id=' . $id);
                            $this->remove_temporary($user_id, 'new_game');
                        }
                    }
                    $this->gameUpload($game_file, $id, $user_id); //Check if any game upload exists


                    if ($new_game == 0) {
                        $this->set('success', "Game Updated");
                    } else {
                        $this->set('success', "Game Added");
                    }
                    $this->set('_serialize', array('success'));
                }
            } else {
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
     * Game Upload method
     *
     * @param Request => array()
     * @return Game upload and db data insert
     */
    function gameUpload($game_file = NULL, $id = NULL, $userid = NULL) {
        if ($game_file != 'empty') {

            $random_number = rand(1000000, 9999999);
            $new_game_file = $random_number . '_' . $game_file;

            //=======Upload to aws for Game Upload begins===========
            $feedback = $this->Amazon->S3->create_object(
                    Configure::read('S3-games.name'), $new_game_file, array(
                'fileUpload' => WWW_ROOT . "upload/gamefiles/" . $userid . "/" . $game_file,
                'acl' => AmazonS3::ACL_PUBLIC
                    )
            );
            //========Upload to aws for Game Upload ends==============
            if ($feedback) {
                //Set the picture field on db.
                $game_link = Configure::read('S3-games.url') . '/' . $new_game_file;
                $this->Game->query('UPDATE games SET link="' . $game_link . '" WHERE id=' . $id);
                $this->remove_temporary($userid, 'game_upload');
            }
        }
    }

    public function remove_ads_field() {
        Configure::write('debug', 0);
        $area_id = $this->request->data['target_ad_area'];
        if ($auth_id = $this->Auth->user('id')) {//Auth Control Begins
            $this->Ad_setting->query('DELETE FROM ad_settings WHERE ad_area_id = "' . $area_id . '" AND user_id = "' . $auth_id . '"');
            $msg = array("title" => 'Success', 'result' => 1);
        } else {//Auth Control Ends
            //if user unlogged
            $msg = array("title" => 'You have to log in first', 'result' => 0);
        }//Unlogged control ends
        $this->set('rtdata', $msg);
        $this->set('_serialize', array('rtdata'));
    }

    /**
     * col_ads method
     *
     * @param Request => location id
     * @return ad code data
     */
    function col_ads() {
        $user_id = $this->request->data['user_id'];
        $location = $this->request->data['location'];

        $code = $this->Ad_setting->find('first', array('contain' => array('Adcode' => array('fields' => 'Adcode.code,Adcode.name')), 'conditions' => array('Ad_setting.ad_area_id' => $location, 'Ad_setting.user_id' => $user_id), 'order' => 'rand()'));
        $this->set('success', $code);
        $this->set('_serialize', array('success'));
    }

    function get_ads_code($user_id, $location) {
        $code = $this->Ad_setting->find('first', array('contain' => array('Adcode' => array('fields' => 'Adcode.code,Adcode.name')), 'conditions' => array('Ad_setting.ad_area_id' => $location, 'Ad_setting.user_id' => $user_id), 'order' => 'rand()'));
        return $code;
    }

    public function serve_ads_frame($user_id = NULL, $location = NULL) {
        $this->layout = 'ajax';
        $code = $this->Ad_setting->find('first', array('contain' => array('Adcode' => array('fields' => 'Adcode.code,Adcode.name')), 'conditions' => array('Ad_setting.ad_area_id' => $location, 'Ad_setting.user_id' => $user_id), 'order' => 'rand()'));
        $this->set('code', $code);
    }

    /**
     * Edit Set Ads Function
     *
     * @param set_id Code_id
     * @return set
     * @author Volkan Celiloğlu
     */
    public function edit_set_ads() {
        $code_id = $this->request->data['code_id'];
        $area_id = $this->request->data['set_id'];
        $user_id = $this->Session->read('Auth.User.id');
        $test = array($code_id, $area_id, $user_id);
        $this->Ad_setting->query('DELETE FROM ad_settings WHERE ad_area_id = "' . $area_id . '" AND user_id = "' . $user_id . '"');
        $filtered_data['Ad_setting']['ad_code_id'] = $code_id;
        $filtered_data['Ad_setting']['user_id'] = $user_id;
        $filtered_data['Ad_setting']['ad_area_id'] = $area_id;
        if ($this->Ad_setting->save($filtered_data)) {
            $this->set('success', "Success");
            $this->set('_serialize', array('success'));
        }
    }

    /**
     * Game tags add method
     *
     * @param Request => tags=array(),$gameid
     * @return no return
     */
    function add_tags($tags, $gameid) {
        $this->loadModel('Tag');
        $this->loadModel('Tagrelation');

        foreach ($tags as $tag_name) {
            $tag_data = $this->Tag->find('all', array('contain' => false, 'conditions' => array('Tag.tag_name' => $tag_name)));
            if ($tag_data == NULL) {
                $seo_url = $tag_name; //seo url filteri eklenecek
                $this->Tag->create();
                $filtered_data['Tag']['tag_name'] = $tag_name;
                $filtered_data['Tag']['seo_url'] = $seo_url;
                if ($this->Tag->save($filtered_data)) {
                    $tag_id = $this->Tag->getLastInsertID();
                }
            } else {
                $tag_id = $tag_data[0]['Tag']['id'];
            }

            $this->Tagrelation->create();
            $filtered_data2['Tagrelation']['game_id'] = $gameid;
            $filtered_data2['Tagrelation']['tag_id'] = $tag_id;
            $this->Tagrelation->save($filtered_data2);
        }
    }

    /*
      function add_tags($tags, $gameid) {echo 'add tag';
      foreach($tags as $tag_name) {
      $tag_count = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_tags WHERE tag_name = '$tag_name'"), 0);
      if ($tag_count == 0) {
      $seo_url = seoname($tag_name, 0, 'tag');

      mysql_query("INSERT INTO ava_tags (tag_name, seo_url) VALUES ('$tag_name', '$seo_url')") or die (mysql_error());
      }
      $mysql_tag = mysql_fetch_array(mysql_query("SELECT * FROM ava_tags WHERE tag_name = '$tag_name'"));
      mysql_query("INSERT INTO ava_tag_relations (game_id, tag_id) VALUES ($gameid, $mysql_tag[id])");
      }
      }
     */

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
                $this->Ad_setting->Query('DELETE FROM ad_settings WHERE user_id=' . $user_id . ' AND ad_code_id =' . $id);
                $this->set('success', "Ads Code Deleted");
                $this->set('_serialize', array('success'));
            } elseif ($attr == "edit_game") {
                $id = $this->request->data['id'];
                $this->Adcode->query('DELETE FROM games WHERE id=' . $id . ' AND user_id=' . $user_id);
                $this->set('success', "Game Deleted");
                $this->set('_serialize', array('success'));
            } elseif ($attr == "remove_game") {
                $id = $this->request->data['id'];
                $this->Game->id = $id;
                if ($this->Game->delete()) {
                    //Remove gamestat datas
                    $this->Game->Query('DELETE FROM gamestats WHERE game_id=' . $id);
                    //----/----------------
                    $msg = array("success" => 'Game has been deleted.', 'result' => 1);
                } else {
                    $msg = array("error" => 'There is an internal error.Please try again later.', 'result' => 0);
                }



                $this->set('rtdata', $msg);
                $this->set('_serialize', array('rtdata'));
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
     * This function increases
     * playcount of game
     * @param  game_id
     * @return null
     */
    public function add_playcount() {
        Configure::write('debug', 0);
        $game_id = $this->request->data['game_id'];
        $user_id = $this->request->data['user_id'];

        $counted = $this->Gamestat->add_playcount($game_id);
        $this->Userstat->add_playcount($user_id);
        if ($counted) {
            $msg = array("message" => 'Playcount has been added.', 'result' => 1);
        } else {
            $msg = array("message" => 'There are some external problems.', 'result' => 0);
        }

        $this->set('rtdata', $msg);
        $this->set('_serialize', array('rtdata'));
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
        $this->Cookie->delete('remember_me');
        $this->Session->destroy();

        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userid
            )
        ));


        if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {

            if (Configure::read('Domain.cname')) {
                $cdomain = Configure::read('Domain.c_root');
                $this->redirect('http://' . $cdomain);
            } else {
                $this->logout_redirect();
            }
        } else {
              //Localhost Settings
              $this->logout_redirect();  
        }
    }
    /**
     *Set different logout redirect urls for different referer
    */
    function logout_redirect()
    { 
            if (strpos($this->referer(),'/businesses/play/') !== false) {
              $this->redirect($this->referer(array(‘action’=>’index’), true));
            }else{
              $this->redirect('/');    
            }
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
     * @author Volkan Celiloğlu
     * @param
     * @return Get All Notification array
     */
    public function getallnotifications() {
        if ($this->Auth->user('id')) { //openning of auth_id control
            $auth_id = $this->Session->read('Auth.User.id');
            $limit = 15;
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
                                'Game.seo_url'
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
                        'Game.seo_url'
                    ),
                    'conditions' => array(
                        'Activity.channel_id' => $auth_id,
                        'Activity.notify' => 1
                    ),
                    'limit' => $limit,
                    'order' => 'Activity.id DESC')
            );
            $activityData = $this->paginate('Activity');
            $this->set('notifications', $activityData);
        }
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
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $user_id
            )
        ));
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
        $email
                ->config('smtp')
                ->template('business/contact') //I'm assuming these were created
                ->emailFormat('html')
                ->to($user["User"]["email"])
                ->from(array('no-reply@clone.gs' => 'Clone'))
                ->subject($subject)
                ->send();
        if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
            $this->redirect('http://' . $user['User']['seo_username'] . '.' . $this->pure_domain);
        } else {
            $this->redirect(array('controller' => 'businesses', 'action' => 'mysite', $user_id));
        }
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
        if ($this->Cookie->read('tutorial')) {
            echo '<script>location.href="dashboard/welcome"</script>';
        }
        $this->sideBar();

        //$this->cookie_with_curl();

        $userid = $this->Session->read('Auth.User.id');

        //----------------------
        //Set Cname if it exists
        //----------------------
        if ($this->Session->read('mapping')) {
            $mapping = $this->Session->read('mapping');
            $mapping_domain = $this->Session->read('mapping_domain');
            $this->set_cname($mapping, $mapping_domain);
        }
        //----------------------

        $subscribed_ids = $this->Subscription->find('list', array('contain' => false, 'fields' => array('Subscription.subscriber_to_id'), 'conditions' => array('Subscription.subscriber_id' => $userid)));

        $limit = 6;
        $this->paginate = array(
            'User' => array(
                'fields' => array(
                    'User.id',
                    'User.username',
                    'User.seo_username',
                    'User.verify',
                    'User.picture',
                    'User.banner'
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
                    'User.priority' => 'DESC',
                    'Userstat.potential' => 'DESC',
                    'User.verify' => 'DESC'
                ),
                'conditions' => array(
                    'NOT' => array(
                    'User.id' => $subscribed_ids
                     )
                ),
                'limit' => $limit
            )
        );
        $data = $this->paginate('User');

        /* $data = $this->User->query("SELECT  `User`.`id` ,  `User`.`username` ,  `User`.`seo_username` ,  `User`.`verify` ,  `User`.`picture` ,  `User`.`banner` ,  `Userstat`.`subscribe` ,  `Userstat`.`subscribeto` ,  `Userstat`.`uploadcount` 
          FROM  `users` AS  `User`
          INNER JOIN  `userstats` AS  `Userstat` ON (  `Userstat`.`user_id` =  `User`.`id` )
          INNER JOIN  `activities` AS  `Activity` ON (  `Activity`.`channel_id` = `User`.`id` )
          WHERE  `User`.`verify`=1 AND `Activity`.`type` =  9 OR `Activity`.`type` =  3
          GROUP BY `User`.id
          ORDER BY  `Activity`.`created` DESC
          LIMIT 6"); */
        $stat = $this->Userstat->find('first', array('contain' => false, 'conditions' => array('Userstat.user_id' => $userid)));

        $this->set('channel', $data);
        $this->set('stat', $stat);
        $this->set('title_for_layout', 'Clone Business Dashboard');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/index');
    }

    /**
     * Gets one new game for wizard
     *
     * @param  no
     * @return json
     * @author Ogi
     */
    public function get_one_game() {

        $this->layout = 'ajax';

        /**
         * Daha önce çekilmiş olan oyunlar
         */
        $welcome_games = $this->Cookie->read('welcome_games');

        /**
         * Farklı rastgele bir oyun çekiliyor.
         */
        $onegame = $this->Game->find('first', array(
            'fields' => array(
                'Game.name',
                'Game.seo_url',
                'Game.id',
                'Game.fullscreen',
                'Game.mobileready',
                'Game.install',
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
            'conditions' => array(
                'NOT' => array(
                    'Game.id' => $welcome_games
                ),'Game.active'=>1
            ),
            'order' => array(
                'Game.priority' => 'DESC'
            )
        ));

        if (!empty($onegame)) {
            $welcome_games[] = $onegame['Game']['id'];
            $this->Cookie->write('welcome_games', $welcome_games);

            if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
                $playurl = Router::url('http://' . $onegame['User']['seo_username'] . '.' . $_SERVER['HTTP_HOST'] . '/play/' . h($onegame['Game']['seo_url']));
                $userlink = Router::url('http://' . $onegame['User']['seo_username'] . '.' . $pure_domain);
            } else {
                $playurl = Router::url(array(
                            "controller" => 'businesses',
                            "action" => 'play',
                            h($onegame['Game']['id'])
                ));
                $userlink = Router::url(array(
                            "controller" => 'businesses',
                            "action" => 'mysite',
                            h($onegame['User']['id'])
                ));
            }

            $clones = empty($onegame['Gamestat']['channelclone']) ? 0 : $onegame['Gamestat']['channelclone'];
            $favorites = empty($onegame['Gamestat']['favcount']) ? 0 : $onegame['Gamestat']['favcount'];
            $plays = empty($onegame['Gamestat']['playcount']) ? 0 : $onegame['Gamestat']['playcount'];
            $rates = empty($onegame['Game']['rate_count']) ? 0 : $onegame['Game']['rate_count'];

            $basename = $onegame['Game']['picture'];
            $noextension = rtrim($basename, '.' . $this->getExtension($basename));
            $yesextension = $noextension . '_toorksize.' . $this->getExtension($basename);
            $target_image = $yesextension;

            $starvar = null;
            //generate starsize
            $star = round($onegame['Game']['starsize'] / 20);
            for ($i = 1; $i <= $star; $i++) {
                $starvar.='<i class="fa fa-star fa-2x"></i>';
            }
            $freestar = 5 - $star;
            if ($freestar > 0) {
                for ($i = 1; $i <= $freestar; $i++) {
                    $starvar.='<i class="fa fa-star-o fa-2x"></i>';
                }
            }

            $image_url = Configure::read('S3.url') . '/upload/games/' . $onegame['Game']['id'] . '/' . $target_image;

            $view = new View($this, false);
            $htmlcode = $view->element('business/dashboard/gamebox', array(
                "gameboxtype" => "clone",
                "id" => $onegame['Game']['id'],
                "playurl" => $playurl,
                "game" => $onegame,
                "name" => $onegame['Game']['name'],
                "rates" => $rates,
                "clones" => $clones,
                "favorites" => $favorites,
                "plays" => $plays,
                "userlink" => $userlink,
                "function" => "welcome",
                "refresh" => TRUE
            ));

            $msg = array(
                'result' => 1,
                "game_id" => $onegame['Game']['id'],
                "game_name" => $onegame['Game']['name'],
                "onclick" => 'chaingame4("' . $onegame['Game']['name'] . '",user_auth,' . $onegame['Game']['id'] . ');',
                'html' => $htmlcode
            );
        } else {
            $msg = array(
                'result' => 0
            );
        }


        $this->set('rtdata', $msg);
        $this->set('_serialize', array('rtdata'));
    }

    /**
     * Gets one new channels for wizard
     *
     * @param  no
     * @return json
     * @author Ogi
     */
    public function get_one_channel() {

        $this->layout = 'ajax';

        /**
         * Daha önce çekilmiş olan kanallar
         */
        $welcome_channels = $this->Cookie->read('welcome_channels');

        /**
         * Farklı rastgele bir kanal çekiliyor.
         */
        $onechannel = $this->User->find('first', array(
            'fields' => array(
                'User.id',
                'User.username',
                'User.seo_username',
                'User.verify',
                'User.picture',
                'User.banner'
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
            'conditions' => array(
                'NOT' => array(
                    'User.id' => $welcome_channels
                )
            ),
            'order' => array(
                'User.priority' => 'DESC'
            )
        ));

        /**
         * Eğer kanal gelirse...
         */
        if (!empty($onechannel)) {
            $welcome_channels[] = $onechannel['User']['id'];
            $this->Cookie->write('welcome_channels', $welcome_channels);

            $view = new View($this, false);
            $htmlcode = $view->element('business/dashboard/channelbox', array(
                'user' => $onechannel['User'],
                'userstat' => $onechannel['Userstat'],
                'status' => FALSE,
                'page' => 'startup',
                'refresh' => TRUE
            ));

            $msg = array(
                'result' => 1,
                "channel_id" => $onechannel['User']['id'],
                'html' => $htmlcode,
                    /* "onclick" => 'subscribe2("' . $onechannel['User']['username'] . '", user_auth,' . $onechannel['User']['id'] . ');switchfollow(' . $onechannel['User']['id'] . ');', */                    );
        } else {
            $msg = array(
                'result' => 0
            );
        }


        $this->set('rtdata', $msg);

        $this->set('_serialize', array('rtdata'));
    }

    //Will be moved to app controller
    function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
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

        $this->layout = 'Business/startup';

        $this->sideBar();

        /**
         * We will detect this cookie if user didnt complete tutorial
         */
        $this->Cookie->write('tutorial', 1);

        /**
         * Get Some User Data
         */
        $auth_id = $this->Session->read('Auth.User.id');
        $this->set('userid', $auth_id);
        $user_data = $this->User->find('first', array(
            'contain' => false,
            'conditions' => array(
                'User.id' => $auth_id
            ),
            'fields' => array(
                'User.seo_username'
            )
        ));
        $this->set('seo_username', $user_data['User']['seo_username']);

        /**
         * Games
         */
        $games = $this->Game->find('all', array(
            'fields' => array(
                'Game.name',
                'Game.seo_url',
                'Game.id',
                'Game.fullscreen',
                'Game.mobileready',
                'Game.install',
                'Game.picture',
                'Game.starsize',
                'Game.rate_count',
                'Game.embed',
                'Game.clone',
                'Game.created',
                'Game.description',
                'Gamestat.playcount',
                'Gamestat.favcount',
                'Gamestat.channelclone',
                'Gamestat.potential',
                'User.id',
                'User.username',
                'User.seo_username',
                'User.verify',
                'User.picture'
            ),
            'conditions' => array(
                'Game.clone' => 0,
                'NOT' => array(
                    'Game.priority' => NULL
                ),'Game.active'=>1
            ),
            'order' => array(
                'Game.priority' => 'DESC',
                'Gamestat.potential' => 'DESC',
                'Game.clone' => 'ASC'
            ),
            'limit' => 6
        ));
        $this->set('games', $games);

        /**
         * Games Cookie For Same Games
         */
        $welcome_games = array();
        foreach ($games as $value) {
            $welcome_games[] = $value['Game']['id'];
        }
        $this->Cookie->write('welcome_games', $welcome_games);

        /**
         * Channels
         */
        $following = $this->User->find('all', array(
                'fields' => array(
                    'User.id',
                    'User.username',
                    'User.seo_username',
                    'User.verify',
                    'User.picture',
                    'User.banner'
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
                    'User.priority' => 'DESC',
                    'Userstat.potential' => 'DESC',
                    'User.verify' => 'DESC'
                ),
                'conditions' => array(
                    'NOT' => array(
                        'User.verify' => NULL
                    )
                ),
                'limit' => 6
            ));

        $this->set('following', $following);

        /**
         * Channels Cookie For Same Channels
         */
        $welcome_channels = array();
        foreach ($following as $value) {
            $welcome_channels[] = $value['User']['id'];
        }
        $this->Cookie->write('welcome_channels', $welcome_channels);

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
     * Author:Ogi
     * Create a cookie for login
     * With curl request
     * @param
     * @return Null
     */
    public function cookie_with_curl() {
        //Important curl documentations
        //http://codular.com/curl-with-php
        //http://stackoverflow.com/questions/4254645/how-to-make-https-post-request-in-cakephp
        //Curl fonksiyonları:http://www.r10.net/php/17372-curl-nedir.html
        //http://localhost/betatoork226/users/set_cookie/5563333
        //http://www.codediesel.com/tools/6-essential-curl-commands/
        //Etkili Çözümler:http://stackoverflow.com/questions/6761415/how-to-set-a-cookie-for-another-domain
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://localhost/betatoork226/users/set_cookie/1111',
            CURLOPT_USERAGENT => 'Cookie Creator',
            CURLOPT_HEADER => 0//Header bilgisini döndürür.
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
        print_r($resp);
        break;
    }

    /**
     * Game edit method
     *
     * @param
     * @return Game edit Page
     */
    public function game_edit($id = NULL) {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $categories = $this->Game->Category->find('list');

        $this->Game->id = $id;
        if (!$this->Game->exists()) {
            throw new NotFoundException(__('Invalid game'));
        }

        $game = $this->Game->find('first', array('contain' => false, 'conditions' => array('Game.id' => $id)));
        $this->set('game', $game);

        if ($game['Game']['install']) {
            $android = NULL;
            $ios = NULL;
            $this->loadModel('Applink');
            $app_links = $this->Applink->find('all', array('conditions' => array('Applink.game_id' => $id)));
            foreach ($app_links as $platforms) {
                if ($platforms['Applink']['platform_id'] == 1) {
                    $android = $platforms['Applink']['link'];
                }
                if ($platforms['Applink']['platform_id'] == 2) {
                    $ios = $platforms['Applink']['link'];
                }
            }
            $this->set('android', $android);
            $this->set('ios', $ios);
        }


        $this->set(compact('categories'));
        $this->set('title_for_layout', 'Clone Business Game Edit');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/game_edit');
    }


    /**
     * Switch Publish method
     *
     * @param  game_id
     * @return switch_publish Page
     * @author Ogi
     */
    public function switch_publish() {
      
       Configure::write('debug', 0);
       $auth_id = $this->Session->read('Auth.User.id');
       $game_id = $this->request->data['game_id'];

       if($auth_id)
       {//beginning of auth control

        if($this->Game->isOwnedBy($game_id,$auth_id))
        {
             $this->Game->id=$game_id;
             $game_data=$this->Game->find('first',array('contain'=>false,'conditions'=>array('Game.id'=>$game_id),'fields'=>array('Game.id,Game.active')));
             if($game_data['Game']['active']==1)
             {  
                $filtered_data['Game']['active'] = 0;
                $this->Game->save($filtered_data);
                $msg = array("title" => 'Game has been unpublished.', 'result' => 1);
             }else{
                $filtered_data['Game']['active'] = 1;
                $this->Game->save($filtered_data);
                $msg = array("title" => 'Game has been published.', 'result' => 1);
             }   
             

        }else{

             $msg = array("title" => 'You are not owner of this game.', 'result' => 0);

        }


       } //end of auth control

            $this->set('rtdata', $msg);
            $this->set('_serialize', array('rtdata'));
     
    }


    /**
     * Dummy tools and docs function
     * Cloned from app_status method
     *
     * @param
     * @return toolsNdocs Page
     * @author Kazim Akgul
     */
    public function api() {
        $this->layout = 'Business/api';
        $this->set('title_for_layout', 'Clone Business Dashboard');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/api');
    }



    /**
     * Support function
     * Cloned from toolsNdocs method
     *
     * @param
     * @return Support Page
     * @author Kazim Akgul
     */
    public function support() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business Dashboard');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/support');
    }

    /**
     * Dummy faq function
     * Cloned from toolsNdocs method
     *
     * @param
     * @return faq Page
     * @author Kazim Akgul
     */
    public function faq() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business FAQ');
        $this->set('description_for_layout', 'Frequently Asked Questions. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/faq');
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
     *
     * @param
     * @return social_management Page
     * @author Volkan Celiloğlu
     */
    public function social_management() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business Social Management');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/social_management');
    }

    /**
     *
     * @param
     * @return password_change Page
     * @author Volkan Celiloğlu
     */
    public function password_change() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->set('title_for_layout', 'Clone Business Social Management');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/password_change');
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
        $this->get_ads_info($userid);
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
        $Ad_area = $this->Ad_area->find('all', array('fields' => array('Ad_area.id,Ad_area.name,Ad_area.description')));
        $this->set('ad_area', $Ad_area);
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
        $Ad_setting = $this->Ad_setting->find('all', array(
            'conditions' => array('Ad_setting.user_id' => $userid, 'Ad_setting.ad_code_id' => $id),
            'contain' => array('Ad_area'),
            'fields' => array('Ad_setting.ad_code_id,Ad_setting.ad_area_id,Ad_area.name')));

        $Ad_area = $this->Ad_area->find('all', array('fields' => array('Ad_area.id,Ad_area.name,Ad_area.description')));
        $this->set('ad_area', $Ad_area);

        $this->set('Ads', $adcodes);
        $this->set('Ads_set', $Ad_setting);
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

    /** add_mapping method
     *
     * @param
     * @return Channel_Settings Page
     * @author Ogi
     */
    public function add_mapping($id=NULL) {
        Configure::write('debug', 0);
        $this->loadModel('Custom_domain');
        $authid = $this->Auth->user('id');
        $domain = $this->request->data['domain'];

        //Gets id for admin panel channel edit.
        if($id!=NULL)
        {
           $authid = $id; 
        }    

        $mapping_data = $this->Custom_domain->find('first', array('contain' => false, 'conditions' => array('Custom_domain.domain' => $domain), 'fields' => array('Custom_domain.id')));
        if ($mapping_data != NULL) {
            $msg = array("title" => 'This domain already exists!', 'result' => 0);
        } else {

            $dns_data = dns_get_record($domain, DNS_CNAME);
            if ($dns_data[0]['target'] == 'domains.clone.gs') {//if domain mapped to true domain.
                $map_domain['Custom_domain']['user_id'] = $authid;
                $map_domain['Custom_domain']['domain'] = $domain;
                $map_domain['Custom_domain']['status'] = 1;
                $this->Custom_domain->save($map_domain);

                $this->Session->write('mapping', 1);
                $this->Session->write('mapping_domain', $domain);

                $msg = array("title" => 'Domain been added.', 'result' => 1);
            } else {
                $msg = array("title" => 'You have to add a CNAME to domains.clone.gs', 'result' => 0);
            }
        }
        $this->set('rtdata', $msg);
        $this->set('_serialize', array('rtdata'));
    }

    /** remove_mapping method
     *
     * @param
     * @return Channel_Settings Page
     * @author Ogi
     */
    public function remove_mapping($id=NULL) {
        Configure::write('debug', 0);
        $this->loadModel('Custom_domain');
        $authid = $this->Auth->user('id');

        //Gets id for admin panel channel edit.
        if($id!=NULL)
        {
           $authid = $id; 
        } 

        $mapping_data = $this->Custom_domain->find('first', array('contain' => false, 'conditions' => array('Custom_domain.user_id' => $authid), 'fields' => array('Custom_domain.id')));
        $this->Custom_domain->id = $mapping_data['Custom_domain']['id'];
        $this->Custom_domain->delete();

        $this->Session->delete('mapping');
        $this->Session->delete('mapping_domain');

        $msg = array("title" => 'Domain been removed.', 'result' => 1);
        $this->set('rtdata', $msg);
        $this->set('_serialize', array('rtdata'));
    }

    /** Channel_Settings method
     *
     * @param
     * @return Channel_Settings Page
     * @author Volkan Celiloğlu
     */
    public function channel_settings() {
        $this->layout = 'Business/dashboard';
        $this->loadModel('Custom_domain');
        $this->sideBar();
        $countries = $this->User->Country->find('list');

        $authid = $this->Auth->user('id');
        $mapping_data = $this->Custom_domain->find('first', array('conditions' => array('Custom_domain.user_id' => $authid, 'Custom_domain.status' => 1), 'fields' => array('Custom_domain.domain')));
        if ($mapping_data != NULL)
            $this->set('mapping_domain', $mapping_data['Custom_domain']['domain']);

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

        if (Configure::read('Domain.cname')) {
            $cdomain = Configure::read('Domain.c_root');

            if ($userid == NULL) {

                $user_data = $this->Game->query('SELECT * from custom_domains WHERE domain ="' . $cdomain . '"');
                $userid = $user_data[0]['custom_domains']['user_id'];
            }
        } else {//Cname not exists.
            if ($userid == NULL) {
                $subdomain = Configure::read('Domain.subdomain');

                //This conditions render special view for domains.clone.gs Gives information about how to map a domain.
                if ($subdomain == 'domains') {
                    //$this->layout="ajax";//You can choose which layout do you want to use!
                    //$this->render('/Businesses/howtomap');
                    echo '<div class="container"><iframe src="http://games.clone.gs" style="border: 0; position:fixed; top:0px; left:0; right:0; bottom:0; width:100%; height:100%"></iframe></div>';
                    //break;
                }

                $user_data = $this->User->find('first', array('contain' => false, 'conditions' => array('User.seo_username' => $subdomain), 'fields' => array('User.id')));
                $userid = $user_data['User']['id'];
            }
        }


        //----------------------
        //Set Cname if it exists
        //----------------------
        if ($this->Session->read('mapping')) {
            $mapping = $this->Session->read('mapping');
            $mapping_domain = 'clone.gs';
            $this->set_cname($mapping, $mapping_domain);
        } else if (Configure::read('Domain.cname')) {
            $mapping = 1;
            $mapping_domain = 'clone.gs';
            $this->set_cname($mapping, $mapping_domain);
        }
        //----------------------
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

        $category = $this->Game->query('SELECT categories.id as id, categories.name FROM games join categories ON games.category_id = categories.id WHERE user_id=' . $userid . ' group by games.category_id');

        $this->get_ads_info($userid);

        $limit = 9;
        $featlimit = 3;
        $newlimit = 3;
        $hotlimit = 6;
        
        
        $existence = array();

        $featured_data=$this->Game->find('all', array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid, 'Game.featured' => 1), 'limit' => $featlimit, 'order' => 'rand()', 'contain' => array('Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
        $this->set('featuredgames',$featured_data);
        foreach($featured_data as $data)
        {
            array_push($existence,$data['Game']['id']);
        }    


        $hotgames_data=$this->Game->find('all', array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid,'NOT' => array( 'Game.id' => $existence)), 'limit' => $hotlimit, 'order' => array('Gamestat.potential' => 'desc'), 'contain' => array('Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
        $this->set('hotgames',$hotgames_data);
        foreach($hotgames_data as $data)
        {
            array_push($existence,$data['Game']['id']);
        }

        $newgames_data=$this->Game->find('all', array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid,'NOT' => array( 'Game.id' => $existence)), 'limit' => $newlimit, 'order' => array('Game.id' => 'desc'), 'contain' => array('Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
        $this->set('newgames',$newgames_data);
        foreach($newgames_data as $data)
        {
            array_push($existence,$data['Game']['id']);
        }

        
        $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid,'Game.active'=>1,'NOT' => array( 'Game.id' => $existence)), 'limit' => $PaginateLimit, 'order' => array('Gamestat.playcount' => 'desc'), 'contain' => array('Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
        $cond = $this->paginate('Game');
        $this->set('games', $cond);

        $this->set('category', $category);
        $this->set('user', $user);

        $this->set('title_for_layout', $user['User']['username'] . ' Game Channel - Clone');
        $this->set('description_for_layout', 'Play games on ' . $user['User']['username'] . ' : ' . $user['User']['description']);
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

    function get_ads_info($authid = NULL) {
        //$limit = 10;
        if ($authid == NULL) {
            $authid = $this->Auth->user('id');
        }

        //======Getting all ads codes======
        $adcodes = $this->Adcode->find('all', array('conditions' => array('Adcode.user_id' => $authid)));

        $Ad_setting = $this->Ad_setting->find('all', array(
            'conditions' => array('Ad_setting.user_id' => $authid),
            'fields' => array('Ad_setting.ad_code_id'),
            'contain' => array('Ad_area' => array('fields' => array('Ad_area.name'))),
        )); //Recoded

        $this->set('adsettings', $Ad_setting);
        $this->set('adcodes', $adcodes);
    }

    /*
      function get_ads_info($userid = NULL, $authid = NULL) {
      //======Getting ads datas======
      $addata = $this->Ad_setting->find('all', array('contain' => array('homeBannerTop', 'homeBannerMiddle', 'homeBannerBottom'), 'conditions' => array('Ad_setting.user_id' => $userid)));
      $this->set('addata', $addata);

      if ($authid == $userid) {
      //======Getting all ads codes======
      $adcodes = $this->Adcode->find('all', array('conditions' => array('Adcode.user_id' => $authid)));
      $this->set('adcodes', $adcodes);
      $this->set('channel_owner', 1);
      }
      if (isset($_GET['mode']) && $_GET['mode'] == 'visitor') {
      $this->set('channel_owner', 0);
      }
      } */

    /**
     * Search method
     *
     * @param $userid =>user.id
     * @return Search Page
     */
    public function search2($userid, $searchterm = null) {
        $this->layout = 'Business/business';
        $authid = $this->Auth->user('id');
        $this->get_ads_info($userid);

        if ($searchterm === null) {
            if ($this->request->is("GET") && isset($this->request->query['srch-term'])) {
                $param = $this->request->query['srch-term'];
            } else {
                $this->redirect(array("controller" => "businesses", "action" => "mysite"));
            }
        } else {
            $param = $searchterm;
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
                'contain' => array('Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone'))),
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
        $this->set('userid', $userid);
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


        if (Configure::read('Domain.cname')) {
            $cdomain = Configure::read('Domain.c_root');
            $user_data = $this->Game->query('SELECT * from custom_domains WHERE domain ="' . $cdomain . '"');
            $userid = $user_data[0]['custom_domains']['user_id'];
            $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('User.id', 'User.username','User.screenname', 'User.verify','User.analitics'), 'contain' => false));
            $game = $this->Game->find('first', array('conditions' => array('Game.seo_url' => $id, 'Game.user_id' => $user['User']['id']), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id,Game.fullscreen,Game.width,Game.height,Game.type'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.fb_link,User.twitter_link,User.gplus_link,User.website,User.picture'), 'conditions' => array('User.id' => $user['User']['id'])), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
        } else {//if it is not cname
            if (!is_numeric($id)) {
                $subdomain = Configure::read('Domain.subdomain');
                $user = $this->User->find('first', array('conditions' => array('User.seo_username' => $subdomain), 'fields' => array('User.id', 'User.username','User.screenname', 'User.verify','User.analitics'), 'contain' => false));
                $game = $this->Game->find('first', array('conditions' => array('Game.seo_url' => $id, 'Game.user_id' => $user['User']['id']), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id,Game.fullscreen,Game.width,Game.height,Game.type'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.fb_link,User.twitter_link,User.gplus_link,User.website,User.picture'), 'conditions' => array('User.seo_username' => $subdomain)), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
            } else {
                $game = $this->Game->find('first', array('conditions' => array('Game.id' => $id), 'fields' => array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id,Game.fullscreen,Game.width,Game.height,Game.type'), 'contain' => array('User' => array('fields' => array('User.username,User.seo_username,User.adcode,User.picture')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone'))))); //Recoded
                $user = $this->User->find('first', array('conditions' => array('User.id' => $game['Game']['user_id']), 'fields' => array('User.id', 'User.username','User.screenname', 'User.verify','User.analitics'), 'contain' => false));
            }
        }


        $this->layout = 'Business/business';
        $user_id = $this->Auth->user('id');

        if($game['Game']['active']==0 && $game['Game']['user_id']!=$user_id)
        {
            $this->layout = 'Business/dashboard';
        $this->render('/Businesses/unpublished');
        }


        if ($game['Game']['clone'] == 1) {
            $original = $this->User->find('first', array('conditions' => array('User.id' => $game['Game']['owner_id']), 'fields' => array('User.adcode'), 'contain' => false));
            $game['User']['adcode'] = $original['User']['adcode'];
        }
        //it is a game
        $limit = 10;
        
        //$activityData = $this->Activity->find('all', array('contain' => array('PerformerUser' => array('fields' => array('PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username')), 'Game' => array('fields' => array('Game.id', 'Game.name', 'Game.seo_url', 'Game.embed')), 'ChannelUser' => array('fields' => array('ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username'))), 'fields' => array('Activity.id', 'Activity.performer_id', 'Activity.game_id', 'Activity.channel_id', 'Activity.msg_id', 'Activity.seen', 'Activity.notify', 'Activity.email', 'Activity.type', 'Activity.replied', 'Activity.created', 'PerformerUser.id', 'PerformerUser.username', 'PerformerUser.seo_username', 'ChannelUser.id', 'ChannelUser.username', 'ChannelUser.seo_username', 'Game.id', 'Game.name', 'Game.seo_url', 'Game.embed'), 'conditions' => array('Activity.game_id' => $game['Game']['id']), 'limit' => $limit, 'order' => 'Activity.created DESC'));
        //$this->set('tagActivities', $activityData);

        //This line gets user selected channel styles
        $this->get_style_settings($game['User']['id']);

        $limit = 12;
        $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $game['Game']['user_id']), 'limit' => $limit, 'order' => array('Game.recommend' => 'desc')));
        $cond = $this->paginate('Game');
        
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
        $this->get_ads_info($game['Game']['user_id']);

        $next_game = $this->Game->find('first', array(
            'contain' => false,
            'fields' => array(
                'Game.id',
                'Game.seo_url'
            ),
            'conditions' => array(
                'Game.user_id' => $game['Game']['user_id'],
                'not' => array(
                    'Game.id' => $id
                )
            ),
            'order' => 'rand()'
        ));
        $this->set('next_game', $next_game);

        $this->set('ownuser', $fav_check);
        $this->set('ownclone', $clone_check);
        $this->set('games', $cond);
        $this->set('user', $user);
        $this->set('game', $game);
        $this->set('title_for_layout', $game['Game']['name'] . ' - ' . $game['User']['seo_username'] . ' - Clone');
        $this->set('description_for_layout', 'Play ' . $game['Game']['name'] . ' for free: ' . $game['Game']['description']);
        $this->set('author_for_layout', 'Clone');

        if ($game['Game']['fullscreen'] == 1) {
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

        $this->sync_sorting();

        if (Configure::read('Domain.cname')) {
            $cdomain = Configure::read('Domain.c_root');
            $user_data = $this->Game->query('SELECT * from custom_domains WHERE domain ="' . $cdomain . '"');
            $c_userid = $user_data[0]['custom_domains']['user_id'];
            $category_name = $userid;
            $user = $this->User->find('first', array('conditions' => array('User.id' => $c_userid), 'fields' => array('*'), 'contain' => array('Userstat')));
            $cat_data = $this->Category->find('first', array('contain' => false, 'conditions' => array('Category.name' => $category_name), 'fields' => array('Category.id')));
            $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $user['User']['id'], 'Game.category_id' => $cat_data['Category']['id']), 'limit' => $PaginateLimit, 'order' => array('Game.recommend' => 'desc'), 'contain' => array('Category' => array('fields' => array('Category.name')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
            $userid = $user['User']['id'];
        } else {//if cname not exists
            if (!is_numeric($userid)) {

                $category_name = $userid;
                $subdomain = Configure::read('Domain.subdomain');
                $user = $this->User->find('first', array('conditions' => array('User.seo_username' => $subdomain), 'fields' => array('*'), 'contain' => array('Userstat')));

                $cat_data = $this->Category->find('first', array('contain' => false, 'conditions' => array('Category.name' => $category_name), 'fields' => array('Category.id')));

                $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $user['User']['id'], 'Game.category_id' => $cat_data['Category']['id']), 'limit' => $PaginateLimit, 'order' => array('Game.recommend' => 'desc'), 'contain' => array('Category' => array('fields' => array('Category.name')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
                $userid = $user['User']['id'];
            } else {

                $user = $this->User->find('first', array('conditions' => array('User.id' => $userid), 'fields' => array('*'), 'contain' => array('Userstat')));
                $this->paginate = array('Game' => array('conditions' => array('Game.active' => '1', 'Game.user_id' => $userid, 'Game.category_id' => $categoryid), 'limit' => $PaginateLimit, 'order' => array('Game.recommend' => 'desc'), 'contain' => array('Category' => array('fields' => array('Category.name')), 'Gamestat' => array('fields' => array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));
            }
        }



        $cond = $this->paginate('Game');
        $category = $this->Game->query('SELECT categories.id as id, categories.name FROM games join categories ON games.category_id = categories.id WHERE user_id=' . $userid . ' group by games.category_id');

        //This line gets user selected channel styles
        $this->get_style_settings($userid);

        $authid = $this->Auth->user('id');
        $this->get_ads_info($userid);
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
     * Featured Games method
     *
     * @param $userid =>user.id
     * @return Featured Games Page
     */
    public function featured($userid) {

        $this->layout = 'Business/business';
        $PaginateLimit = 12;

        //print_r($this->request->params);
        //Pagination with GET parameters
        //http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html#pagination-with-get-parameters

        $this->sync_sorting();


        if (Configure::read('Domain.cname')) {
            $cdomain = Configure::read('Domain.c_root');
            $user_data = $this->Game->query('SELECT * from custom_domains WHERE domain ="' . $cdomain . '"');
            $c_userid = $user_data[0]['custom_domains']['user_id'];
            $user = $this->User->find('first', array('conditions' => array('User.id' => $c_userid), 'fields' => array('*')));
            $userid = $user['User']['id'];
        } else {//if it is not cname
            if (!is_numeric($userid)) {
                $subdomain = Configure::read('Domain.subdomain');
                $user = $this->User->find('first', array('conditions' => array(
                        'User.seo_username' => $subdomain
                    ),
                    'fields' => array(
                        '*'
                    )
                ));
                $userid = $user['User']['id'];
            } else {
                $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.id' => $userid
                    ),
                    'fields' => array(
                        '*'
                    )
                ));
            }
        }



        $this->paginate = array(
            'Game' => array(
                'conditions' => array(
                    'Game.active' => 1,
                    'Game.user_id' => $userid,
                    'Game.featured' => 1
                ),
                'contain' => array(
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount',
                            'Gamestat.favcount',
                            'Gamestat.channelclone',
                            'Gamestat.potential'
                        ),
                    )
                ),
                'order' => array(
                    'Gamestat.potential' => 'desc'
                ),
                'limit' => $PaginateLimit
            )
        );
        $cond = $this->paginate('Game');

        $category = $this->Game->query('SELECT categories.id as id, categories.name FROM games join categories ON games.category_id = categories.id WHERE user_id=' . $userid . ' group by games.category_id');

        //This line gets user selected channel styles
        $this->get_style_settings($userid);

        //========Get Current Subscription===============
        $authid = $this->Session->read('Auth.User.id');
        $this->get_ads_info($userid);
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

        $this->sync_sorting();


        if (Configure::read('Domain.cname')) {
            $cdomain = Configure::read('Domain.c_root');
            $user_data = $this->Game->query('SELECT * from custom_domains WHERE domain ="' . $cdomain . '"');
            $c_userid = $user_data[0]['custom_domains']['user_id'];
            $user = $this->User->find('first', array('conditions' => array('User.id' => $c_userid), 'fields' => array('*')));
            $userid = $user['User']['id'];
        } else {//if cname not exists
            if (!is_numeric($userid)) {
                $subdomain = Configure::read('Domain.subdomain');
                $user = $this->User->find('first', array('conditions' => array(
                        'User.seo_username' => $subdomain
                    ),
                    'fields' => array(
                        '*'
                    )
                ));
                $userid = $user['User']['id'];
            } else {
                $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.id' => $userid
                    ),
                    'fields' => array(
                        '*'
                    )
                ));
            }
        }



        $this->paginate = array(
            'Game' => array(
                'conditions' => array(
                    'Game.active' => '1',
                    'Game.user_id' => $userid
                ),
                'limit' => $PaginateLimit,
                'order' => array(
                    'Gamestat.potential' => 'desc'
                ),
                'contain' => array(
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount',
                            'Gamestat.favcount',
                            'Gamestat.channelclone'
                        )
                    )
                )
            )
        );
        $cond = $this->paginate('Game');

        $category = $this->Game->query('SELECT categories.id as id, categories.name FROM games join categories ON games.category_id = categories.id WHERE user_id=' . $userid . ' group by games.category_id');

        //This line gets user selected channel styles
        $this->get_style_settings($userid);

        //========Get Current Subscription===============
        $authid = $this->Session->read('Auth.User.id');
        $this->get_ads_info($userid);
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
    public function mygames($filter = NULL) {
        $this->layout = 'Business/dashboard';
        $this->sideBar();

        //print_r($this->request->params);
        //Pagination with GET parameters
        //http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html#pagination-with-get-parameters

        $this->sync_sorting();


        $userid = $this->Session->read('Auth.User.id');
        $limit = 12;
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
                    'Game.mobileready',
                    'Game.picture',
                    'Game.starsize',
                    'Game.rate_count',
                    'Game.embed',
                    'Game.featured',
                    'Game.active',
                    'Game.clone',
                    'Game.created',
                    'Game.priority',
                    'Game.install',
                    'Game.link',
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
        if ($filter === 'mobiles') {
            $activefilter = 1;
            $this->paginate['Game']['conditions']['Game.mobileready'] = 1;
        } elseif ($filter === 'featured') {
            $activefilter = 2;
            $this->paginate['Game']['conditions']['Game.featured'] = 1;
        } elseif ($filter === 'draft') {
            $activefilter = 3;
            $this->paginate['Game']['conditions']['Game.active'] = 0;
        } else {
            $activefilter = 0;
        }
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->set('activefilter', $activefilter);
        $this->set('title_for_layout', 'Clone Business My Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/mygames');
    }

    public function mygames_search($filter = NULL) {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $userid = $this->Session->read('Auth.User.id');
        if ($this->request->is("GET") && isset($this->request->query['q'])) {
            $query = $this->request->query['q'];
            $this->set('query', $query);
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "mygames"));
        }
        $limit = 12;
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
                    'Game.mobileready',
                    'Game.picture',
                    'Game.starsize',
                    'Game.rate_count',
                    'Game.embed',
                    'Game.featured',
                    'Game.active',
                    'Game.clone',
                    'Game.created',
                    'Game.priority',
                    'Game.install',
                    'Game.link',
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
        $activefilter = 0;
        if ($filter === 'mobiles') {
            $activefilter = 1;
            $this->paginate['Game']['conditions']['Game.mobileready'] = 1;
        } elseif ($filter === 'featured') {
            $activefilter = 2;
            $this->paginate['Game']['conditions']['Game.featured'] = 1;
        } elseif ($filter === 'draft') {
            $activefilter = 3;
            $this->paginate['Game']['conditions']['Game.active'] = 0;
        } else {
            $activefilter = 0;
        }
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->set('activefilter', $activefilter);
        $this->set('title_for_layout', 'Clone Business My Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/mygames');
    }

    public function favorites() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();

        $this->sync_sorting();


        //This function allow to use belong to with custom conditions
        //Author:Ogi
        $this->Favorite->bindModel(
                array(
                    'belongsTo' => array(
                        'Gamestat' => array(
                            'className' => 'Gamestat',
                            'foreignKey' => false,
                            'conditions' => array('Favorite.game_id = Gamestat.game_id'),
                            'fields' => '',
                            'dependent' => false,
                            'order' => ''
                        )
                    )
                )
        );


        $userid = $this->Session->read('Auth.User.id');
        $limit = 12;
        $this->paginate = array(
            'Favorite' => array(
                'conditions' => array(
                    'Favorite.user_id' => $userid
                ),
                'limit' => $limit,
                'order' => array(
                    'Favorite.id' => 'desc'
                ),
                'contain' => array(
                    'Game' => array(
                        'fields' => array(
                            'Game.name',
                            'Game.seo_url',
                            'Game.fullscreen',
                            'Game.mobileready',
                            'Game.id',
                            'Game.link',
                            'Game.install',
                            'Game.active',
                            'Game.picture',
                            'Game.starsize',
                            'Game.embed',
                            'Game.rate_count'
                        ),
                        'User' => array(
                            'fields' => array(
                                'User.username',
                                'User.seo_username',
                                'User.id',
                                'User.picture',
                                'User.verify'
                            )
                        )
                    ),
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount',
                            'Gamestat.favcount',
                            'Gamestat.channelclone',
                            'Gamestat.potential'
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
            $this->set('query', $query);
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "favorites"));
        }
        $userid = $this->Session->read('Auth.User.id');
        $limit = 12;
        $this->paginate = array(
            'Favorite' => array(
                'conditions' => array(
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
                            'Game.fullscreen',
                            'Game.mobileready',
                            'Game.id',
                            'Game.install',
                            'Game.link',
                            'Game.picture',
                            'Game.starsize',
                            'Game.embed'
                        ),
                        'User' => array('fields' => array(
                                'User.id',
                                'User.username',
                                'User.screenname',
                                'User.seo_username'
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

    public function exploregames($filter = null) {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $this->sync_sorting();
        $limit = 12;
        $this->paginate = array(
            'Game' => array(
                'fields' => array(
                    'Game.name',
                    'Game.seo_url',
                    'Game.id',
                    'Game.fullscreen',
                    'Game.mobileready',
                    'Game.install',
                    'Game.link',
                    'Game.picture',
                    'Game.starsize',
                    'Game.rate_count',
                    'Game.embed',
                    'Game.featured',
                    'Game.clone',
                    'Game.created'
                ),
                'contain' => array(
                    'User' => array(
                        'fields' => array(
                            'User.seo_username',
                            'User.verify',
                            'User.username',
                            'User.picture'
                        )
                    ),
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount',
                            'Gamestat.favcount',
                            'Gamestat.channelclone'
                        )
                    )
                ),
                'conditions' => array(
                    'NOT' => array(
                        'Game.priority' => NULL
                    ),'Game.active'=>1
                ),
                'order' => array(
                    'Game.priority' => 'DESC',
                    'Gamestat.potential' => 'DESC',
                    'Game.clone' => 'ASC'
                ),
                'limit' => $limit
            )
        );
        switch ($filter) {
            case 'mobiles':
                $activefilter = 1;
                $this->paginate['Game']['conditions']['Game.mobileready'] = 1;
                break;
            case 'fullscreen':
                $activefilter = 2;
                $this->paginate['Game']['conditions']['Game.fullscreen'] = 1;
                break;
            case 'embed':
                $activefilter = 3;
                $this->paginate['Game']['conditions']['Game.fullscreen'] = 0;
                break;
            default:
                $activefilter = 0;
        }
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->set('userid', $this->Auth->user('id'));
        $this->set('activefilter', $activefilter);
        $this->set('title_for_layout', 'Clone Business Explore Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/exploregames');
    }

    public function exploregames_search($filter = null) {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        if ($this->request->is("GET") && isset($this->request->query['q'])) {
            $query = $this->request->query['q'];
            $this->set('query', $query);
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "exploregames"));
        }
        $limit = 12;
        $this->paginate = array(
            'Game' => array(
                'fields' => array(
                    'Game.name',
                    'Game.seo_url',
                    'Game.id',
                    'Game.fullscreen',
                    'Game.mobileready',
                    'Game.install',
                    'Game.link',
                    'Game.picture',
                    'Game.starsize',
                    'Game.rate_count',
                    'Game.embed',
                    'Game.featured',
                    'Game.clone',
                    'Game.created'
                ),
                'contain' => array(
                    'User' => array(
                        'fields' => array(
                            'User.seo_username',
                            'User.verify',
                            'User.username',
                            'User.picture'
                        )
                    ),
                    'Gamestat' => array(
                        'fields' => array(
                            'Gamestat.playcount',
                            'Gamestat.favcount',
                            'Gamestat.channelclone'
                        )
                    )
                ),
                'conditions' => array(
                    'OR' => array(
                        'Game.description LIKE' => '%' . $query . '%',
                        'Game.name LIKE' => '%' . $query . '%',
                        'User.username LIKE' => '%' . $query . '%',
                        'User.screenname LIKE' => '%' . $query . '%'
                    ),
                    'NOT' => array(
                        'Game.priority' => NULL
                    ),'Game.active'=>1
                ),
                'order' => array(
                    'Game.priority' => 'DESC',
                    'Gamestat.potential' => 'DESC',
                    'Game.clone' => 'ASC'
                ),
                'limit' => $limit
            )
        );
        switch ($filter) {
            case 'mobiles':
                $activefilter = 1;
                $this->paginate['Game']['conditions']['Game.mobileready'] = 1;
                break;
            case 'fullscreen':
                $activefilter = 2;
                $this->paginate['Game']['conditions']['Game.fullscreen'] = 1;
                break;
            case 'embed':
                $activefilter = 3;
                $this->paginate['Game']['conditions']['Game.fullscreen'] = 0;
                break;
            default:
                $activefilter = 0;
        }
        $cond = $this->paginate('Game');
        $this->set('games', $cond);
        $this->set('userid', $this->Auth->user('id'));
        $this->set('activefilter', $activefilter);
        $this->set('title_for_layout', 'Clone Business Explore Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/exploregames');
    }

    public function exploregames_sorting($field, $target) {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $limit = 12;
        $find = array(
            'fields' => array(
                'Game.name',
                'Game.seo_url',
                'Game.id',
                'Game.fullscreen',
                'Game.mobileready',
                'Game.picture',
                'Game.starsize',
                'Game.rate_count',
                'Game.embed',
                'Game.featured',
                'Game.clone',
                'Game.created'
            ),
            'limit' => $limit,
            'contain' => array(
                'User' => array(
                    'fields' => array(
                        'User.seo_username',
                        'User.verify',
                        'User.username',
                        'User.picture'
                    )
                ),
                'Gamestat' => array(
                    'fields' => array(
                        'Gamestat.playcount',
                        'Gamestat.favcount',
                        'Gamestat.channelclone'
                    )
                )
            ),
            'conditions' => array(
                'NOT' => array(
                    'Game.priority' => NULL
                ),
                'Game.clone' => 0
            ),
            'order' => array(
                'Game.id' => 'DESC'
            )
        );
        switch ($target) {
            case 'asc':
                $target = 'ASC';
                break;
            case 'desc':
                $target = 'DESC';
                break;
            default :
                exit;
                break;
        }
        switch ($field) {
            case 'name':
                $find['order'] = array('Game.name' => $target);
                break;
            case 'owner':
                $find['order'] = array('User.username' => $target);
                break;
            case 'clones':
                $find['order'] = array('Game.clone' => $target);
                break;
            case 'favorites':
                $find['order'] = array('Gamestat.favcount' => $target);
                break;
            case 'plays':
                $find['order'] = array('Gamestat.playcount' => $target);
                break;
            case 'rates':
                $find['order'] = array('Game.rate_count' => $target);
                break;
            default :
                exit;
                break;
        }
        $data = $this->Game->find('all', $find);
        $cond = $this->paginate($data);
        $this->set('games', $cond);
        $this->set('activefilter', $activefilter);
        $this->set('title_for_layout', 'Clone Business Explore Games');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/exploregames');
    }

    public function following() {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        $userid = $this->Session->read('Auth.User.id');
        $limit = 12;

        $this->sync_sorting();

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

        //This function allow to use belong to with custom conditions
        //Author:Ogi
        $this->Subscription->bindModel(
                array(
                    'belongsTo' => array(
                        'Userstat' => array(
                            'className' => 'Userstat',
                            'foreignKey' => false,
                            'conditions' => array('Subscription.subscriber_to_id = Userstat.user_id'),
                            'fields' => '',
                            'dependent' => false,
                            'order' => ''
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
                            'User.id',
                            'User.seo_username',
                            'User.verify',
                            'User.username',
                            'User.screenname',
                            'User.picture',
                            'User.banner'
                        )
                    ), 'Userstat'
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
            $this->set('query', $query);
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "following"));
        }
        $userid = $this->Session->read('Auth.User.id');
        $limit = 12;
        //$this->Subscription->recursive=2;
        //$weird_datas=$this->Subscription->find('all');print_r($weird_datas);

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

        //This function allow to use belong to with custom conditions
        //Author:Ogi
        $this->Subscription->bindModel(
                array(
                    'belongsTo' => array(
                        'Userstat' => array(
                            'className' => 'Userstat',
                            'foreignKey' => false,
                            'conditions' => array('Subscription.subscriber_to_id = Userstat.user_id'),
                            'fields' => '',
                            'dependent' => false,
                            'order' => ''
                        )
                    )
                )
        );

        $this->paginate = array(
            'Subscription' => array(
                'conditions' => array(
                    'Subscription.subscriber_id' => $userid,
                    'User.username LIKE' => '%' . $query . '%'
                ),
                'contain' => array(
                    'User' => array(
                        'fields' => array(
                            'User.id',
                            'User.seo_username',
                            'User.verify',
                            'User.username',
                            'User.screenname',
                            'User.picture',
                            'User.banner'
                        )
                    ), 'Userstat'
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
        $limit = 12;

        $this->sync_sorting();

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

        //This function allow to use belong to with custom conditions
        //Author:Ogi
        $this->Subscription->bindModel(
                array(
                    'belongsTo' => array(
                        'Userstat' => array(
                            'className' => 'Userstat',
                            'foreignKey' => false,
                            'conditions' => array('Subscription.subscriber_id = Userstat.user_id'),
                            'fields' => '',
                            'dependent' => false,
                            'order' => ''
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
                            'User.id',
                            'User.seo_username',
                            'User.verify',
                            'User.username',
                            'User.picture',
                            'User.banner'
                        )
                    ), 'Userstat'
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
            $this->set('query', $query);
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "followers"));
        }
        $userid = $this->Session->read('Auth.User.id');
        $limit = 12;

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

        //This function allow to use belong to with custom conditions
        //Author:Ogi
        $this->Subscription->bindModel(
                array(
                    'belongsTo' => array(
                        'Userstat' => array(
                            'className' => 'Userstat',
                            'foreignKey' => false,
                            'conditions' => array('Subscription.subscriber_id = Userstat.user_id'),
                            'fields' => '',
                            'dependent' => false,
                            'order' => ''
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
                            'User.id',
                            'User.seo_username',
                            'User.verify',
                            'User.username',
                            'User.picture',
                            'User.banner'
                        )
                    ), 'Userstat'
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

        $this->sync_sorting();

        $userid = $this->Session->read('Auth.User.id');
        $limit = 12;
        $this->paginate = array(
            'User' => array(
                'fields' => array(
                    'User.id',
                    'User.username',
                    'User.seo_username',
                    'User.verify',
                    'User.picture',
                    'User.banner'
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
                    'User.priority' => 'DESC',
                    'Userstat.potential' => 'DESC',
                    'User.verify' => 'DESC'
                ),
                'conditions' => array(
                    'NOT' => array(
                        'User.verify' => NULL
                    )
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
            $this->set('query', $query);
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "followers"));
        }
        $userid = $this->Session->read('Auth.User.id');
        $limit = 12;
        $this->paginate = array(
            'User' => array(
                'fields' => array(
                    'User.id',
                    'User.username',
                    'User.seo_username',
                    'User.verify',
                    'User.picture',
                    'User.banner'
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
                    'User.priority' => 'DESC',
                    'Userstat.potential' => 'DESC',
                    'User.verify' => 'DESC'
                ),
                'conditions' => array(
                    'User.username LIKE' => '%' . $query . '%',
                    'NOT' => array(
                        'User.verify' => NULL
                    )
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
        $this->getallnotifications();
        $this->set('title_for_layout', 'Clone Business Dashboard');
        $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
        $this->set('author_for_layout', 'Clone');
        $this->render('/Businesses/dashboard/activities');
    }

    /**
     * Dashboard Main Search
     *
     * @param string $filter
     * @author Emircan Ok
     */
    public function main_search($filter) {
        $this->layout = 'Business/dashboard';
        $this->sideBar();
        if ($this->request->is("GET") && isset($this->request->query['q'])) {
            $query = $this->request->query['q'];
            $this->set('query', $query);
        } else {
            $this->redirect(array("controller" => "businesses", "action" => "dashboard"));
        }
        $this->set('userid', $this->Auth->user('id'));
        $this->set('query', $query);
        $this->set('active_filter', $filter);
        $limit = 12;
        switch ($filter) {
            case 'games':
                $this->paginate = array(
                    'Game' => array(
                        'fields' => array(
                            '*'
                        ),
                        'limit' => $limit,
                        'order' => array(
                            'Game.clone' => 'ASC',
                            'Game.priority' => 'DESC',
                            'Gamestat.potential' => 'DESC'
                        ),
                        'conditions' => array(
                            'Game.priority != ' => NULL,
                            'Game.active' => '1',
                            'OR' => array(
                                'Game.description LIKE' => '%' . $query . '%',
                                'Game.name LIKE' => '%' . $query . '%',
                                'User.username LIKE' => '%' . $query . '%',
                                'User.screenname LIKE' => '%' . $query . '%'
                            ),
                            'NOT' => array(
                                'Game.priority' => NULL
                            )
                        )
                    )
                );
                $data = $this->paginate('Game');
                $this->set('result', $data);
                $this->set('title_for_layout', 'Clone Business Search');
                $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
                $this->set('author_for_layout', 'Clone');
                $this->render('/Businesses/dashboard/search/games');
                break;
            case 'channels':
                $this->paginate = array(
                    'User' => array(
                        'fields' => array(
                            'User.id',
                            'User.username',
                            'User.seo_username',
                            'User.verify',
                            'User.picture',
                            'User.banner'
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
                            'User.verify' => 'DESC',
                            'Userstat.potential' => 'DESC'
                        ),
                        'conditions' => array(
                            'User.username LIKE' => '%' . $query . '%',
                            'NOT' => array(
                                'User.verify' => NULL
                            ),
                            '(SELECT count(games.id) from games where games.user_id = `User`.`id`)',
                        ),
                        'limit' => $limit,
                    )
                );
                $data = $this->paginate('User');
                $this->set('result', $data);
                $this->set('following', $data);
                $this->set('title_for_layout', 'Clone Business Search');
                $this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
                $this->set('author_for_layout', 'Clone');
                $this->render('/Businesses/dashboard/search/channels');
                break;
        }
    }

}
