<?php

class UsersController extends AppController {
	public $name = 'Users';
	public $components = array('Flash');

	public function index()
	{
		parent::checarLogin();
		$this->set('users', $this->User->find('all'));
	}

	public function add()
	{
		parent::checarLogin();
		if ($this->request->is('post')) {
			$this->request->data["User"]["password"] = md5($this->request->data["User"]["password"]);
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('Usuário adicionado com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
	}

	function edit($id = null) {
		parent::checarLogin();
	    $this->User->id = $id;
	    $user;
	    if ($this->request->is('get')) {
	        $user = $this->request->data = $this->User->findById($id);
	        var_dump($user);
	    } else {
	    	if ($this->User->findById($id)["User"]["password"] != $this->request->data["User"]["password"]) {
				$this->request->data["User"]["password"] = md5($this->request->data["User"]["password"]);
	    	}
	        if ($this->User->save($this->request->data)) {
	            $this->Flash->success('Usuário atualizado com sucesso.');
	            $this->redirect(array('action' => 'index'));
	        }
	    }
	}
	function delete($id) {
	    if (!$this->request->is('post')) {
	        throw new MethodNotAllowedException();
	    }
	    if ($this->User->delete($id)) {
	        $this->Flash->success('Usuário deletado com sucesso.');
	        $this->redirect(array('action' => 'index'));
	    }
	}

	public function login()
	{
		if($this->request->is('post')){
			$data = $this->request->data['User'];
			$usuario = $this->User->find('first', array('conditions' => array('email' => $data['email'])))["User"];
			if($usuario['email'] == $data['email'] && $usuario['password'] == md5($data['password'])){
				$this->Session->write('userId', $usuario['id']);
				$this->Session->write('email', $usuario['email']);
				$this->Session->write('password', md5($usuario['password']));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	public function logout()
	{
		$this->Session->destroy();
		$this->redirect(array('action' => 'index'));
	}
}