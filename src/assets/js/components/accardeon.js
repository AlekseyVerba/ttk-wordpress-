// АККАРДЕОН
document.querySelectorAll("[data-question]").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      var parentEl = e.target.closest(".questions__item");
      var item = parentEl.querySelector(".question__answer");
      if (item.classList.contains("question__answer--active")) {
        item.classList.remove("question__answer--active");
        btn.querySelector("[data-question-img]").style.opacity = "1";
        btn.querySelector("[data-question-img]").style.transform = "rotate(0)";
        btn.querySelector("[data-question-title]").classList.remove("questions__title--active");
        $(item).hide(500)
      } else {
        document.querySelectorAll(".question__answer--active").forEach(function (activeItem) {
          // btn.querySelector("[data-question-img]").style.opacity = "1";
          // btn.querySelector("[data-question-img]").style.transform = "rotate(0)";
          const parentWrap = activeItem.closest(".questions__item").querySelector("[data-question-img]")
          console.log(parentWrap)
          parentWrap.style.opacity = "1"
          parentWrap.style.transform = "rotate(0)";
          console.log(activeItem)
          activeItem.classList.remove("question__answer--active");
          $(activeItem).hide(500)
        });
        item.classList.add("question__answer--active");
        $(item).show(500)
        btn.querySelector("[data-question-img]").style.opacity = "0.6";
        btn.querySelector("[data-question-img]").style.transform = "rotate(180deg)";
        btn.querySelector("[data-question-title]").classList.add("questions__title--active");
      }
    });
  });


// document.querySelectorAll("[data-question]").forEach(item => {
//   item.addEventListener("click", () => {
//     const parent = item.parentElement
//     const smallEl = parent.querySelector(".question__answer")
//     if (smallEl.classList.contains("question__answer--active")) {
//       $(smallEl).hide(500)
//         smallEl.classList.remove("question__answer--active")
//     } else {
//       $(smallEl).show(500)
//       smallEl.classList.add("question__answer--active")
//     }
//   })

// })