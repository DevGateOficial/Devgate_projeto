<?php

namespace Sts\Controllers;

class ViewCurso
{
    /** @var array|string|null $data Recebe os dados que devem ser enviadoa a VIEW*/
    private array|string|null $data = [];

    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    public function index(int|string|null $id = null): void
    {
        if (!empty($id)) {
            $this->id = (int) $id;

            $viewCurso = new \Sts\Models\StsViewCurso();
            $viewCurso->viewCurso($this->id);

            if ($viewCurso->getResult()) {
                $this->data['viewCurso'] = $viewCurso->getResultBd();
                $this->viewUser();
            } else {
                $urlRedirect = URLADM . "list-cursos/index";
                header("Location: $urlRedirect");
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Curso não encontrado!</p>";

            $urlRedirect = URLADM . "list-cursos/index";
            header("Location: $urlRedirect");
        }
    }

    private function viewUser(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/cursos/viewCurso", $this->data);
        $loadView->loadView();
    }
}
