<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'Username';
/**
 * Validation rules
 *
 * @var array
 */


      

		var $actsAs = array(
	'UploadPack.Upload' => array(
		'picture' => array(
			'path' => ':webroot/upload/:model/:id/:basename_:style.:extension','styles' => array('useravatar' => '90x120')
		)
	)
);


public function beforeSave() {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
}

public function isOwnedBy($user1, $user) {
		if($user1==$user){
			return true;
		}
		else{
			return false;
		}
	    //return $this->field('id', array('id' => $user1, 'id' => $user)) === $user1;
	}


function getActivationHash()
	{
		if (!isset($this->id)) {
			return false;
		}
		return substr(Security::hash(Configure::read('Security.salt') . $this->field('created') . date('Ymd')), 0, 8);
	}


 function identicalFieldValues( $field=array(), $compare_field=null )  
    { 
        foreach( $field as $key => $value ){ 
            $v1 = $value; 
            $v2 = $this->data[$this->name][ $compare_field ];                  
            if($v1 !== $v2) { 
                return FALSE; 
            } else { 
                continue; 
            } 
        } 
        return TRUE; 
    } 

	public $validate = array(
		'id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please dont leave this field empty',
				),

			'login' => array(
				'rule' => 'isUnique',
				'message' => 'This username has already been taken.'
				),

			'between' => array(
				'rule' => array('between', 6, 20),
				'message' => 'Username must be between 6-20 characters long',
				),
				
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			
		),
		'email' => array(

			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please dont leave this field empty',
				),

			'login' => array(
				'rule' => 'isUnique',
				'message' => 'This email is already registered'
				),
				
			'email' => array(
				'rule' => array('email', true),
				'message' => 'Please supply a valid email address.',
				),		
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			
		),
		
		
'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please dont leave this field empty',
				),
				
			'identicalFieldValues' => array( 
		        'rule' => array('identicalFieldValues', 'confirm_password' ), 
		        'message' => 'Please re-enter your password twice so that the values match'), 

				'between' => array(
				'rule' => array('between', 6, 20),
				'message' => 'Passwords must be between 6 and 20 characters long.',
				),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
		


		
		'confirm_new_password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please dont leave this field empty',
				),
				
			'identicalFieldValues' => array( 
		        'rule' => array('identicalFieldValues', 'new_password' ), 
		        'message' => 'Please re-enter your password twice so that the values match'), 

				'between' => array(
				'rule' => array('between', 6, 20),
				'message' => 'Passwords must be between 6 and 20 characters long.',
				),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
		
		
		'active' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public $hasMany = array(
		'Game' => array(
			'className' => 'Game',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		));
	
	public $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

//uploadcount and totalrate can be use as order of channels
//var $virtualFields = array('uploadcount' => 'SELECT COUNT(id) FROM Games where Games.user_id=User.id','totalrate'=>'(SELECT SUM(current) FROM Rates where Rates.game_id IN (SELECT id FROM Games where Games.user_id=User.id))');

}
