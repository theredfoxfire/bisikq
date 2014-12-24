<?php
class RequestsController extends AppController {

	var $name = 'Requests';
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('view', 'add');
	}

	function index() {
		$this->Request->recursive = 0;
		$this->set('Requests', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Request'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('Request', $this->Request->read(null, $id));
	}

	function add($id = null) {
		parent::isAuth();
		if (!empty($this->data)) {
			$this->Request->create();
			$this->Request->set('is_confirm', 0);
			$this->Request->set('is_trashbox', 0);
			$this->Request->set('created_at', date('Y-m-d H:i:s'));
			if ($this->Request->save($this->data)) {
				$this->Session->setFlash(__('The Request has been saved'));
				if($id){
				$this->redirect(array('controller' => 'threads', 'action' => 'seeall', $id));
				} else {
				$this->redirect(array('controller' => 'categories', 'action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The Request could not be saved. Please, try again.'));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Request'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Request->save($this->data)) {
				$this->Session->setFlash(__('The Request has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Request could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Request->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Request'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Request->delete($id)) {
			$this->Session->setFlash(__('Request deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Request was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Request->recursive = 0;
		$this->set('Requests', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Request'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('Request', $this->Request->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Request->create();
			if ($this->Request->save($this->data)) {
				$this->Session->setFlash(__('The Request has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Request could not be saved. Please, try again.'));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Request'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Request->save($this->data)) {
				$this->Session->setFlash(__('The Request has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Request could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Request->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Request'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Request->delete($id)) {
			$this->Session->setFlash(__('Request deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Request was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
