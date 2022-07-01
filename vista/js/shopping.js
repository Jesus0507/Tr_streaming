var modulo = document.getElementById("modulo");

switch (modulo.value) {
  //---------------Vista principal de ventas-----------------------//

  case "index":
    var btnAgregarCompra = document.getElementById("addShopping");

    btnAgregarCompra.onclick = function () {
      location.href = "index.php?c=shopping&a=addShopping";
    };

    function seeShoppingDetail(
      factura,
      fecha,
      proveedor,
      total,
      productos,
      anulado
    ) {
      var texto = "<center><table style='width:90%;' border='1'>";
      if (anulado == 1) {
        factura += " (Anulada)";
      }
      texto +=
        "<tr><td colspan='1'>Factura #" +
        factura +
        "</td><td colspan='4'>Fecha: " +
        fecha +
        "</td></tr>";
      texto += "<tr><td colspan='5'>Proveedor: " + proveedor + "</td></tr>";
      texto +=
        "<tr><td colspan='5'style='text-align:center;background:black;color:white;-webkit-print-color-adjust: exact;'> DETALLE DE COMPRA</td></tr>";
      texto +=
        "<tr style='background:gray !important;-webkit-print-color-adjust: exact;color:white'><td>Código de producto</td><td>Producto</td><td>Cantidad</td><td>Precio unitario</td><td>Total</td></tr>";
      texto += productos;
      texto +=
        "<tr><td colspan='5' style='text-align:right;background:black;color:white;-webkit-print-color-adjust: exact;'>TOTAL: " +
        total +
        "</td></tr>";
      texto += "</table></center>";
      swal(
        {
          title: "Factura #" + factura,
          html: true,
          text: texto,
          customClass: "bigSwal",
          showCancelButton: true,
          cancelButtonText: "Ok",
          confirmButtonText: "Imprimir",
          closeOnConfirm: false,
        },
        function (confirm) {
          if (confirm == true) {
            var imprimir = window.open("", "", "");
            texto =
              "<center>Factura #" + factura + "<br><br>" + texto + "</center>";
            imprimir.document.write(texto);
            imprimir.blur();
            imprimir.print();
            imprimir.close();
          }
        }
      );
    }

    function anularCompra(factura) {
      var texto =
        "Estás por anular la compra de factura #" +
        factura +
        ", ¿deseas continuar?<br>";
      texto +=
        "<textarea id='razon' placeholder='Escriba la razón de la anulación'></textarea>";
      swal(
        {
          title: "¿Estás seguro?",
          type: "warning",
          html: true,
          text: texto,
          showCancelButton: true,
          cancelButtonText: "No,volver",
          confirmButtonText: "Si,deseo continuar",
          closeOnConfirm: false,
        },
        function (confirm) {
          if (confirm == true) {
            if (document.getElementById("razon").value == "") {
              document.getElementById("razon").focus();
              document.getElementById("razon").style.borderColor = "red";
            } else {
              location.href =
                "index.php?c=shopping&a=anular&id=" +
                factura +
                "&razon=" +
                document.getElementById("razon").value;
            }
          }
        }
      );
    }

    break;

  case "addShopping":
    var newSupplier = document.getElementById("newSupplier");
    var newProduct = document.getElementById("newProduct");
    var botonAgregar = document.getElementById("botonAgregar");
    var producto = document.getElementById("selectProductos");
    var cantidad = document.getElementById("cantidadProducto");
    var fVencimiento = document.getElementById("fVencimiento");
    var proveedor = document.getElementById("selectProveedores");
    var costo = document.getElementById("costo");
    var tipoPago = document.getElementById("divisa");
    var divLista = document.getElementById("productosAgregados");
    var btnGuardar = document.getElementById("guardar");
    var back_btn = document.getElementById("backToShopping");
    var formulario = document.getElementById("formAddShopping");
    var total = 0;
    var tasa_dolar = document.getElementById("tasa_dolar");
    var divTotal = document.getElementById("total");
    var info = document.getElementById("informacion");

    newSupplier.onclick = function () {
      window.open("index.php?c=suppliers&a=addSuppliers");
    };

    back_btn.onclick = function () {
      location.href = "index.php?c=shopping&a=index";
    };

    newProduct.onclick = function () {
      window.open("index.php?c=inventory&a=addProducts");
    };

    btnGuardar.onclick = function () {
      if (total == 0) {
        swal({
          timer: 2000,
          showConfirmButton: false,
          type: "error",
          title: "Debe ingresar al menos un producto para la compra",
        });
      } else {
        formulario.submit();
      }
    };

    botonAgregar.onclick = function () {
      if (
        proveedor.value != "0" &&
        producto.value != 0 &&
        cantidad.value != "" &&
        fVencimiento.value != "" &&
        costo.value != ""
      ) {
        var costoReal = "";
        proveedor.disabled = "disabled";

        if (tipoPago.value == "2") {
          costoReal = tasa_dolar.value * parseFloat(costo.value);
        } else {
          costoReal = parseFloat(costo.value);
        }

        var table =
          "<br><table style='width:100%'><tr><td>Producto</td><td>Cantidad</td><td>Costo</td></tr><tr>";
        var texto =
          "<td>" +
          producto.options[producto.selectedIndex].text +
          "</td><td>" +
          cantidad.value +
          "<td>" +
          parseFloat(costoReal).toFixed(2) +
          " Bs</td>";
        table += texto + "</tr></table><br>";
        divLista.innerHTML += table;
        if (tipoPago.value == "2") {
          total +=
            parseFloat(costo.value) *
            tasa_dolar.value *
            parseInt(cantidad.value);
        } else {
          total += parseFloat(costo.value) * parseInt(cantidad.value);
        }

        divTotal.innerHTML = "Total: " + parseFloat(total).toFixed(2) + " Bs  ";
        info.value +=
          producto.value +
          "&" +
          cantidad.value +
          "&" +
          fVencimiento.value +
          "&" +
          costoReal +
          "&" +
          parseFloat(total).toFixed(2) +
          "&" +
          proveedor.value +
          "/";
        console.log(info.value);
        producto.value = 0;
        cantidad.value = "";
        fVencimiento.value = "";
        costo.value = "";
      } else {
        swal({
          timer: 2000,
          showConfirmButton: false,
          type: "error",
          title: "Debe agregar toda la información del producto",
        });
      }
    };

    break;
}
