<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    //var_dump($valueForm);
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<main>
    <div class="texto">
        <h2>DevGate</h2>
        <p>Embarque nesse barco e aprenda a programar</p>
    </div>

    <div class="login-form">
        <form method="POST" action="">

            <!-- Informações na tabela usuario -->
            <div id="usuarioInfo" class="userInfo">
                <?php
                $cpf = "";
                if (isset($valueForm['cpf'])) {
                    $cpf = $valueForm['cpf'];
                }
                ?>
                <input type="text" name="cpf" id="name" placeholder="CPF" maxlength="30" value="<?= $cpf ?>" required="required">

                <?php
                $telefone = "";
                if (isset($valueForm['telefone'])) {
                    $telefone = $valueForm['telefone'];
                }
                ?>
                <input type="telefone" name="telefone" id="telefone" placeholder="Telefone" value="<?= $telefone ?>" maxlength="30" required="required">

                <button id="continuar" class="btn"> continuar </button>
            </div>


            <!-- Informações na tabela endereco -->
            <div id="enderecoInfo" style="display: none;">
                <?php
                $nomeLogradouro = "";
                if (isset($valueForm['nomeLogradouro'])) {
                    $nomeLogradouro = $valueForm['nomeLogradouro'];
                }
                ?>
                <input type="text" name="nomeLogradouro" placeholder="Logradouro" value="<?php echo $nomeLogradouro ?>" required="required">

                <?php
                $numero = "";
                if (isset($valueForm['numero'])) {
                    $numero = $valueForm['numero'];
                }
                ?>
                <input type="text" name="numero" placeholder="Numero" value="<?php echo $numero ?>" required="required">

                <?php
                $complemento = "";
                if (isset($valueForm['complemento'])) {
                    $complemento = $valueForm['complemento'];
                }
                ?>
                <input type="text" name="complemento" placeholder="Complemento" value=" <?php echo $complemento ?>">

                <?php
                $cep = "";
                if (isset($valueForm['cep'])) {
                    $cep = $valueForm['cep'];
                }
                ?>
                <input type="text" name="cep" id="name" placeholder="CEP" value="<?php echo $cep ?>" required="required">

                <?php
                $bairro = "";
                if (isset($valueForm['bairro'])) {
                    $bairro = $valueForm['bairro'];
                }
                ?>
                <input type="text" name="bairro" id="name" placeholder="Bairro" value="<?php echo $bairro ?>" required="required">

                <?php
                $cidade = "";
                if (isset($valueForm['cidade'])) {
                    $cidade = $valueForm['cidade'];
                }
                ?>
                <input type="text" name="cidade" id="name" placeholder="Cidade" value="<?php echo $cidade ?>" required="required">

                <?php
                $estado = "";
                if (isset($valueForm['estado'])) {
                    $estado = $valueForm['estado'];
                }
                ?>
                <input type="text" name="estado" id="name" placeholder="Estado" value="<?php echo $estado ?>" required="required">

                <?php
                $pais = "";
                if (isset($valueForm['pais'])) {
                    $pais = $valueForm['pais'];
                }
                ?>
                <input type="text" name="pais" id="name" placeholder="País" value="<?php echo $pais ?>" required="required">

                <input class="btn" type="submit" name="UpgradeUser" value="Enviar">
            </div>
        </form>
    </div>
</main>

<script src="<?= URL;?>assets/js/upgradeUser.js"></script>