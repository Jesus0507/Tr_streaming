var modulo=document.getElementById("modulo");

switch(modulo.value){

    //---------------Vista principal de productos-----------------------//     

	case 'index':
	var addProductsButton=document.getElementById("addProducts");

	addProductsButton.onclick=function(){
	location.href="index.php?c=products&a=addProducts";
}

    function deleteProduct(idProduct){
    	swal({
          title:"¿Estás seguro?",
          type:"warning",
          text:"Estás por eliminar el producto con código "+idProduct+", ¿deseas continuar?",
          showCancelButton:true,
          cancelButtonText:"No,volver",
          confirmButtonText:"Si,deseo continuar",
    	});
    }

    
    function updateProduct(idProduct){
    	location.href='index.php?c=products&a=editProducts&id='+idProduct;
    }

	break;

   //--------------Vista de agregar un nuevo producto----------------//

	case 'addProducts':
    var backToProducts=document.getElementById("backToProducts");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formAddProducts");
    var botonTipoProducto=document.getElementById("btnNewProductType");
    var inputTipoProducto=document.getElementById("tipoProductoInput");
    var selectTipoProducto=document.getElementById("tipoProductoSelect");
    var botonMarcaProducto=document.getElementById("btnNewProductBrand");
    var inputMarcaProducto=document.getElementById("marcaProductoInput");
    var selectMarcaProducto=document.getElementById("marcaProductoSelect");
    var botonAlmacenProducto=document.getElementById("btnNewProductWarehouse");
    var inputAlmacenProducto=document.getElementById("almacenProductoInput");
    var selectAlmacenProducto=document.getElementById("almacenProductoSelect");
    var codigo=document.getElementById("codigo_barra");
    var excento=document.getElementById("excento");
    var ubicacion=document.getElementById("ubicacionProducto");
    var minimo=document.getElementById("stock_minimo");
    var maximo=document.getElementById("stock_maximo");

    botonTipoProducto.onclick=function(){
      if(inputTipoProducto.style.display=="none"){
        selectTipoProducto.style.display="none";
        inputTipoProducto.style.display="";
        inputTipoProducto.focus();
        botonTipoProducto.className="fa fa-list iconEdit"
      }
      else{
        selectTipoProducto.style.display="";
        inputTipoProducto.style.display="none";
        inputTipoProducto.value="";
        botonTipoProducto.className="fa fa-plus-circle iconEye";
        selectTipoProducto.value='0';
      }
    }

    botonMarcaProducto.onclick=function(){
      if(inputMarcaProducto.style.display=="none"){
        selectMarcaProducto.style.display="none";
        inputMarcaProducto.style.display="";
        inputMarcaProducto.focus();
        botonMarcaProducto.className="fa fa-list iconEdit"
      }
      else{
        selectMarcaProducto.style.display="";
        inputMarcaProducto.style.display="none";
        inputMarcaProducto.value="";
        botonMarcaProducto.className="fa fa-plus-circle iconEye"
      }
    }


    botonAlmacenProducto.onclick=function(){
      if(inputAlmacenProducto.style.display=="none"){
        selectAlmacenProducto.style.display="none";
        inputAlmacenProducto.style.display="";
        inputAlmacenProducto.focus();
        botonAlmacenProducto.className="fa fa-list iconEdit"
      }
      else{
        selectAlmacenProducto.style.display="";
        inputAlmacenProducto.style.display="none";
        inputAlmacenProducto.value="";
        botonAlmacenProducto.className="fa fa-plus-circle iconEye"
      }
    }

  backToProducts.onclick=function(){
  location.href="index.php?c=products&a=index";
}

  buttonEnviar.onclick=function(){
  if(codigo.value=='' || codigo.value==null){
    codigo.focus();
      swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el código de barra"
       });
  }
  else{
     if(excento.value=='0'){
    excento.focus();
      swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe indicar si el producto es excento de IVA"
       });
  }
  else{
     if((selectTipoProducto.style.display!='none' && selectTipoProducto.value=='0') || (inputTipoProducto.style.display!='none' && inputTipoProducto.value=='')){

      swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe indicar el tipo de producto"
       });
  }
  else{
    if((selectMarcaProducto.style.display!='none' && selectMarcaProducto.value=='0') || (inputMarcaProducto.style.display!='none' && inputMarcaProducto.value=='')){

      swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe indicar la marca del producto"
       });
  }
  else{
      if(inputAlmacenProducto.value=='' || inputAlmacenProducto.value==null){
    inputAlmacenProducto.focus();
      swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el almacén del producto"
       });
  }
  else{
      if(ubicacion.value=='' || ubicacion.value==null){
    ubicacion.focus();
      swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar la ubicación del producto"
       });
  }
  else{
      if(minimo.value=='' || minimo.value==null){
    minimo.focus();
      swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el stock mínimo del producto"
       });
  }
  else{
      if(maximo.value=='' || maximo.value==null){
    maximo.focus();
      swal({
         timer:2000,
         showConfirmButton:false,
         type:"error",
         title:"Debe ingresar el stock máximo del producto"
       });
  }
  else{
    formulario.submit(); 
  } } } } } } } } }
