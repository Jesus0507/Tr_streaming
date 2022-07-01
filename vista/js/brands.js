var modulo=document.getElementById("modulo");

switch(modulo.value){

    //---------------Vista principal de marcas-----------------------//     

	case 'index':
	var addBrandButton=document.getElementById("addBrand");

	addBrandButton.onclick=function(){
	location.href="index.php?c=brands&a=addBrands";
}

    function deleteBrand(brand){
    	swal({
          title:"¿Estás seguro?",
          type:"warning",
          text:"Estás por eliminar la marca "+brand+", ¿deseas continuar?",
          showCancelButton:true,
          cancelButtonText:"No,volver",
          confirmButtonText:"Si,deseo continuar",
    	},function(confirm){
        if(confirm==true){
          location.href="index.php?c=brands&a=delete&id="+brand;
        }
      });
    }

    function updateBrand(id){
    	location.href='index.php?c=brands&a=editBrands&id='+id;
    }

	break;

   //--------------Vista de agregar un nuevo marca----------------//

	case 'addBrands':
   var backToBrands=document.getElementById("backToBrands");
    var nombre=document.getElementById("nombre");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formAddBrands");



   nombre.focus();
  backToBrands.onclick=function(){
  location.href="index.php?c=brands&a=index";
}

  buttonEnviar.onclick=function(){
    if(nombre.value==""){
      nombre.focus();

   swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el nombre de la marca"
       });

    }
    else{
  formulario.submit();
}
}
break;

//-------------Vista de editar un marca----------------------//

  case 'editBrands':
    var backToBrands=document.getElementById("backToBrands");
    var nombre=document.getElementById("updateNombre");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formEditBrands");

   nombre.focus();
  backToBrands.onclick=function(){
  location.href="index.php?c=brands&a=index";
}

  buttonEnviar.onclick=function(){
    if(nombre.value==''){
      nombre.focus();
         swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el nombre de la marca"
       });
    }
    else{
  formulario.submit();
}
}
break;


}



