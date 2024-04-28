//Boton ir al portafolio
document.getElementById("volverBtn").addEventListener("click", function() {
    window.location.href = "https://jrravelo.site/";
});


document.addEventListener('DOMContentLoaded', function() {
    // Seleccionamos todos los elementos con la clase .close-icon
    var closeIcons = document.querySelectorAll('.close-icon');

    // Iteramos sobre cada icono y agregamos un evento de clic
    closeIcons.forEach(function(icon) {
        icon.addEventListener('click', function() {
            // Buscamos el elemento padre (div.alert) y lo eliminamos
            var alertBox = icon.closest('.alert');
            if (alertBox) {
                alertBox.remove();
            }
        });
    });
});


 // Esperamos a que el DOM se cargue completamente
 document.addEventListener('DOMContentLoaded', function() {
    // Seleccionamos el textarea por su id
    var textarea = document.getElementById('descriptionTextarea');

    // Función para mover el cursor al principio del textarea si no hay texto
    function moveCursorToBeginningIfEmpty() {
        // Verificamos si el textarea está vacío
        if (!textarea.value.trim()) {
            // Movemos el cursor al principio del textarea
            textarea.setSelectionRange(0, 0);
        }
    }

    // Agregamos un evento de clic al textarea para mover el cursor al principio si no hay texto
    textarea.addEventListener('click', moveCursorToBeginningIfEmpty);
});


