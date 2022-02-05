//TAБЫ

try {
    const contents = document.querySelectorAll(".page [data-content]").forEach((content, i) => {
        content.classList.remove("page__content--active")
        if (i === 0) {
            content.classList.add("page__content--active");
        }
    })
    if (window.outerWidth <= 976) {
        const tab = document.querySelector(".page__right--tabs")
        tab.addEventListener("click", (e) => {
            let target;
            if (e.target.closest(".page__right-item--active")) {
                target = e.target.closest(".page__right-item--active");
            }
            if (target.classList.contains("page__right-item--active")) {
                if (target.closest(".page__right-list--active")) {
                    target.closest("ul").classList.remove("page__right-list--active")
                    target.closest(".page__right--tabs").classList.remove("page__right--tabs-active")
                } else {
                    target.closest(".page__right--tabs").classList.add("page__right--tabs-active")
                    target.closest("ul").classList.add("page__right-list--active")
                }
            }
        })
    }
    const btns = document.querySelectorAll(".page [data-tab]").forEach((btn, i) => {
        btn.classList.remove("page__right-item--active")
        if (i === 0) {
            btn.classList.add("page__right-item--active")
        }
        btn.addEventListener("click", (e) => {
            const idBtn = btn.getAttribute("data-tab");
            const contentWithId = document.querySelector(`[data-content='${idBtn}']`)
            document.querySelectorAll(".page__right-item--active").forEach((btnOld, index) => {
                btnOld.classList.remove("page__right-item--active")
            })
            document.querySelectorAll(".page__content--active").forEach((contentOld, index) => {
                contentOld.classList.remove("page__content--active")
            })
            contentWithId.classList.add("page__content--active")
            btn.classList.add("page__right-item--active")
        })
    })
} catch { }


// $(document).on("click", ".page__inner .page__right-list div", function () {
//     var numberIndex = $(this).index();

//     if (!$(this).is("active")) {
//         $(".page__inner .page__right-list div").removeClass("active page__right-item--active");
//         $(".page__inner ul li").removeClass("active ");

//         $(this).addClass("active page__right-item--active");
//         $(".page__inner ul").find("li:eq(" + numberIndex + ")").addClass("active");

//         var listItemHeight = $(".page__inner ul")
//             .find("li:eq(" + numberIndex + ")")
//             .innerHeight();
//         $(".page__inner ul").height(listItemHeight + "px");
//     }
// });


