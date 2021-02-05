$(document).ready(function(){

    const regex = /[0-9]/

    $("#submit").submit(function(e){
        e.preventDefault();
        var data = $(this).serialize();
        data = new FormData($("#submit").get(0));
        var email = $("#email").val();
        var senha = $("#senha").val();

        
        if(email.search("@") > 0)
        {
            if(senha.length >= 8 && regex.test(senha))
            {
                $.ajax({
                    type: "post",
                    url: BASE_URL+"Usuario/cadastra",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    data: data,
                    success: function(data)
                    {
                        if(data.rst === 1)
                        {
                            window.location.href = BASE_URL+"Home";
                        }
                        else if(data.rst === 2)
                        {
                            Swal.fire({
                                title: 'Erro',
                                text: data.msg,
                                icon: 'info',
                                confirmButtonText: `Ok`,
                                }).then((result) => {
                                if (result.isConfirmed)
                                    window.location.href = BASE_URL+"Usuario/login";
                            })
                        }
                        else if(data.rst === 0)
                        {
                            showNotification("warning", "Erro ao cadastrar", data.msg, "toast-top-center");
                        }
                    }
                });
            }
            else
            {
                showNotification("error", "Problema ao realizar a autentificação", "A senha digitada não é uma senha valida", "toast-top-center");
            }
        }
        else
        {
            showNotification("error", "Problema ao realizar a autentificação", "Email digitado não é um email valido", "toast-top-center");
        }
        
    });

});