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
    private array $listAtividades = [];

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

        $this->getAtividades();
    }

    public function getAtividades(): void
    {
        foreach($this->listAulas as $aula) {

            $id = (string) $aula['idAula'];

            $viewAtividades = new \App\adms\Models\helper\AdmsRead();
            $viewAtividades->fullRead("SELECT idAtividade
                                        FROM atividade
                                        WHERE idAula =:id", "id={$id}");

            $atividades = $viewAtividades->getResult();

            if($atividades){
                array_push($this->listAtividades, $atividades[0]['idAtividade']);
            }
        }
        
        $this->deleteAtividades();
    }

    private function deleteAtividades(): void
    {
        if($this->listAtividades){
            foreach($this->listAtividades as $atividade) {
                $idAtividade = (string) $atividade;
    
                $deleteAtiv = new \App\adms\Models\helper\AdmsDelete();
                $deleteAtiv->executeDelete("atividade", $idAtividade);
            }
        }

        $this->deleteAulas();
    }

    private function deleteAulas(): void
    {
        if($this->listAulas){
            foreach($this->listAulas as $aula){
                $idAula = (string) $aula['idAula'];
    
                $deleteAula = new \App\adms\Models\helper\AdmsDelete();
                $deleteAula->executeDelete("aula", $idAula);
            }
        }

        $this->deleteCurso();
    }

    /**
     * Instancia o método genérico de criação de registros no banco de dados, passandos os dados referentes ao curso a ser cadastrado.
     * Caso execute com sucesso, atrubiu uma mensagem de sucesso e retorna true.
     * Caso a execução encontre algum erro, atribui uma mensagem de errro e retorna false.
     *
     * @return void
     */
    private function deleteCurso(): void
    {
        $deleteCurso = new \App\adms\Models\helper\AdmsDelete();
        $deleteCurso->executeDelete("curso", $this->idCurso);

        if($deleteCurso->getResult()){
            $this->result = true;
        } else{
            $this->result = false;
        }
    }
}