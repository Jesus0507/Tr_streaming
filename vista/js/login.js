var cedula=document.getElementById('cedulaUsuario');
var clave=document.getElementById("claveUsuario");
var boton=document.getElementById("botonIngresar");
var formulario=document.getElementById("formularioLogin");
var valid_user=document.getElementById("valid_usuario");
var valid_clave=document.getElementById("valid_clave");



boton.onclick=function(){
validar();
}

$(document).keyup(function(event) {
  if (event.which === 13) {
     validar();
  }
});


function validar(){
  if(cedula.value==null || cedula.value==""){
    cedula.focus();
    cedula.style.borderColor="red";
    valid_usuario.style.color="red";
    valid_usuario.innerHTML="*Ingrese su usuario";
  }
  else{
    if(clave.value==null || clave.value==""){
      clave.focus();
    clave.style.borderColor="red";
    valid_clave.style.color="red";
    valid_clave.innerHTML="*Ingrese su contraseña";
    }
    else{
      buscar_usuario();
    }
  }
}

cedula.onkeyup=function(){
  if(cedula.value==null || cedula.value!=""){
    cedula.style.borderColor="";
    valid_usuario.innerHTML="";
  }
}

clave.onkeyup=function(){
  if(clave.value==null || clave.value!=""){
    clave.style.borderColor="";
    valid_clave.innerHTML="";
  }
}

function buscar_usuario(){
  $.ajax({
    type:"POST",
    url:"index.php?c=main&a=index&init=1",
    data:{
      "usuario":cedula.value,
      "clave":clave.value
    }
  }).done(function(result){
    console.log(result);
    if(result==1){
      location.href="index.php?c=main&a=main_view";
    }
  })
}