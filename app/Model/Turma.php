<?php
App::uses('AppModel', 'Model');

class Turma extends AppModel{
	public $name = 'Turma';

	public $validate = array(
        'curso_id' => 'notBlank',
        'periodo' => 'notBlank',
        'turno' => 'notBlank',
        'turma' => 'notBlank',
        );

	public $belongsTo = array(
        'Curso' => array(
            'className'  => 'Curso',
            'foreignkey' => 'curso_id'
        )
    );

}