<?php

namespace App\adms\Models\helper;

/**
 * Classe responsável em validar o curso.
 * Somente um cadastro pode utilizar o nomeCurso.
 */
class AdmsValResp
{
    /** @var string $usuario Recebe o nome do curso do formulário de cadastro de curso*/
    private string $nomeCurso;

    /** @var string $usuario Recebe o nome do curso do formulário de cadastro de curso*/
    private int $idResponsavel;

    /** @var string $result Retorna o resultado da validação, caso ocorra com sucesso, retorna true*/
    private bool $result;

    /** @var string $edit Recebe a informação que é utilizada para verificar se é para validar o usuario para o cadastro ou edição*/
    private bool|null $edit;

    /** @var string $idCurso Recebe o id do usuário que possui o nomeCurso cadastrado*/
    private int|null $idCurso;

    /** @var string $resultBd Recebe os registros do banco de dados*/
    private array|null $resultBd;

    /**
     * Retorna o resultado da validação, caso ocorra com sucesso, retorna true
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        if(!$this->result){
            echo "UEPA";
        }

        return $this->result;
    }

    public function validadeCursoResp(string $idResponsavel): void
    {
        $this->idResponsavel = (int) $idResponsavel;

        var_dump($this->idResponsavel);

        $valCursoResp = new \App\adms\Models\helper\AdmsRead();
        $valCursoResp->fullRead(
            "SELECT idUsuario FROM usuario WHERE idUsuario =:idResponsavel and tipoUsuario !=:tipoUsuario",
            "idResponsavel={$this->idResponsavel}&tipoUsuario=aluno"
        );

        $this->resultBd = $valCursoResp->getResult();

        //echo "<br> $this->resultBd <br>";

        if($this->resultBd){
            $this->result = true;
            $_SESSION['msg'] = "<p style='color=green;'> ALEGRIA </p><br>";
        }else{
            $this->result = false;
            $_SESSION['msg'] = "<p style='color=red;'>Erro: O responsável pelo curso não pode ser um aluno</p>";
        }
    }
}
