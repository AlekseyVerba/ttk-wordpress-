window.addEventListener('resize', function () {
    // if (window.outerWidth <= 976) {
    //     document.querySelectorAll("header .header-down__wrapper").forEach(item => {
    //         item.addEventListener("click", (e) => {
    //             de(item)
    //         })

    //     })
    // }
    if (window.outerWidth >= 977) {
        if (document.querySelector(".header-down-actiove-mobile")) {
            document.querySelector(".header-down-actiove-mobile").classList.remove("header-down-actiove-mobile")
        }
        if (document.querySelectorAll(".header-down__list-mobile")) {
            document.querySelectorAll(".header-down__list-mobile").forEach(el => {
                if (el.classList.contains("header-down__list-mobile")) {
                    el.classList.remove("header-down__list-mobile")
                }
                if (el.classList.contains("header-down__list-block")) {
                    el.classList.remove("header-down__list-block")
                }
                if (el.classList.contains("header-down__list-fadeIn")) {
                    el.classList.remove("header-down__list-fadeIn")
                }
            })

        }
    }
});
