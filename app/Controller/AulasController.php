<?php

class AulasController extends AppController{
	public $theme = 'TeAchei';
	public $name = 'Aulas';

	public function index()
	{
		parent::checarLogin();
		$this->loadModel('Curso');
		$this->loadModel('User');
		//FOI NECESSÁRIO BUSCAR OS DADOS DO CURSO, POIS O CAKE NÃO CONSEGUE GERENCIAR FK DE SEGUNDO NÍVEL
		$aulas = $this->Aula->find('all');
		foreach ($aulas as &$aula) {
			$curso = $this->Curso->findById($aula["Turma"]["curso_id"])["Curso"];
			$aula["Curso"] = $curso;
		}
		$this->set('aulas', $aulas);
	}

	private function lista()
	{
		$this->loadModel('Curso');
		$turmas = $this->Aula->Turma->find('all');
		$listaTurmas = array();
		foreach ($turmas as &$turma) {
			$listaTurmas[$turma["Turma"]["id"]] = $turma["Curso"]["sigla"].$turma["Turma"]["periodo"].$turma["Turma"]["turno"].$turma["Turma"]["turma"];
		}

		$options['conditions'] = array('User.professor' => 1);
		$listaProfs = array();
		$profs = $this->Aula->User->find('all', $options);
		foreach ($profs as &$prof) {
			$listaProfs[$prof["User"]["id"]] = $prof["User"]["nome"];
		}

		$listaLabs = array();
		$labs = $this->Aula->Lab->find('all');
		foreach ($labs as &$lab) {
			$listaLabs[$lab["Lab"]["id"]] = $lab["Lab"]["nome"];
		}
		return array("listaTurmas" => $listaTurmas, "listaProfs" => $listaProfs, "listaLabs" => $listaLabs);
	}

	public function add()
	{
		parent::checarLogin();
		$this->set('lista', $this->lista());

		if($this->request->is('post')){
			$this->User->data['Aula']['data'] = date('Y-m-d');
			if($this->Aula->save($this->request->data)){
				$this->Flash->success('Aula adicionada com sucesso.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	function edit($id = null) {
		parent::checarLogin();
	    $this->Aula->id = $id;
	    $this->set('lista', $this->lista());
	    $this->set('title_for_layout', 'Editar Aula');
	    if ($this->request->is('get')) {
	        $this->request->data = $this->Aula->findById($id);
	    } else {
	        if ($this->Aula->save($this->request->data)) {
	            $this->Flash->success('Aula atualizada com sucesso.');
	            $this->redirect(array('action' => 'index'));
	        }
	    }
	}
	function delete($id) {
	    if (!$this->request->is('post')) {
	        throw new MethodNotAllowedException();
	    }
	    if ($this->Aula->delete($id)) {
	        $this->Flash->success('Aula deletada com sucesso.');
	        $this->redirect(array('action' => 'index'));
	    }
	}
}