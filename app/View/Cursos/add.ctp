<h1>Adicionar Curso</h1>

<?php
echo $this->Form->create('Curso');
echo $this->Form->input('nome');
echo $this->Form->input('sigla');
echo $this->Form->end('Salvar');