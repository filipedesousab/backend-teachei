<h1>Editar Curso</h1>

<?php
echo $this->Form->create('Curso');
echo $this->Form->input('nome');
echo $this->Form->input('sigla');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');