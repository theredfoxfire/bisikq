<?php
class ReplythreadsController extends AppController {

	var $name = 'Replythreads';
	private $page;
	public $paginate = array(
    // other keys here.
			'limit' => 10,
			'order' => array(
            'Replythread.created_at' => 'desc'
			),
			'conditions' => array('Replythread.is_trashbox' => 0)
		);
	
	function softdelete($id = null) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid thread reply'));
			$this->redirect(array('action' => 'index'));
		}
		$thread = $this->Replythread->findById($id);
		$this->Replythread->id=$id;
		$delete = $this->Replythread->saveField("is_trashbox",1);
		if($delete){
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'seeall');
	}
	
	function index($id = null) {
		parent::isAuth();
		$this->Replythread->recursive = 0;
		$cond = (isset($id) ? array('thread_id' => $id) : null);

		$this->set('thread', (isset($id) ? $this->Replythread->Thread->findById($id) : array( 'Thread'=> array('title' => '', 'content' => ''))));
		$this->set('replythreads', $this->paginate('Replythread',$cond,array(),null));
		$this->set('is_admin', true);
	}
	
	function seeall($id = null) {
		parent::isAuth();
		
		$thread = $this->Replythread->Thread->findById($id);
		$visited = $thread['Thread']['visited'] + 1;
		$this->Replythread->Thread->id=$id;
		$this->Replythread->Thread->saveField("visited",$visited);
		
		$this->Replythread->recursive = 2;
		$this->Replythread->Thread->recursive = 1;
			$conditions = array(
					'is_trashbox' => 0,
					'Replythread.is_publish' => 1,
					'thread_id' => $id
			);
			$this->set('thread', $this->Replythread->Thread->findById($id));
			$this->set('replythreads', $this->paginate('Replythread',$conditions,array(),null));
		$this->set('is_admin', false);
	}
	
	function getPage($id = null) {
		$this->Replythread->recursive = 0;
		$conditions = array(
			'thread_id' => $id
		);
		
		return $this->page = $this->paginate('Replythread', $conditions);
	}

	function view($id = null, $rid) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid replythread'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('replythread', $this->Replythread->read(null, $id));
		$this->set('is_admin', true);
		$this->set('rid',$rid);
	}

	function add($id = null) {
		parent::isAuth();
		if (!empty($this->data)) {
			$this->Replythread->create();
			$this->Replythread->set('thread_id', $id);
			$this->Replythread->set('is_publish', 1);
			$this->Replythread->set('created_at', date('Y-m-d H:i:s'));
			if ($this->Replythread->save($this->data)) {
				$this->Session->setFlash(__('The replythread has been saved'));
				$this->redirect(array('controller' => 'replythreads', 'action' => 'seeall', $id));
			} else {
				$this->Session->setFlash(__('The replythread could not be saved. Please, try again.'));
				$this->redirect(array('controller' => 'replythreads', 'action' => 'seeall', $id));
			}
		}
		$threads = $this->Replythread->Thread->find('list');
		$this->set(compact('threads'));
		$this->set('is_admin', false);
		
	}

	function edit($id = null) {
		parent::isAuth();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid replythread'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Replythread->save($this->data)) {
				$this->Session->setFlash(__('The replythread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The replythread could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Replythread->read(null, $id);
		}
		$threads = $this->Replythread->Thread->find('list');
		$this->set(compact('threads'));
	}

	function delete($id = null) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for replythread'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Replythread->delete($id)) {
			$this->Session->setFlash(__('Replythread deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Replythread was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Replythread->recursive = 0;
		$this->set('replythreads', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid replythread'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('replythread', $this->Replythread->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Replythread->create();
			if ($this->Replythread->save($this->data)) {
				$this->Session->setFlash(__('The replythread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The replythread could not be saved. Please, try again.'));
			}
		}
		$threads = $this->Replythread->Thread->find('list');
		$this->set(compact('threads'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid replythread'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Replythread->save($this->data)) {
				$this->Session->setFlash(__('The replythread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The replythread could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Replythread->read(null, $id);
		}
		$threads = $this->Replythread->Thread->find('list');
		$this->set(compact('threads'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for replythread'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Replythread->delete($id)) {
			$this->Session->setFlash(__('Replythread deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Replythread was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
