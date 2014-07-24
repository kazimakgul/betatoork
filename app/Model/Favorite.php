<?php

App::uses('AppModel', 'Model');

/**
 * Favorite Model
 *
 * @property User $User
 * @property Game $Game
 */
class Favorite extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
//	public $useTable = 'Favorites';
    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'user_id';
    public $virtualFields = array(
        'active' => 'SELECT active FROM games where games.id=Favorite.game_id',
        'recommend' => 'SELECT starsize * rate_count FROM games where games.id = Favorite.game_id',
        'playcount' => 'SELECT playcount FROM gamestats WHERE gamestats.game_id = Favorite.game_id',
        'favcount' => 'SELECT favcount FROM gamestats WHERE gamestats.game_id = Favorite.game_id',
        'channelclone' => 'SELECT channelclone FROM gamestats WHERE gamestats.game_id = Favorite.game_id',
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
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
            'foreignKey' => 'user_id',
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
