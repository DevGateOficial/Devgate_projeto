<?php

namespace App\Adms\Controllers;

/**
 * Controller da página de edição de usuario
 */
class EditUsers
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /**
     * Instancia a classe responsável em carregar a View
     * E enviar os dados para a View.
     *
     * @return void
     */
    public function index(int|string|null $id = null): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if ((!empty($id)) and (empty($this->dataForm['EditUser']))) {
            $this->id = (int) $id;
            $viewUser = new \App\adms\Models\AdmsEditUsers();
            $viewUser->viewUser($this->id);

            if ($viewUser->getResult()) {
                $this->data['form'] = $viewUser->getResultBd();
                $this->viewEditUser();
            } else {
                $urlRedirect = URLADM . "list-users/index";
                header("Location: $urlRedirect");
            }
        } else {

            $this->editUser();
        }
    }

    /**
     * Recebe os dados da VIEW, através de um formulário.
     * Instancia a MODEL responsável na edição do usuário.
     *
     * @return void
     */
    private function editUser(): void
    {
        if (!empty($this->dataForm['EditUser'])) {
            unset($this->dataForm['EditUser']);
            $editUser = new \App\adms\Models\AdmsEditUsers();
            $editUser->update($this->dataForm);

            if($editUser->getResult()) {
                $urlRedirect = URLADM . "view-users/index/" . $this->dataForm['idUsuario'];
                header("Location: $urlRedirect");
            } else {
                $this->data['form'] = $this->dataForm;
                $this->viewEditUser();
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Usuário não encontrado!</p>";
            $urlRedirect = URLADM . "list-users/index";
            header("Location: $urlRedirect");
        }
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER
     * Passa os dados a serem carregados na VIEW.
     *
     * @return void
     */
    private function viewEditUser(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/users/editUser", $this->data);
        $loadView->loadView();
    }
}
