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
    public function valKey(string $key): bool
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
            return true;
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Link inválido, solicite novo link <a href='" . URLADM . "recover-pass/index'>Clique aqui</a>!</p>";
            $this->result = false;
            return false;
        }
    }

    public function editPass(array $data = null): void
    {
        $this->data = $data;
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
        $valPassword->validatePass($this->data['senha']);

        if($valPassword->getResult()){
            if($this->valKey($this->data['key'])){
                $this->updatePass();
            }else{
                $this->return = false;
            }
        }else{
            $this->return = false;
        }
    }

    private function updatePass(): void
    {
        $this->dataSave['recoverPass'] = null;
        $this->dataSave['senha'] = password_hash($this->data['senha'], PASSWORD_DEFAULT);;
        
        $updatePass = new \App\adms\Models\helper\AdmsUpdate();
        $updatePass->executeUpdate("usuario", $this->dataSave, "WHERE idUsuario=:id", "id={$this->resultBd[0]['idUsuario']}");     
        if($updatePass->getResult()){
            $_SESSION['msg'] = "<p style='color: green;'>Senha atualizada com sucesso!</p>";
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Senha não atualizada, tente novamente!</p>";
            $this->result = false;
        }
    } 
}
