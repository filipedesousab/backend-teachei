<?php 

echo $this->Form->create('Lab');
echo $this->Form->input('nome');
echo $this->Form->input('bloco', array(
    'options' => array('A' => 'A', 'B' => 'B', 'C'=>'C', 'D'=>'D', 'E'=>'E', 'F'=>'F'),
    'empty' => 'Bloco'
));
echo $this->Form->input('andar', array(
    'options' => array(0,1,2,3),
    'empty' => 'Andar'
));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');