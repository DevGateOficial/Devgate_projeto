<?php

namespace App\adms\Controllers;

/**
 * Controller da página Confirmar E-mail
 */
class ConfEmail
{
    /** @var string|null $key Recebe os dados que devem ser enviados para a VIEW*/
    private string|null $key;

    /**
     * Instanciar a classe responsável em carregar a View, e enviar os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        $this->key = filter_input(INPUT_GET, "key", FILTER_DEFAULT);
        echo "Chave: {$this->key}";

        if(!empty($this->key)){
            
        }else{
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido!</p>";
            $urlRedirect = URLADM . "";
            header("Location: $urlRedirect");
        }
    }
}