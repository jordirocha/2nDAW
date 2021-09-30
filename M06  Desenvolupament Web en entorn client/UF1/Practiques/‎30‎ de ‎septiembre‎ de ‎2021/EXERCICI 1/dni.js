// Global variables
var result = document.getElementById("result");
var letters = ["T", "R", "W", "A", "G", "M", "Y", "F",
    "P", "D", "X", "B", "N", "J", "Z", "S",
    "Q", "V", "H", "L", "C", "K", "E"];

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("btnSubmit").addEventListener("click", validateDNI, false);
});

function validateDNI() {
    let dni = document.getElementById("dni").value;
    if (dni.length == 9) {
        dni = dni.toUpperCase();
        let letterValidated = letterDNI(dni);
        let dniValidated = dni.substring(0, dni.length - 1) + letterValidated;
        dni == dniValidated ? result.innerText = "DNI correcto." : result.innerText = "DNI incorrecto.";
    } else {
        result.innerText = "Formato DNI incorrecto."
    }

}
// Returns the corresponding letter
function letterDNI(dni) {
    let onlyDni = dni.substring(0, dni.length - 1);
    return letters[onlyDni % 23];
}