<?php

namespace App\adms\Controllers;

class ViewCurso
{
    private array|string|null $data;

    public function index(): void
    {   
        $listCurso = new \App\adms\Models\AdmsViewCurso();
        $this->data = $listCurso->read();

        $loadView = new \Core\ConfigView("adms/Views/cursos/viewCurso", $this->data);
        $loadView->loadView();
    }
}