        document.addEventListener("DOMContentLoaded", function() {

        setTimeout(() => {
        var selectFactura = document.getElementById('selectFactura');
        var inputsVenta = document.getElementById('inputFacturaVenta');
        var inputFacturaVentaCliente = document.getElementById('inputFacturaVentaCliente');
        var inputsCompra = document.getElementById('inputFacturaCompra');
        var inputsCompraProveedor = document.getElementById('inputFacturaCompraProveedor');

        

        // Función para establecer el atributo 'required' en los campos
        function setRequiredInputs(element, required) {
            var inputElements = element.querySelectorAll('input');
            for (var i = 0; i < inputElements.length; i++) {
                inputElements[i].required = required;
            }
            
        }
        if (selectFactura.value === "Compra") {
                inputsVenta.style.display = 'none';
                inputFacturaVentaCliente.style.display = 'none';
                inputsCompra.style.display = 'contents';
                inputsCompraProveedor.style.display = 'contents';

                // Hacer los campos de input en inputsCompra obligatorios
                setRequiredInputs(inputsCompra, true);
            } 
            else if (selectFactura.value === "Venta") {
                inputsVenta.style.display = 'contents';
                inputFacturaVentaCliente.style.display = 'contents';
                inputsCompra.style.display = 'none';
                inputsCompraProveedor.style.display = 'none';

                // Hacer los campos de input en inputsCompra no obligatorios
                setRequiredInputs(inputsCompra, false);
            } 
            else {
                inputsVenta.style.display = 'none';
                inputFacturaVentaCliente.style.display = 'none';
                inputsCompra.style.display = 'none';
                inputsCompraProveedor.style.display = 'none';

                // Hacer los campos de input en ambos formularios no obligatorios
                setRequiredInputs(inputsCompra, false);
                setRequiredInputs(inputsVenta, false);
            }  
        }, 300);
            
        });

        document.addEventListener("DOMContentLoaded", function() {
            var selectFactura = document.getElementById('selectFactura');
            var inputsVenta = document.getElementById('inputFacturaVenta');
            var inputFacturaVentaCliente = document.getElementById('inputFacturaVentaCliente');
            var inputsCompra = document.getElementById('inputFacturaCompra');
            var inputsCompraProveedor = document.getElementById('inputFacturaCompraProveedor');
            
            // Función para establecer el atributo 'required' en los campos
            function setRequiredInputs(element, required) {
                var inputElements = element.querySelectorAll('input');
                for (var i = 0; i < inputElements.length; i++) {
                    inputElements[i].required = required;
                }
            }

            selectFactura.addEventListener('change', function() {
                if (selectFactura.value === "Compra") {
                    inputsVenta.style.display = 'none';
                    inputFacturaVentaCliente.style.display = 'none';
                    inputsCompra.style.display = 'contents';
                    inputsCompraProveedor.style.display = 'contents';

                    // Hacer los campos de input en inputsCompra obligatorios
                    setRequiredInputs(inputsCompra, true);
                } 
                else if (selectFactura.value === "Venta") {
                    inputsVenta.style.display = 'contents';
                    inputFacturaVentaCliente.style.display = 'contents';
                    inputsCompra.style.display = 'none';
                    inputsCompraProveedor.style.display = 'none';                   

                    // Hacer los campos de input en inputsCompra no obligatorios
                    setRequiredInputs(inputsCompra, false);
                } 
                else {
                    inputsVenta.style.display = 'none';
                    inputFacturaVentaCliente.style.display = 'none';
                    inputsCompra.style.display = 'none';
                    inputsCompraProveedor.style.display = 'none';

                    // Hacer los campos de input en ambos formularios no obligatorios
                    setRequiredInputs(inputsCompra, false);
                    setRequiredInputs(inputsVenta, false);
                }
            });
        });
