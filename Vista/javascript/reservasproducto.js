var botonPrducto = document.getElementsByClassName('botonPrducto')
var formularioReserva = document.getElementById('formularioReserva')
function redireccion(event) 
{
    var valor = event.target.getAttribute('id_producto')
    formularioReserva.setAttribute('action','../../Controlador/productos/reservaProductos.php?id_producto='+valor)
}


for (let index = 0; index < botonPrducto.length; index++) 
{
    botonPrducto[index].addEventListener('click',redireccion) 
}