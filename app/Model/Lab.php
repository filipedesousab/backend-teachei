<?php
App::uses('AppModel', 'Model');
/**
 * Lab Model
 *
 */
class Lab extends AppModel {

	public $name = 'Lab';

	public $validate = array(
		'nome' => array(
			'rule' => array('lengthBetween', 4, 45),
			'message' => 'O campo deve conter entre 4 e 45 caracteres.'
			),
		'bloco' => array(
			'rule' => array ( 'custom' ,  '/^[A-Z]+$/' ),
			'message' => 'Escolha um bloco.'
			),
		);
}
