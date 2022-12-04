<?php

namespace App\adms\Controllers;

/**
 * Controller da página editar nova senha
 */
class UpdatePass
{
    /** @var string|null $key Recebe a chave para confirmar o e-mail*/
    private string|null $key;

    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    /**
     * Instancia a classe responsável em carregar a View
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {

        $this->key = filter_input(INPUT_GET, "key", FILTER_DEFAULT);
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        var_dump($this->dataForm);
        if ((!empty($this->key)) and (empty($this->dataForm['UpdatePass']))) {
            $this->validateKey();
        } else {
            $this->updatePassword();
        }
    }

    /**
     * Método responsável em verificar a chave recebida 
     *
     * @return void
     */
    private function validateKey(): void
    {
        $valkey = new \App\adms\Models\AdmsUpdatePass();
        $valkey->valKey($this->key);

        if ($valkey->getResult()) {
            $loadView = new \Core\ConfigView("adms/Views/users/updatePass", $this->data);
            $loadView->loadView();
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido! Solicite um novo link <a href='" . URLADM . "recover-pass/index'>Clique aqui!</a></p>";
            $urlRedirect = URL;
            header("Location: $urlRedirect");
        }
    }

    private function updatePassword(): void
    {
        if (!empty($this->dataForm['UpdatePass'])) {
            unset($this->dataForm['UpdatePass']);
            $this->dataForm['key'] = "";
            $upPass = new \App\adms\Models\AdmsUpdatePass();
            $upPass->editPass($this->dataForm);
        }
    }
}
