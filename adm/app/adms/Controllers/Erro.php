<?php

namespace App\adms\Controllers;

/**
 * Controller da página Erro
 */
class Erro
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data;

    /**
     * Instanciar a classe responsável em carregar a View, e enviar os dados para a View.
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