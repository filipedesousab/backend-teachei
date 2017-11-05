<?php
App::uses('AppModel', 'Model');

class Curso extends AppModel{
	public $name = 'Curso';
    public $fields = array('id','nome','sigla');

	public $validate = array(
        'nome' => array(
            'regra1' => array(
                'rule' => array ( 'custom' ,  '/^[a-zA-Z0-9]+$/' ),
                'message' => 'Apenas letras e numeros.'
                )
            ),
        'sigla' => array(
            'regra1' => array(
                'rule' => array ( 'custom' ,  '/^[a-zA-Z]+$/' ),
                'message' => 'Apenas letras.'
                )
            )
        );
}