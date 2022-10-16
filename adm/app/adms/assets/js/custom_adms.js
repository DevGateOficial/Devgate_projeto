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
    })
}


const formLogin = document.getElementById("form-login");

if (formLogin) {
    formLogin.addEventListener("submit", async (e) => {
        e.preventDefault();

        document.getElementById("msg").innerHTML = "<p style='color: green;'> Acessou validar forn login! </p>";
    })
}
