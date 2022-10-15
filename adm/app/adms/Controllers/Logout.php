<?php

namespace App\adms\Controllers;

/**
 * Controller da página Logout
 */
class Logout
{
    /**
     * Destruir as sessões do usuário logado
     *
     * @return void
     */
    public function index(): void
    {
        unset($_SESSION['user_idUsuário'], $_SESSION['user_nomeCompleto'], $_SESSION['user_email'], $_SESSION['user_nomeUsuario']);

        $_SESSION['msg'] = "<p style='color: green'>Logout realizado com sucesso!</p>";
        $urlRedirect = URLADM . "login/index";
        header("Location: $urlRedirect");
    }
}