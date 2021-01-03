$(document).ready(function(){

    $("#perguntar").on("click", function(e){
      e.preventDefault();
      var pergunta = $("#pergunta").val();

      $.ajax({
          type: "post",
          url: BASE_URL+"Home/perguntar",
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          data: pergunta,
          success: function(data)
          {
              if(data.logged === true)
              {
                  window.location.href = BASE_URL+data.local;
              }
              else if(data.logged === false)
              {
                  showNotification("error", "Problema ao realizar a autentificação", data.error, "toast-top-center");
              }
          }
      });
    })

});