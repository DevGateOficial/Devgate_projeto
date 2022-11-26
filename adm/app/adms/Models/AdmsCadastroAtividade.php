<?php

namespace App\adms\Models;

/**
 * Classe responsável no cadastro de atividade no banco de dados
 */
class AdmsCadastroAtividade
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result;

    /** @var array|null $resultBd Recebe os registro do banco de dados*/
    private array|null $resultBd;

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
     * Retorna os registro do banco de dados
     *
     * @return array|null
     */
    public function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    /**
     * Função responsável em verificar se o curso em questão realmente existe no banco de dados.
     * Caso exista continua o processamente, caso contrário informa o erro.
     *
     * @param integer $id
     * @return boolean
     */
    public function viewAula(int $id): bool
    {
        $this->id = $id;

        $viewCurso = new \App\adms\Models\helper\AdmsRead();
        $viewCurso->fullRead("SELECT idAula
                                FROM aula
                                WHERE idAula =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewCurso->getResult();

        if ($this->resultBd) {
            $this->result = true;
            return true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Aula não encontrado!</p>";
            $this->result = false;
            return false;
        }
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
        $validadeCurso->validadeCurso($this->data['nomeAtividade']);

        if ($validadeCurso->getResult()) {
            $this->add();
        } else {
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
        var_dump($this->data);
        
        $cadastrarCurso = new \App\adms\Models\helper\AdmsCreate();
        $cadastrarCurso->executeCreate("atividade", $this->data);

        var_dump($cadastrarCurso->getResult());

        if ($cadastrarCurso->getResult()) {
            $_SESSION['msg'] = "<p style='color: #f00;'>Atividade cadastrado com sucesso!</p>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Atividade não cadastrado!</p>";
            $this->result = false;
        }
    }
}
