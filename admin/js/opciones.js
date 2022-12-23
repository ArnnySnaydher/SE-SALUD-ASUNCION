function e_agg(){

  var nombre = document.getElementById('nombreae').value;
  var des = document.getElementById('descripccion').value;
  var cau = document.getElementById('causas').value;
  var rec = document.getElementById('recomendaciones').value;      
  var resp2 = document.getElementById('respae');

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

      resp2.innerHTML = datos_json['respuesta'];
      resp2.style.color = datos_json['color'];
      

    }
  }
       

  ajaxRequest.open('GET', 'php/e_agregar.php?nombre='+nombre+'&des='+des+'&cau='+cau+'&rec='+rec, true);
  ajaxRequest.send();

}



// ----------


function s_agg(){

  var nombre = document.getElementById('nombreas').value;
  var resp2 = document.getElementById('respas');

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

      resp2.innerHTML = datos_json['respuesta'];
      resp2.style.color = datos_json['color'];
      

    }
  }
       

  ajaxRequest.open('GET', 'php/s_agregar.php?nombre='+nombre, true);
  ajaxRequest.send();

}



// ----------



function del_e(){

  var opc = document.getElementById('opcee').value;
  var resp2 = document.getElementById('resp2ee');

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

      resp2.innerHTML = datos_json['respuesta'];
      resp2.style.color = datos_json['color'];
      

    }
  }
       

  ajaxRequest.open('GET', 'php/e_eliminar.php?opc='+opc, true);
  ajaxRequest.send();

}



// ----------



function del_s(){

  var opc = document.getElementById('opces').value;
  var resp2 = document.getElementById('resp2es');

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

      resp2.innerHTML = datos_json['respuesta'];
      resp2.style.color = datos_json['color'];
      

    }
  }
       

  ajaxRequest.open('GET', 'php/s_eliminar.php?opc='+opc, true);
  ajaxRequest.send();

}



// ----------



function mod_e(){

  var opc = document.getElementById('opcme').value;
  var resp2 = document.getElementById('resp2me');
  var nombre = document.getElementById('nombreme').value;

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

      resp2.innerHTML = datos_json['respuesta'];
      resp2.style.color = datos_json['color'];
      

    }
  }
       

  ajaxRequest.open('GET', 'php/e_modificar.php?nombre='+nombre+'&opc='+opc, true);
  ajaxRequest.send();

}



// ----------



function mod_s(){

  var opc = document.getElementById('opcms').value;
  var resp2 = document.getElementById('resp2ms');
  var nombre = document.getElementById('nombrems').value;

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

      resp2.innerHTML = datos_json['respuesta'];
      resp2.style.color = datos_json['color'];
      

    }
  }
       

  ajaxRequest.open('GET', 'php/s_modificar.php?nombre='+nombre+'&opc='+opc, true);
  ajaxRequest.send();

}



// ----------



function del_r(){

  var opcs = document.getElementById('opcers').value;
  var opce = document.getElementById('opcere').value;  
  var resp2 = document.getElementById('resp2er');

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

      resp2.innerHTML = datos_json['respuesta'];
      resp2.style.color = datos_json['color'];
      

    }
  }
       

  ajaxRequest.open('GET', 'php/r_eliminar.php?opcs='+opcs+'&opce='+opce, true);
  ajaxRequest.send();

}