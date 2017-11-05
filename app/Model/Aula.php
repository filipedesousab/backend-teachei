<?php
//App::uses('AppModel', 'Model');

class Aula extends AppModel{
	public $name = 'Aula';

	public $validate = array(

        );

	public $belongsTo = array(
        'Turma' => array(
            'className'  => 'Turma',
            'foreignkey' => 'turma_id'
        ),
        'User' => array(
            'className'  => 'User',
            'foreignkey' => 'user_id',
            'conditions' => array('User.professor' => 1)
        ),
        'Lab' => array(
            'className'  => 'Lab',
            'foreignkey' => 'lab_id'
        )
    );
}