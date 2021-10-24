let userName, tickets, select, showPrice;
window.addEventListener('DOMContentLoaded', function () {
    select = document.getElementById('show');
    userName = document.getElementById("userName");
    tickets = document.getElementById("ticket");

    document.getElementById("btnCal").addEventListener("click", function () {
        showPrice = select.options[select.selectedIndex].value;

        let boolName = false;
        let boolTickets = false;
        let boolShow = false;

        if (userName.value == "") {
            document.getElementById("nameInput").innerText = "Name cannot be empty";
        } else {
            boolName = true;
            document.getElementById("nameInput").innerText = "";
        }

        if (showPrice == 0) {
            document.getElementById("selectInput").innerText = "Select a show";
        } else {
            boolShow = true;
            document.getElementById("selectInput").innerText = "";
        }

        if (isNaN(tickets.value) || tickets == "") {
            document.getElementById("ticketInput").innerText = "Introduce a quantity of tickets";
        } else {
            boolTickets = true;
            document.getElementById("ticketInput").innerText = "";
        }

        if (boolName && boolShow && boolTickets) {
            window.parent.document.getElementById("iframe2").contentWindow.document.getElementById("price").innerText = tickets.value * showPrice;
            parent.document.getElementById("estado").innerText = "Pendent de l’acceptació del preu";
            window.parent.document.getElementById("estado").style.width = "50%";
        }
    });

    select.onchange = function () {
        showPrice = select.options[select.selectedIndex].value;
        window.parent.document.getElementById("iframe2").contentWindow.document.getElementById("price").innerText = tickets.value * showPrice;
    }

});