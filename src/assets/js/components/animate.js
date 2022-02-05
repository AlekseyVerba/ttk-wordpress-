// // function animate(selector, nameClass, ) {

// // }



document.querySelectorAll("header .header-down__wrapper").forEach(item => {
    item.addEventListener("click", (e) => {
        document.querySelectorAll(".header-down__wrapper").forEach(elem => {
            elem.querySelector("a").classList.remove("header-down-actiove-mobile")
            //     elem.querySelector("ul").classList.remove("header-down__list-block")
        })
        if (window.outerWidth <= 976) {
            const list = item.querySelector("ul");
            if (!list.classList.contains("header-down__list-mobile")) {
                list.classList.add("header-down__list-mobile");
            }
            if (list.classList.contains("header-down__list-block")) {
                // if (list !== null && list.classList.contains("header-down__list-block")) {
                // item.querySelector(".header-down__list-wrapper").style.display = "none"
                list.classList.remove("header-down__list-fadeIn");
                list.classList.add("header-down__list-fadeOut");
                setTimeout(() => {
                    list.classList.remove("header-down__list-block");
                }, 300)
                // }

            }
            if (!list.classList.contains("header-down__list-block")) {
                item.querySelector("a").classList.add("header-down-actiove-mobile")
                // item.querySelector(".header-down__list-wrapper").style.display = "block
                if (document.querySelector(".header-down__list-block")) {
                    document.querySelector(".header-down__list-block").classList.remove("header-down__list-block");
                }
                list.classList.add("header-down__list-block");
                list.classList.remove("header-down__list-fadeOut");
                setTimeout(() => {
                    list.classList.add("header-down__list-fadeIn");
                }, 20)
            }
        }

    })

})







