<?php

App::uses('AppModel', 'Model');

/**
 * Post Model
 *
 * @property User $User
 * @property Tag $Tag
 */
class Post extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
            'title' => array(
		'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => 'Поле обов\'язкове для заповнення',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'description' => array(
		'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => 'Поле обов\'язкове для заповнення',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
            ),
            'message' => array(
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
            )
    );

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
            'Tag' => array(
		'className' => 'Tag',
		'joinTable' => 'posts_tags',
		'foreignKey' => 'post_id',
		'associationForeignKey' => 'tag_id',
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

}