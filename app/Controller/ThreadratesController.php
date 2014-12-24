<?php
class ThreadratesController extends AppController {

	var $name = 'Threadrates';
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index', 'view', 'add');
	}

	function index() {
		$this->Threadrate->recursive = 0;
		$this->set('threadrates', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid threadrate'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('threadrate', $this->Threadrate->read(null, $id));
	}

	function add($id) {
		parent::isAuth();
		if (!empty($this->data)) {
			$this->Threadrate->create();
			$this->Threadrate->set('thread_id', $id);
			$this->Threadrate->set('created_at', date('Y-m-d H:i:s'));
			if ($this->Threadrate->save($this->data)) {
				$this->Session->setFlash(__('The threadrate has been saved'));
				$this->redirect(array('controller' => 'replythreads', 'action' => 'seeall', $id));
			} else {
				$this->Session->setFlash(__('The threadrate could not be saved. Please, try again.'));
			}
		}
		$threads = $this->Threadrate->Thread->find('list');
		$this->set(compact('threads'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid threadrate'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Threadrate->save($this->data)) {
				$this->Session->setFlash(__('The threadrate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The threadrate could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Threadrate->read(null, $id);
		}
		$threads = $this->Threadrate->Thread->find('list');
		$this->set(compact('threads'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for threadrate'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Threadrate->delete($id)) {
			$this->Session->setFlash(__('Threadrate deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Threadrate was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Threadrate->recursive = 0;
		$this->set('threadrates', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid threadrate'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('threadrate', $this->Threadrate->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Threadrate->create();
			if ($this->Threadrate->save($this->data)) {
				$this->Session->setFlash(__('The threadrate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The threadrate could not be saved. Please, try again.'));
			}
		}
		$threads = $this->Threadrate->Thread->find('list');
		$this->set(compact('threads'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid threadrate'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Threadrate->save($this->data)) {
				$this->Session->setFlash(__('The threadrate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The threadrate could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Threadrate->read(null, $id);
		}
		$threads = $this->Threadrate->Thread->find('list');
		$this->set(compact('threads'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for threadrate'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Threadrate->delete($id)) {
			$this->Session->setFlash(__('Threadrate deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Threadrate was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
