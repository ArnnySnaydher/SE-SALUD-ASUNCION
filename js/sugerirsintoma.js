function sug_sintoma(pais){

  var sintoma = document.getElementById('sintoma').value;
  var respuesta = document.getElementById('respuesta');

  var ajaxRequest;

  // Para navegadores modernos 
  if(window.XMLHttpRequest){
    ajaxRequest = new XMLHttpRequest();
  }
  
  // Para navegadores antiguos
  else{
    ajaxRequest = new ActiveXObject("Micrsoft.XMLHTTP");
  }

  ajaxRequest.onreadystatechange = function(){

    if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){

      var datos_json = JSON.parse(ajaxRequest.responseText);

      respuesta.innerHTML = datos_json['respuesta'];
      respuesta.style.color = datos_json['color'];
      

    }
  }
       

  ajaxRequest.open('GET', 'php/sug_sintoma.php?sintoma='+sintoma, true);
  ajaxRequest.send();

}