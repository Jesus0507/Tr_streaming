var modulo=document.getElementById("modulo");

switch(modulo.value){

    //---------------Vista principal de usuarios-----------------------//     

	case 'index':
	var addUserButton=document.getElementById("addUser");

	addUserButton.onclick=function(){
	location.href="index.php?c=users&a=addUsers";
}

    function deleteUser(cedula){
    	swal({
          title:"¿Estás seguro?",
          type:"warning",
          text:"Estás por eliminar el usuario con cédula "+cedula+", ¿deseas continuar?",
          showCancelButton:true,
          cancelButtonText:"No,volver",
          confirmButtonText:"Si,deseo continuar",
    	},function(confirmacion){
         if(confirmacion==true){
           location.href="index.php?c=users&a=delete&id="+cedula;
         }
      });
    }

     function seeUser(cedula,nombre,apellido,cargo,telefono,correo,nombre_usuario,tipo_usuario){

     	var texto="<center><em class='fa fa-user' style='font-size:120px'></em></center><br>";
     	texto+="<table style='width:100%;text-align:center' class='table table-bordered'>";
     	texto+="<tr style='background:#786A67;color:white'><td>Cédula</td><td>Teléfono</td><td>Cargo</td></tr>";
       texto+="<tr><td>"+cedula+"</td><td>"+telefono+"</td><td>"+cargo+"</td></tr></table>";
      texto+="<table style='width:100%;text-align:center' class='table table-bordered'><tr style='background:#786A67;color:white'><td>Tipo de usuario</td><td>Correo</td><td>Nombre de usuario</td></tr>";
     
      switch(parseInt(tipo_usuario)){
         case 1:
           tipo_usuario="Super Usuario";
           break;
         case 2:
           tipo_usuario="Administrador";
           break;
        default:
          tipo_usuario="Usuario";
          break;

       }

      texto+="<td>"+tipo_usuario+"</td><td>"+correo+"</td><td>"+nombre_usuario+"</td></tr></table>";
    	swal({
          title:nombre+" "+apellido,
          html:true,
          text:texto,
          customClass:'bigSwal',
    	});
    }
    
    function updateUser(cedula){
    	location.href='index.php?c=users&a=editUsers&id='+cedula;
    }

	break;

   //--------------Vista de agregar un nuevo usuario----------------//

	case 'addUsers':
    var backToUsers=document.getElementById("backToUsers");
    var cedula=document.getElementById("cedula");
    var nombre=document.getElementById("nombre");
    var apellido=document.getElementById("apellido");
    var telefono=document.getElementById("telefono");
    var correo=document.getElementById("correo");
    var clave=document.getElementById("clave");
    var confirmacion=document.getElementById("claveConfirm");
    var cargo=document.getElementById("cargo");
    var tipo=document.getElementById("tipoUsuario");
    var nombreUsuario=document.getElementById("userName");
    var boton=document.getElementById("boton");
    var formulario = document.getElementById("formularioUsuario");

    cedula.focus();
	backToUsers.onclick=function(){
	location.href="index.php?c=users&a=index";
}


  boton.onclick=function(){
    if(cedula.value==null || cedula.value==""){
  cedula.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar la cédula"
       });
}
else{
  if(nombre.value==null || nombre.value==""){
  nombre.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el nombre"
       });
}
else{
  if(apellido.value==null || apellido.value==""){
  apellido.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar la apellido"
       });
}
else{
  if(telefono.value==null || telefono.value==""){
  telefono.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el telefono"
       });
}
else{
  if(correo.value==null || correo.value==""){
  correo.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el correo"
       });
}
else{
  if(clave.value==null || clave.value==""){
  clave.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar la clave"
       });
}
else{
  if(confirmacion.value==null || confirmacion.value==""){
  confirmacion.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar confirmar la clave"
       });
}
else{
     if(confirmacion.value!=clave.value){
  confirmacion.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"La clave y la confirmación deben ser iguales"
       });
}
else{
  if(cargo.value==null || cargo.value==""){
  cargo.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el cargo"
       });
}
else{
  if(tipo.value=='0'){
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el tipo de usuario"
       });
}
else{
  if(nombreUsuario.value==null || nombreUsuario.value==""){
  nombreUsuario.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el nombre de usuario"
       });
}
else{
  formulario.submit(); 

} } } } } } } } } } } }
break;

//--------------------Vista de editar un usuario------------------//

  case 'editUsers':
    var backToUsers=document.getElementById("backToUsers");
    var cedula=document.getElementById("updateCedula");
    var nombre=document.getElementById("updateNombre");
    var apellido=document.getElementById("updateApellido");
    var telefono=document.getElementById("updateTlf");
    var correo=document.getElementById("updateEmail");
    var clave=document.getElementById("updateClave");
    var cargo=document.getElementById("updateCargo");
    var tipo=document.getElementById("tipoUsuario");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formEditUser");

    cedula.focus();
    
  backToUsers.onclick=function(){
  location.href="index.php?c=users&a=index";
}

  buttonEnviar.onclick=function(){
    if(cedula.value==null || cedula.value==""){
  cedula.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar la cédula"
       });
}
else{
  if(nombre.value==null || nombre.value==""){
  nombre.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el nombre"
       });
}
else{
  if(apellido.value==null || apellido.value==""){
  apellido.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar la apellido"
       });
}
else{
  if(telefono.value==null || telefono.value==""){
  telefono.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el telefono"
       });
}
else{
  if(correo.value==null || correo.value==""){
  correo.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el correo"
       });
}
else{
  if(clave.value==null || clave.value==""){
  clave.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar la clave"
       });
}
else{

  if(cargo.value==null || cargo.value==""){
  cargo.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el cargo"
       });
}
else{
  if(tipo.value=='0'){
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el tipo de usuario"
       });
}
else{

  if(document.getElementById("userName").value=="" || document.getElementById("userName").value==null){
    swal({
      timer:2000,
      showConfirmButton:false,
      type:"error",
      title:"Debe ingresar el nombre de usuario"
    });
  }
  else{

  formulario.submit(); 
  } } } } } } } } } }  
break;


}



