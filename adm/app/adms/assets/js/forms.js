let tipoAtiv = document.getElementById('tipoAtividade');
let url = document.getElementById('url');

// Verifica se ouve alteração no tipo de atividade que o ususário deseja inserir.
// Caso haja, ele observa o tipo de atividade escolhido e altera o tipo do input.
tipoAtiv.addEventListener('change', function(e){

    if(tipoAtiv.value == 'videoAula'){
        url.setAttribute('type', 'text');
    } else if(tipoAtiv.value == 'materialApoio'){
        url.setAttribute('type', 'file');
    } else if(tipoAtiv.value == ''){
        url.setAttribute('type', 'hidden');
        url.value = '';
    }
});

