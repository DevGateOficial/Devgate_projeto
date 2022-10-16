<?php

namespace App\Adms\Controllers;

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
        echo "Novo usuário <br>";

        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->dataForm['Cadastrar'])){

            unset($this->dataForm['Cadastrar']);
        
            $createCadastroUser = new \App\adms\Models\AdmsCadastroUser();
            $createCadastroUser->create($this->dataForm);

            if($createCadastroUser->getResult()){
                $urlRedirect = URLADM;
                header("Location: $urlRedirect");
            }else{
                $this->data['form'] = $this->dataForm;
            }
        }
        $loadView = new \Core\ConfigView("adms/Views/login/cadastroUser", $this->data);
        $loadView->loadView();
    }
}