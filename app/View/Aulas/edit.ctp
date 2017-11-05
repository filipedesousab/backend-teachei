<h1>Adicionar Aula</h1>

<?php
echo $this->Form->create('Aula');
echo $this->Form->input('turma_id', array(
		'options' => $lista['listaTurmas'],
		'empty' => 'Turma',
		'label' => 'Turma'
	));
echo $this->Form->input('user_id', array(
		'options' => $lista['listaProfs'],
		'empty' => 'Professor',
		'label' => 'Professor'
	));
echo $this->Form->input('lab_id', array(
		'options' => $lista['listaLabs'],
		'empty' => 'Laboratório',
		'label' => 'Laboratório'
	));
echo $this->Form->input('data', array(
    'label' => 'Data da aula',
    'dateFormat' => 'DMY'
    ));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');
