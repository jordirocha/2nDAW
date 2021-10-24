// Global variables
var result = document.getElementById("result");

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("btnSubmit").addEventListener("click", validatePalindrome, false);
});

function validatePalindrome() {
    let str = document.getElementById("sentence").value;
    let cleanStr = cleanString(str);
    let palindrome = isPalindrome(cleanStr);
    palindrome ? result.innerText = str + " es palíndroma." : result.innerText = str + " no es palíndroma.";
}

// Will clean all special characters
function cleanString(str) {
    let newSrt = str;
    newSrt = newSrt.replace(/ /g, "");
    newSrt = newSrt.replace(/[,¿?¡!\.]/g, "");
    newSrt = newSrt.replace(/á/g, "a");
    newSrt = newSrt.replace(/é/g, "e");
    newSrt = newSrt.replace(/í/g, "i");
    newSrt = newSrt.replace(/ó/g, "o");
    newSrt = newSrt.replace(/ú/g, "u");
    newSrt = newSrt.toLowerCase();
    return newSrt;
}

// Looping to compare if our string is palindrome
function isPalindrome(cleanSrt) {
    for (let i = 0; i < cleanSrt.length; i++) {
        if (cleanSrt[i] != cleanSrt[(cleanSrt.length - 1) - i]) {
            return false;
        }
    }
    return true;
}