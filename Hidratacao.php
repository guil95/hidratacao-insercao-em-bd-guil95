<?php

//Colocar o namespace

trait Hidratacao(){
	public function populate(array $valores){
		foreach($valores as $key => $value){
			$metodo = 'set'.ucfirst($key);
			$this->$metodo($value);
		}
		
		//aqui faria conexão com banco e metodo para salvar no banco
	}
}