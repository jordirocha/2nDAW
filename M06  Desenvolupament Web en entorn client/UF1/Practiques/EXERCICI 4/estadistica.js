document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("btnSubmit").addEventListener("click", checkString, false);

});

function checkString() {
    let str = document.getElementById("sentence").value;
    str = cleanString(str);
    console.log(str);
    for (let i = 0; i < str.length; i++) {
        for (let j = 0; j < str.length; j++) {

        }
    }
}

function cleanString(str) {
    let newSrt = str;
    newSrt = newSrt.replace(/ /g, "");
    newSrt = newSrt.replace(/[,¿?¡!\.]/g, "");
    newSrt = newSrt.replace(/[áà]/g, "a");
    newSrt = newSrt.replace(/[éè]/g, "e");
    newSrt = newSrt.replace(/[íì]/g, "i");
    newSrt = newSrt.replace(/[óò]/g, "o");
    newSrt = newSrt.replace(/[úù]/g, "u");
    newSrt = newSrt.toLowerCase();
    return newSrt;
}