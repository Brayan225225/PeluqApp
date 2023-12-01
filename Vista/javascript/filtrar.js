document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("searchInput");
    var dataTable = document.getElementById("dataTable");

    searchInput.addEventListener("input", function() {
        var filtro = searchInput.value.toLowerCase();
        var filas = dataTable.querySelectorAll("tbody tr");

        filas.forEach(function(fila) {
            var nombreEstado = fila.querySelector("td:nth-child(2)").textContent.toLowerCase();
            if (nombreEstado.includes(filtro)) {
                fila.style.display = "table-row";
            } else {
                fila.style.display = "none";
            }
        });
    });
});