window.addEventListener('DOMContentLoaded', function () {
    document.getElementById("btnClose").addEventListener("click", function () {
        window.close();
    });

    document.getElementById("btnImp").addEventListener("click", function () {
        window.print();
        window.opener.window.parent.document.getElementById("estado").innerText = "Reserva feta i finestra impresa"
        window.opener.window.parent.document.getElementById("estado").style.width = "100%";
    });
});