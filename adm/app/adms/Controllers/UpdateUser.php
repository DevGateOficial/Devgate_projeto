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
     * Instanciar a classe responsável em carregar a View, e enviar os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        echo "Update de usuário <BR>";

        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->dataForm['Cadastrar'])){

            unset($this->dataForm['Cadastrar']);

            $createCadastroCurso = new \App\adms\Models\;
            $createCadastroCurso->create($this->dataForm);

            if($createCadastroCurso->getResult()){
                $_SESSION['msg'] = "<p style='color:red;'> Curso cadastrado com sucesso </p>";
            }else{
                $this->data['form'] = $this->dataForm;
            }
        }

        $loadView = new \Core\ConfigView("adms/Views/cursos/cadastroCurso", $this->data);
        $loadView->loadView();
    }
}