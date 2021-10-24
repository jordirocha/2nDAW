var myWindow;

window.addEventListener('DOMContentLoaded', function () {
    document.getElementById("btnOpen").addEventListener("click", function () {
        myWindow = window.open("../../popup/popup.html", "Print tickets", "width=1280, height=720");

        let name = window.parent.document.getElementById("iframe1").contentWindow.document.getElementById("userName").value;
        let show = window.parent.document.getElementById("iframe1").contentWindow.document.getElementById("show");
        let ticket = window.parent.document.getElementById("iframe1").contentWindow.document.getElementById("ticket").value;
        var nameShow = show.options[show.selectedIndex].text;
        var priceShow = show.options[show.selectedIndex].value;

        myWindow.addEventListener("DOMContentLoaded", function () {
            myWindow.document.getElementById("name").innerText = name;
            myWindow.document.getElementById("show").innerText = nameShow;
            myWindow.document.getElementById("unit").innerText = ticket;
            myWindow.document.getElementById("price").innerText = priceShow;
            myWindow.document.getElementById("total").innerText = ticket * priceShow;
            myWindow.document.getElementById("final").innerText = ticket * priceShow;
        });

        window.parent.document.getElementById("estado").innerText = "Reserva feta";
        window.parent.document.getElementById("estado").style.width = "75%";
    });
});

