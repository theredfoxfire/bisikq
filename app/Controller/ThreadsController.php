<?php
class ThreadsController extends AppController {

	var $name = 'Threads';
	public $paginate = array(
    // other keys here.
			'limit' => 10,
			'order' => array(
            'Thread.created_at' => 'desc'
			),
			'conditions' => array('Thread.is_trashbox_thread' => 0)
		);
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('search', 'seeall');
		$this->set('is_admin', true);
	}
	
	public function isAuthorized($user){
		if($this->action === 'view'){
			return true;
		}
		
		return parent::isAuthorized($user);
	}

	function index() {
		parent::isAuth();
		$this->Thread->recursive = 1;
		if(!$this->Auth->user('id')){
			$conditions = array(
					'Thread.is_trashbox_thread' => 0,
					'Thread.is_publish' => 1,
			);
			$this->set('threads', $this->paginate('Thread',$conditions));
		} else {
			//GET data from search query
			$category_id = (isset($_GET['category']) && (''!=$_GET['category'])) 
				? array('category_id' => $_GET['category']) 
				: array();
			$content = (isset($_GET['content']) && (''!=$_GET['content'])) 
				?  array('content LIKE' => '%'.$_GET['content'].'%', 
					'title LIKE' => '%'.$_GET['content'].'%') 
				: array();
			$conditions = array_merge($category_id, $content);

			$this->set(
				array('category_id' => (isset($_GET['category']) && (''!=$_GET['category'])) ? $_GET['category'] : "", 
				'content' =>  (isset($_GET['content']) && (''!=$_GET['content'])) ?  $_GET['content'] : ""));
			//MYSQL Query
			$this->set('threads', $this->paginate('Thread',$conditions,array(),null));

			//Get Categories
			$this->Thread->Category->recursive = -1;
			$this->set('categories', $this->Thread->Category->find('all'));
		}
	}
	
	function seeall($id = null) {
		parent::isAuth();
		$this->Thread->recursive = 2;
		//if(!$this->Auth->user('id')){
			$conditions = array(
					'Thread.is_publish' => 1,
					'Thread.category_id' => $id
			);
			$this->set('all', $this->Thread->Category->find('all'));
			$this->set('catid', $id);
			$this->set('threads', $this->paginate('Thread',$conditions,array(),null));
		//} else {
		//	$this->set('threads', $this->paginate('Thread',null,array(),null));
		//}
		$this->set('is_admin', false);
	}
	
	function search (){
		parent::isAuth();
		$key = $this->params['url']['search'];
		$conditions = array(
					'Thread.is_publish' => 1,
					'Thread.title LIKE' => '%'.$key.'%'
			);
		$this->set('threads', $this->paginate('Thread',$conditions,array(),null));
		$this->set('is_admin', false);
	}
	
	
	function view($id = null) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid thread'));
			$this->redirect(array('action' => 'index'));
		}
		$thread = $this->Thread->findById($id);
		$visited = $thread['Thread']['visited'] + 1;
		$this->Thread->id=$id;
		$this->Thread->saveField("visited",$visited);
		if(!$thread){
			$this->Session->setFlash(__('Oops..! You are not allowed to access that page.'));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('thread', $this->Thread->read(null, $id));
	}
	
	function softdelete($id = null) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid thread'));
			$this->redirect(array('action' => 'index'));
		}
		$thread = $this->Thread->findById($id);
		$this->Thread->id=$id;
		$delete = $this->Thread->saveField("is_trashbox_thread",1);
		if($delete){
			$this->redirect(array('action' => 'index'));
		}
	}

	function add() {
		parent::isAuth();
		if (!empty($this->data)) {
			 if(!empty($this->request->data['Thread']['image']['name']))
                {
                        $file = $this->request->data['Thread']['image']; //put the data into a var for easy use

                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions

                        //only process if the extension is valid
                        if(in_array($ext, $arr_ext))
                        {
                                //do the actual uploading of the file. First arg is the tmp name, second arg is 
                                //where we are putting it
                                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/threads/' . $file['name']);

                                //prepare the filename for database entry
                                $this->request->data['Thread']['image'] = $file['name'];
                        }
                } else {
						$this->request->data['Thread']['image'] = '0';
				}
			$this->Thread->create();
			$this->Thread->set('is_publish','1');
			$this->Thread->set('is_trashed', '0');
			$this->Thread->set('visited', '0');
			$this->Thread->set('created_at', date('Y-m-d H:i:s'));
			$admin = $this->Auth->user('id');
			$this->Thread->set('admin_id', $admin);
			if ($this->Thread->save($this->data)) {
				$this->Session->setFlash(__('The thread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The thread could not be saved. Please, try again.'));
			}
		}
		
		$this->Thread->Category->recursive = -1;
		$this->set('categories', $this->Thread->Category->find('all'));
	}

	function edit($id = null) {
		parent::isAuth();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid thread'));
			$this->redirect(array('action' => 'index'));
		}
		$lastdata = $this->Thread->findById($id);
        $oldfile = $lastdata['Thread']['image'];
        
		if (!empty($this->data)) {
			if(!empty($this->request->data['Thread']['image']['name']))
                {
                        $file = $this->request->data['Thread']['image']; //put the data into a var for easy use
                        

                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
                        if(!$oldfile){$oldfile = 0;}

                        //only process if the extension is valid
                        if(in_array($ext, $arr_ext))
                        {
                                //do the actual uploading of the file. First arg is the tmp name, second arg is 
                                //where we are putting it
                                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/threads/'.date('Y-m-d H:i:s').$file['name']);
                                if(file_exists('img/uploads/threads/'.$oldfile)){
                                unlink('img/uploads/threads/'.$oldfile);
							}
                                //prepare the filename for database entry
                                $this->request->data['Thread']['image'] = date('Y-m-d H:i:s').$file['name'];
                        }
                } else {
					$this->request->data['Thread']['image'] = $oldfile;
				}
			if ($this->Thread->save($this->data)) {
				
				$this->Thread->set('updated_at', date('Y-m-d H:i:s'));
				$admin = $this->Auth->user('id');
				$this->Thread->set('admin_id', $admin);
				$this->Session->setFlash(__('The thread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The thread could not be saved. Please, try again.'));
			}
		$this->Thread->Category->recursive = -1;
		$this->set('categories', $this->Thread->Category->find('all'));
		}
		if (empty($this->data)) {
			$this->data = $this->Thread->read(null, $id);
		}
		
		$categories = $this->Thread->Category->find('list');
		$this->set(compact('categories'));
		$this->Thread->Category->recursive = -1;
		$this->set('categories', $this->Thread->Category->find('all'));
		$this->set('thread', $this->Thread->findById($id));
	}

	function delete($id = null) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for thread'));
			$this->redirect(array('action'=>'index'));
		}
		
		$conditions = array(
			"Thread.id" => $id
		);
		
		
		if ($this->Thread->deleteAll($conditions, true)) {
			$this->Session->setFlash(__('Thread deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Thread was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Thread->recursive = 0;
		$this->set('threads', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid thread'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('thread', $this->Thread->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Thread->create();
			if ($this->Thread->save($this->data)) {
				$this->Session->setFlash(__('The thread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The thread could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Thread->Category->find('list');
		$this->set(compact('categories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid thread'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Thread->save($this->data)) {
				$this->Session->setFlash(__('The thread has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The thread could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Thread->read(null, $id);
		}
		$categories = $this->Thread->Category->find('list');
		$this->set(compact('categories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for thread'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Thread->delete($id)) {
			$this->Session->setFlash(__('Thread deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Thread was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
