<?php

namespace Sts\Controllers;

class StsListCursos
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

        echo "CONTROLLER - ListCursos";

        $loadView = new \Core\ConfigView("sts/Views/cursos/listCursos", $this->data);
        $loadView->loadView();
    }
}