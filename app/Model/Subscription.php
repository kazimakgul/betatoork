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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    
    public $virtualFields = array(
        'totalrate' => 'SELECT totalrate FROM userstats where userstats.user_id = Subscription.subscriber_to_id',
        'favoritecount' => 'SELECT favoritecount FROM userstats where userstats.user_id = Subscription.subscriber_to_id',
        'subscribe' => 'SELECT subscribe FROM userstats where userstats.user_id = Subscription.subscriber_to_id',
        'subscribeto' => 'SELECT subscribeto FROM userstats where userstats.user_id = Subscription.subscriber_to_id',
        'uploadcount' => 'SELECT uploadcount FROM userstats where userstats.user_id = Subscription.subscriber_to_id',
        'playcount' => 'SELECT playcount FROM userstats where userstats.user_id = Subscription.subscriber_to_id',
        'potential' => 'SELECT potential FROM userstats where userstats.user_id = Subscription.subscriber_to_id',
    );

}
