<?php
class Role extends AppModel {

	var $name = 'Role';
	
	var $actsAs = array('Acl' => array('requester'));
	
	function parentNode() {
		return null;
	}

	function afterSave(){

        $saveAro = false;

        if ($this->getLastInsertID()){

            $saveAro = true;

            $insertId = $this->getLastInsertID();

        }else{

            if ($this->data[$this->name]['id']){

                $saveAro = true;

                $insertId = $this->data[$this->name]['id'];

            }

        }

        if ($saveAro == true){

                $aroRecord = $this->Aro->find('first', array('conditions' => array('foreign_key' => $insertId, 'model' => $this->name)));

                $aroRecord['Aro']['alias'] = $this->name . '::' . $this->data[$this->name][$this->displayField];

                $this->Aro->save($aroRecord);

        }

    }



}
?>