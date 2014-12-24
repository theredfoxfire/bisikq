<?php
class Replythread extends AppModel {
	var $name = 'Replythread';
	var $displayField = 'replyer';
	protected $lastReply;
	protected $countReply;
	protected $page;
	
	public function getPage($id = null){
		$conditions = array(
					'conditions' => array('thread_id' => $id)
			);
			
		return $this->page = ceil(($this->find('count',$conditions)/10));
	}
	
	public function getLastReply($id = null){
		
		return $this->lastReply = $this->find('first', array(
						'conditions' => array('Replythread.thread_id' => $id),
						'order' => array('Replythread.id' => 'DESC')
				));
	}
	
	public function getCountReply($id = null){
		
		return $this->countReply = $this->find(
			'count', array(
				'conditions' => array('Replythread.thread_id' => $id)
			)
		);
	}
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
		'replyer' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'text' => array(
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

	var $belongsTo = array(
		'Thread' => array(
			'className' => 'Thread',
			'foreignKey' => 'thread_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'Threadreport' => array(
			'className' => 'Threadreport',
			'foreignKey' => 'replythread_id',
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
	
}
