<?php

class TurmasController extends AppController{
	public $name = 'Turmas';

	public function index()
	{
		parent::checarLogin();
		$this->set('turmas', $this->Turma->find('all'));
	}

	private function lista()
	{
		$cursos = $this->Turma->Curso->find('all');
		$listaCurso = array();
		foreach ($cursos as &$key) {
			$listaCurso[$key["Curso"]["id"]] = $key["Curso"]["nome"]."(".$key["Curso"]["sigla"].")";
		}
		return $listaCurso;
	}

	public function add()
	{
		parent::checarLogin();
		$this->set('lista', $this->lista());
		if($this->request->is('post')){
			if($this->Turma->save($this->request->data)){
				$this->Flash->success('Turma adicionada com sucesso');
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	function edit($id = null) {
		parent::checarLogin();
	    $this->Turma->id = $id;
	    $this->set('lista', $this->lista());
	    if ($this->request->is('get')) {
	        $this->request->data = $this->Turma->findById($id);
	    } else {
	        if ($this->Turma->save($this->request->data)) {
	            $this->Flash->success('Turma atualizada com sucesso.');
	            $this->redirect(array('action' => 'index'));
	        }
	    }
	}
	function delete($id) {
	    if (!$this->request->is('post')) {
	        throw new MethodNotAllowedException();
	    }
	    if ($this->Turma->delete($id)) {
	        $this->Flash->success('Turma deletada com sucesso.');
	        $this->redirect(array('action' => 'index'));
	    }
	}
}