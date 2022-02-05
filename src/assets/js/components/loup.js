 try {
    document.querySelector("[data-input-loup]").addEventListener("mouseenter", (e) => {
        const parentEl = e.target.closest(".header-up__img");
        parentEl.querySelector(".header-up__form-input").classList.add("header-up__form-input--active")
    })
    
    document.querySelector("[data-input-loup]").addEventListener("mouseleave", (e) => {
        setTimeout(() => {
            document.querySelector(".header-up__form-input").classList.remove("header-up__form-input--active")
        }, 500)
    })
    
 } catch {}