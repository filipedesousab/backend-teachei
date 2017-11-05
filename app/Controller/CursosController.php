<?php

class CursosController extends AppController{
	public $name = 'Cursos';
	public $components = array('File','Flash');
	public function index()
	{
		parent::checarLogin();
		$this->set('cursos', $this->Curso->find('all'));
	}

	public function add()
	{
		parent::checarLogin();
		if($this->request->is('post')){
			try{
				if($this->Curso->save($this->request->data)){
					$this->Flash->success('Curso adicionado com sucesso');
					$this->redirect(array('action' => 'index'));
				}
			}catch (Exception $e) {
				$this->Flash->error('Ops. Ocorreu um erro! Entre em contato com o administrador e informe o erro: '.$e->getCode());
			}
		}
	}

	function edit($id = null) {
		parent::checarLogin();
	    $this->Curso->id = $id;
	    if ($this->request->is('get')) {
	        $this->request->data = $this->Curso->findById($id);
	    } else {
	    	$curso = $this->Curso->findById($id);
	    	//TENTA SALVAR OS DADOS NO BANCO
	    	if ($this->Curso->save($this->request->data)) {
				$this->Flash->success('Curso atualizado com sucesso.');
	            $this->redirect(array('action' => 'index'));
	        }

	    }
	}
	function delete($id) {
	    if (!$this->request->is('post')) {
	        throw new MethodNotAllowedException();
	    }
	    $sigla = $this->Curso->findById($id)['Curso']['sigla'];
	    if ($this->Curso->delete($id)) {
	        $this->Flash->success('Curso deletado com sucesso.');
	        $this->redirect(array('action' => 'index'));
	    }
	}
}