<?php

namespace App\adms\Controllers;

class ListUsers
{
    private array|string|null $data = [];

    public function index(): void
    {   
        $listUsers = new \App\adms\Models\AdmsListUsers();
        $listUsers->listUsers();

        if($listUsers->getResult()){
            $this->data['listUsers'] = $listUsers->getResultBd();
        }else{
            $this->data['listUsers'] = [];
        }

        $loadView = new \Core\ConfigView("adms/Views/users/listUsers", $this->data);
        $loadView->loadView();
    }
}