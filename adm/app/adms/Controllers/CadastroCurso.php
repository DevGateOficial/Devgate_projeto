<?php

namespace App\Adms\Controllers;

/**
 * Controller da página de cadastro de curso
 */
class CadastroCurso
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW */
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    /**
     * Instancia a classe responsável em carregar a View.
     * Envia os dados para a View. 
     * 
     * @return void 
     */
    public function index(): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dataForm['Cadastrar'])) {

            unset($this->dataForm['Cadastrar']);

            $createCadastroCurso = new \App\adms\Models\AdmsCadastroCurso();
            $createCadastroCurso->create($this->dataForm);

            if ($createCadastroCurso->getResult()) {
                $_SESSION['msg'] = "<p style='color:red;'> Curso cadastrado com sucesso </p>";
            } else {
                $this->data['form'] = $this->dataForm;
            }
        }

        $this->loadView();
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER.
     * Passa os dados a serem carregados na VIEW. 
     * 
     * @return void 
     */
    private function loadView(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/cursos/cadastroCurso", $this->data);
        $loadView->loadView();
    }
}
