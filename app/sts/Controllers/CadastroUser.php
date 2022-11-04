<?php

namespace Sts\Controllers;

/**
 * Controller da página de cadastro de usuário
 */
class CadastroUser
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
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dataForm['Cadastrar'])) {

            unset($this->dataForm['Cadastrar']);

            $createCadastroUser = new \Sts\Models\StsCadastroUser();
            $createCadastroUser->create($this->dataForm);

            if ($createCadastroUser->getResult()) {
                $urlRedirect = URL;
                //header("Location: $urlRedirect");
            } else {
                $this->data['form'] = $this->dataForm;
            }
        }

        $this->loadView();
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER
     * Passa os dados a serem carregados na VIEW.
     *
     * @return void
     */
    private function loadView(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/users/cadastroUser", $this->data);
        $loadView->loadView();
    }
}
