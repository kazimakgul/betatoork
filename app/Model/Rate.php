<?php
App::uses('AppModel', 'Model');
/**
 * Rate Model
 *
 * @property Game $Game
 * @property User $User
 */
class Rate extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
//	public $useTable = 'Rates';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'game_id';
	
	
	public function isOwnedBy($rate, $user) {
	    return $this->field('id', array('id' => $rate, 'user_id' => $user)) === $rate;
	}
	
	
	
	var $virtualFields = array('sumrate' => 'SUM(Rate.current)');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'game_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Game' => array(
			'className' => 'Game',
			'foreignKey' => 'game_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
