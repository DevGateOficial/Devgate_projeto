<?php 

namespace Sts\Models;

class StsAcessoAdm
{
    private int $idUsuario;

    private array|null $resultBd;

    private $result;

    public function getResult()
    {
        return $this->result;
    }

    public function acess(): void
    {
        $this->idUsuario = $_SESSION['user_idUsuario'];

        $verifyType = new \Sts\Models\helper\CRUD\StsRead();

        //Retorna somente as colunas indicadas
        $verifyType->fullRead(
            "SELECT idUsuario, tipoUsuario FROM usuario WHERE idUsuario =:idUsuario LIMIT :limit",
            "idUsuario={$this->idUsuario}&limit=1"
        );

        $this->resultBd = $verifyType->getResult();


        if ($this->resultBd) {
            $this->valUserType();
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'> Erro: Registro não encontrado </p>";
            $this->result = false;
        }
    }

    private function valUserType()
    {
        var_dump($this->resultBd);
        var_dump($this->resultBd[0]['tipoUsuario']);

        if($this->resultBd[0]['tipoUsuario'] != 'aluno'){
            $this->result = true;
        } else{
            $_SESSION['msg'] = "<p style='color: #f00'> Erro: Você não tem permissão! </p>";
            $this->result = false;
        }
    }
    
}