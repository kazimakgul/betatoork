<?php
App::uses('AppModel', 'Model');
/**
 * Adcodes Model
 *
 * @property User $User
 * @property Game $Game
 */
class Ad_setting extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
var $name="Ad_setting";

public $belongsTo = array(
        'Ad_area' => array(
            'className' => 'Ad_area',
            'foreignKey' => 'ad_area_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Adcode' => array(
            'className' => 'Adcode',
            'foreignKey' => 'ad_code_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
