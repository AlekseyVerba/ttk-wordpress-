document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("iframe").forEach(el => {
        if (el.hasAttribute("frameborder")) {
            el.removeAttribute("frameborder")
            el.style.border = "0px"
        }
    })

    // document.querySelector("#menu-glavnoe-menyu").classList.add("header__nav-active")
})