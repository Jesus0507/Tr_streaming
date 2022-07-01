var modulo=document.getElementById("modulo");

switch(modulo.value){

    //---------------Vista principal de otros-----------------------//     

	case 'index':


  var botonAgregar=document.getElementById("botonAgregar");
  var producto=document.getElementById("selectProductos");
  var cantidad=document.getElementById("cantidadProducto");
  var precioUnidad=document.getElementById("precioUnidad");
  var tipoPago=document.getElementById("divisa");
  var divLista=document.getElementById("productosAgregados");
  var btnGuardar=document.getElementById("guardar");
  var formulario=document.getElementById("formAddOther");


    btnGuardar.onclick=function(){
    formulario.submit();
  }




botonAgregar.onclick=function(){
if(producto.value!=0  && cantidad.value!="" && precioUnidad!=""){

   var table="<br><table style='width:100%'><tr><td>Producto</td><td>Cantidad</td><td>Precio total</td></tr><tr>";
   var texto="<td>"+producto.options[producto.selectedIndex].text+"</td><td>"+cantidad.value+"<td>"+(precioUnidad.value*cantidad.value)+" "+tipoPago.options[tipoPago.selectedIndex].text+"</td>";
   table+=texto+"</tr></table><br>";
   divLista.innerHTML+=table;
}
}


	break;

 

}



