<?php

namespace Sts\Controllers;

class ListCursos
{
    private array|string|null $data = [];

    public function index(): void
    {   
        $listCursos = new \Sts\Models\StsListCursos();
        $listCursos->viewCursos();

        if($listCursos->getResult()){
            $this->data['listCursos'] = $listCursos->getResultBd();
        }else{
            $this->data['listCursos'] = [];
        }

        $loadView = new \Core\ConfigView("sts/Views/cursos/listCursos", $this->data);
        $loadView->loadView();
    }
}