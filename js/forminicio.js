function validarFormulario() {
    var usuario = document.forms["loginForm"]["Usuario"].value;
    var password = document.forms["loginForm"]["password"].value;
    
    if (usuario === "" || password === "") {
        alert("Por favor completa todos los campos.");
        return false;
    }
}