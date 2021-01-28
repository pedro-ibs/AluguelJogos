$(document).ready(function(){

    var img = [];
    var myDropzone;

    $("#preco").inputmask('decimal', {
        'alias': 'numeric',
        'groupSeparator': ',',
        'autoGroup': true,
        'digits': 2,
        'radixPoint': ".",
        'digitsOptional': false,
        'allowMinus': false,
        'prefix': 'R$ ',
    });

    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false;

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: BASE_URL+"Produto/set_files", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    });

    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true);
    };
    // DropzoneJS Demo Code End

    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    $("#submit").submit(function(e){
        e.preventDefault();
        var data = $(this).serialize();
        files = myDropzone.files;
        var erro = "";

        for(i=0;i<files.length;i++)
        {
            tipo = files[i].name.split(".").pop().toLowerCase();
            if(jQuery.inArray(tipo, ['gif','png','jpg','jpeg']) == -1)
            {
                if(erro != "")
                    erro += ", ";
                
                erro += files[i].name + "";
            }
        }

        if(erro)
        {
            showNotification("error", "Erro nas imagens cadastradas", "Tipo do arquivo não permitido. Por favor troque os seguintes arquivos: "+ erro, "toast-top-center", "15000");
        }
        else
        {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
            data = new FormData($("#submit").get(0));
            setTimeout(() => { 

                $.ajax({
                    type: "post",
                    url: BASE_URL+"Produto/cadastra",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    data: data,
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
                                    window.location.href = BASE_URL+"Produto/jogo/"+data.id_jogo;
                            })
                        }
                        else if(data.rst === false)
                        {
                            showNotification("warning", "Erro", data.msg, "toast-top-center", "15000");
                        }
                    }
                });

            }, 2000);
        }
    });

    $(".principal").on("click", function(){
        var checked = this.checked == true ? 1 : 0;
        var id = this.dataset.id;
        $.ajax({
            type: "post",
            url: BASE_URL+"Produto/definir_principal/"+checked+"/"+id,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data)
            {
                if(data == true)
                {
                    $(".principal").attr("checked", false);
                    $("#principal"+id).attr("checked", true);
                    showNotification("success", "Sucesso", "Configuração da imagem atualizada", "toast-top-center", "10000");
                }
                else
                {
                    showNotification("error", "Erro", "Problema ao atualizar os dados de configuração da imagem.", "toast-top-center", "10000");
                }
            }
        });        
    });

    $(".excluir").on("click", function(e){
        e.preventDefault();
        var id = this.dataset.id;
        $.ajax({
            type: "post",
            url: BASE_URL+"Produto/excluir/"+id,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data)
            {
                if(data.rst == true)
                {
                    Swal.fire({
                        title: 'Sucesso',
                        text: "Imagem Excluida com sucesso",
                        icon: 'success',
                        confirmButtonText: `Ok`,
                        }).then((result) => {
                        if (result.isConfirmed)
                            window.location.href = BASE_URL+"Produto/jogo/"+data.id;
                    })
                }
                else
                {
                    showNotification("error", "Erro", "Não foi possivel realizar a exclusão da imagem, tente novamente mais tarde.", "toast-top-center", "10000");
                }
            }
        }); 
    })
});