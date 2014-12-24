<?php
class CompanyprofilesController extends AppController {

	var $name = 'Companyprofiles';
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('view');
		$this->set('is_admin', false);
	}

	function index() {
		$this->Companyprofile->recursive = 0;
		$this->set('companyprofiles', $this->paginate());
	}

	function view($id = null) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid companyprofile'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('companyprofile', $this->Companyprofile->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Companyprofile->create();
			if ($this->Companyprofile->save($this->data)) {
				$this->Session->setFlash(__('The companyprofile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The companyprofile could not be saved. Please, try again.'));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid companyprofile'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Companyprofile->save($this->data)) {
				$this->Session->setFlash(__('The companyprofile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The companyprofile could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Companyprofile->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for companyprofile'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Companyprofile->delete($id)) {
			$this->Session->setFlash(__('Companyprofile deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Companyprofile was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Companyprofile->recursive = 0;
		$this->set('companyprofiles', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid companyprofile'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('companyprofile', $this->Companyprofile->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Companyprofile->create();
			if ($this->Companyprofile->save($this->data)) {
				$this->Session->setFlash(__('The companyprofile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The companyprofile could not be saved. Please, try again.'));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid companyprofile'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Companyprofile->save($this->data)) {
				$this->Session->setFlash(__('The companyprofile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The companyprofile could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Companyprofile->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for companyprofile'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Companyprofile->delete($id)) {
			$this->Session->setFlash(__('Companyprofile deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Companyprofile was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
