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
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if ( (!empty($id)) and (empty($this->dataForm['EditCurso'])) ) {
            $this->id = (int) $id;
            $viewCurso = new \App\adms\Models\AdmsEditCursos();
            $viewCurso->viewCurso($this->id);

            if ($viewCurso->getResult()) {
                $this->data['form'] = $viewCurso->getResultBd();
                $this->loadView();
            } else {
                $urlRedirect = URLADM . "list-cursos/index";
                header("Location: $urlRedirect");
            }
        } else {
            $this->editCurso();
        }
    }

    private function editCurso(): void
    {
        if (!empty($this->dataForm['EditCurso'])) {
            unset($this->dataForm['EditCurso']);
            $editUser = new \App\adms\Models\AdmsEditCursos();
            $editUser->update($this->dataForm);

            if($editUser->getResult()) {
                $urlRedirect = URLADM . "view-curso/index/" . $this->dataForm['idCurso'];
                header("Location: $urlRedirect");
            } else {
                $this->data['form'] = $this->dataForm;
                $this->loadView();
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Curso não encontrado!</p>";
            $urlRedirect = URLADM . "list-cursos/index";
            header("Location: $urlRedirect");
        }
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER
     * Passa os dados a serem carregados na VIEW.
     *
     * @return void
     */
    private function loadView(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/cursos/editCurso", $this->data);
        $loadView->loadView();
    }
}
