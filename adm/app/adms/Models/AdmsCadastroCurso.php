<?php

namespace App\adms\Models;

class AdmsCadastroCurso
{
    private array|null $data;

    private string|null $result;

    public function getResult(): string|null
    {
        return $this->result;
    }

    public function create(array $data = null): void
    {
        $this->data = $data;

        $valEmptyField = new \App\adms\Models\helper\AdmsValEmptyField();
        $valEmptyField->valField($this->data);

        if ($valEmptyField->getResult()) {
            $this->validateInput();
        } else {
            $this->result = false;
        }
    }

    private function validateInput(): void
    {
        $validadeCurso = new \App\adms\Models\helper\AdmsValCurso();
        $validadeCurso->validadeCurso($this->data['nomeCurso']);

        $validadeResp = new \App\adms\Models\helper\AdmsValResp();
        $validadeResp->validadeCursoResp($this->data['idResponsavel']);

        if(($validadeCurso->getResult()) and ($validadeResp->getResult())){
            $this->add();
        }else{
            $this->result = false;
        }
    }

    private function add(): void
    {
        $cadastrarCurso = new \App\adms\Models\helper\AdmsCreate();
        $cadastrarCurso->executeCreate("curso", $this->data);

        if($cadastrarCurso->getResult()){
            $_SESSION['msg'] = "<p style='color: #f00;'>Curso cadastrado com sucesso!</p>";
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Curso não cadastrado com sucesso!</p>";
            $this->result = false;
        }
    }
}