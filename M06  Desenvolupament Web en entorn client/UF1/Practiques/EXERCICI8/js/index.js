var main, form, errors, selectCurse, cookieAlert, infoUser;

document.addEventListener("DOMContentLoaded", function () {
    main = document.getElementById("main");
    form = document.getElementById("form");
    errors = document.getElementById("infoError");
    selectCurse = document.getElementById("selectCurse");
    cookieAlert = document.getElementById("cookieAlert");
    infoUser = document.getElementById("infoUser");

    if (checkCookie("login") == "true") {
        form.classList.add("d-none");
        selectCurse.classList.remove("d-none");
    }

    if (checkCookie("polCookie")) {
        main.classList.remove("blockContent");
        cookieAlert.classList.add("d-none");
    }

    document.getElementById("btnCookie").addEventListener("click", cookiePolicy);

    document.getElementById("btnSub").addEventListener("click", logIn);

    selectCurse.addEventListener("change", obtainData);

    setInterval(function () {
        var date = new Date();
        formatDate = date.getDate() + "-" +
            date.getMonth() + "-" +
            date.getFullYear() + " " +
            date.getHours() + ":" +
            date.getMinutes() + ":" +
            date.getSeconds();
        document.getElementById("time").innerText = formatDate;
    }, 1000);

});

function obtainData() {
    let curse = document.getElementById("curses").value;
    if (curse != "none") {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "php/students.php?curse=" + curse + "&login=" + checkCookie("login"));
        xhr.send();
        xhr.onload = function () {
            let response = xhr.response
            if (response) {
                response = JSON.parse(xhr.response);
                let student = "";
                for (let i = 0; i < response.length; i++) {
                    student += (i + 1) + " - " + response[i] + "<br>";
                }
                infoUser.innerHTML = student;
            }
        }
    } else {
        infoUser.innerHTML = "";
    }
}

function logIn() {
    let user = document.getElementById("userName").value;
    let pass = document.getElementById("pass").value;
    let info = { "user": user, "pass": pass };
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php");
    xhr.send(JSON.stringify(info));
    xhr.onload = function () {
        let response = xhr.response;
        if (response == 1) {
            document.cookie = "login=true";
            form.classList.add("d-none");
            selectCurse.classList.remove("d-none");
        } else if (response == -1) {
            errors.innerText = "User name not exist";
        } else {
            errors.innerText = "Wrong password";
        }
    };
}

function checkCookie(cname) {
    let arrCook = document.cookie.split(";");
    for (let i = 0; i < arrCook.length; i++) {
        if (arrCook[i].includes(cname + "=true")) {
            return arrCook[i].split("=")[1];;
        }
    }
    return "";
}

function cookiePolicy() {
    const d = new Date();
    d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = "polCookie=true;" + expires;
    main.classList.remove("blockContent");
    cookieAlert.classList.add("d-none");
}