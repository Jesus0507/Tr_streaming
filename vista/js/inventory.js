var modulo=document.getElementById("modulo");

switch(modulo.value){

    //---------------Vista principal de inventarios-----------------------//     

	case 'index':

  var addProductsButton=document.getElementById("addProducts");
    addProductsButton.onclick=function(){
  location.href="index.php?c=inventory&a=addProducts";
}

     function seeProduct(producto,ubicacion,codigo,fecha){
          
      var funcion="window.open(`index.php?c=inventory&a=printInventory1&id="+codigo+"`)";
      var funcion2="window.open(`index.php?c=inventory&a=printInventory2&id="+codigo+"`)";
      
     	var texto="<center><em class='fa fa-boxes' style='font-size:120px'></em></center><br>";
     	texto+="<table style='width:100%;text-align:center' class='table table-bordered'>";
     	texto+="<tr><td>Ubicación</td><td>Fecha de vencimiento más próxima</td><td>Ver ingresos</td><td>Ver salidas</td></tr>";
     	texto+="<tr><td>"+ubicacion+"</td>";
     	texto+="<td>"+fecha+"</td><td><em class='fa fa-print iconEdit' style='font-size:30px;' onclick='"+funcion+"'></em></td>";
      texto+="<td><em class='fa fa-print iconTrash' style='font-size:30px;' onclick='"+funcion2+"'></em></td></tr>";
      texto+="</table>";

    	swal({
          title:producto,
          html:true,
          text:texto,
          customClass:'bigSwal',
    	});
    }
    
    function updateProduct(id){
    	location.href='index.php?c=inventory&a=editProducts&id='+id;
    }

	break;

 

//-------------Vista de editar un proveedor----------------------//

  case 'editInventory':
    var backToInventory=document.getElementById("backToInventory");
    var stockMinimo=document.getElementById("updateSminimo");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formEditInventory");

   stockMinimo.focus();
  backToInventory.onclick=function(){
  location.href="index.php?c=inventory&a=index";
}

  buttonEnviar.onclick=function(){
  formulario.submit();
}
break;

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
    var codigo=document.getElementById("codigo_barra");
    var excento=document.getElementById("excento");
    var ubicacion=document.getElementById("ubicacionProducto");
    var minimo=document.getElementById("stock_minimo");
    var maximo=document.getElementById("stock_maximo");

    codigo.focus();

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


  backToProducts.onclick=function(){
  location.href="index.php?c=inventory&a=index";
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
  } } } } } } } } 
break;

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
    var codigo=document.getElementById("codigo_barra");
    var excento=document.getElementById("excento");
    var ubicacion=document.getElementById("ubicacionProducto");
    var minimo=document.getElementById("stock_minimo");
    var maximo=document.getElementById("stock_maximo");

    codigo.focus();

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


  backToProducts.onclick=function(){
  location.href="index.php?c=inventory&a=index";
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
  } } } } } } } } 
break;



}



