<?php

echo "<h2> Detalhes do usuário </h2>";

echo "<a href='" . URLADM . "list-users/index'> Listar </a><br>";

if(!empty($this->data['viewUser'])){
    echo "<a href='" . URLADM . "edit-users/index/" . $this->data['viewUser'][0]['idUsuario'] . "'> Editar </a><br><br>";
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

if (!empty($this->data['viewUser'])) {
    extract($this->data['viewUser'][0]);

    echo "ID: $idUsuario <br>";
    echo "Nome usuário: $nomeUsuario <br>";
    echo "Nome completo: $nomeCompleto <br>";
    echo "Email: $email <br>";
    echo "Data de nascimento: $dtNascimento <br>";
    echo "CPF: $cpf <br>";
    echo "Telefone: $telefone <br> <br>";

    if (isset($idEndereco)) {
        echo "<hr>";

        echo "Endereço do usuário <br><br>";
        echo "ID: $idEndereco <br>";
        echo "CEP: $cep <br>";
        echo "País: $pais <br>";
        echo "Estado: $estado <br>";
        echo "Cidade: $cidade <br>";
    }
}
