<?php
class Threadreport extends AppModel {
	var $name = 'Threadreport';
	var $displayField = 'thread_id';
	var $validate = array(
		'thread_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_confirm' => array(
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

	var $belongsTo = array(
		'Replythread' => array(
			'className' => 'Replythread',
			'foreignKey' => 'replythread_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
