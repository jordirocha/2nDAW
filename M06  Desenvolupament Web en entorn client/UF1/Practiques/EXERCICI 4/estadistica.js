var result = document.getElementById("result");
var size = document.getElementById("size");
var firstWord = document.getElementById("firstWord");
var lastWord = document.getElementById("lastWord");
var inverted = document.getElementById("inverted");
var asc = document.getElementById("asc");
var desc = document.getElementById("desc");

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("btnSubmit").addEventListener("click", checkString, false);

});

function checkString() {
    result.innerHTML = "";
    let str = document.getElementById("sentence").value;

    // Used to get first word, last, show inverted sentence, sorting asc/desc and total size
    let copyStr = str;
    copyStr = copyStr.split(" ");

    // Cleaned of specials characters
    str = cleanString(str);

    // String converted to array
    let srtArray = str.split("");

    showLettersRepeated(srtArray);
    getFirstWord(copyStr);
    getLastWord(copyStr);
    totalWords(copyStr);
    showInverted(copyStr);
    sortASC(copyStr);
    sortDESC(copyStr);
}

function showLettersRepeated(srtArray) {
    // Way to get all uniquies characters
    let uniqueChars = [...new Set(srtArray)];
    let repeated = 0;
    for (let i = 0; i < uniqueChars.length; i++) {
        for (let j = 0; j < srtArray.length; j++) {
            if (uniqueChars[i] == [srtArray[j]]) {
                repeated++;
            }
        }
        result.innerHTML += `<strong>${uniqueChars[i].toUpperCase()}</strong> -> ${repeated}, `;
        repeated = 0;
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

function sortDESC(str) {
    desc.innerHTML = "";
    let descArr = str.sort();
    for (let i = descArr.length - 1; i >= 0; i--) {
        desc.innerHTML += descArr[i] + " ";
    }
}

function sortASC(str) {
    asc.innerHTML = "";
    let ascArr = str.sort();
    for (let i = 0; i < ascArr.length; i++) {
        asc.innerHTML += ascArr[i] + " ";
    }
}

function showInverted(str) {
    inverted.innerHTML = "";
    for (let i = str.length - 1; i >= 0; i--) {
        inverted.innerHTML += str[i] + " ";
    }
}

function totalWords(str) {
    size.innerText = `${str.length}`;
}

function getFirstWord(str) {
    firstWord.innerText = `${str[0].toUpperCase()}`;
}

function getLastWord(str) {
    lastWord.innerText = `${str[str.length - 1].toUpperCase()}`;
}