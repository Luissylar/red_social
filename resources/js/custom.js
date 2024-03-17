// resources/js/custom.js
function checkInput(inputId, buttonId) {
    var inputText = document.getElementById(inputId).value;
    var submitButton = document.getElementById(buttonId);

    if (inputText.trim() !== "") {
        submitButton.disabled = false;
        submitButton.classList.remove("bg-gray-300");
        submitButton.classList.add("bg-blue-500"); // Cambia el color de fondo a azul cuando está activo
    } else {
        submitButton.disabled = true;
        submitButton.classList.remove("bg-blue-500");
        submitButton.classList.add("bg-gray-300"); // Restaura el color de fondo gris cuando está desactivado
    }
}
