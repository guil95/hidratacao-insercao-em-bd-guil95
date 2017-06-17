<?php

namespace Trabalho\Traits;

trait Hidratacao {

    public function populate(array $valores) {

        try {
            foreach ($valores as $atributo => $value) {
                $metodoSet = 'set' . ucfirst($atributo);
                if (method_exists($this, $metodoSet)) {
                    $this->$metodoSet($value);
                } else {
                    die("<pre>" . __FILE__ . " - " . __LINE__ . "\n" . print_r("Método " . $metodoSet . " não existe", true) . "</pre>");
                }
            }
        } catch (Exception $ex) {
            die("<pre>" . __FILE__ . " - " . __LINE__ . "\n" . print_r($ex->getMessage(), true) . "</pre>");
        }

        //aqui faria conexão com banco e metodo para salvar no banco
    }

}
