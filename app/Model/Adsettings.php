<?php
App::uses('AppModel', 'Model');
/**
 * Wallentry Model
 *
 * @property User $User
 * @property Game $Game
 */
class Adsettings extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
var $name="Adsettings";


public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);




}
