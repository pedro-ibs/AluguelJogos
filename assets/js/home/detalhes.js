$(document).ready(function(){

    $("#perguntar").on("click", function(e){
        e.preventDefault();

        if(LOGGED == 0)
        {
            Swal.fire({
                title: 'Aviso',
                text: "Para realizar uma pergunta é necessário estar autentificado. Deseja ir para a pagina de Autentificação?",
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
            var pergunta = $("#pergunta").val();
            var id_jogo = $("#id_jogo").val();
            var id_usuario = $("#id_usuario").val();
            var data = {"pergunta": pergunta, "id_jogo": id_jogo, "id_usuario": id_usuario};
            if(pergunta)
            {
                $.ajax({
                    type: "post",
                    url: BASE_URL+"Home/cadastrar_pergunta/",
                    dataType: "json",
                    data:  data,
                    success: function(data)
                    {
                        if(data.rst === true)
                        {
                            Swal.fire({
                                title: 'Sucesso',
                                text: data.msg,
                                icon: 'success',
                                confirmButtonText: `Ok`,
                                }).then((result) => {
                                if (result.isConfirmed)
                                {
                                    var html = '<h6 class="text-justify">'+pergunta+'.</h6>'+
                                    '<ul>'+
                                    '<li><span class="text-muted">Sem resposta ainda!</span</li>'+
                                    '</ul>';
    
                                    $(".mensagem_pergunta").remove();
                                    $(".pergunta").append(html);
                                }
                                    
                            })
                        }
                        else if(data.rst === false)
                        {
                            showNotification("error", "Problema ao realizar a pergunta", data.msg, "toast-top-center");
                        }
                    }
                });
            }
            else
            {
                showNotification("error", "Problema ao realizar a pergunta", "Nenhum pergunta foi digitada", "toast-top-center");
            }
        }
    });

    $("#contratar").on("click", function(e){
        e.preventDefault();
        if(LOGGED == 0)
        {
            Swal.fire({
                title: 'Aviso',
                text: "Para realizar a contratação de um serviço é necessário estar autentificado. Deseja ir para a pagina de Autentificação?",
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
            var id_jogo = $("#id_jogo").val();

            var data = {"id_jogo": id_jogo};

            $.ajax({
                type: "post",
                url: BASE_URL+"Home/compra_jogo/",
                dataType: "json",
                data:  data,
                success: function(data)
                {
                    if(data.rst === true)
                    {
                        Swal.fire({
                            title: 'Sucesso',
                            text: "Jogo "+data.tipo+" com sucesso!",
                            icon: 'success',
                            confirmButtonText: `Ok`,
                            }).then((result) => {
                            if (result.isConfirmed)
                            {
                                showNotification("success", "Sucesso", "Jogo "+data.tipo+" com sucesso", "toast-top-center");
                            }
                                
                        })
                    }
                    else if(data.rst === false)
                    {
                        showNotification("error", "Erro", "Problema ao realizar operação", "toast-top-center");
                    }
                }
            });
        }
    })

});