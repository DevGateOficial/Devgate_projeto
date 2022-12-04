// Arquivo js responsável em alterações no formulario de cadastro de atividades

// recebe o elemento tipoAtividade do formulario cadastro de atividades
let tipoAtiv = document.getElementById('tipoAtividade');

// recebe o elemento url do formulario cadastro de atividades
let url = document.getElementById('url');

// Verifica se ouve alteração no tipo de atividade que o ususário deseja inserir.
// Caso haja, ele observa o tipo de atividade escolhido e altera o tipo do input.
tipoAtiv.addEventListener('change', function (e) {

    if (tipoAtiv.value == 'videoAula') {
        url.setAttribute('type', 'text');
    } else {
        url.setAttribute('type', 'file');
    }
});

