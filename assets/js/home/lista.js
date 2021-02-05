$(document).ready(function(){

    $("#cadastra_produto").on("click", function(e){
        e.preventDefault();

        if(LOGGED == 0)
        {
            Swal.fire({
                title: 'Aviso',
                text: "Para realizar o cadastro de um jogo é necessário estar autentificado. Deseja ir para a pagina de Autentificação?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: `Sim`,
                cancelButtonText: `Não`,
                }).then((result) => {
                if (result.isConfirmed)
                {
                    window.location.href = BASE_URL+"Usuario/login";
                }
                    
            })
        }
        else
        {
            window.location.href = BASE_URL+"Produto/jogo";
        }
    });

})