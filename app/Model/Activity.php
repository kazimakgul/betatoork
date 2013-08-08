<?php
App::uses('AppModel', 'Model');
/**
 * Wallentry Model
 *
 * @property User $User
 * @property Game $Game
 */
class Activity extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
public $name='Activity';
/**
 * Validation rules
 *
 * @var array
 */
 
 
 public $belongsTo = array(
		'PerformerUser' => array(
			'className' => 'User',
			'foreignKey' => 'performer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ChannelUser' => array(
			'className' => 'User',
			'foreignKey' => 'channel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Game' => array(
			'className' => 'Game',
			'foreignKey' => 'game_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
 

}
