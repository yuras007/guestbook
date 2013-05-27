<?php

App::uses('AppModel', 'Model');

/**
 * Permission Model
 *
 * @property Group $Group
 */
class Permission extends AppModel {

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
            'Group' => array(
		'className' => 'Group',
		'joinTable' => 'groups_permissions',
		'foreignKey' => 'permission_id',
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

}