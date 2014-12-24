<?php
class ThreadreportsController extends AppController {

	var $name = 'Threadreports';
	public $paginate = array(
    // other keys here.
			'limit' => 10,
			'order' => array(
            'Threadreport.created_at' => 'desc'
			),
			'conditions' => array('Threadreport.is_trashbox' => 0)
		);
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add');
		$this->set('is_admin', true);
	}
	
	function softdelete($id = null, $tid) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid report thread reply'));
			$this->redirect(array('action' => 'index'));
		}
		$thread = $this->Threadreport->Replythread->findById($tid);
		$this->Threadreport->Replythread->id=$tid;
		$tdelete = 	$this->Threadreport->Replythread->saveField("is_trashbox",1);
					$this->Threadreport->Replythread->saveField("is_publish",0);
		
		$thread = $this->Threadreport->findById($id);
		$this->Threadreport->id=$id;
		$delete = 	$this->Threadreport->saveField("is_confirm",1);
					$this->Threadreport->saveField("is_trashbox",1);
		if($delete && $tdelete){
			$this->redirect(array('action' => 'index'));
		}
	}

	function index() {
		parent::isAuth();
		$this->Threadreport->recursive = 0;
		$this->set('threadreports', $this->paginate());
	}

	function view($id = null) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid threadreport'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('threadreport', $this->Threadreport->read(null, $id));
	}

	function add($id = null, $tid = null) {
		parent::isAuth();
		if (!empty($this->data)) {
			$this->Threadreport->create();
			$this->Threadreport->set('replythread_id', $id);
			$this->Threadreport->set('created_at', date('Y-m-d H:i:s'));
			if ($this->Threadreport->save($this->data)) {
				$this->Session->setFlash(__('The threadreport has been saved'));
				$this->redirect(array('controller' => 'replythreads', 'action' => 'seeall', $tid));
			} else {
				$this->Session->setFlash(__('The threadreport could not be saved. Please, try again.'));
			}
		}
		$threads = $this->Threadreport->Thread->find('list');
		$this->set(compact('threads'));
	}

	function edit($id = null) {
		parent::isAuth();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid threadreport'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Threadreport->save($this->data)) {
				$this->Session->setFlash(__('The threadreport has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The threadreport could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Threadreport->read(null, $id);
		}
		$threads = $this->Threadreport->Replythread->find('list');
		$this->set(compact('threads'));
	}

	function delete($id = null) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for threadreport'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Threadreport->delete($id)) {
			$this->Session->setFlash(__('Threadreport deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Threadreport was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Threadreport->recursive = 0;
		$this->set('threadreports', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid threadreport'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('threadreport', $this->Threadreport->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Threadreport->create();
			if ($this->Threadreport->save($this->data)) {
				$this->Session->setFlash(__('The threadreport has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The threadreport could not be saved. Please, try again.'));
			}
		}
		$threads = $this->Threadreport->Thread->find('list');
		$this->set(compact('threads'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid threadreport'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Threadreport->save($this->data)) {
				$this->Session->setFlash(__('The threadreport has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The threadreport could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Threadreport->read(null, $id);
		}
		$threads = $this->Threadreport->Thread->find('list');
		$this->set(compact('threads'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for threadreport'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Threadreport->delete($id)) {
			$this->Session->setFlash(__('Threadreport deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Threadreport was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
