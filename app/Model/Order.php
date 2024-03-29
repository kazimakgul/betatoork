<?php
App::uses('AppModel', 'Model');
/**
 * Wallentry Model
 *
 * @property User $User
 * @property Game $Game
 */
class Order extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
var $name="Order";
/**
 * Validation rules
 *
 * @var array
 */

public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
