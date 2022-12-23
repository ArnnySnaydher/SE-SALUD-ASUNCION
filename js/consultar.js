window.onscroll = function(){

  var scrollup = document.getElementById('scrollUp');
  
  if(window.scrollY >= 150){
    scrollup.classList.add('VerscrollUp');
  }

  if(window.scrollY <= 149){
    scrollup.classList.remove('VerscrollUp');
  }
  
};


function scrollup(){
  window.scrollTo(0, 0);
}


function mostrar(){
  var containNuevoSintoma =   document.getElementById('containNuevoSintoma');
  var htmll = document.getElementById('html');

  containNuevoSintoma.classList.add('mostrar');
  containNuevoSintoma.classList.remove('ocultar');
  htmll.classList.add('overflowhidden');
}



function ocultar(){
  var containNuevoSintoma = document.getElementById('containNuevoSintoma');
  var htmll = document.getElementById('html');

  containNuevoSintoma.classList.add('ocultar');
  containNuevoSintoma.classList.remove('mostrar');
  htmll.classList.remove('overflowhidden');
}
