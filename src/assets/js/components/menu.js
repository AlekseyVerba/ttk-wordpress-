document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".header-down__wrapper .menu__submenu").forEach(item => {
        const parent = item.closest(".header-down__wrapper");
        const link = parent.querySelector(".header-down__link")
        link.classList.add("no-click")
        link.addEventListener("click", (e) => {
            e.preventDefault()
        })
    })
})