break;


//-------------Vista de editar un producto----------------------//

  case 'editProducts':
    var backToProducts=document.getElementById("backToProducts");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formEditProducts");
    var botonTipoProducto=document.getElementById("btnNewProductType");
    var inputTipoProducto=document.getElementById("tipoProductoInput");
    var selectTipoProducto=document.getElementById("tipoProductoSelect");
    var botonMarcaProducto=document.getElementById("btnNewProductBrand");
    var inputMarcaProducto=document.getElementById("marcaProductoInput");
    var selectMarcaProducto=document.getElementById("marcaProductoSelect");
    var botonAlmacenProducto=document.getElementById("btnNewProductWarehouse");
    var inputAlmacenProducto=document.getElementById("almacenProductoInput");
    var selectAlmacenProducto=document.getElementById("almacenProductoSelect");

    botonTipoProducto.onclick=function(){
      if(inputTipoProducto.style.display=="none"){
        selectTipoProducto.style.display="none";
        inputTipoProducto.style.display="";
        inputTipoProducto.focus();
        botonTipoProducto.className="fa fa-list iconEdit"
      }
      else{
        selectTipoProducto.style.display="";
        inputTipoProducto.style.display="none";
        inputTipoProducto.value="";
        botonTipoProducto.className="fa fa-plus-circle iconEye"
      }
    }

    botonMarcaProducto.onclick=function(){
      if(inputMarcaProducto.style.display=="none"){
        selectMarcaProducto.style.display="none";
        inputMarcaProducto.style.display="";
        inputMarcaProducto.focus();
        botonMarcaProducto.className="fa fa-list iconEdit"
      }
      else{
        selectMarcaProducto.style.display="";
        inputMarcaProducto.style.display="none";
        inputMarcaProducto.value="";
        botonMarcaProducto.className="fa fa-plus-circle iconEye"
      }
    }


    botonAlmacenProducto.onclick=function(){
      if(inputAlmacenProducto.style.display=="none"){
        selectAlmacenProducto.style.display="none";
        inputAlmacenProducto.style.display="";
        inputAlmacenProducto.focus();
        botonAlmacenProducto.className="fa fa-list iconEdit"
      }
      else{
        selectAlmacenProducto.style.display="";
        inputAlmacenProducto.style.display="none";
        inputAlmacenProducto.value="";
        botonAlmacenProducto.className="fa fa-plus-circle iconEye"
      }
    }

  backToProducts.onclick=function(){
  location.href="index.php?c=products&a=index";
}

  buttonEnviar.onclick=function(){
  formulario.submit();
}
break;


}



