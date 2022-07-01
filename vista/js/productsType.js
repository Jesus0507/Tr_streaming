var modulo=document.getElementById("modulo");

switch(modulo.value){

    //---------------Vista principal de marcas-----------------------//     

	case 'index':
	var addProductsTypeButton=document.getElementById("addProductType");

	addProductsTypeButton.onclick=function(){
	location.href="index.php?c=productsType&a=addProductsType";
}

    function deleteProductType(productType){
    	swal({
          title:"¿Estás seguro?",
          type:"warning",
          text:"Estás por eliminar el tipo de producto "+productType+", ¿deseas continuar?",
          showCancelButton:true,
          cancelButtonText:"No,volver",
          confirmButtonText:"Si,deseo continuar",
    	},function(confirm){
        if(confirm==true){
          location.href="index.php?c=productsType&a=delete&id="+productType;
        }
      });
    }

    function updateProductType(id){
    	location.href='index.php?c=productsType&a=editProductsType&id='+id;
    }

	break;

   //--------------Vista de agregar un nuevo marca----------------//

	case 'addProductsType':
   var backToProductsType=document.getElementById("backToProductsType");
    var nombre=document.getElementById("nombre");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formAddProductsType");



   nombre.focus();
  backToProductsType.onclick=function(){
  location.href="index.php?c=productsType&a=index";
}

  buttonEnviar.onclick=function(){
    if(nombre.value==""){
      nombre.focus();
         swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el nombre del tipo de producto"
       });
    }
    else{
  formulario.submit();
}
}
break;

//-------------Vista de editar un marca----------------------//

  case 'editProductsType':
    var backToProductsType=document.getElementById("backToProductsType");
    var nombre=document.getElementById("updateNombre");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formEditProductsType");

   nombre.focus();
  backToProductsType.onclick=function(){
  location.href="index.php?c=brands&a=index";
}

  buttonEnviar.onclick=function(){
  if(nombre.value==""){
      nombre.focus();
         swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el nombre del tipo de producto"
       });
    }
    else{
  formulario.submit();
}
}
break;


}



