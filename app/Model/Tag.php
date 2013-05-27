<?php

App::uses('AppModel', 'Model');

/**
 * Tag Model
 *
 * @property Post $Post
 */
class Tag extends AppModel {

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
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
            'Post' => array(
		'className' => 'Post',
		'joinTable' => 'posts_tags',
		'foreignKey' => 'tag_id',
		'associationForeignKey' => 'post_id',
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