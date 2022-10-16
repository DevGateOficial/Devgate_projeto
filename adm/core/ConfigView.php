<?php

namespace Core;

/**
 * Carregar as páginas da View
 */
class ConfigView
{
    /**
     * Recebe o endereço da VIEW e os dados.
     * @param string $nameView Endereço da VIEW que deve ser carregada
     * @param array|string|null $data Dados que a VIEW deve receber
     */
    public function __construct(private string $nameView, private array|string|null $data)
    {
    }

    /**
     * Carregar a VIEW
     * Verifica se o arquivo existe, se sim o carrega, se não apresenta uma mensagem de erro.
     * @return void
     */
    public function loadView(): void
    {
        if(file_exists('app/' . $this->nameView . '.php')){
            include 'app/adms/Views/include/head.php';
            include 'app/' . $this->nameView . '.php';
            include 'app/adms/Views/include/footer.php';
        }else{
            die("Erro ao carregar a VIEW: Por favor tente novamente. Caso o problema persista, entre em contato com o suporte: " . EMAILADM);
        }
    }
}
