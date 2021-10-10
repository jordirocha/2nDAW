
document.addEventListener("DOMContentLoaded", function () {
    // resultado = document.getElementById("resultado");
    document.getElementById("btnSubmit").addEventListener("click", check);

});

function check() {

    let feedName = document.getElementById("feedName");
    let feedLast = document.getElementById("feedLast");
    let feedAge = document.getElementById("feedAge");

    let fname = document.getElementById("name");
    let lastname = document.getElementById("lname");
    let age = document.getElementById("age");

    if (fname.value == "" || fname.value == null || fname.value.length == 0) {
        feedName.classList.remove("text-success");
        feedName.classList.add("text-danger");
        fname.classList.remove("is-valid");
        fname.classList.add("is-invalid");
        fname.classList.contains("is-invalid") ? feedName.innerText = "Name cannot be empty" : "";
    } else {
        feedName.classList.remove("text-danger");
        feedName.classList.add("text-success");
        fname.classList.remove("is-invalid");
        fname.classList.add("is-valid");
        fname.classList.contains("is-valid") ? feedName.innerText = fname.value + " looks good" : "";
    }

    if (lastname.value == "" || lastname.value == null || lastname.value.length == 0) {
        feedLast.classList.remove("text-success");
        feedLast.classList.add("text-danger");
        lastname.classList.remove("is-valid");
        lastname.classList.add("is-invalid");
        lastname.classList.contains("is-invalid") ? feedLast.innerText = "Last name cannot be empty" : "";
    } else {
        feedLast.classList.remove("text-danger");
        feedLast.classList.add("text-success");
        lastname.classList.remove("is-invalid");
        lastname.classList.add("is-valid");
        lastname.classList.contains("is-valid") ? feedLast.innerText = lastname.value + " looks good" : "";
    }


    if (age.value == null || age.value == "" || isNaN(age.value) || age.value <= 0) {
        feedAge.classList.remove("text-success");
        feedAge.classList.add("text-danger");
        age.classList.remove("is-valid");
        age.classList.add("is-invalid");
        if (age.classList.contains("is-invalid")) {
            if (age.value == null || age.value == "") {
                feedAge.innerText = "Age cannot be empty";
            } else if (isNaN(age.value)) {
                feedAge.innerText = "Age is not a number";
            } else if (age.value <= 0) {
                feedAge.innerText = "Age cannot be less or equal than 0";
            }
        }
    }else{
        feedAge.classList.remove("text-danger");
        feedAge.classList.add("text-success");
        age.classList.remove("is-invalid");
        age.classList.add("is-valid");
        age.classList.contains("is-valid") ? feedAge.innerText = age.value + " looks good" : "";
    }


}