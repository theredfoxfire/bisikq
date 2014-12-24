<?php
class GeneralrulesController extends AppController {

	var $name = 'Generalrules';
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('view');
		$this->set('is_admin', false);
	}

	function index() {
		$this->Generalrule->recursive = 0;
		$this->set('generalrules', $this->paginate());
	}

	function view($id = null) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid generalrule'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('generalrule', $this->Generalrule->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Generalrule->create();
			if ($this->Generalrule->save($this->data)) {
				$this->Session->setFlash(__('The generalrule has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The generalrule could not be saved. Please, try again.'));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid generalrule'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Generalrule->save($this->data)) {
				$this->Session->setFlash(__('The generalrule has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The generalrule could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Generalrule->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for generalrule'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Generalrule->delete($id)) {
			$this->Session->setFlash(__('Generalrule deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Generalrule was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Generalrule->recursive = 0;
		$this->set('generalrules', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid generalrule'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('generalrule', $this->Generalrule->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Generalrule->create();
			if ($this->Generalrule->save($this->data)) {
				$this->Session->setFlash(__('The generalrule has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The generalrule could not be saved. Please, try again.'));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid generalrule'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Generalrule->save($this->data)) {
				$this->Session->setFlash(__('The generalrule has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The generalrule could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Generalrule->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for generalrule'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Generalrule->delete($id)) {
			$this->Session->setFlash(__('Generalrule deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Generalrule was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
