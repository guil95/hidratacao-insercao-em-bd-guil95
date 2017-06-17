<?php

namespace Trabalho;

/**
 * Description of Usuario
 *
 * @author Guilherme
 */
class Usuario {

    private $login;
    private $senha;

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        if (strlen($senha) < 6) {
            throw new \Exception("Senha deve ter no mínimo 6 digitos");
            return;
        }
        $this->senha = $senha;
    }

    use Traits\Hidratacao;

    public function saveBd(\PDO $conn) {
        $login = $this->getLogin();
        $senha = $this->getSenha();
        try {
            $sql = "Insert into tbusuario (login, senha) values (:login, :senha)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":login", $login);
            $stmt->bindParam(":senha", $senha);
            $stmt->execute();
        } catch (Exception $ex) {
            die("<pre>" . __FILE__ . " - " . __LINE__ . "\n" . print_r($ex, true) . "</pre>");
        }
    }

}
