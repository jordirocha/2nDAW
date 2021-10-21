window.addEventListener('DOMContentLoaded', function () {
    document.getElementById("btnCal").addEventListener("click", function () {
        let name = document.getElementById("name").value;
        let tickets = document.getElementById("ticket").value;
        let select = document.getElementById('show');
        let value = select.options[select.selectedIndex].value;

        let boolName = false;
        let boolTickets = false;
        let boolShow = false;

        if (name == "") {
            document.getElementById("nameInput").innerText = "Name cannot be empty";
        } else {
            boolName = true;
            document.getElementById("nameInput").innerText = "";
        }

        if (value == "" || value == "Choose") {
            document.getElementById("selectInput").innerText = "Select a show";
        } else {
            boolShow = true;
            document.getElementById("selectInput").innerText = "";
        }

        if (isNaN(tickets) || tickets == "") {
            document.getElementById("ticketInput").innerText = "Introduce a quantity of tickets";
        } else {
            boolTickets = true;
            document.getElementById("ticketInput").innerText = "";
        }

        if (boolName && boolShow && boolTickets) {
            window.parent.document.getElementById("iframe2").contentWindow.document.getElementById("price").innerText = tickets * value;
            parent.document.getElementById("estado").innerText = "Pendent de l’acceptació del preu";
            window.parent.document.getElementById("estado").style.width = "50%";
        }
    });
});