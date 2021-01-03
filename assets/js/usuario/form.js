$(document).ready(function(){

    $('.select2').select2()

    $('#cpf').inputmask({
        mask: ['999.999.999-99'],
        keepStatic: true
    });
    $('#telefone').inputmask({
        mask: ['(99) 9999-9999'],
        keepStatic: true
    });
    $('#celular').inputmask({
        mask: ['(99) 99999-9999'],
        keepStatic: true
    });
    $('#numero').inputmask({
        mask: ['[9][9][9]9'],
        keepStatic: true
    });
    $('[data-mask]').inputmask();


    $("#submit").submit(function(e){
        e.preventDefault();
        var data = $(this).serialize();
        data = new FormData($("#submit").get(0));

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
    });

});