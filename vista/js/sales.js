var modulo = document.getElementById("modulo");

switch (modulo.value) {
  //---------------Vista principal de ventas-----------------------//

  case "index":
    var btnAgregarVenta = document.getElementById("addSale");
    var reportes = document.getElementById("printReport");


    btnAgregarVenta.onclick = function () {
      location.href = "index.php?c=sales&a=addSales";
    };

    function seeSaleDetail(factura, fecha, cliente, total, productos, anulado) {
      if (anulado == 1) {
        factura += " (Anulada)";
      }
      var texto = "<center><table style='width:90%;' border='1'>";
      texto +=
        "<tr><td colspan='1'>Factura #" +
        factura +
        "</td><td colspan='4'>Fecha de salida: " +
        fecha +
        "</td></tr>";
         texto +=
        "<tr><td colspan='5'>Cliente: " +
        cliente +
        "</td></tr>";
      texto +=
        "<tr><td colspan='5'style='text-align:center;background:black;color:white;-webkit-print-color-adjust: exact;'> DETALLE DE VENTA</td></tr>";
      texto +=
        "<tr style='background:gray;color:white;-webkit-print-color-adjust: exact;'><td>Código de producto</td><td>Producto</td><td>Cantidad</td><td>Precio unitario</td><td>Total</td></tr>";
      texto += productos;

      texto +=
        "<tr><td colspan='5' style='text-align:right;background:black;color:white;-webkit-print-color-adjust: exact;'>TOTAL: " +
        total +
        "</td></tr>";
      texto += "</table></center>";
      swal({
        title: "Factura #" + factura,
        html: true,
        text: texto,
        customClass: "bigSwal",
        showCancelButton: true,
        cancelButtonText:"Ok",
        confirmButtonText: "Imprimir",
        closeOnConfirm:false
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

    function anularVenta(factura) {
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
                "index.php?c=sales&a=anular&id=" +
                factura +
                "&razon=" +
                document.getElementById("razon").value;
            }
          }
        }
      );
    }

    break;

  case "addSales":
    var botonAgregar = document.getElementById("botonAgregar");
    var producto = document.getElementById("selectProductos");
    var cantidad = document.getElementById("cantidadProducto");
    var precioUnidad = document.getElementById("precioUnidad");
    var tipoPago = document.getElementById("divisa");
    var divLista = document.getElementById("productosAgregados");
    var btnGuardar = document.getElementById("guardar");
    var btnClient = document.getElementById("newClient");
    var btnProduct = document.getElementById("newProduct");
    var btnBack = document.getElementById("backToSales");
    var formulario = document.getElementById("formAddSales");
    var divTotal = document.getElementById("total");
    var tasa_dolar = document.getElementById("tasa_dolar");
    var clientes = document.getElementById("datalistClients");
    var info = document.getElementById("informacion");
    var total = 0;

    btnGuardar.onclick = function () {
      if (total == 0) {
        swal({
          timer: 2000,
          showConfirmButton: false,
          type: "error",
          title: "Debe agregar tal menos un producto para la venta",
        });
      } else {
        formulario.submit();
      }
    };

    btnClient.onclick = function () {
      window.open("index.php?c=clients&a=addClients");
    };

    btnBack.onclick = function () {
      location.href = "index.php?c=sales&a=index";
    };

    btnProduct.onclick = function () {
      window.open("index.php?c=inventory&a=addProducts");
    };

    botonAgregar.onclick = function () {
      if (
        producto.value != 0 &&
        cantidad.value != "" &&
        precioUnidad.value != "" &&
        clientes.value != ""
      ) {
        var cant = producto.options[producto.selectedIndex].text.split(":");
        var product = producto.options[producto.selectedIndex].text.split("|");
        product = product[0];
        cant = parseInt(cant[1]);

        if (cant < parseInt(cantidad.value)) {
          swal({
            timer: 3000,
            showConfirmButton: false,
            type: "error",
            title:
              "La cantidad de productos a vender no puede ser mayor que la cantidad de productos en existencia",
          });
          cantidad.focus();
        } else {
          var costoReal = "";
          clientes.readOnly = "readOnly";

          if (tipoPago.value == "2") {
            costoReal = tasa_dolar.value * parseFloat(precioUnidad.value);
          } else {
            costoReal = parseFloat(precioUnidad.value);
          }

          var table =
            "<br><table style='width:100%'><tr>";
          var texto =
            "<td>" +
            product +
            "</td><td>" +
            cantidad.value +
            "<td>" +
            (parseFloat(costoReal * cantidad.value)).toFixed(2) +
            " Bolívares</td>";
          table += texto + "</tr></table><br>";
          divLista.innerHTML += table;
          total += parseFloat(costoReal * cantidad.value);
          divTotal.innerHTML = "Total: " + total.toFixed(2);
          info.value +=
            producto.value +
            "&" +
            cantidad.value +
            "&" +
            costoReal +
            "&" +
            parseFloat(total).toFixed(2) +
            "/";
         // console.log(info.value);
          cantidad.value = "";
          producto.value = 0;
          precioUnidad.value = "";
        }
      } else {
        swal({
          timer: 2000,
          showConfirmButton: false,
          type: "error",
          title: "Debe agregar toda la información para la venta",
        });
      }
    };

    break;
}
