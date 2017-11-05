<h1>Editar Turma</h1>

<?php 
echo $this->Form->create('Turma');
echo $this->Form->input('curso_id', array(
	'label' => '',
	'options' => $lista,
	'empty' => 'Curso'
	));
echo $this->Form->input('periodo', array(
	'label' => '',
    'options' => array(1 => '1º', 2 => '2º', 3 =>'3º', 4=>'4º', 5=>'5º', 6=>'6º', 7=>'7º', 8=>'8º', 9=>'9º', 10=>'10º'),
    'empty' => 'Período'
));
echo $this->Form->input('turno', array(
	'label' => '',
	'options' => array('M' => 'Manhã', 'T' => 'Tarde', 'N'=>'Noite'),
	'empty' => 'Turno'
	));
echo $this->Form->input('turma', array(
	'label' => '',
	'options' => array('A' => 'A', 'B' => 'B', 'C'=>'C', 'D'=>'D', 'E'=>'E', 'F'=>'F'),
    'empty' => 'Turma'
    ));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');