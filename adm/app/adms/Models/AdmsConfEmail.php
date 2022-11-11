<?php

namespace App\adms\Models;

class AdmsConfEmail extends helper\AdmsConn
{
    /** @var string $key */
    private string $key;

    /** @var array $result */
    private $result;

    /** @var array|null $resultBd */
    private array|null $resultBd;

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getResult()
    {
        return $this->result;
    }


    /**
     * Undocumented function
     *
     * @param string $key
     * @return void
     */

    public function confEmail(string $key): void
    {
        $this->key = $key;
        var_dump($this->key);
        if(!empty($this->key)){
            $viewKeyConfEmail = new \App\adms\Models\helper\AdmsRead();
            $viewKeyConfEmail->fullRead("SELECT idUsuario FROM usuario WHERE confEmail =:confEmail LIMIT :limit", "confEmail={$this->key}&limit=1");

            $this->resultBd = $viewKeyConfEmail->getResult();
            if($this->resultBd){
                $this->updateSitUser();
            }else{
                $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido!</p>";
                $this->result = false;
            }
        }else{
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido!</p>";
            $this->result = false;
        }
    }

    private function updateSitUser(): void
    {
        $confEmail = null;
        $adms_user_sits = 1;

        $query_ativar_user = "UPDATE usuario SET confEmail=:confEmail, adms_user_sits=:adms_user_sits WHERE idUsuario=:id LIMIT 1";

        $activate_email = $this->connectDb()->prepare($query_ativar_user);
        $activate_email->bindParam(':confEmail', $confEmail);
        $activate_email->bindParam(':adms_user_sits', $adms_user_sits);
        $activate_email->bindParam(':id', $this->resultBd[0]['idUsuario']);
        var_dump($activate_email);
        $activate_email->execute();

        if($activate_email->rowCount()){
            $_SESSION['msg'] = "<p style='color: green'>E-mail ativado com sucesso!</p>";
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido!</p>";
            $this->result = false;
        }
        }
}
