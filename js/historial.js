function reportar_enf(historial, opc){

  var enfermedad = document.getElementById('enfermedad'+historial).value;
  var resultado = document.getElementById('resultado');  
  // console.log(enfermedad+'-'+resultado+'-'+opc);

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

      resultado.innerHTML = '';

      resultado.innerHTML = datos_json['respuesta'];
      resultado.style.color = datos_json['color'];
      

    }
  }
       

  ajaxRequest.open('GET', 'php/report_consulta.php?historial='+historial+'&opc='+opc+'&enfermedad='+enfermedad, true);
  ajaxRequest.send();

}
