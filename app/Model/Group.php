<?php

/**
 * Group Model
 *
 */
class Group extends AppModel {

    public $name = 'Group';
    public $useTable = "groups";
    public $validate = array(
        'name' => array(
            'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Group name can not be empty.'),
            'unique' => array('rule' => 'isUnique','message' => 'Group name already in use.')
        )
    );
    public $actsAs = array('Acl' => array('type' => 'requester'));

    function parentNode() {
        return null;
    }
    

}
