<?php

namespace App\adms\Controllers;

/**
 * Controller da página para deletar atividade.
 */
class DeleteAtividade
{
    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(string|int|null $idAtividade): void
    {
        $viewAula = new \App\adms\Models\helper\AdmsRead();
        $viewAula->fullRead("SELECT idAula FROM atividade WHERE idAtividade='$idAtividade'");

        $listAtividades = new \App\adms\Models\helper\AdmsDelete();
        $listAtividades->executeDelete("atividade", $idAtividade);

        if ($listAtividades->getResult()) {
            $urlRedirect = URLADM . "list-atividades/index/" . $viewAula->getResult()[0]['idAula'];
            header("Location: $urlRedirect");
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Atividade não deletada!</p>";
            $urlRedirect = URLADM . "list-atividades/index";
            header("Location: $urlRedirect");
        }
    }
}
