<?php

App::uses('AclManagementAppController', 'AclManagement.Controller');

/**
 * Posts Controller
 *
 * @property Post $Post
 */
class UserPermissionsController extends AclManagementAppController {
    public $helpers = array('AclManagement.Tree');
    public $Permission = null;

    public function  beforeFilter() {
        parent::beforeFilter();

        //denied from unauth users!
        $this->Auth->deny('index','edit');

	$this->Permission = ClassRegistry::init('Permission');
    }

    private function __acosList(){
        $results = $this->Acl->Aco->find('all',
            array(
                'order' => array('lft' => 'ASC'),
                'recursive' => -1,
                'fields' => array('alias', 'id', 'lft', 'rght', 'parent_id')
            )
        );

        $this->__acos_details($results);
        return $results;
    }
    public function index(){
        $this->layout = 'twitter';
        
        $this->loadModel('Group');
        $roles=$this->Group->find('all');
        $this->set('roles',$roles);

        $this->set('results', $this->__acosList());
    }

    public function sync(){
        $this->layout = 'ajax';
        set_time_limit(0);

	Configure::write('debug', 1);

        App::uses('AclExtras', 'AclManagement.Lib');
        $acl = new AclExtras();
        $acl->aco_sync();

        $permissions = ClassRegistry::init('Permission');
        $checkAdminPerm = $permissions->find('count', array('conditions'=>array('aro_id'=>1, 'aco_id'=>1)));
        
        /*
        if($checkAdminPerm <= 0){
            //Allow admins to everything
            $this->loadModel('Group');
            $group = $this->Group;
            $group->id = 1;
            $this->Acl->allow($group, 'controllers');
        }
        */

        $this->set('results', $this->__acosList());
    }


    function grant_all_controllers($role_id)
    {
        $this->loadModel('Group');
        $role =& $this->Group;
        $role->id = $role_id;
        
        /*
         * Check if the Role exists in the ARO table
         */
        $node = $this->Acl->Aro->node($role);
        if(empty($node))
        {
            $asked_role = $role->read(null, $role_id);
            $this->Session->setFlash(sprintf(__d('acl', "The role '%s' does not exist in the ARO table"), $asked_role['Role']['name']), 'flash_error', null, 'acl_management');
        }
        else
        {
            //Allow to everything
            $this->Acl->allow($role, 'controllers');
        }
        
        $this->redirect($this->referer(array('controller'=>'user_permissions','action' => 'index')));
    }

    function deny_all_controllers($role_id)
    {
        $this->loadModel('Group');
        $role =& $this->Group;
        $role->id = $role_id;
        
        /*
         * Check if the Role exists in the ARO table
         */
        $node = $this->Acl->Aro->node($role);
        if(empty($node))
        {
            $asked_role = $role->read(null, $role_id);
            $this->Session->setFlash(sprintf(__d('acl', "The role '%s' does not exist in the ARO table"), $asked_role['Role']['name']), 'flash_error', null, 'acl_management');
        }
        else
        {
            //Deny everything
            $this->Acl->deny($role, 'controllers');
        }
        
        $this->redirect($this->referer(array('controller'=>'user_permissions','action' => 'index')));
    }


    function empty_permissions()
    {
        if($this->Acl->Aro->Permission->deleteAll(array('Permission.id > ' => 0)))
        {
            $this->Session->setFlash(__d('acl', 'The permissions have been cleared'), 'flash_message', null, 'acl_management');
        }
        else
        {
            $this->Session->setFlash(__d('acl', 'The permissions could not be cleared'), 'flash_error', null, 'acl_management');
        }
        
        $this->redirect($this->referer(array('action' => 'index')));
    }


    public function edit($acoId) {
        $this->layout = "ajax";
        $acoPath = $this->Acl->Aco->getPath($acoId);


        if (!$acoPath) {
            return;
        }

        $aros = array();

        $this->loadModel('Group');

        

        foreach ($this->Group->find('all') as $role) {

            $arodata=$this->Acl->Aro->find('first',array('conditions'=>array('Aro.foreign_key'=>$role['Group']['id'])));

            //Bütün bir tree path kontrol edilir.
            foreach($acoPath as $acos)
            { 
              $hasAny = array(
                'aco_id' => $acos['Aco']['id'],
                'aro_id' => $arodata['Aro']['id'],
                '_create' => 1,
                '_read' => 1,
                '_update' => 1,
                '_delete' => 1
              );

              $checked=(int)$this->Permission->hasAny($hasAny);
              if($checked)
              {  //Check is there negative access for this action
                 if($acos['Aco']['id']!=$acoId)
                 {
                    $hasAny = array(
                    'aco_id' => $acoId,
                    'aro_id' => $arodata['Aro']['id'],
                    '_create' => -1,
                    '_read' => -1,
                    '_update' => -1,
                    '_delete' => -1
                    );
                    $checked=!(int)$this->Permission->hasAny($hasAny);
                 }   
              }  

              if($checked)
              break; 
            }
              
            
            $aros[$role['Group']['name']] = array(
                'id' => $arodata['Aro']['id'],
                'allowed' => $checked
            );
        }

        $results = $this->Acl->Aco->find('all',
            array(
                'order' => array('lft' => 'ASC'),
                'recursive' => -1,
                'fields' => array('alias', 'id', 'lft', 'rght', 'parent_id')
            )
        );

        $this->__acos_details($results);

        $this->set('acoPath', $acoPath);
        $this->set('aros', $aros);
    }

