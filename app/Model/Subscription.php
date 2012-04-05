<?php
App::uses('AppModel', 'Model');
/**
 * Subscription Model
 *
 * @property Subscriber $Subscriber
 * @property SubscriberTo $SubscriberTo
 */
class Subscription extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Subscriptions';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'subscriber_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'subscriber_to_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Subscriber' => array(
			'className' => 'Subscriber',
			'foreignKey' => 'subscriber_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SubscriberTo' => array(
			'className' => 'SubscriberTo',
			'foreignKey' => 'subscriber_to_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
