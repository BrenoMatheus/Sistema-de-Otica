
 var filtro = $('#filtro').val();
 var url = $(location).attr('href')+"pesquisar-"+filtro;

 $('#pesquisar').keyup(function(){
    if($('#pesquisar').val().length >= 3){
      $('#qtde').html("Pesquisando...");
      $.get(url, {pesquisar:$('#pesquisar').val()},function(data){
        $('#qtde').html(data.posts.length.toString()+" Resultados");
        var html = "";
        for (var i = 0; i < data.posts.length; i++) {
          html += "<div class='panel panel-default'>";
          html += "<div class='panel-heading'>";
          html += "<h3 class='panel-title'> "+data.posts[i].titulo+" </h3>";
          html += "</div>";
          html += "<div class='panel-body' style='padding:0px;' align='center'>";
          html += "<img src=' "+data.posts[i].imagem+" ' class='img-responsive'>";
          html += "</div>";
          html += "<div class='panel-footer'>";
          html += "<a href=' "+data.url+"/post/"+data.posts[i].categoria+"/"+data.posts[i].slug+" ' class='btn btn-success' role='button'>Visualizar</a>";
          html += "</div>";
          html += "</div>";
        }
        if(data.posts.length!=0){
          $("#textos").html(html);
        }else{
          $('#qtde').html("Nenhum Texto Foi Encontrado!!!");
          $("#textos").html("");
        }
      });
    }
  });
