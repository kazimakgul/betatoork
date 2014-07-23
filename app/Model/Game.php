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
        'recommend' => 'SELECT potential FROM gamestats where gamestats.game_id=Game.id',
        'playcount' => 'SELECT playcount FROM gamestats where gamestats.game_id=Game.id'
    );

    /**
     * Runs after a save and submit userstat values for zero.
     * @param boolean $created
     */
    function afterSave($created) {

        $exist = array('Gamestat.game_id' => $this->id);

        if ($created && !$this->Gamestat->hasAny($exist)) {
            $filtered_data = array('Gamestat' => array(
                    'game_id' => $this->id));
            $this->Gamestat->save($filtered_data);
        }
    }

    public function isOwnedBy($game, $user) {
        return $this->field('id', array('id' => $game, 'user_id' => $user)) === $game;
    }

    public function get_game_type($url) {
        if (strpos($url, '.') !== false) {
            $ext = substr($url, strrpos($url, '.') + 1);
        } else {
            $ext = 'swf';
        }
        return $ext;
    }

    //This replace forbidden characters on content
    public function secureSuperGlobalPOST($value) {
        $string = htmlspecialchars(stripslashes($value));
        $string = str_ireplace("script", "blocked", $string);
        $string = mysql_escape_string($string);
        //$string = htmlentities($string);
        return $string;
    }

    public function checkDuplicateSeoUrl($seo_url = 'toork') {
        $authid = CakeSession::read("Auth.User.id");
        $seo_url = str_replace('_', '', Inflector::slug(strtolower(str_replace(' ', '-', $seo_url))));
        do {

            $data = $this->find('all', array('contain' => false, 'conditions' => array('Game.seo_url' => $seo_url, 'Game.user_id' => $authid), 'fields' => array('seo_url')));
            if ($data == NULL) {
                return $seo_url;
            } else {
                $seo_url = $this->seoUrlFormer($seo_url);
            }
        } while (1 == 1);
    }

    function seoUrlFormer($material = 'toork') {
        //Add incremental number at the end of the seo_url
        preg_match('/^([^\d]+)([\d]*?)$/', $material, $match);
        $material = $match[1];
        $number = $match[2] + 1;
        return $material . $number;
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
        'picture' => array(
            'image' => array(
                'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),
                'message' => 'Please supply a valid image.',
            ),
            'minWidth' => array(
                'rule' => array('minWidth', '0'),
                'message' => 'Photo size must be 640X350'
            ),
            'maxWidth' => array(
                'rule' => array('maxWidth', '10000'),
                'message' => 'Photo size must be 640X350'
            ),
            'minHeight' => array(
                'rule' => array('minHeight', '0'),
                'message' => 'Photo size must be 640X350'
            ),
            'maxHeight' => array(
                'rule' => array('maxHeight', '10000'),
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
    public $hasOne = array(
        'Gamestat' => array(
            'className' => 'Gamestat',
            'foreignKey' => 'game_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
