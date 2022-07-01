var modulo=document.getElementById("modulo");

switch(modulo.value){

    //---------------Vista principal de clientes-----------------------//     

	case 'index':
	var addClientButton=document.getElementById("addClient");

	addClientButton.onclick=function(){
	location.href="index.php?c=clients&a=addClients";
}

    function deleteClient(cedula){
    	swal({
          title:"¿Estás seguro?",
          type:"warning",
          text:"Estás por eliminar el cliente con cédula "+cedula+", ¿deseas continuar?",
          showCancelButton:true,
          cancelButtonText:"No,volver",
          confirmButtonText:"Si,deseo continuar",
    	},function(confirm){
        if(confirm==true){
          location.href="index.php?c=clients&a=delete&id="+cedula;
        }
      });
    }

     function seeClient(cedula,nombre,apellido,telefono,juridico){
       var icon="";
     	var texto="<center><em class='fa fa-user-tie' style='font-size:120px'></em></center><br>";
     	texto+="<table style='width:100%;text-align:center' class='table table-bordered'>";
     	texto+="<tr><td>Cédula</td><td>Teléfono</td><td>Correo</td><td>Jurídico</td><td>Dirección</td></tr>";
       juridico==1?icon='fa fa-check':icon='fa fa-times';
     	texto+="<tr><td>"+cedula+"</td><td>"+telefono+"</td><td>ejemplo@gmail.com</td><td><em class='"+icon+"'></em></td>";
     	texto+="<td>ejemplo dirección</td></tr></table>";
    	swal({
          title:nombre+" "+apellido,
          html:true,
          text:texto,
          customClass:'bigSwal',
    	});
    }
    
    function updateClient(cedula){
    	location.href='index.php?c=clients&a=editClients&id='+cedula;
    }

	break;

   //--------------Vista de agregar un nuevo cliente----------------//

	case 'addClients':
    var backToUsers=document.getElementById("backToClients");
    var cedula=document.getElementById("cedula");
    var nombre=document.getElementById("nombre");
    var apellido=document.getElementById("apellido");
    var telefono=document.getElementById("telefono");
    var correo=document.getElementById("correo");
    var direccion=document.getElementById("adress");
    var formulario=document.getElementById("formularioClients");
    var boton=document.getElementById("boton");

    cedula.focus();
	backToUsers.onclick=function(){
	location.href="index.php?c=clients&a=index";
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
         title:"Debe ingresar el apellido"
       });
}
else{
  if(telefono.value==null || telefono.value==""){
  telefono.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el teléfono"
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
  if(direccion.value==null || direccion.value==""){
  direccion.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar la dirección"
       });
}
else{
  formulario.submit();
 } } } } } } }
break;

//-------------Vista de editar un cliente----------------------//

  case 'editClients':
    var backToUsers=document.getElementById("backToClients");
    var cedula=document.getElementById("updateCedula");
    var nombre=document.getElementById("updateNombre");
    var apellido=document.getElementById("updateApellido");
    var telefono=document.getElementById("updateTlf");
    var correo=document.getElementById("updateEmail");
    var direccion=document.getElementById("updateAdress");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formEditClient");

    cedula.focus();
  backToUsers.onclick=function(){
  location.href="index.php?c=clients&a=index";
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
         title:"Debe ingresar el apellido"
       });
}
else{
  if(telefono.value==null || telefono.value==""){
  telefono.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el teléfono"
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
  if(direccion.value==null || direccion.value==""){
  direccion.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar la dirección"
       });
}
else{
  formulario.submit();
 } } } } } } }
break;


}



