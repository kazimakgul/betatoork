<?php
App::uses('AppModel', 'Model');
/**
 * Adcodes Model
 *
 * @property User $User
 * @property Game $Game
 */
class Adsetting extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
var $name="Adsetting";


public $belongsTo = array(
		'homeBannerTop' => array(
			'className' => 'Adcode',
			'foreignKey' => 'home_banner_top',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'homeBannerMiddle' => array(
			'className' => 'Adcode',
			'foreignKey' => 'home_banner_middle',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'homeBannerBottom' => array(
			'className' => 'Adcode',
			'foreignKey' => 'home_banner_bottom',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'gameBannerTop' => array(
			'className' => 'Adcode',
			'foreignKey' => 'game_banner_top',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'gameBannerBottom' => array(
			'className' => 'Adcode',
			'foreignKey' => 'game_banner_bottom',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
