<?php

class CloneAdminAppController extends AppController {
    
    public function  beforeFilter() {
    parent::beforeFilter();
    
    $this->Auth->loginAction = array('plugin' => false,'controller' => 'games', 'action' => 'index');
    $this->Auth->logoutRedirect = array('plugin' => false,'controller' => 'games', 'action' => 'index');

	
    }



}
?>