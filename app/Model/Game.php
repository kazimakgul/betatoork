<?php




class Game extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
//	public $useTable = 'Games';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
/**
 * Validation rules
 *
 * @var array
 */


public $name = 'Game';
		var $actsAs = array(
	'UploadPack.Upload' => array(
		'picture' => array(
			'path' => ':webroot/upload/:model/:id/:basename_:style.:extension'
		)
	)
);


public $virtualFields = array(
    'recommend' => 'Game.starsize * Game.rate_count',
	'playcount' => 5
);


 	public function isOwnedBy($game, $user) {
		return $this->field('id', array('id' => $game, 'user_id' => $user)) === $game;
	}


	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please dont leave this field empty',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'link' => array(
		// 	'notempty' => array(
		// 		'rule' => array('notempty'),
		// 		'message' => 'Please dont leave this field empty',
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// 	'url' => array(
		// 		'rule' => array('url'),
		// 		'message' => 'Please submit a valid game url',
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),

			
		// ),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please dont leave this field empty',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),

			'between' => array(
				'rule' => array('between', 10, 400),
				'message' => 'The description length must be betwen 50-400 chars',
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
		'category_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		'picture'=> array(	
			'image' => array(
				'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),
				'message' => 'Please supply a valid image.',
			),
			
			'minWidth' => array(
			'rule' => array('minWidth', '640'),
			'message' => 'Photo size must be 640X350'
		),
		'maxWidth' => array(
			'rule' => array('maxWidth', '640'),
			'message' => 'Photo size must be 640X350'
		),
		'minHeight' => array(
			'rule' => array('minHeight', '350'),
			'message' => 'Photo size must be 640X350'
		),
		'maxHeight' => array(
			'rule' => array('maxHeight', '350'),
			'message' => 'Photo size must be 640X350'
		)
			
			
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
	public $hasMany = array(
		'Rate' => array(
			'className' => 'Rate',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Favorite' => array(
			'className' => 'Favorite',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
}
