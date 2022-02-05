try {

    // if (document.querySelector(".button--all-rate")) {
    //     if (document.querySelector(".rate__catalog-link--active")) {
    //         let el = document.querySelector(".rate__catalog-link--active");
    //          let url = el.getAttribute("data-url");
    //          document.querySelector(".button--all-rate").setAttribute("href", url)
    //     }
    // }


    document.addEventListener("DOMContentLoaded", () => {
        function tabs(btnSelector, contentSelector = "", activeClassBtn = "", activeClassContent = "") {
            const btns = document.querySelectorAll(btnSelector);
            const contents = document.querySelectorAll(`[${contentSelector}]`)
            btns.forEach(btn => {
                btn.addEventListener("click", (e) => {
                    const target = e.target;
                    btns.forEach((item, i) => {
                        item.classList.remove(activeClassBtn);
                        if (item === target) {
                            item.classList.add(activeClassBtn);
                        }
                    })
                    contents.forEach((item, i) => {
                        item.classList.remove(activeClassContent);
                    })
    
                    const selectorWithoutBracket = btnSelector.slice(1, -1);
                    const id = target.getAttribute(selectorWithoutBracket);
                    document.querySelector(`[${contentSelector}="${id}"]`).classList.add(activeClassContent)
                })
            })
        }
        tabs("[data-mainTab]", "data-mainContent", "rate__catalog-link--active", "rate__content--active");
    })
} catch {}