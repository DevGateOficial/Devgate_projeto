<?php

namespace App\Adms\Controllers;

/**
 * Controller da página de edição de curso
 */
class EditCursos
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /**
     * Instanciar a classe responsável em carregar a View, e enviar os dados para a View.
     *
     * @return void
     */
    public function index(int|string|null $id = null): void
    {
        if (!empty($id)) {
            $this->id = (int) $id;
            $viewCurso = new \App\adms\Models\AdmsEditCursos();
            $viewCurso->viewCurso($this->id);

            if ($viewCurso->getResult()) {
                $this->data['form'] = $viewCurso->getResultBd();
                $this->viewEditCurso();
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

    private function viewEditCurso(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/cursos/editCurso", $this->data);
        $loadView->loadView();
    }
}
