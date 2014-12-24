<?php
class CategoriesController extends AppController {
	var $name = 'Categories';
	public $paginate = array(
    // other keys here.
			'limit' => 10,
			'order' => array(
            'Category.created_at' => 'desc'
			),
			'conditions' => array('Category.is_trashbox_category' => 0)
		);
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	
	function softdelete($id = null) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid category'));
			$this->redirect(array('action' => 'index'));
		}
		$thread = $this->Category->findById($id);
		$this->Category->id=$id;
		$delete = $this->Category->saveField("is_trashbox_category",1);
		if($delete){
			$this->redirect(array('action' => 'adminindex'));
		}
	}

	function index() {
		parent::isAuth();
		$this->Category->recursive = 2;
		if(!$this->Auth->user('id')){
			$conditions = array(
					'is_trashbox_category' => 0,
					'is_publish' => 1
			);
			$model = array();
			$this->set('categories', $this->paginate('Category',$conditions));
		} else {
			$this->set('categories', $this->paginate('Category'));
		}
		$this->set('is_admin', false);
	}
	
	

	function view($id = null) {
		parent::isAuth();
		$this->Category->recursive = 2;
		if (!$id) {
			$this->Session->setFlash(__('Invalid category'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('all', $this->Category->find('all'));
		$this->set('category', $this->Category->read(null, $id));
	}

	function add() {
		parent::isAuth();
		if (!empty($this->data)) {
			$this->Category->create();
			$this->Category->set('is_publish', 1);
			$this->Category->set('admin_id', $this->Auth->user('id'));
			$this->Category->set('created_at', date('Y-m-d H:i:s'));
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$threads = $this->Category->Thread->find('list');
		$this->set(compact('threads'));
		$this->set('is_admin', true);
	}

	function edit($id = null) {
		parent::isAuth();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid category'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'adminindex'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
			$this->set('category',$this->Category->read(null, $id));
		}
		$threads = $this->Category->Thread->find('list');
		$this->set(compact('threads'));
		$this->set('is_admin', true);
	}
	
	function adminindex(){
		parent::isAuth();
		$this->Category->recursive = 2;
		if(!$this->Auth->user('id')){
			$conditions = array(
					'is_trashbox_category' => 0,
					'is_publish' => 1
			);
			$model = array();
			$this->set('categories', $this->paginate('Category',$conditions));
		} else {
			$this->set('categories', $this->paginate('Category'));
		}
		$this->set('is_admin', true);
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for category'));
			$this->redirect(array('action'=>'index'));
		}
		
		$conditions = array(
			'Category.id' => $id
		);
		
		if ($this->Category->deleteAll($conditions)) {
			$this->Session->setFlash(__('Category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid category'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Category->create();
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$threads = $this->Category->Thread->find('list');
		$this->set(compact('threads'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid category'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
		}
		$threads = $this->Category->Thread->find('list');
		$this->set(compact('threads'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for category'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Category->delete($id)) {
			$this->Session->setFlash(__('Category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
