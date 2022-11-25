<?php

namespace App\Adms\Controllers;

/**
 * Controller da página de cadastro de atividade
 */
class CadastroAtividade
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

        if ( (!empty($id)) and (empty($this->dataForm['CadastrarAtividade'])) ) {
            $this->id = (int) $id;
            $viewAula = new \App\adms\Models\AdmsCadastroAtividade();
            $viewAula->viewAula($this->id);

            if ($viewAula->getResult()) {
                $this->data['form'] = $viewAula->getResultBd();
                $this->loadView();
            } else {
                $urlRedirect = URLADM . "list-aulas/index";
                header("Location: $urlRedirect");
            }
        } else{
            $this->createAtividade();
        }
    }

    /**
     * Recebe os dados da VIEW, através de um formulário.
     * Instancia a MODEL responsável na edição da imagem.
     * @return void
     */
    private function createAtividade(): void
    {
        if (!empty($this->dataForm['CadastrarAtividade'])) {
            unset($this->dataForm['CadastrarAtividade']);

            var_dump($this->dataForm);
            
            $createAtividade = new \App\adms\Models\AdmsCadastroAtividade();
            $createAtividade->create($this->dataForm);

            if($createAtividade->getResult()) {
                $urlRedirect = URLADM . "view-aula/index/" . $this->dataForm['idAula'];
                header("Location: $urlRedirect");
            } else {
                $this->data['form'] = $this->dataForm;
                $this->loadView();
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Aula não encontrado!</p>";
            $urlRedirect = URLADM . "list-aulas/index";
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
        $loadView = new \Core\ConfigView("adms/Views/atividades/cadastroAtividade", $this->data);
        $loadView->loadView();
    }
}