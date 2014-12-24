<?php
class Category extends AppModel {
	var $name = 'Category';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_publish' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/*var $hasAndBelongsToMany = array(
		'Thread' => array(
			'className' => 'Thread',
			'joinTable' => 'categories_threads',
			'foreignKey' => 'category_id',
			'associationForeignKey' => 'thread_id',
			'unique' => true,
			'conditions' => array('Thread.is_publish' => '1', 'Thread.is_trashbox_thread' => '0'),
			'fields' => '',
			'order' => 'Thread.id DESC',
			'limit' => 10,
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);*/
	
	var $hasMany = array(
		'Thread' => array(
			'className' => 'Thread',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '8',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	var $belongsTo = array(
		'Admin' => array(
			'className' => 'Admin',
			'foreignKey' => 'admin_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
