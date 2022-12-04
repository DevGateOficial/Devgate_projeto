<?php

namespace App\Adms\Controllers;

/**
 * Controller da página de update de usuario
 */
class UpdateUser
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    /**
     * Instancia a classe responsável em carregar a View. 
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dataForm['UpdateUser'])) {

            unset($this->dataForm['UpdateUser']);

            $upgradeUser = new \Sts\Models\StsUpgradeUser();
            $upgradeUser->create($this->dataForm);

            if ($upgradeUser->getResult()) {
                $_SESSION['msg'] = "<p style='color:red;'> Upgrade realizado com sucesso </p>";
            } else {
                $this->data['form'] = $this->dataForm;
            }
        }

        $loadView = new \Core\ConfigView("adms/Views/users/updateUser", $this->data);
        $loadView->loadView();
    }
}
