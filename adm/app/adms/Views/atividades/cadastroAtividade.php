<?php
if (isset($this->data['form'][0])) {
    $valueForm = $this->data['form'][0];
    //var_dump($valueForm);
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<main>
    <div class="page-text">
        <h2>DevGate</h2>
        <p>Criar noma atividade na plataforma</p>
    </div>
    <div class="gn-form">
        <form action="" method="POST" enctype="multipart/form-data">
            <?php
            $nomeAtividade = "";
            if (isset($valueForm['nomeAtividade'])) {
                $nomeAtividade = $valueForm['nomeAtividade'];
            }
            ?>
            <input type="text" placeholder="Nome da atividade" name="nomeAtividade" id="name" value="<?php echo $nomeAtividade ?>" required="required">

            <?php
            $descricao = "";
            if (isset($valueForm['descricao'])) {
                $descricao = $valueForm['descricao'];
            }
            ?>
            <input type="descricao" placeholder="Descrição" name="descricao" id="descricao" value="<?php echo $descricao ?>" required="required">

            <?php
            $tipoAtividade = "";
            if (isset($valueForm['tipoAtividade'])) {
                $tipoAtividade = $valueForm['tipoAtividade'];
            }
            ?>
            <select name="tipoAtividade" id="tipoAtividade">
                <option disabled selected value> Selecione o tipo da atividade:</option>
                <option value="videoAula"> Vídeo </option>
                <option value="materialApoio"> Material de apoio / texto </option>
                <option value="projeto"> Proposta de projeto</option>
            </select>

            <?php
            $url = "";
            if (isset($valueForm['url'])) {
                $url = $valueForm['url'];
            }
            ?>
            <input type="hidden" id="url" placeholder="url" name="url" value="<?php echo $url ?>" required="required">
            
            <?php
            $idAula = "";
            if (isset($valueForm['idAula'])) {
                $idAula = $valueForm['idAula'];
            }
            ?>
            <input type="hidden" name="idAula" value="<?php echo $idAula ?>">

            <input class="submit-btn" type="submit" name="CadastrarAtividade" value="Cadastro Atividade"/>
        </form>
    </div>

</main>
    <script src="http://localhost/Devgate_projeto/adm/app/adms/assets/js/forms.js"></script>