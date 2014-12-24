<?php
class CategoriesthreadsController extends AppController {

	var $name = 'CategoriesThreads';

	function index() {
		$this->CategoriesThread->recursive = 0;
		$this->set('categoriesThreads', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid categories thread'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('categoriesThread', $this->CategoriesThread->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CategoriesThread->create();
			if ($this->CategoriesThread->save($this->data)) {
				$this->Session->setFlash(__('The categories thread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories thread could not be saved. Please, try again.'));
			}
		}
		$categories = $this->CategoriesThread->Category->find('list');
		$threads = $this->CategoriesThread->Thread->find('list');
		$this->set(compact('categories', 'threads'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid categories thread'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CategoriesThread->save($this->data)) {
				$this->Session->setFlash(__('The categories thread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories thread could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CategoriesThread->read(null, $id);
		}
		$categories = $this->CategoriesThread->Category->find('list');
		$threads = $this->CategoriesThread->Thread->find('list');
		$this->set(compact('categories', 'threads'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for categories thread'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CategoriesThread->delete($id)) {
			$this->Session->setFlash(__('Categories thread deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Categories thread was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->CategoriesThread->recursive = 0;
		$this->set('categoriesThreads', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid categories thread'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('categoriesThread', $this->CategoriesThread->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->CategoriesThread->create();
			if ($this->CategoriesThread->save($this->data)) {
				$this->Session->setFlash(__('The categories thread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories thread could not be saved. Please, try again.'));
			}
		}
		$categories = $this->CategoriesThread->Category->find('list');
		$threads = $this->CategoriesThread->Thread->find('list');
		$this->set(compact('categories', 'threads'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid categories thread'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CategoriesThread->save($this->data)) {
				$this->Session->setFlash(__('The categories thread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories thread could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CategoriesThread->read(null, $id);
		}
		$categories = $this->CategoriesThread->Category->find('list');
		$threads = $this->CategoriesThread->Thread->find('list');
		$this->set(compact('categories', 'threads'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for categories thread'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CategoriesThread->delete($id)) {
			$this->Session->setFlash(__('Categories thread deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Categories thread was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
