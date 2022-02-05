try {
    document.querySelector("#hamburger-icon").addEventListener("click", (e) => {
        const el = e.target.closest("#hamburger-icon");
        el.classList.toggle("active")
        if (el.classList.contains("active")) {
            document.querySelector(".header-down nav").classList.add("header__nav-active")
        } else {
            document.querySelector(".header-down nav").classList.remove("header__nav-active")
        }
    })
} catch { }


// transition: .4s all;