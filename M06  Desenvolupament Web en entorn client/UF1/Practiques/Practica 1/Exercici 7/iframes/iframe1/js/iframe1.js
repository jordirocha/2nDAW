window.addEventListener('DOMContentLoaded', function () {
    document.getElementById("btnCal").addEventListener("click", function () {
        let name = document.getElementById("name").value;
        let tickets = document.getElementById("ticket").value;
        var select = document.getElementById('show');
        var value = select.options[select.selectedIndex].value;
        
        window.parent.document.getElementById("iframe2").contentWindow.document.getElementById("price").innerText = tickets * value;
        parent.document.getElementById("estado").innerText = "Pendent de l’acceptació del preu";
        window.parent.document.getElementById("estado").style.width = "50%";
    });
});