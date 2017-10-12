<h1>Adicionar Usuário</h1>

<?php
echo $this->Form->create('User');
echo $this->Form->input('nome');
echo $this->Form->input('email');
echo $this->Form->checkbox('professor', array('value' => 'true'));
echo $this->Form->label('Professor');
echo $this->Form->checkbox('administrador', array('value' => 'true'));
echo $this->Form->label('Administrador');
echo $this->Form->input('password', array('label' => 'Senha'));
echo $this->Form->end('Salvar');