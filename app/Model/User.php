<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Post $Post
 * @property Group $Group
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
            'name' => array(
		'alphanumeric' => array(
                    'rule' => array('alphanumeric'),
                    'message' => 'Введіть тільки літери і цифри',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
		'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => 'Поле обов\'язкове для заповнення',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
            ),
            'surname' => array(
		'alphanumeric' => array(
                    'rule' => array('alphanumeric'),
                    'message' => 'Введіть тільки літери і цифри',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
		'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => 'Поле обов\'язкове для заповнення',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
            ),
            'email' => array(
		'email' => array(
                    'rule' => array('email'),
                    'message' => 'Введіть правильний email',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
            ),
            'password' => array(
		'minlength' => array(
                    'rule' => array('minlength', 5),
                    'message' => 'Мінімальна довжина паролю 5 символів',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
		'maxlength' => array(
                    'rule' => array('maxlength', 15),
                    'message' => 'Максимальна довжина паролю 15 символів',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => 'Поле обов\'язкове для заповнення',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
            ),
            'password2' => array(
		'minlength' => array(
                    'rule' => array('minlength', 5),
                    'message' => 'Мінімальна довжина паролю 5 символів',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
		'maxlength' => array(
                    'rule' => array('maxlength', 15),
                    'message' => 'Максимальна довжина паролю 15 символів',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => 'Поле обов\'язкове для заповнення',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
            ),
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
            'Post' => array(
		'className' => 'Post',
		'foreignKey' => 'user_id',
		'dependent' => false,
		'conditions' => '',
		'fields' => '',
		'order' => '',
		'limit' => '',
		'offset' => '',
		'exclusive' => '',
		'finderQuery' => '',
		'counterQuery' => ''
            )
    );


    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
            'Group' => array(
		'className' => 'Group',
		'joinTable' => 'groups_users',
		'foreignKey' => 'user_id',
		'associationForeignKey' => 'group_id',
		'unique' => 'keepExisting',
		'conditions' => '',
		'fields' => '',
		'order' => '',
		'limit' => '',
		'offset' => '',
		'finderQuery' => '',
		'deleteQuery' => '',
		'insertQuery' => ''
            )
    );
    
    /*
     * beforeSave method
     * 
     * @return boolean
     */
    public function beforeSave() {
        if ( isset($this->data[$this->alias]['password']) && 
             isset($this->data[$this->alias]['password2']) ) {
	        $this->data[$this->alias]['password'] = 
                        AuthComponent::password($this->data[$this->alias]['password']);
                $this->data[$this->alias]['password2'] = 
                        AuthComponent::password($this->data[$this->alias]['password2']);
	    }
	    return true;
    }

}