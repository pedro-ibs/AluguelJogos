$(document).ready(function(){

    var img = [];
    var myDropzone;

    $("#preco").inputmask( 'currency',{"autoUnmask": true,
        radixPoint:",",
        groupSeparator: ".",
        allowMinus: false,
        prefix: 'R$ ',            
        digits: 2,
        digitsOptional: false,
        rightAlign: true,
        unmaskAsNumber: true
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
        url: "/target-url", // Set the url
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

    //Quando for salvar o formulario realizar a montagem dos dados da img que será salva.
    $(".fileinput-button").on("click", function(){
        //myDropzone.files Todos os arquivos que tem para serem salvos
        console.log(myDropzone.files[0]);//Todas as informações do arquivo
    })


});