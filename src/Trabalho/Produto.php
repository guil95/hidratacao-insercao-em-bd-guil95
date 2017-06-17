<?php

namespace Trabalho;

/**
 * Description of Produto
 *
 * @author Guilherme
 */
class Produto {

    private $descricao;
    private $valor;

    function getDescricao() {
        return $this->descricao;
    }

    function getValor() {
        return $this->valor;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setValor($valor) {
        if ($valor < 1) {
            throw new \Exception("Valor deve ser maior ou igual a 1");
            return;
        }
        $this->valor = $valor;
    }

    use Traits\Hidratacao;

    public function saveBd(\PDO $conn) {
        $descricao = $this->getDescricao();
        $valor = $this->getValor();
        try {
            $sql = "Insert into tbproduto (descricao, valor) values (:descricao, :valor)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":valor", $valor);
            $stmt->execute();
        } catch (\Exception $ex) {
            die("<pre>" . __FILE__ . " - " . __LINE__ . "\n" . print_r($ex, true) . "</pre>");
        }
    }

}
