<?php

namespace Sts\Controllers;

/**
 * Controller da página Login
 */
class Login
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
        //$this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        echo "Existo";

        //if(!empty($this->dataForm['SendLogin'])){
            // $validarLogin = new \App\adms\Models\AdmsLogin();
            // $validarLogin->login($this->dataForm);

            // if($validarLogin->getResult()){
            //     $urlRedirect = URLADM . "home/index";
            //     header("Location: $urlRedirect");
            // }else{
            //     $this->data['form'] = $this->dataForm;
            // }
        //}

        $loadView = new \Core\ConfigView("sts/Views/login/login", $this->data);
        $loadView->loadView();
    }
}