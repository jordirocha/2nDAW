
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("btnSubmit").addEventListener("click", check);
});

function check() {
    // Div elements on we insert fail or success
    let feedName = document.getElementById("feedName");
    let feedLast = document.getElementById("feedLast");
    let feedAge = document.getElementById("feedAge");

    // Input elements
    let fname = document.getElementById("name");
    let lastname = document.getElementById("lname");
    let age = document.getElementById("age");

    let boolName = false;
    let boolLast = false;
    let boolAge = false;

    if (fname.value == "" || fname.value == null || fname.value.length == 0) {
        failure(feedName, fname);
        fname.classList.contains("is-invalid") ? feedName.innerText = "Name cannot be empty" : "";
    } else {
        boolName = true;
        success(feedName, fname);
        fname.classList.contains("is-valid") ? feedName.innerText = fname.value + " looks good" : "";
    }

    if (lastname.value == "" || lastname.value == null || lastname.value.length == 0) {
        failure(feedLast, lastname);
        lastname.classList.contains("is-invalid") ? feedLast.innerText = "Last name cannot be empty" : "";
    } else {
        boolLast = true;
        success(feedLast, lastname);
        lastname.classList.contains("is-valid") ? feedLast.innerText = lastname.value + " looks good" : "";
    }

    if (age.value == null || age.value == "" || isNaN(age.value) || age.value <= 0) {
        failure(feedAge, age);
        if (age.classList.contains("is-invalid")) {
            if (age.value == null || age.value == "") {
                feedAge.innerText = "Age cannot be empty";
            } else if (isNaN(age.value)) {
                feedAge.innerText = "Age is not a number";
            } else if (age.value <= 0) {
                feedAge.innerText = "Age cannot be less or equal than 0";
            }
        }
    } else {
        boolAge = true;
        console.log(boolAge);
        success(feedAge, age);
        age.classList.contains("is-valid") ? feedAge.innerText = age.value + " looks good" : "";
    }

    if (boolAge && boolLast && boolName) {
        let alertDiv = document.createElement("div");
        alertDiv.id = "alert"
        alertDiv.classList.add("alert");
        alertDiv.classList.add("alert-success");
        alertDiv.innerText = "All okay!";
        !document.body.contains(document.getElementById("alert")) ? document.getElementById("main").appendChild(alertDiv) : "";
    } else {
        document.body.contains(document.getElementById("alert")) ? document.getElementById("alert").remove() : "";
    }

}

function failure(divField, inputEle) {
    divField.classList.remove("text-success");
    divField.classList.add("text-danger");
    inputEle.classList.remove("is-valid");
    inputEle.classList.add("is-invalid");
}

function success(divField, inputEle) {
    divField.classList.remove("text-danger");
    divField.classList.add("text-success");
    inputEle.classList.remove("is-invalid");
    inputEle.classList.add("is-valid");
}