<?php

namespace App\adms\Models;

/**
 * Classe responsável no cadastro de cursos no banco de dados
 */
class AdmsCadastroCurso
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result;

    /**
     * Retorna a situação do cadastro para quem o instanciar.
     * Caso execute com sucesso retorna true, caso de algum problema, retorna false
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Recebe os dados da controller e instancia os métodos de verificação dos dados.
     *
     * @param array|null $data
     * @return void
     */
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

     /**
     * Instancia os Models responsáveis em verificar o nomeCurso e idResponsável do curso a ser cadastrado.
     *
     * @return void
     */
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

    /**
     * Instancia o método genérico de criação de registros no banco de dados, passandos os dados referentes ao curso a ser cadastrado.
     * Caso execute com sucesso, atrubiu uma mensagem de sucesso e retorna true.
     * Caso a execução encontre algum erro, atribui uma mensagem de errro e retorna false.
     *
     * @return void
     */
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