<?php
class Threadrate extends AppModel {
	var $name = 'Threadrate';
	var $displayField = 'rates';
	
	protected $rate;
	
	public function getRate($id = null){
		$sum = $this->find('all', array(
			'conditions' => array('Threadrate.thread_id' => $id),
			'group' => array('Threadrate.thread_id'),
			'fields' => array('sum(Threadrate.rates) AS rating')
		));
		$count = $this->find(
				'count', array(
				'conditions' => array('Threadrate.thread_id' => $id)
				)
			);
		if($sum){
			return $this->rate = round(($sum[0][0]['rating']/$count),2);
		} else {
			return $this->rate = null;
		}
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
		'rates' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
}
