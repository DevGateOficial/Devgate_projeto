<?php

namespace App\adms\Models;

/**
 * Classe responsável em deletar cursos no banco de dados
 */
class AdmsDeleteCurso
{
    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result;

    /** @var int|string|null $idCurso R ecebe o id do curso que deve ser deletado no banco e dados*/
    private int|string|null $idCurso;

    /** @var array Undocumented variable*/
    private array $listAulas;

    /** @var array Undocumented variable*/
    private array $listAtividades;

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

    public function getAulas($idCurso): void
    {
        $this->idCurso = $idCurso;

        $viewAulas = new \App\adms\Models\helper\AdmsRead();
        $viewAulas->fullRead("SELECT idAula
                                FROM aula
                                WHERE idCurso =:id", "id={$this->idCurso}");

        $this->listAulas = $viewAulas->getResult();
    }

    public function getAtividades(): void
    {
        $viewAtividades = new \App\adms\Models\helper\AdmsRead();
        $viewAtividades->fullRead("SELECT idAula
                                FROM aula
                                WHERE idCurso =:id", "id={$this->idCurso}");

        $this->listAtividades = $viewAtividades->getResult();
    }

    private function deleteAtividades(): void
    {
        $deleteAtiv = new \App\adms\Models\helper\AdmsDelete();
        

        foreach($this->listAulas as $aula){
            extract($aula);
            $deleteAtiv->fullDelete("DELETE FROM atividade WHERE idAula = {$aula}");
        }   
    }

    /**
     * Instancia o método genérico de criação de registros no banco de dados, passandos os dados referentes ao curso a ser cadastrado.
     * Caso execute com sucesso, atrubiu uma mensagem de sucesso e retorna true.
     * Caso a execução encontre algum erro, atribui uma mensagem de errro e retorna false.
     *
     * @return void
     */
    private function delete(): void
    {

    }
}