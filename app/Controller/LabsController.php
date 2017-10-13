<?php

class LabsController extends AppController{
	public $name = 'Labs';

	public function index()
	{
		parent::checarLogin();
		$this->set('labs', $this->Lab->find('all'));
	}

	public function add()
	{
		parent::checarLogin();
		if ($this->request->is('post')) {
			var_dump($this->request->data);
            if ($this->Lab->save($this->request->data)) {
                $this->Flash->success('Laboratório adicionado com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
	}
	function edit($id = null) {
		parent::checarLogin();
	    $this->Lab->id = $id;
	    if ($this->request->is('get')) {
	        $this->request->data = $this->Lab->findById($id);
	    } else {
	        if ($this->Lab->save($this->request->data)) {
	            $this->Flash->success('Laboratório atualizado com sucesso.');
	            $this->redirect(array('action' => 'index'));
	        }
	    }
	}
	function delete($id) {
	    if (!$this->request->is('post')) {
	        throw new MethodNotAllowedException();
	    }
	    if ($this->Lab->delete($id)) {
	        $this->Flash->success('Laboratório deletado com sucesso.');
	        $this->redirect(array('action' => 'index'));
	    }
	}
}