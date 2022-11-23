<?php

namespace App\Adms\Controllers;

/**
 * Controller da página de cadastro de aula
 */
class CadastroAula
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
    public function index(int|string|null $id = null): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if ( (!empty($id)) and (empty($this->dataForm['CadastrarAula'])) ) {
            $this->id = (int) $id;
            $viewCurso = new \App\adms\Models\AdmsCadastroAula();
            $viewCurso->viewCurso($this->id);

            if ($viewCurso->getResult()) {
                $this->data['form'] = $viewCurso->getResultBd();
                $this->loadView();
            } else {
                $urlRedirect = URLADM . "list-cursos/index";
                header("Location: $urlRedirect");
            }
        } else{
            $this->createAula();
        }
    }

    /**
     * Recebe os dados da VIEW, através de um formulário.
     * Instancia a MODEL responsável na edição da imagem.
     * @return void
     */
    private function createAula(): void
    {
        if (!empty($this->dataForm['CadastrarAula'])) {
            unset($this->dataForm['CadastrarAula']);

            var_dump($this->dataForm);
            
            $createAula = new \App\adms\Models\AdmsCadastroAula();
            $createAula->create($this->dataForm);

            if($createAula->getResult()) {
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
     * Método responsável em carregar a VIEW referente ao CONTROLLER.
     * Passa os dados a serem carregados na VIEW. 
     * 
     * @return void 
     */
    private function loadView(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/aulas/cadastroAula", $this->data);
        $loadView->loadView();
    }
}
