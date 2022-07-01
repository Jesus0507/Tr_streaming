var modulo=document.getElementById("modulo");

switch(modulo.value){

    //---------------Vista principal de almacenes-----------------------//     

	case 'index':
	var addWarehousesButton=document.getElementById("addWarehouses");

	addWarehousesButton.onclick=function(){
	location.href="index.php?c=warehouses&a=addWarehouses";
}

    function deleteWarehouse(idWarehouse){
    	swal({
          title:"¿Estás seguro?",
          type:"warning",
          text:"Estás por eliminar el almacén "+idWarehouse+", ¿deseas continuar?",
          showCancelButton:true,
          cancelButtonText:"No,volver",
          confirmButtonText:"Si,deseo continuar",
    	});
    }

    
    function updateWarehouse(idWarehouse){
    	location.href='index.php?c=warehouses&a=editWarehouses&id='+idWarehouse;
    }

	break;

   //--------------Vista de agregar un nuevo almacén----------------//

	case 'addWarehouses':
    var backToWarehouses=document.getElementById("backToWarehouses");
    var nombre=document.getElementById("nombre");
     var formulario=document.getElementById("formAddWarehouses");
    var buttonEnviar=document.getElementById("submitButton");


  buttonEnviar.onclick=function(){
  formulario.submit();
}

   nombre.focus();
	backToWarehouses.onclick=function(){
	location.href="index.php?c=warehouses&a=index";
}
break;

//-------------Vista de editar un almacén----------------------//

  case 'editWarehouses':
    var backToWarehouses=document.getElementById("backToWarehouses");
    var nombre=document.getElementById("updateNombre");
    var buttonEnviar=document.getElementById("submitButton");
    var formulario=document.getElementById("formEditWarehouses");

   nombre.focus();
  backToWarehouses.onclick=function(){
  location.href="index.php?c=warehouses&a=index";
}

  buttonEnviar.onclick=function(){
  formulario.submit();
}
break;


}