    public function checktopaccess($acoId, $aroId)
    {
        $acoPath = $this->Acl->Aco->getPath($acoId);
        //Bütün bir tree path kontrol edilir.
            
            foreach($acoPath as $acos)
            {
                $hasAny = array(
                'aco_id' => $acos['Aco']['id'],
                'aro_id' => $aroId,
                '_create' => 1,
                '_read' => 1,
                '_update' => 1,
                '_delete' => 1
                );

                $checked=(int)$this->Permission->hasAny($hasAny);
                
                if($checked && $acoId!=$acos['Aco']['id'])
                { 
                return 1;
                }else{
                return 0;
                }
            }       

    }

    public function toggle($acoId, $aroId) {
        $this->layout = "ajax";
        if ($aroId != 1) {
            $this->loadModel('Permission');

            $conditions = array(
                'Permission.aco_id' => $acoId,
                'Permission.aro_id' => $aroId,
            );

            if ($this->Permission->hasAny($conditions)) {
                $data = $this->Permission->find('first', array('conditions' => $conditions));

               if ($data['Permission']['_create'] == 1 &&
                    $data['Permission']['_read'] == 1 &&
                    $data['Permission']['_update'] == 1 &&
                    $data['Permission']['_delete'] == 1) {
                    // from 1 to 0
                    $data['Permission']['_create'] = -1;
                    $data['Permission']['_read'] = -1;
                    $data['Permission']['_update'] = -1;
                    $data['Permission']['_delete'] = -1;
                    $allowed = 0;
                } else {
                    // from 0 to 1
                    $data['Permission']['_create'] = 1;
                    $data['Permission']['_read'] = 1;
                    $data['Permission']['_update'] = 1;
                    $data['Permission']['_delete'] = 1;
                    $allowed = 1;
                }
            } else {//Üst yetki varya -1 ekle yoksa 1 ekle.
                // create - CRUD with 1

               if($this->checktopaccess($acoId,$aroId))
               {
                  $data['Permission']['aco_id'] = $acoId;
                  $data['Permission']['aro_id'] = $aroId;
                  $data['Permission']['_create'] = -1;
                  $data['Permission']['_read'] = -1;
                  $data['Permission']['_update'] = -1;
                  $data['Permission']['_delete'] = -1;
                  $allowed = 0;
               }else{

                $data['Permission']['aco_id'] = $acoId;
                $data['Permission']['aro_id'] = $aroId;
                $data['Permission']['_create'] = 1;
                $data['Permission']['_read'] = 1;
                $data['Permission']['_update'] = 1;
                $data['Permission']['_delete'] = 1;
                $allowed = 1;
                }
            }

            $this->Permission->save($data);
            $this->set('allowed', $allowed);
        } else {
            $this->set('allowed', 1);
        }
    }

    private function __acos_details($results) {
        $list = $acosYaml = array();
        App::import('Vendor', 'Spyc');
        foreach ($results as $aco) {
            $list[$aco['Aco']['id']] = $aco['Aco'];

            if (!$aco['Aco']['parent_id']) { # module
                if (CakePlugin::loaded($aco['Aco']['alias'])) {
                    $ppath = CakePlugin::path($aco['Aco']['alias']);
                    $isField = strpos($ppath, DS . 'Fields' . DS);
                    $isTheme = strpos($ppath, DS . 'Themed' . DS);

                    if ($isField) {
                        $m = array();
                        $m['yaml'] = Spyc::YAMLLoad("{$ppath}{$aco['Aco']['alias']}.yaml");
                    } else {
                        $m = Configure::read('Modules.' . $aco['Aco']['alias']);
                    }

                    if ($isField) {
                        $list[$aco['Aco']['id']]['name'] = __d('locale', 'Field: %s', $m['yaml']['name']);
                    } elseif ($isTheme) {
                        $list[$aco['Aco']['id']]['name'] = __d('locale', 'Theme: %s', $m['yaml']['name']);
                    } else {
                        $list[$aco['Aco']['id']]['name'] = __d('locale', 'Module: %s', $m['yaml']['name']);
                    }

                    $list[$aco['Aco']['id']]['description'] = $m['yaml']['description'];

                    if (file_exists("{$ppath}acos.yaml")) {
                        $acosYaml[$aco['Aco']['id']] = Spyc::YAMLLoad("{$ppath}acos.yaml");
                    }
                } else {
                    $list[$aco['Aco']['id']]['name'] = $aco['Aco']['alias'];
                    $list[$aco['Aco']['id']]['description'] = '';
                }
            } else {
                // controller
                if (isset($acosYaml[$aco['Aco']['parent_id']])) {
                    $yaml = $acosYaml[$aco['Aco']['parent_id']];

                    $list[$aco['Aco']['id']]['name'] = isset($yaml[$aco['Aco']['alias']]['name']) ? $yaml[$aco['Aco']['alias']]['name'] : $aco['Aco']['alias'];
                    $list[$aco['Aco']['id']]['description'] = isset($yaml[$aco['Aco']['alias']]['description']) ? $yaml[$aco['Aco']['alias']]['description'] : '';
                } elseif (isset($list[$aco['Aco']['parent_id']])) { # method
                    $controller = $list[$aco['Aco']['parent_id']];
                    $yaml = isset($acosYaml[$controller['parent_id']]) ? $acosYaml[$controller['parent_id']] : array();

                    $list[$aco['Aco']['id']]['name'] = isset($yaml[$controller['alias']]['actions'][$aco['Aco']['alias']]['name']) ? $yaml[$controller['alias']]['actions'][$aco['Aco']['alias']]['name']: $aco['Aco']['alias'];
                    $list[$aco['Aco']['id']]['description'] = isset($yaml[$controller['alias']]['actions'][$aco['Aco']['alias']]['description']) ? $yaml[$controller['alias']]['actions'][$aco['Aco']['alias']]['description'] : '';
                }
            }

            $this->set('acos_details', $list);
        }
    }
}
?>
