<?php

namespace Core;

/**
 * Verifica se existe a Classe
 * Carregar a CONTROLLER
 */
class CarregarPgAdm
{
    /** @var string $urlController Recebe da URL o nome da controller */
    private string $urlController;

    /** @var string $urlMetodo Recebe da URL o nome do método */
    private string $urlMetodo;

    /** @var string $urlParameter Recebe da URL o parâmetro */
    private string $urlParameter;

    /** @var string $classLoad Controller que deve ser carregada */
    private string $classLoad;

    private array $listPgPublica;

    private array $listPgPrivate;

    public function loadPage(string|null $urlController, string|null $urlMetodo, string|null $urlParameter): void
    {
        $this->urlController = $urlController;
        $this->urlMetodo = $urlMetodo;
        $this->urlParameter = $urlParameter;

        //unset($_SESSION['user_idUsuario']);

        $this->pgPublic();

        if (class_exists($this->classLoad)) {
            $this->loadMetodo();
        } else {
            //die('Ocorreu um erro ao encontrar a classe! Por gentileza tente novamente. Caso o problema persista, entre em contato com o suporte: ' . EMAILADM);
            $slug = new \App\adms\Models\helper\AdmsSlug();
            $this->urlController = $slug->slugController(CONTROLLER);
            $this->urlMetodo = $slug->slugMetodo(METODO);
            $this->urlParameter = "";

            $this->loadPage($this->urlController, $this->urlMetodo, $this->urlParameter);
        }
    }

    private function loadMetodo(): void
    {
        $classLoad = new $this->classLoad;
        if (method_exists($classLoad, $this->urlMetodo)) {
            $classLoad->{$this->urlMetodo}($this->urlParameter);
        } else {
            die('Ocorreu um erro ao encontrar o método ! Por gentileza tente novamente. Caso o problema persista, entre em contato com o suporte: ' . EMAILADM);
        }
    }

    private function pgPublic(): void
    {
        $this->listPgPublica = ["Login", "Erro", "Logout", "CadastroUser", "CadastroCurso"];

        if (in_array($this->urlController, $this->listPgPublica)) {
            $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;
        } else {
            $this->pgPrivate();
        }
    }

    private function pgPrivate(): void
    {
        $this->listPgPrivate = ["Dashboard", "Users", "UpdateUser", "ViewCurso", "ViewUsers", "ListCursos", "ListUsers", "EditUsers", "EditCursos", "EditCursosImage"];

        if (in_array($this->urlController, $this->listPgPrivate)) {
            $this->verifyLogin();
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Página não encontrada</p>";
            $urlRedirect = URLADM . "login/index";
            header("Location: $urlRedirect");
        }
    }

    private function verifyLogin(): void
    {
        if ((isset($_SESSION['user_idUsuario'])) and (isset($_SESSION['user_nomeCompleto'])) and (isset($_SESSION['user_email']))) {
            $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Para acessar a página, realize o login</p>";
            $urlRedirect = URLADM . "login/index";
            header("Location: $urlRedirect");
        }
    }
}
