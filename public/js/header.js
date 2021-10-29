const lang = document.querySelector("header .lang")
const lang_dropdown = document.querySelector("header .lang .lang-dropdown");
let isopen = false;
lang.addEventListener("click", () => {
    lang_dropdown.style.display = isopen ? 'flex' : 'none'
    isopen = !isopen
})