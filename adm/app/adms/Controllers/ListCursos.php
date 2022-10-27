<?php

namespace App\adms\Controllers;

class ListCursos
{
    private array|string|null $data = [];

    public function index(): void
    {   
        $listCursos = new \App\adms\Models\AdmsListCursos();
        $listCursos->viewCursos();

        if($listCursos->getResult()){
            $this->data['listCursos'] = $listCursos->getResultBd();
        }else{
            $this->data['listCursos'] = [];
        }

        $loadView = new \Core\ConfigView("adms/Views/cursos/listCursos", $this->data);
        $loadView->loadView();

    }
}