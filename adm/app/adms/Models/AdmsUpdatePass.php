<?php

namespace App\adms\Models;

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
    public function valKey(string $key): void
    {
        $this->key = $key;
        $viewKeyUpdatePass = new \App\adms\Models\helper\AdmsRead();
        $viewKeyUpdatePass->fullRead("SELECT idUsuario
                                    FROM usuario
                                    WHERE recoverPass=:recoverPass
                                    LIMIT :limit", "recoverPass={$this->key}&limit=1");
        $viewKeyUpdatePass->getResult();
    }
}
