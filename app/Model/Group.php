<?php

App::uses('AppModel', 'Model');

/**
 * Group Model
 *
 * @property Permission $Permission
 * @property User $User
 */
class Group extends AppModel {

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
            'Permission' => array(
		'className' => 'Permission',
		'joinTable' => 'groups_permissions',
		'foreignKey' => 'group_id',
		'associationForeignKey' => 'permission_id',
		'unique' => 'keepExisting',
		'conditions' => '',
		'fields' => '',
		'order' => '',
		'limit' => '',
		'offset' => '',
		'finderQuery' => '',
		'deleteQuery' => '',
		'insertQuery' => ''
            ),
            'User' => array(
		'className' => 'User',
		'joinTable' => 'groups_users',
		'foreignKey' => 'group_id',
		'associationForeignKey' => 'user_id',
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