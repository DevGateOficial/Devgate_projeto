<?php

namespace Sts\Models\helper;

// Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
if(!defined('D3V3G4T3')){
    //header("Location: /");
    die("Erro: Página não encontrada!");
}

class StsCreate extends StsConn
{
    private string $table;
    private array $data;

    public function executeCreate(string $table, array $data): void
    {
        $this->table = $table;
        var_dump($this->table);

        $this->data = $data;
        var_dump($this->data);
    }

    private function exeReplaceValues(): void
    {
       $columns =  implode(',' , array_keys($this->data));
    }
}