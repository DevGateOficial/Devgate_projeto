<?php

namespace App\adms\Models;

use Sts\Models\helper\StsValPassword;

/** Confirmar a chave atualizar senha. Cadastrar nova senha */

class AdmsUpdatePass
{
    /** @var string $key Recebe a chave para atualizar a senha */
    private string $key;

    /** @var array $result */
    private $result;

    /** @var array|null $resultBd */
    private array|null $resultBd;

    /** @var array $dataSave*/
    private array $dataSave;

    /** @var array|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|null $data;

    /**
     * @return bool Retornar true quando executar o processo com sucesso e false quando houver erro */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * 
     *
     * @param string $key
     * @return void
     */
    public function valKey(string $key): void
    {
        $this->key = $key;
        $viewKeyUpdatePass = new \App\adms\Models\helper\AdmsRead();
        $viewKeyUpdatePass->fullRead("SELECT idUsuario
                                    FROM usuario
                                    WHERE recoverPass=:recoverPass
                                    LIMIT :limit", "recoverPass={$this->key}&limit=1");
        $this->resultBd = $viewKeyUpdatePass->getResult();
        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Link inválido, solicite novo link <a href='" . URLADM . "recover-pass/index'>Clique aqui</a>!</p>";
            $this->result = false;
        }
    }

    public function editPass(array $data = null): void
    {
        $this->data = $data;
        echo "<br>";
        var_dump($this->data);
        $valEmptyField = new \App\adms\Models\helper\AdmsValEmptyField();
        $valEmptyField->valField($this->data);
        if ($valEmptyField->getResult()) {
            $this->valInput();
        } else {
            $this->result = false;
        }
    }

    private function valInput(): void
    {
        $valPassword = new \App\adms\Models\helper\AdmsValPassword();
        $valPassword->validatePass($this->data['novaSenha']);

        if($valPassword->getResult()){
            echo "pppp";
        }else{
            $this->return = false;
        }
    }
}
