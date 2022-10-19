<?php

namespace App\adms\Models\helper;

/**
 * Classe responsável em validar o curso.
 * Somente um cadastro pode utilizar o nomeCurso.
 */
class AdmsValCurso
{
    /** @var string $usuario Recebe o nome do curso do formulário de cadastro de curso*/
    private string $nomeCurso;

    /** @var string $usuario Recebe o nome do curso do formulário de cadastro de curso*/
    private string $idResponsavel;

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
        return $this->result;
    }

    public function validadeCurso(string $nomeCurso, bool|null $edit = null, int|null $idCurso = null): void
    {
        $this->nomeUsuario = $nomeCurso;
        $this->edit = $edit;
        $this->idUsuario = $idCurso;

        $valCursoSingle = new \App\adms\Models\helper\AdmsRead();
        if (($this->edit == true) and (!empty($this->idUsuario))) {
            $valCursoSingle->fullRead(
                "SELECT idCurso FROM curso WHERE nomeCurso =:nomeCurso idCurso =:idCurso LIMIT :limit",
                "nomeCurso={$this->nomeCurso}&idCurso={$this->idCurso}&limit=1");
        } else {
            $valCursoSingle->fullRead("SELECT idCurso FROM usuario WHERE nomeCurso =:nomeCurso LIMIT :limit", "nomeCurso={$this->nomeUsuario}&limit=1");
        }

        $this->resultBd = $valCursoSingle->getResult();

        if (!$this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: O nome do curso já está em uso!</p>";
            $this->result = false;
        }
    }

    public function validadeCursoResp(string $nomeCurso, int|null $responsavel): void
    {
        $this->nomeCurso = $nomeCurso;
        $this->idResponsavel = $responsavel;

        $valCursoResp = new \App\adms\Models\helper\AdmsRead();
        $valCursoResp->fullRead(
            "SELECT idUsuario FROM usuario WHERE idUsuario =:idReponsavel tipoUsuaio !=: tipoUsuario LIMIT :limit",
            "idResponsavel={$this->idResponsavel}&tipoUsuario=aluno&limit=1"
        );

        $this->resultBd = $valCursoResp->getResult();

        if($this->resultBd){
            $this->result = true;
        }else{
            $this->result = false;
            $_SESSION['msg'] = "<p style='color=red;'>Erro: O responsável pelo curso não pode ser um aluno</p>"
        }
    }
}
