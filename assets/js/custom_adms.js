const formCadastroUser = document.getElementById("form-cadastro-user");

if (formCadastroUser) {
    formCadastroUser.addEventListener("submit", async (e) => {
        //Receber o valor dos campos
        var name = document.querySelector("#name").value;
        //Verifica se o campo está vazio
        if (name === "") {
            e.preventDefault();
            document.getElementById("msg").innerHTML = "<p style='color: red;'> Erro: necessário preencher o campo nome! </p>";
            return;
        }

    // Receber o valor do campo 
    var password = document.querySelector("#password").value;
    
    // Verificar se o campo esta vazio
    if(password === ""){
        e.preventDefault();
        document.getElementById("msg").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo senha!</p>";
        return;
    }
    
    // Verificar se a senha possui 8 caracteres
    if(password.lenght < 6 ){
        e.preventDefault();
        document.getElementById("msg").innerHTML = "<p style='color: #f00;'>Erro: A senha deve ter no mínimo 8 caracteres</p>";
        return;
    }

    // Verificar se a senha possui letras
    if(!password.match(/[A-Za-z]/) ){
        e.preventDefault();
        document.getElementById("msg").innerHTML = "<p style='color: #f00;'>Erro: A senha deve ter no mínimo uma letra!</p>";
        return;
    }

})
}

const formLogin = document.getElementById("form-login");

if (formLogin) {
    formLogin.addEventListener("submit", async (e) => {
        e.preventDefault();

        document.getElementById("msg").innerHTML = "<p style='color: green;'> Acessou validar forn login! </p>";
    })
}
