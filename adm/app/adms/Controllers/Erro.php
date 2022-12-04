<?php

namespace App\adms\Controllers;

/**
 * Controller da página de erro.
 */
class Erro
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data;

    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        echo "Pagina de erro<br>";

        $this->data = "<p style='color: #f00'> Página não encontrada </p>";

        $loadView = new \Core\ConfigView("adms/Views/erro/erro", $this->data);
        $loadView->loadView();
    }
}
