<?php

namespace Sts\Controllers;

/**
 * Controller do acesso à área ADM
 */
class AcessoAdm
{
    /**
     * Instanciar a classe responsável em carregar a View, e enviar os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        $validarTipo = new \Sts\Models\StsAcessoAdm();
        $validarTipo->acess();

        var_dump($validarTipo->getResult());
        if($validarTipo->getResult()){
            $urlRedirect = URLADM . "dashboard/index";
            header("Location: $urlRedirect");
        } else{
            $urlRedirect = URL . "home/index";
            header("Location: $urlRedirect");
        }
    }
}