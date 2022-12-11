<?php

namespace App\adms\Controllers;

/**
 * Controller da página de listagem de atividades.
 */
class ListAtividades
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(string|int|null $id): void
    {
        $listAtividades = new \App\adms\Models\AdmsList();
        $listAtividades->list($id, 'aula', 'atividade');

        if ($listAtividades->getResult()) {
            $this->data['listAtividades'] = $listAtividades->getResultBd();
        } else {
            $this->data['listAtividades'] = [];
        }

        $loadView = new \Core\ConfigView("adms/Views/atividades/listAtividades", $this->data);
        $loadView->loadView();
    }
}
