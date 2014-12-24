<?php

class AdminsController extends AppController {

	var $name = 'Admins';
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('logout', 'login');
		$this->set('is_admin', true);
	}
	
	public function login(){
		
		$this->set('isAuth', 0);
		if($this->request->is('post')){
			
			if($this->Auth->login()){
				
				return $this->redirect($this->Auth->redirect());
			}
			
			$this->Session->setFlash(__('User and password combinations does not match!'));
		}
	}
	
	public function logout(){
		
		return $this->redirect($this->Auth->logout());
	}

	function index() {
		parent::isAuth();
		$this->Admin->recursive = 0;
		$this->set('admins', $this->paginate());
	}

	function view($id = null) {
		parent::isAuth();
		if (!$id) {
			$this->Session->setFlash(__('Invalid admin'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('admin', $this->Admin->read(null, $id));
	}

	function add() {
		parent::isAuth();
		if (!empty($this->data) && $this->request->is('post')) {
			$this->Admin->create();
			$this->Admin->set('is_activated', 1);
			$st = date('Y-m-d H:i:s');
			$token = sha1($st.rand(11111, 99999));
			$this->Admin->set('token', $token);
			$this->Admin->set('created_at', date('Y-m-d H:i:s'));
			if ($this->Admin->save($this->data)) {
				$this->Session->setFlash(__('The admin has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'));
			}
		}
	}

	function edit($token = null) {
		parent::isAuth();
		if (!$token && empty($this->data)) {
			$this->Session->setFlash(__('Invalid admin'));
			$this->redirect(array('action' => 'index'));
		}

		if (!empty($this->data) && ($this->request->is('post') || $this->request->is('put'))) {
			$password = $this->request->data['Admin']['password'];
			$newa = $this->request->data['Admin']['newpassword'];
			$newb = $this->request->data['Admin']['cnewpassword'];
			$odata = $this->Admin->findById($token);
			$passwordHasher = new BlowfishPasswordHasher();
			$storedHash = $odata['Admin']['password'];
			$pass =  Security::hash($password, 'blowfish', $storedHash);
			if(($newa == $newb) and ($odata['Admin']['password'] == $pass)){
				
				$this->request->data['Admin']['password'] = $this->request->data['Admin']['newpassword'];
				if ($this->Admin->save($this->data)) {
					$this->Session->setFlash(__('The admin has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->data = $this->Admin->findById($token);
					unset($this->request->data['Admin']['password']);
					$this->Session->setFlash(__('Password lama tidak cocok atau kombinasi password baru tidak sesuai, periksa kembali.'));
				}
			} else{
				$this->set('lpas',$pass);
				$this->set('opas',$odata['Admin']['password']);
				$this->data = $this->Admin->findById($token);
					unset($this->request->data['Admin']['password']);
					$this->Session->setFlash(__('Password lama tidak cocok atau kombinasi password baru tidak sesuai, periksa kembali.'));
			}
			
		} else {
			$this->request->data = $this->Admin->read(null, $token);
			unset($this->request->data['Admin']['password']);
		}
		if (empty($this->data)) {
			$this->data = $this->Admin->findByToken($token);
		}
	}

	function delete($token = null) {
		parent::isAuth();
		if (!$token) {
			$this->Session->setFlash(__('Invalid id for admin'));
			$this->redirect(array('action'=>'index'));
		}
		$admin = $this->Admin->findByToken($token);
		$id = $admin['Admin']['id'];
		if($id === $this->Auth->user('id')) {
			$this->Session->setFlash(__('Anda tidak diijinkan untuk melakukan aksi ini!'));
			$this->redirect(array('action'=>'index'));
		}
		$conditions = array(
			"Admin.token" => $token
		);
		
		$thread = array(
			"Thread.admin_id" => $id
		);
		
		$this->Admin->Thread->deleteAll($thread);
		
		if ($this->Admin->deleteAll($conditions)) {
			$this->Session->setFlash(__('Admin deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Admin was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Admin->recursive = 0;
		$this->set('admins', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid admin'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('admin', $this->Admin->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Admin->create();
			if ($this->Admin->save($this->data)) {
				$this->Session->setFlash(__('The admin has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid admin'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Admin->save($this->data)) {
				$this->Session->setFlash(__('The admin has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Admin->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for admin'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Admin->delete($id)) {
			$this->Session->setFlash(__('Admin deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Admin was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
