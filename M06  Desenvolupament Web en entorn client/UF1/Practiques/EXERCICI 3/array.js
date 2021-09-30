var arr = [];
var copyArr = [];

var elements = document.getElementById("elements");
var asc = document.getElementById("asc");
var desc = document.getElementById("desc");
var size = document.getElementById("size");
var size = document.getElementById("size");
var result = document.getElementById("result");

document.addEventListener("DOMContentLoaded", function () {
    for (let i = 1; i <= 3; i++) {
        var num = prompt("Introduce número:");
        // By default prompt is string, must be parsed to int
        arr.push(Number(num));
    }
    copyArr = arr;
    showArray();
    sortAsc();
    sortDesc();
    size.innerText += " " + arr.length;
    document.getElementById("btnSubmit").addEventListener("click", checkNumber, false);
    console.log(copyArr);
});

function showArray() {
    elements.innerText += " " + arr.toString();
}

function sortAsc() {
    arr.sort(function (a, b) {
        return a - b;
    });
    asc.innerText += " " + arr.toString();
}

function sortDesc() {
    desc.innerText += " " + arr.reverse().toString();
}

function checkNumber() {
    let val = document.getElementById("number").value;
    val = parseInt(val);
    if (arr.includes(val)) {
        result.innerText = val + " está en la posición " + copyArr.indexOf(val);
    } else {
        result.innerText = val + " no está en la matriz.";
    }
}

