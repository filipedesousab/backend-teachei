<?php

class UsersController extends AppController {
	public $name = 'Users';
	public $components = array('Flash');

	public function index()
	{
		$this->set('users', $this->User->find('all'));
	}

	public function add()
	{
		if ($this->request->is('post')) {
			$this->request->data["User"]["password"] = $this->request->data["User"]["password"];
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('Usuário adicionado com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
	}

	function edit($id = null) {
	    $this->User->id = $id;
	    $user;
	    if ($this->request->is('get')) {
	        $user = $this->request->data = $this->User->findById($id);
	        var_dump($user);
	    } else {
	    	if ($this->User->findById($id)["User"]["password"] != $this->request->data["User"]["password"]) {
				$this->request->data["User"]["password"] = $this->request->data["User"]["password"];
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
}