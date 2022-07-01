var modulo=document.getElementById("modulo");

switch(modulo.value){

    //---------------Vista principal de proveedores-----------------------//     

	case 'index':
	var addSupplierButton=document.getElementById("addSupplier");

	addSupplierButton.onclick=function(){
	location.href="index.php?c=suppliers&a=addSuppliers";
}

    function deleteSupplier(dni){
    	swal({
          title:"¿Estás seguro?",
          type:"warning",
          text:"Estás por eliminar el proveedor con DNI "+dni+", ¿deseas continuar?",
          showCancelButton:true,
          cancelButtonText:"No,volver",
          confirmButtonText:"Si,deseo continuar",
    	},function(confirm){
        if(confirm==true){
          location.href="index.php?c=suppliers&a=delete&id="+dni;
        }
      });
    }

     function seeSupplier(dni,nombre,telefono,direccion,contacto,correo){
     	var texto="<center><em class='fa fa-truck' style='font-size:120px'></em></center><br>";
     	texto+="<table style='width:100%;text-align:center' class='table table-bordered'>";
     	texto+="<tr><td>DNI</td><td>Teléfono</td><td>Dirección</td><td>Correo</td><td>Contacto</td></tr>";
     	texto+="<tr><td>"+dni+"</td><td>"+telefono+"</td><td>"+direccion+"</td>";
     	texto+="<td>"+correo+"</td><td>"+contacto+"</td></tr></table>";
    	swal({
          title:nombre,
          html:true,
          text:texto,
          customClass:'bigSwal',
    	});
    }
    
    function updateSupplier(dni){
    	location.href='index.php?c=suppliers&a=editSuppliers&id='+dni;
    }

	break;

   //--------------Vista de agregar un nuevo proveedor----------------//

	case 'addSuppliers':
   var backToSuppliers=document.getElementById("backToSuppliers");
   var tipoDocumento=document.getElementById("tipoDocumento");
    var dni=document.getElementById("dni");
    var nombre=document.getElementById("nombre");
    var telefono=document.getElementById("telefono");
    var correo=document.getElementById("email");
    var contacto=document.getElementById("contact");
    var direccion=document.getElementById("adress");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formAddSupplier");



   dni.focus();
  backToSuppliers.onclick=function(){
  location.href="index.php?c=suppliers&a=index";
}

  buttonEnviar.onclick=function(){
   if(tipoDocumento.value=="0"){
  tipoDocumento.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el tipo de documento"
       });
}
else{
   if(dni.value==null || dni.value==""){
  dni.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el documento de identificación"
       });
}
else{
   if(nombre.value==null || nombre.value==""){
  nombre.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el nombre del proveedor"
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
   if(contacto.value==null || contacto.value==""){
  contacto.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el contacto"
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
 } } } } } } } }
break;

//-------------Vista de editar un proveedor----------------------//

  case 'editSuppliers':
    var backToSuppliers=document.getElementById("backToSuppliers");
    var dni=document.getElementById("updateDni");
    var tipoDocumento=document.getElementById("updateTipoDocumento");
    var nombre=document.getElementById("updateNombre");
    var telefono=document.getElementById("updateTlf");
    var correo=document.getElementById("updateEmail");
    var contacto=document.getElementById("updateContact");
    var direccion=document.getElementById("updateAdress");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formEditSupplier");

   dni.focus();
  backToSuppliers.onclick=function(){
  location.href="index.php?c=suppliers&a=index";
}

  buttonEnviar.onclick=function(){
   if(tipoDocumento.value=="0"){
  tipoDocumento.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el tipo de documento"
       });
}
else{
   if(dni.value==null || dni.value==""){
  dni.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el documento de identificación"
       });
}
else{
   if(nombre.value==null || nombre.value==""){
  nombre.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el nombre del proveedor"
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
   if(contacto.value==null || contacto.value==""){
  contacto.focus();
       swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el contacto"
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
 } } } } } } } }
break;


}



