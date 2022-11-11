<?php

namespace App\adms\Controllers;

/**
 * Controller da página editar nova senha
 */
class UpdatePass
{
    /** @var string|null $key Recebe a chave para confirmar o e-mail*/
    private string|null $key;

    /**
     * Instancia a classe responsável em carregar a View
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {

        $this->key = filter_input(INPUT_GET, "key", FILTER_DEFAULT);

        if(!empty($this->key)){
            $this->validateKey();
        }else{
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido!</p>";
            $urlRedirect = URL;
            header("Location: $urlRedirect");
        }
    }

    /**
     * Método responsável em verificar a chave recebida 
     *
     * @return void
     */
    private function validateKey(): void
    {
        $valkey = new \App\adms\Models\AdmsUpdatePass();
        $valkey->valKey($this->key);
    }
}