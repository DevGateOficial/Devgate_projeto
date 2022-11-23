<?php

namespace Sts\Controllers;

/**
 * Controller da página Login
 */
class AcessoAdm
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    /**
     * Instanciar a classe responsável em carregar a View, e enviar os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        $validarTipo = new \Sts\Models\StsAcessoAdm();
        $validarTipo->acess();

        if($validarTipo->getResult()){
            $urlRedirect = URLADM . "dashboard/index";
            header("Location: $urlRedirect");
        } else {
            $urlRedirect = URL . "login/index";
            header("Location: $urlRedirect");
        }
    }
}