document.addEventListener("keyup", function (e) {
    var keyCode = e.keyCode ? e.keyCode : e.which;
    if (keyCode == 44) {
        stopPrntScr();
    }
});
function stopPrntScr() {
    var inpFld = document.createElement("input");
    inpFld.setAttribute("value", ".");
    inpFld.setAttribute("width", "0");
    inpFld.style.height = "0px";
    inpFld.style.width = "0px";
    inpFld.style.border = "0px";
    document.body.appendChild(inpFld);
    inpFld.select();
    document.execCommand("copy");
    inpFld.remove(inpFld);
}
function AccessClipboardData() {
    try {
        window.clipboardData.setData("text", "Access   Restricted");
    } catch (err) {}
}
setInterval("AccessClipboardData()", 300);
const lang = document.querySelector("header .lang");
const lang_dropdown = document.querySelector("header .lang .lang-dropdown");
let isopen = true;
lang.addEventListener("click", () => {
    lang_dropdown.style.display = isopen ? "flex" : "none";
    isopen = !isopen;
});
