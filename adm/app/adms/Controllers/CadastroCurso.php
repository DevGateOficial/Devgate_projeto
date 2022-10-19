<?php

namespace App\Adms\Controllers;

/**
 * Controller da página de cadastro de curso
 */
class CadastroCurso
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
        echo "Cadastro de curso <BR>";

        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->dataForm['Cadastrar'])){

            unset($this->dataForm['Cadastrar']);

            $createCadastroCurso = new \App\adms\Models\AdmsCadastroCurso();
            $createCadastroCurso->create($this->dataForm);

            if($createCadastroCurso->getResult()){
                echo "CADASTRO REALIZADO COM SUCESSO";
            }else{
                $this->data['form'] = $this->dataForm;
            }
        }

        $loadView = new \Core\ConfigView("adms/Views/curso/cadastroCurso", $this->data);
        $loadView->loadView();
    }
}