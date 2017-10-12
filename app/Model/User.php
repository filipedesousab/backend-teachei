<?php

class User extends AppModel{
	public $name = 'User';

	public $validate = array(
		'nome' => array(
			'regra1' => array(
				'rule' => array ( 'custom' ,  '/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/' ),
				'message' => 'O campo deve conter apenas letras.',
				'last' => false
				),
			'regra2' => array(
				'rule' => array('lengthBetween', 5, 45),
				'message' => 'O campo deve conter entre 5 e 45 caracteres.',
				)
		),
		'email' => array(
			'regra1' => array(
				'rule'  =>  array ( 'custom' ,  '/^[a-zA-Z0-9\._-]+@+[a-zA-Z0-9\._-]+.([a-zA-Z]{2,4})$/' ),
				'message'  =>  'Forneça um endereço de e-mail válido.'
				),
			'regra2' => array(
				'rule' => 'notBlank',
				),
			'regra3' => array (
		        'rule'  =>  'isUnique' ,
		        'message'  =>  'Email já cadastrado.'
		  		)
		),
		'password' => array(
			'rule' => array ( 'lengthBetween' ,  5, 45 ),
			'message' => 'A senha deve ter no mínimo 5 caracteres e no máximo 45.'
		)
	);
}
