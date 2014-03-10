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
var $name="Clone";
/**
 * Validation rules
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
