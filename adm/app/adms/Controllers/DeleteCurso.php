<?php

namespace App\adms\Controllers;

/**
 * Controller da página para deletar o curso.
 */
class DeleteCurso
{
    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(string|int|null $idCurso): void
    {   
        $delete = new \App\adms\Models\AdmsDeleteCurso();
        $delete->getAulas($idCurso);

        if($delete->getResult()){
            $urlRedirect = URLADM . "list-cursos/index/";
            header("Location: $urlRedirect");
        }else{
            $_SESSION['msg'] = "<p style='color: red'>Erro: Curso não deletada!</p>";
            $urlRedirect = URLADM . "view-curso/index/{$idCurso}";
            header("Location: $urlRedirect");
        }
    }
}
