var divcolaborador = document.getElementById("inputcolaborador");
var divproveedores = document.getElementById("inputproveedor");
var select = document.getElementById("select");

var inputColaborador = document.getElementsByClassName("inputcolaborador");
var inputProveedor = document.getElementsByClassName("inputproveedor");

function ocultar()
{
    if(select.value == 1)
    {
        divproveedores.style.display="none";
        divcolaborador.style.display="contents";
        
        for (let index = 0; index < inputProveedor.length; index++) 
        {
            inputProveedor[index].removeAttribute('required');            
        }
        for (let index = 0; index < inputColaborador.length; index++) 
        {
            inputColaborador[index].setAttribute('required','');            
        }
    }
    else if(select.value == 2)
    {
        divproveedores.style.display="none";
        divcolaborador.style.display="none";

        for (let index = 0; index < inputProveedor.length; index++) 
        {
            inputProveedor[index].removeAttribute('required');            
        }
        for (let index = 0; index < inputColaborador.length; index++) 
        {
            inputColaborador[index].removeAttribute('required');            
        }
    }
    else if(select.value == 3)
    {
        divproveedores.style.display="contents";
        divcolaborador.style.display="none";

        for (let index = 0; index < inputProveedor.length; index++) 
        {
            inputProveedor[index].setAttribute('required','');           
        }
        for (let index = 0; index < inputColaborador.length; index++) 
        {
            inputColaborador[index].removeAttribute('required');            
        }
    }
    else
    {
        divproveedores.style.display="none";
        divcolaborador.style.display="none";

        for (let index = 0; index < inputProveedor.length; index++) 
        {
            inputProveedor[index].removeAttribute('required');            
        }
        for (let index = 0; index < inputColaborador.length; index++) 
        {
            inputColaborador[index].removeAttribute('required');            
        }
    }
}
// change = cambio cada que se seleccione algo en el select
// 
select.addEventListener("change",ocultar);
document.addEventListener("DOMContentLoaded",ocultar);