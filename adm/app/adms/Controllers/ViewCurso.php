<?php

namespace App\adms\Controllers;

class ViewCurso
{
    private array|string|null $data = [];

    public function index(): void
    {   
        $listCursos = new \App\adms\Models\AdmsViewCurso();
        $listCursos->viewCursos();

        if($listCursos->getResult()){
            $this->data['viewCursos'] = $listCursos->getResultBd();
        }else{
            $this->data['viewCursos'] = [];
        }

        $loadView = new \Core\ConfigView("adms/Views/cursos/viewCurso", $this->data);
        $loadView->loadView();

    }
}