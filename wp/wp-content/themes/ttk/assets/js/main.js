"use strict";

objectFitImages();
var swiper = new Swiper('.banner .swiper-container', {
  spaceBetween: 30,
  // slidesPerView: 1,
  // spaceBetween: 30,
  loop: true,
  pagination: {
    el: '.banner .swiper-pagination',
    clickable: true
  }
});

if (window.NodeList && !NodeList.prototype.forEach) {
  NodeList.prototype.forEach = function (callback, thisArg) {
    thisArg = thisArg || window;

    for (var i = 0; i < this.length; i++) {
      callback.call(thisArg, this[i], i, this);
    }
  };
}

(function (ELEMENT) {
  ELEMENT.matches = ELEMENT.matches || ELEMENT.mozMatchesSelector || ELEMENT.msMatchesSelector || ELEMENT.oMatchesSelector || ELEMENT.webkitMatchesSelector;

  ELEMENT.closest = ELEMENT.closest || function closest(selector) {
    if (!this) return null;
    if (this.matches(selector)) return this;

    if (!this.parentElement) {
      return null;
    } else return this.parentElement.closest(selector);
  };
})(Element.prototype);

(function () {
  var arr = [window.Element, window.CharacterData, window.DocumentType];
  var args = [];
  arr.forEach(function (item) {
    if (item) {
      args.push(item.prototype);
    }
  }); // from:https://github.com/jserz/js_piece/blob/master/DOM/ChildNode/remove()/remove().md

  (function (arr) {
    arr.forEach(function (item) {
      if (item.hasOwnProperty('remove')) {
        return;
      }

      Object.defineProperty(item, 'remove', {
        configurable: true,
        enumerable: true,
        writable: true,
        value: function remove() {
          this.parentNode.removeChild(this);
        }
      });
    });
  })(args);
})(); // АККАРДЕОН


document.querySelectorAll("[data-question]").forEach(function (btn) {
  btn.addEventListener("click", function (e) {
    var parentEl = e.target.closest(".questions__item");
    var item = parentEl.querySelector(".question__answer");

    if (item.classList.contains("question__answer--active")) {
      item.classList.remove("question__answer--active");
      btn.querySelector("[data-question-img]").style.opacity = "1";
      btn.querySelector("[data-question-img]").style.transform = "rotate(0)";
      btn.querySelector("[data-question-title]").classList.remove("questions__title--active");
      $(item).hide(500);
    } else {
      document.querySelectorAll(".question__answer--active").forEach(function (activeItem) {
        // btn.querySelector("[data-question-img]").style.opacity = "1";
        // btn.querySelector("[data-question-img]").style.transform = "rotate(0)";
        var parentWrap = activeItem.closest(".questions__item").querySelector("[data-question-img]");
        console.log(parentWrap);
        parentWrap.style.opacity = "1";
        parentWrap.style.transform = "rotate(0)";
        console.log(activeItem);
        activeItem.classList.remove("question__answer--active");
        $(activeItem).hide(500);
      });
      item.classList.add("question__answer--active");
      $(item).show(500);
      btn.querySelector("[data-question-img]").style.opacity = "0.6";
      btn.querySelector("[data-question-img]").style.transform = "rotate(180deg)";
      btn.querySelector("[data-question-title]").classList.add("questions__title--active");
    }
  });
}); // document.querySelectorAll("[data-question]").forEach(item => {
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
// wp-caption

document.querySelectorAll(".wp-caption").forEach(function (item) {
  if (item.querySelector(".wp-caption-text")) {
    var par = item.querySelector(".wp-caption-text");
    var text = par.textContent.length;

    if (text < 15) {
      par.style.maxWidth = "20%";
    } else if (text >= 15 && text <= 30) {
      par.style.maxWidth = "27%";
    } else if (text >= 31 && text <= 50) {
      par.style.maxWidth = "50%";
    } else if (text >= 51 && text <= 80) {
      par.style.maxWidth = "70%";
    } else if (text >= 81) {
      par.style.maxWidth = "100%";
    }

    item.querySelector(".wp-caption-text").remove();
    var wrapper = document.createElement("div");
    wrapper.classList.add("wp-caption-text__wrapper");
    wrapper.append(par);
    item.append(wrapper);
  }
}); // // function animate(selector, nameClass, ) {
// // }

document.querySelectorAll("header .header-down__wrapper").forEach(function (item) {
  item.addEventListener("click", function (e) {
    document.querySelectorAll(".header-down__wrapper").forEach(function (elem) {
      elem.querySelector("a").classList.remove("header-down-actiove-mobile"); //     elem.querySelector("ul").classList.remove("header-down__list-block")
    });

    if (window.outerWidth <= 976) {
      var list = item.querySelector("ul");

      if (!list.classList.contains("header-down__list-mobile")) {
        list.classList.add("header-down__list-mobile");
      }

      if (list.classList.contains("header-down__list-block")) {
        // if (list !== null && list.classList.contains("header-down__list-block")) {
        // item.querySelector(".header-down__list-wrapper").style.display = "none"
        list.classList.remove("header-down__list-fadeIn");
        list.classList.add("header-down__list-fadeOut");
        setTimeout(function () {
          list.classList.remove("header-down__list-block");
        }, 300); // }
      }

      if (!list.classList.contains("header-down__list-block")) {
        item.querySelector("a").classList.add("header-down-actiove-mobile"); // item.querySelector(".header-down__list-wrapper").style.display = "block

        if (document.querySelector(".header-down__list-block")) {
          document.querySelector(".header-down__list-block").classList.remove("header-down__list-block");
        }

        list.classList.add("header-down__list-block");
        list.classList.remove("header-down__list-fadeOut");
        setTimeout(function () {
          list.classList.add("header-down__list-fadeIn");
        }, 20);
      }
    }
  });
});
document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".search.current-item")) {
    document.querySelector(".search.current-item").textContent = "Поиск";
  }

  function isInternetExplorer() {
    return window.navigator.userAgent.indexOf('MSIE ') > -1 || window.navigator.userAgent.indexOf('Trident/') > -1;
  }

  if (isInternetExplorer()) {
    document.querySelector(".svg-main").style.display = "none";
  }
});
document.addEventListener("DOMContentLoaded", function () {
  function checked(selectorCheck, activeClass) {
    var checks = document.querySelectorAll("[".concat(selectorCheck, "]"));
    checks.forEach(function (check) {
      var content = check.parentElement.nextElementSibling;

      if (check.checked) {
        content.classList.add(activeClass);
      } else {
        if (content.classList.contains(activeClass)) {
          content.classList.remove(activeClass);
        }
      }

      check.addEventListener("change", function (e) {
        var target = e.target;

        if (target.checked) {
          content.classList.add(activeClass);
        } else {
          if (content.classList.contains(activeClass)) {
            content.classList.remove(activeClass);
          }
        }
      });
    });
  }

  checked("data-checkRate", "rate__content-items--active");
});
document.addEventListener("DOMContentLoaded", function () {
  var elements = [];
  document.querySelectorAll(".rate__content-card-add").forEach(function (btn) {
    btn.addEventListener("click", function () {
      addElement(btn);
    });
  });
  var fullInfoBlago = [];
  var selectedBlago = [];
  var fullInfoPrivate = [];
  var selectedPrivate = [];
  var fullInfoLegal = [];
  var selectedLegal = [];

  if (document.querySelector("[data-selected]")) {
    addElement(document.querySelector("[data-selected]"));
  }

  document.querySelectorAll("[data-checkrate]").forEach(function (item) {
    item.addEventListener("change", function () {
      if (item.checked) {} else {
        if (document.querySelector(".result__right-list .result__right-item--now")) {
          document.querySelector(".result__right-list .result__right-item--now").remove();
        } // let nameCategoryCardMoment;


        var nameCategoryCard = item.closest(".rate__content").getAttribute("data-maincontent");
        var nameCategoryCardMoment;

        switch (+nameCategoryCard) {
          case 0:
            {
              nameCategoryCardMoment = "Для квартир";
              break;
            }

          case 1:
            {
              nameCategoryCardMoment = "Для частных домов";
              break;
            }

          case 2:
            {
              nameCategoryCardMoment = "Для бизнеса и организаций";
              break;
            }
        }

        var checkedWrap = item.closest(".rate__content-wrapper").querySelectorAll(".rate__content-card--constructor");
        checkedWrap.forEach(function (card) {
          var nameCard = card.getAttribute("data-card-constructor-name");
          var priceCard = card.getAttribute("data-card-constructor-price");

          if (nameCategoryCardMoment == "Для квартир") {
            var arrCheck = [];
            var withoutEl = [];
            fullInfoBlago.forEach(function (element) {
              if (element[0] !== nameCard) {
                arrCheck.push(element);
              }
            });
            selectedBlago.forEach(function (item) {
              if (item !== nameCard) {
                // //consol(item)
                withoutEl.push(item);
              }
            });
            selectedBlago = withoutEl;
            fullInfoBlago = arrCheck;
          } else if (nameCategoryCardMoment == "Для частных домов") {
            var _arrCheck = [];
            var _withoutEl = [];
            fullInfoPrivate.forEach(function (element) {
              if (element[0] !== nameCard) {
                _arrCheck.push(element);
              }
            });
            selectedPrivate.forEach(function (item) {
              if (item !== nameCard) {
                // //consol(item)
                _withoutEl.push(item);
              }
            }); //consol(arrCheck)

            selectedPrivate = _withoutEl; //consol(selectedPrivate)

            fullInfoPrivate = _arrCheck; //consol(fullInfoPrivate)
          } else if (nameCategoryCardMoment == "Для бизнеса и организаций") {
            var _arrCheck2 = [];
            var _withoutEl2 = [];
            fullInfoLegal.forEach(function (element) {
              if (element[0] !== nameCard) {
                _arrCheck2.push(element);
              }
            });
            selectedLegal.forEach(function (item) {
              if (item !== nameCard) {
                // //consol(item)
                _withoutEl2.push(item);
              }
            });
            selectedLegal = _withoutEl2;
            fullInfoLegal = _arrCheck2;
          }
        }); // })

        if (elements.length >= 1) {
          var chet = 0;
          var parentSel = item.parentElement.parentElement.getAttribute("class");
          elements.forEach(function (btn, i) {
            if (i === 0) {
              chet++;
            }

            if (btn.closest(".".concat(parentSel)).querySelector("[type='checkbox']") === item) {
              if (chet === 1) {
                item.parentElement.parentElement.querySelectorAll(".rate__content-plus").forEach(function (plus) {
                  plus.style.display = "block";
                });
                item.parentElement.parentElement.querySelectorAll(".rate__content-galka").forEach(function (gal) {
                  gal.style.display = "none";
                });
                item.parentElement.parentElement.querySelectorAll(".rate__content-card-add").forEach(function (wrap) {
                  wrap.classList.add("rate__content-card-add--active");
                });
                item.parentElement.parentElement.querySelectorAll(".rate__content-card--constructor-no-active").forEach(function (block) {
                  block.classList.remove("rate__content-card--constructor-no-active");
                });
                item.parentElement.parentElement.querySelectorAll("button").forEach(function (btn) {
                  btn.removeAttribute("disabled", false);
                });
                chet++;
              }
            }
          });
          var arr = elements.filter(function (el) {
            return el.closest(".".concat(parentSel)).querySelector("[type='checkbox']") !== item;
          });
          elements = arr;
          var price = [];
          var priceNow = [];
          elements.forEach(function (item) {
            var card;
            card = item.closest("[data-card-constructor]");

            if (card.getAttribute("data-card-constructor-price").length > 10) {
              card.setAttribute("data-card-constructor-price", 0);
            }

            if (card.getAttribute("data-card-constructor-price") === null) {
              card.setAttribute("data-card-constructor-price", "month");
            }

            var parentCardName = card.getAttribute("data-card-constructor-name");
            var cardPrice = card.getAttribute("data-card-constructor-price");
            var cardPay = card.getAttribute("data-card-constructor-pay"); //consol(fullInfoBlago)
            //consol(fullInfoPrivate)
            //consol(fullInfoLegal)

            function addPrice(typeCard, fullInfo, selectedItems, price, nameCard, card, category) {
              var id = card.closest(".rate__content").getAttribute("data-maincontent");
              var nameCategory;

              if (id == 0) {
                nameCategory = "Для квартир";
              } else if (id == 1) {
                nameCategory = "Для частных домов";
              } else if (id == 2) {
                nameCategory = "Для бизнеса и организаций";
              }

              if (typeCard === "month") {
                if (selectedItems.indexOf(nameCard) == -1 && nameCategory == category) {
                  // //consol(nameCard)
                  selectedItems.push(nameCard);
                  fullInfo.push([nameCard, price, typeCard]);
                }
              } else if (typeCard === "now") {
                if (selectProd.indexOf(nameCard) == -1 && nameCategory == category) {
                  fullInfo.push([nameCard, price, typeCard]);
                }
              }
            }

            var nameActiveCategory = document.querySelector(".rate__catalog-link--active").textContent;

            if (nameActiveCategory == "Для квартир" && nameActiveCategory == nameCategoryCardMoment && !item.classList.contains("rate__content-card-add--active")) {
              addPrice(cardPay, fullInfoBlago, selectedBlago, cardPrice, parentCardName, card, "Для квартир");
            } else if (nameActiveCategory == "Для частных домов" && nameActiveCategory == nameCategoryCardMoment && !item.classList.contains("rate__content-card-add--active")) {
              addPrice(cardPay, fullInfoPrivate, selectedPrivate, cardPrice, parentCardName, card, "Для частных домов");
            } else if (nameActiveCategory == "Для бизнеса и организаций" && nameActiveCategory == nameCategoryCardMoment && !item.classList.contains("rate__content-card-add--active")) {
              addPrice(cardPay, fullInfoLegal, selectedLegal, cardPrice, parentCardName, card, "Для бизнеса и организаций");
            }
          });
          var count = 0; //  price.forEach(priceCard => {
          //      count += +priceCard;
          //  })

          if (nameCategoryCardMoment == "Для квартир") {
            fullInfoBlago.forEach(function (price) {
              count += +price[1];
            });
          } else if (nameCategoryCardMoment == "Для частных домов") {
            fullInfoPrivate.forEach(function (price) {
              count += +price[1];
            });
          }

          if (nameCategoryCardMoment == "Для бизнеса и организаций") {
            fullInfoLegal.forEach(function (price) {
              count += +price[1];
            });
          }

          document.querySelector(".result__right-item-price--month").textContent = "".concat(count, " \u20BD"); //  let priceNewCount = 
          //  if (priceNow.length >= 1) {

          var tabActive = document.querySelector(".rate__catalog-link--active");
          var countNow = 0;

          if (tabActive.textContent == "Для квартир") {
            fullInfoBlago.forEach(function (itemNow) {
              if (item[2] == "now") {
                countNow += +itemNow;
              }
            });
          }

          var wrapperPriceNow = document.createElement("ul");
          wrapperPriceNow.classList.add("result__right-item"); // wrapperPriceNow.innerHTML = `
          //     <span class="result__right-item-name">Единоразовая оплата:</span>
          //     <span class="result__right-item-price">${countNow} ₽</span>
          // `;

          var str;

          if (window.innerWidth <= 375) {
            str = "Одноразовая оплата:";
          } else {
            str = "Единоразовая оплата:";
          }

          document.querySelector(".result__right-item--month").insertAdjacentHTML("beforeBegin", "\n                     <li class='result__right-item result__right-item--now'>\n                         <span class=\"result__right-item-name\">".concat(str, "</span>\n                         <span class=\"result__right-item-price\">").concat(countNow, " \u20BD</span>\n                     </li>\n                 ")); // beforeBegin
          //  }

          var arrView = [];

          if (tabActive.textContent == "Для квартир") {
            fullInfoBlago.forEach(function (el) {
              var elView = "\n                                 <li class=\"result__left-item\">\n                                     <span class=\"result__left-item-name\">".concat(el[0], "</span>\n                                     <span class=\"result__left-item-price\">").concat(el[1], " \u20BD</span>\n                                </li>\n                         ");
              arrView.push(elView);
            });
          } else if (tabActive.textContent == "Для частных домов") {
            fullInfoPrivate.forEach(function (el) {
              var elView = "\n                                 <li class=\"result__left-item\">\n                                     <span class=\"result__left-item-name\">".concat(el[0], "</span>\n                                     <span class=\"result__left-item-price\">").concat(el[1], " \u20BD</span>\n                                </li>\n                         ");
              arrView.push(elView);
            });
          } else if (tabActive.textContent == "Для бизнеса и организаций") {
            fullInfoLegal.forEach(function (el) {
              var elView = "\n                                 <li class=\"result__left-item\">\n                                     <span class=\"result__left-item-name\">".concat(el[0], "</span>\n                                     <span class=\"result__left-item-price\">").concat(el[1], " \u20BD</span>\n                                </li>\n                         ");
              arrView.push(elView);
            });
          }

          var parent = document.querySelector(".result__left-list");
          parent.innerHTML = "";
          arrView.forEach(function (item) {
            parent.innerHTML += item;
          });
        }
      }
    });
  });

  function addElement(btn) {
    var price = [];
    var priceNow = [];
    var parentBtn = btn.closest(".rate__content-card--constructor");

    if (!btn.classList.contains("rate__content-card-add")) {
      btn = btn.querySelector(".rate__content-card-add");
    }

    if (document.querySelector(".result__right-list .result__right-item--now")) {
      document.querySelector(".result__right-list .result__right-item--now").remove();
    }

    if (btn.classList.contains("rate__content-card-add--active")) {
      if (btn.classList.contains("rate__content-card-add")) {
        var parentWrap = btn.closest(".rate__content-items.rate__content-items--constructor ");
        var allCardInWrap = parentWrap.querySelectorAll(".rate__content-card.rate__content-card--constructor");
        var nameTarif = parentWrap.closest(".rate__content-wrapper").querySelector(".checkbox__text").textContent;

        if (nameTarif !== "Тематическое телевиденье") {
          allCardInWrap.forEach(function (item) {
            if (item !== parentBtn) {
              item.classList.add("rate__content-card--constructor-no-active");
              item.querySelector("button").setAttribute("disabled", true);
            }
          });
        }

        btn.querySelector(".rate__content-plus").style.display = "none";
        btn.querySelector(".rate__content-galka").style.display = "block";
      }

      elements.push(btn);
      btn.classList.remove("rate__content-card-add--active");
    } else {
      if (btn.classList.contains("rate__content-card-add")) {
        var _parentWrap = btn.closest(".rate__content-items.rate__content-items--constructor ");

        var _allCardInWrap = _parentWrap.querySelectorAll(".rate__content-card.rate__content-card--constructor");

        var _nameTarif = _parentWrap.closest(".rate__content-wrapper").querySelector(".checkbox__text").textContent;

        if (_nameTarif !== "Тематическое телевиденье") {
          _allCardInWrap.forEach(function (item) {
            if (item !== parentBtn) {
              item.classList.remove("rate__content-card--constructor-no-active");
              item.querySelector("button").removeAttribute("disabled");
            }
          });
        }

        btn.querySelector(".rate__content-plus").style.display = "block";
        btn.querySelector(".rate__content-galka").style.display = "none";
      }

      elements = elements.filter(function (item) {
        return item !== btn;
      });
      btn.classList.add("rate__content-card-add--active");
    }

    var activeCategoryOne = btn.closest(".rate__content ").getAttribute("data-maincontent");
    var activeCategoryOneName;

    switch (+activeCategoryOne) {
      case 0:
        {
          activeCategoryOneName = "Для квартир";
          break;
        }

      case 1:
        {
          activeCategoryOneName = "Для частных домов";
          break;
        }

      case 2:
        {
          activeCategoryOneName = "Для бизнеса и организаций";
          break;
        }
    }

    var nameCardMoment = btn.closest(".rate__content-card").getAttribute("data-card-constructor-name");
    var priceCardMoment = btn.closest(".rate__content-card").getAttribute("data-card-constructor-price");

    if (activeCategoryOneName == "Для квартир") {
      var arrCheck = [];
      var withoutEl = [];
      fullInfoBlago.forEach(function (item) {
        if (item[0] !== nameCardMoment && item[1] !== priceCardMoment) {
          arrCheck.push(item);
        }
      });
      selectedBlago.forEach(function (item) {
        if (item !== nameCardMoment) {
          // //consol(item)
          withoutEl.push(item);
        }
      });
      fullInfoBlago = arrCheck;
      selectedBlago = withoutEl;
    } else if (activeCategoryOneName == "Для частных домов") {
      var _arrCheck3 = [];
      var _withoutEl3 = [];
      fullInfoPrivate.forEach(function (item) {
        if (item[0] !== nameCardMoment && item[1] !== priceCardMoment) {
          _arrCheck3.push(item);
        }
      });
      selectedPrivate.forEach(function (item) {
        if (item !== nameCardMoment) {
          // //consol(item)
          _withoutEl3.push(item);
        }
      });
      fullInfoPrivate = _arrCheck3;
      selectedPrivate = _withoutEl3;
    } else if (activeCategoryOneName == "Для бизнеса и организаций") {
      var _arrCheck4 = [];
      var _withoutEl4 = [];
      fullInfoLegal.forEach(function (item) {
        if (item[0] !== nameCardMoment && item[1] !== priceCardMoment) {
          _arrCheck4.push(item);
        }
      });
      selectedLegal.forEach(function (item) {
        if (item !== nameCardMoment) {
          // //consol(item)
          _withoutEl4.push(item);
        }
      });
      fullInfoLegal = _arrCheck4;
      selectedLegal = _withoutEl4;
    }

    var card;

    if (btn.classList.contains("rate__content-card-add")) {
      card = btn.closest("[data-card-constructor]");
    } else {
      card = btn;
    }

    var cardPay = card.getAttribute("data-card-constructor-pay");
    elements.forEach(function (item) {
      var card;
      var nameCategoryCard = item.closest(".rate__content").getAttribute("data-maincontent");
      var nameCategoryCardMoment;

      switch (+nameCategoryCard) {
        case 0:
          {
            nameCategoryCardMoment = "Для квартир";
            break;
          }

        case 1:
          {
            nameCategoryCardMoment = "Для частных домов";
            break;
          }

        case 2:
          {
            nameCategoryCardMoment = "Для бизнеса и организаций";
            break;
          }
      }

      if (item.classList.contains("rate__content-card-add")) {
        card = item.closest("[data-card-constructor]");
      } else {
        card = item;
      }

      if (card.getAttribute("data-card-constructor-price").length > 10) {
        card.setAttribute("data-card-constructor-price", 0);
      }

      if (card.getAttribute("data-card-constructor-price") === null) {
        card.setAttribute("data-card-constructor-price", "month");
      }

      var parentCardName = card.getAttribute("data-card-constructor-name");
      var cardPrice = card.getAttribute("data-card-constructor-price");
      var cardPay = card.getAttribute("data-card-constructor-pay"); // //consol(fullInfoBlago)

      function addPrice(typeCard, fullInfo, selectedItems, price, nameCard) {
        if (typeCard === "month") {
          if (selectedItems.indexOf(nameCard) == -1) {
            selectedItems.push(nameCard);
            fullInfo.push([nameCard, price, typeCard]);
          }
        } else if (typeCard === "now") {
          if (selectProd.indexOf(nameCard) == -1) {
            selectProd.push(nameCard);
            arrNow.push(price);
            fullInfo.push([nameCard, price]);
          }
        }
      }

      var nameActiveCategory = document.querySelector(".rate__catalog-link--active").textContent;

      if (nameActiveCategory == "Для квартир" && nameActiveCategory == nameCategoryCardMoment && !btn.classList.contains("rate__content-card-add--active")) {
        addPrice(cardPay, fullInfoBlago, selectedBlago, cardPrice, parentCardName);
      } else if (nameActiveCategory == "Для частных домов" && nameActiveCategory == nameCategoryCardMoment && !btn.classList.contains("rate__content-card-add--active")) {
        addPrice(cardPay, fullInfoPrivate, selectedPrivate, cardPrice, parentCardName);
      } else if (nameActiveCategory == "Для бизнеса и организаций" && nameActiveCategory == nameCategoryCardMoment && !btn.classList.contains("rate__content-card-add--active")) {
        addPrice(cardPay, fullInfoLegal, selectedLegal, cardPrice, parentCardName);
      }
    });
    var tabActive = document.querySelector(".rate__catalog-link--active");
    var count = 0;

    if (tabActive.textContent == "Для квартир") {
      fullInfoBlago.forEach(function (priceCard) {
        count += +priceCard[1];
      });
    } else if (tabActive.textContent == "Для частных домов") {
      fullInfoPrivate.forEach(function (priceCard) {
        count += +priceCard[1];
      });
    } else if (tabActive.textContent == "Для бизнеса и организаций") {
      fullInfoLegal.forEach(function (priceCard) {
        count += +priceCard[1];
      });
    }

    document.querySelector(".result__right-item-price--month").textContent = "".concat(count, " \u20BD");

    if (priceNow.length >= 1) {
      var wrapperPriceNow = document.createElement("ul");
      wrapperPriceNow.classList.add("result__right-item");
      var countNow = 0;

      if (tabActive.textContent == "Для квартир") {
        priceObj.blago.priceNew.forEach(function (priceCard) {
          countNow += +priceCard;
        });
      } else if (tabActive.textContent == "Для частных домов") {
        priceObj.private.priceNew.forEach(function (priceCard) {
          countNow += +priceCard;
        });
      } else if (tabActive.textContent == "Для бизнеса и организаций") {
        priceObj.legal.priceNew.forEach(function (priceCard) {
          countNow += +priceCard;
        });
      } // wrapperPriceNow.innerHTML = `
      //     <span class="result__right-item-name">Единоразовая оплата:</span>
      //     <span class="result__right-item-price">${countNow} ₽</span>
      // `;


      var str;

      if (window.innerWidth <= 375) {
        str = "Одноразовая оплата:";
      } else {
        str = "Единоразовая оплата:";
      }

      document.querySelector(".result__right-item--month").insertAdjacentHTML("beforeBegin", "\n        <li class='result__right-item result__right-item--now'>\n            <span class=\"result__right-item-name\">".concat(str, "</span>\n            <span class=\"result__right-item-price\">").concat(countNow, " \u20BD</span>\n        </li>\n    ")); // beforeBegin
    } // const newElements = elements.map(item=> {
    //     let card;
    //     if (item.classList.contains("rate__content-card-add")) {
    //         card = item.closest("[data-card-constructor]");
    //     } else {
    //         card = item;
    //     }
    //         //consol(priceObj)
    //         const cardName = card.getAttribute("data-card-constructor-name");
    //         const cardPrice = card.getAttribute("data-card-constructor-price");
    //     return `
    //         <li class="result__left-item">
    //             <span class="result__left-item-name">${cardName}</span>
    //             <span class="result__left-item-price">${cardPrice} ₽</span>
    //         </li>
    //     `;
    // })


    var arrView = [];

    if (tabActive.textContent == "Для квартир") {
      fullInfoBlago.forEach(function (el) {
        var elView = "\n                    <li class=\"result__left-item\">\n                        <span class=\"result__left-item-name\">".concat(el[0], "</span>\n                        <span class=\"result__left-item-price\">").concat(el[1], " \u20BD</span>\n                   </li>\n            ");
        arrView.push(elView);
      });
    } else if (tabActive.textContent == "Для частных домов") {
      fullInfoPrivate.forEach(function (el) {
        var elView = "\n                    <li class=\"result__left-item\">\n                        <span class=\"result__left-item-name\">".concat(el[0], "</span>\n                        <span class=\"result__left-item-price\">").concat(el[1], " \u20BD</span>\n                   </li>\n            ");
        arrView.push(elView);
      });
    } else if (tabActive.textContent == "Для бизнеса и организаций") {
      fullInfoLegal.forEach(function (el) {
        var elView = "\n                    <li class=\"result__left-item\">\n                        <span class=\"result__left-item-name\">".concat(el[0], "</span>\n                        <span class=\"result__left-item-price\">").concat(el[1], " \u20BD</span>\n                   </li>\n            ");
        arrView.push(elView);
      });
    }

    var parent = document.querySelector(".result__left-list");
    parent.innerHTML = "";
    arrView.forEach(function (item) {
      parent.innerHTML += item;
    });
    document.querySelectorAll(".rate__catalog-link").forEach(function (tab) {
      tab.addEventListener("click", function () {
        var count = 0;

        if (tab.textContent == "Для квартир") {
          fullInfoBlago.forEach(function (priceCard) {
            count += +priceCard[1];
          });
        } else if (tab.textContent == "Для частных домов") {
          fullInfoPrivate.forEach(function (priceCard) {
            count += +priceCard[1];
          });
        } else if (tab.textContent == "Для бизнеса и организаций") {
          fullInfoLegal.forEach(function (priceCard) {
            count += +priceCard[1];
          });
        }

        document.querySelector(".result__right-item-price--month").textContent = "".concat(count, " \u20BD");

        if (priceNow.length >= 1) {
          var _wrapperPriceNow = document.createElement("ul");

          _wrapperPriceNow.classList.add("result__right-item");

          var _countNow = 0; // priceNow.forEach(itemNow => {
          //     countNow += +itemNow;

          if (tab.textContent == "Для квартир") {
            priceObj.blago.priceNew.forEach(function (priceCard) {
              _countNow += +priceCard;
            });
          } else if (tab.textContent == "Для частных домов") {
            priceObj.private.priceNew.forEach(function (priceCard) {
              _countNow += +priceCard;
            });
          } else if (tab.textContent == "Для бизнеса и организаций") {
            priceObj.legal.priceNew.forEach(function (priceCard) {
              _countNow += +priceCard;
            });
          } // })
          // wrapperPriceNow.innerHTML = `
          //     <span class="result__right-item-name">Единоразовая оплата:</span>
          //     <span class="result__right-item-price">${countNow} ₽</span>
          // `;


          var _str;

          if (window.innerWidth <= 375) {
            _str = "Одноразовая оплата:";
          } else {
            _str = "Единоразовая оплата:";
          }

          document.querySelector(".result__right-item--month").insertAdjacentHTML("beforeBegin", "\n                <li class='result__right-item result__right-item--now'>\n                    <span class=\"result__right-item-name\">".concat(_str, "</span>\n                    <span class=\"result__right-item-price\">").concat(_countNow, " \u20BD</span>\n                </li>\n            ")); // beforeBegin
        }

        var arrView = [];

        if (tab.textContent == "Для квартир") {
          fullInfoBlago.forEach(function (el) {
            var elView = "\n                    <li class=\"result__left-item\">\n                        <span class=\"result__left-item-name\">".concat(el[0], "</span>\n                        <span class=\"result__left-item-price\">").concat(el[1], " \u20BD</span>\n                   </li>\n            ");
            arrView.push(elView);
          });
        } else if (tab.textContent == "Для частных домов") {
          fullInfoPrivate.forEach(function (el) {
            var elView = "\n                    <li class=\"result__left-item\">\n                        <span class=\"result__left-item-name\">".concat(el[0], "</span>\n                        <span class=\"result__left-item-price\">").concat(el[1], " \u20BD</span>\n                   </li>\n            ");
            arrView.push(elView);
          });
        } else if (tab.textContent == "Для бизнеса и организаций") {
          fullInfoLegal.forEach(function (el) {
            var elView = "\n                    <li class=\"result__left-item\">\n                        <span class=\"result__left-item-name\">".concat(el[0], "</span>\n                        <span class=\"result__left-item-price\">").concat(el[1], " \u20BD</span>\n                   </li>\n            ");
            arrView.push(elView);
          });
        }

        var parent = document.querySelector(".result__left-list");
        parent.innerHTML = "";
        arrView.forEach(function (item) {
          parent.innerHTML += item;
        });
      });
    });
  }
});

function checkInput(item) {
  var sendForm = true;
  var inputItem = item[0]; // const elemnets = [];
  // for (let k; k<)

  inputItem.querySelectorAll("input").forEach(function (input) {
    clearInfoInput(input);
    var val = input.value;

    switch (input.getAttribute("name")) {
      case "name":
        {
          if (val.length < 2 || val.trim() === "" || /^[1-9]+$/.test(val)) {
            sendForm = false;
            createMistake(input, "Введите правильное имя");
          } else {
            createGoodResult(input);
          }

          break;
        }

      case "mail":
        {
          if (val.trim() == "") {
            createGoodResult(input);
          } else if (/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(val) === false) {
            sendForm = false;
            createMistake(input, "Введите правильную электронную почту");
          } else {
            createGoodResult(input);
          }

          break;
        }

      case "phone":
        {
          if (val.length < 11 || val.trim() === "" || /^[a-zA-z]+$/.test(val)) {
            sendForm = false;
            createMistake(input, "Некорректный номер телефона");
          } else {
            createGoodResult(input);
          }

          break;
        }

      case "adress":
        {
          if (val.length < 15 || val.trim === "") {
            sendForm = false;
            createMistake(input, "Введите корректный адресс");
          } else {
            createGoodResult(input);
          }

          break;
        }

      case "number-dog":
        {
          if (val.length > 16 || val.trim === "") {
            sendForm = false;
            createMistake(input, "Введите корректный номер договора");
          } else {
            createGoodResult(input);
          }

          break;
        }

      case "checkbox":
        {
          if (!input.checked) {
            sendForm = false;
            createMistake(input, "Необходимо подтверждение");
          }
        }
    }
  });
  return sendForm;

  function clearInfoInput(input) {
    if (input.classList.contains("badForm")) {
      input.classList.remove("badForm");
    }

    if (input.classList.contains("goodForm")) {
      input.classList.remove("goodForm");
    }

    if (input.closest("[data-modal-Inputwrap]") && input.closest("[data-modal-Inputwrap]").querySelector(".mistake")) {
      input.closest("[data-modal-Inputwrap]").querySelector(".mistake").remove();
    }
  }

  function createMistake(input, textMistake) {
    var mistake = document.createElement("div");
    mistake.classList.add("mistake");
    mistake.textContent = "".concat(textMistake); // input.insertAdjacentElement('beforeBegin', mistake);

    input.closest("[data-modal-Inputwrap]").insertAdjacentElement('afterBegin', mistake);
    input.classList.add("badForm");
  }

  function createGoodResult(input) {
    input.classList.add("goodForm");
  }
}

$("input[name='phone']").mask('+7 (999) 99-99-999', {
  autoclear: false
});
document.querySelectorAll("input[name='phone']").forEach(function (item) {
  item.addEventListener("input", function (e) {
    if (item.value[4] == 8) {
      item.value = item.value.slice(0, 4);
    }
  });
}); // export default checkInput;

window.addEventListener("DOMContentLoaded", function () {
  $('.gallery').each(function (i, e) {
    var item_top = $(this).find('.g-slider--top');
    var item_thumb = $(this).find('.g-slider--thumbs');
    var prev = $(this).find('.g-slider__btn--prev');
    var next = $(this).find('.g-slider__btn--next');
    var galleryThumbs = new Swiper(item_thumb, {
      spaceBetween: 15,
      slidesPerView: 4,
      freeMode: true,
      loop: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      breakpoints: {
        639: {
          spaceBetween: 12
        }
      }
    });
    var galleryTop = new Swiper(item_top, {
      loop: true,
      navigation: {
        nextEl: next,
        prevEl: prev
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });
  });
});

try {
  document.querySelector("#hamburger-icon").addEventListener("click", function (e) {
    var el = e.target.closest("#hamburger-icon");
    el.classList.toggle("active");

    if (el.classList.contains("active")) {
      document.querySelector(".header-down nav").classList.add("header__nav-active");
    } else {
      document.querySelector(".header-down nav").classList.remove("header__nav-active");
    }
  });
} catch (_unused) {} // transition: .4s all;


(function () {
  var youtube = document.querySelectorAll(".youtube");

  for (var i = 0; i < youtube.length; i++) {
    var screen = $(i).attr;
    var source = "https://img.youtube.com/vi/" + youtube[i].dataset.embed + "/sddefault.jpg";
    var image = new Image();
    image.src = source;
    image.addEventListener("load", function () {
      youtube[i].appendChild(image);
    }(i));
    youtube[i].addEventListener("click", function () {
      var iframe = document.createElement("iframe");
      iframe.setAttribute("frameborder", "0");
      iframe.setAttribute("allowfullscreen", "");
      iframe.setAttribute("src", "https://www.youtube.com/embed/" + this.dataset.embed + "?showinfo=1&autoplay=1&rel=0");
      this.innerHTML = "";
      this.appendChild(iframe);
    });
  }

  ;
})();

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("iframe").forEach(function (el) {
    if (el.hasAttribute("frameborder")) {
      el.removeAttribute("frameborder");
      el.style.border = "0px";
    }
  }); // document.querySelector("#menu-glavnoe-menyu").classList.add("header__nav-active")
});

try {
  document.querySelector("[data-input-loup]").addEventListener("mouseenter", function (e) {
    var parentEl = e.target.closest(".header-up__img");
    parentEl.querySelector(".header-up__form-input").classList.add("header-up__form-input--active");
  });
  document.querySelector("[data-input-loup]").addEventListener("mouseleave", function (e) {
    setTimeout(function () {
      document.querySelector(".header-up__form-input").classList.remove("header-up__form-input--active");
    }, 500);
  });
} catch (_unused2) {}

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".header-down__wrapper .menu__submenu").forEach(function (item) {
    var parent = item.closest(".header-down__wrapper");
    var link = parent.querySelector(".header-down__link");
    link.classList.add("no-click");
    link.addEventListener("click", function (e) {
      e.preventDefault();
    });
  });
});

try {
  var openModal = function openModal(btnsSelector, modalSelector) {
    var buttons = document.querySelectorAll(btnsSelector);
    var modal = document.querySelector(modalSelector);
    buttons.forEach(function (button) {
      button.addEventListener("click", function () {
        modal.classList.add("modal-active");
        document.querySelector("body").style.overflow = "hidden";

        if (button.getAttribute('data-request') !== null) {
          var inputCard = document.createElement("input");
          inputCard.setAttribute("type", "hidden");

          if (button.closest(".rate__content-card")) {
            var parent = button.closest(".rate__content-card");
            var nameCard = parent.querySelector(".rate__content-card-header").textContent.trim();
            var formModal = modal.querySelector(".modal__info-block");

            if (button.closest(".rate__content-item")) {
              var tarif = button.closest(".rate__content-item");

              if (tarif.querySelector("span.rate__checkbox")) {
                var tarifText = tarif.querySelector("span.rate__checkbox").textContent.trim();
                var tarifInp = document.createElement("input");
                tarifInp.setAttribute("type", "hidden");
                tarifInp.value = tarifText;
                tarifInp.name = "service";
                tarifInp.classList.add("delete");
                formModal.append(tarifInp);
              }
            }

            if (document.querySelector(".rate__catalog-link--active")) {
              var serviceName = document.querySelector(".rate__catalog-link--active").textContent.trim();
              var inputService = document.createElement("input");
              inputService.setAttribute("type", "hidden");
              inputService.value = serviceName;
              inputService.name = "category";
              inputService.classList.add("delete");
              formModal.append(inputService);
            }

            inputCard.value = nameCard;
            inputCard.name = "nameCard";
            inputCard.classList.add("delete");
            formModal.append(inputCard);
            var inputPrice = document.createElement("input");
            inputPrice.setAttribute("type", "hidden");
            inputPrice.name = "priceCard";
            inputPrice.classList.add("delete");

            if (parent.querySelector(".rate__content-card-price")) {
              inputPrice.value = parent.querySelector(".rate__content-card-price").textContent.trim();
            } else {
              inputPrice.value = 0;
            }

            formModal.append(inputPrice);
          }
        }

        if (button.closest(".result")) {
          var _formModal = modal.querySelector(".modal__info-block");

          var activeContent = document.querySelector(".rate__content--active");
          activeContent.querySelectorAll(".rate__content-galka").forEach(function (item) {
            if (window.getComputedStyle(item).display == "block") {
              var card = item.closest(".rate__content-card");
              var cardName = card.querySelector(".rate__content-card-header").textContent.trim();
              var cardPrice = "";

              if (card.querySelector(".rate__content-card-price")) {
                cardPrice = card.querySelector(".rate__content-card-price").textContent.trim();
              } else {
                cardPrice = "0 \u20BD";
              }

              var serviceWrap = card.closest(".rate__content-wrapper");

              var _serviceName = serviceWrap.querySelector("div.checkbox__text").textContent.trim();

              var content = serviceWrap.closest(".rate__content").getAttribute("data-maincontent");
              var catalogName = document.querySelector("[data-maintab=\"".concat(content, "\"]")).textContent.trim();
              var inpCardName = document.createElement("input");
              var inpServiceName = document.createElement("input");
              var inpCatalogName = document.createElement("input");
              var inpCardPrice = document.createElement("input");
              inpCardName.setAttribute("type", "hidden");
              inpCardName.value = cardName;
              inpCardName.name = "nameCard";
              inpCardName.classList.add("delete");
              inpServiceName.setAttribute("type", "hidden");
              inpServiceName.value = _serviceName;
              inpServiceName.name = "service";
              inpServiceName.classList.add("delete");
              inpCatalogName.setAttribute("type", "hidden");
              inpCatalogName.value = catalogName;
              inpCatalogName.name = "category";
              inpCatalogName.classList.add("delete");
              inpCardPrice.setAttribute("type", "hidden");
              inpCardPrice.value = cardPrice;
              inpCardPrice.name = "priceCard";
              inpCardPrice.classList.add("delete");

              _formModal.append(inpCatalogName);

              _formModal.append(inpServiceName);

              _formModal.append(inpCardName);

              _formModal.append(inpCardPrice);
            }
          });
        }
      });
    });
    modal.addEventListener("mousedown", function (e) {
      if (e.target.classList.contains("modal-active") || e.target.classList.contains("modal__close")) {
        modal.classList.remove("modal-active");
        document.querySelector("body").style.overflow = "";

        if (modal.querySelector(".delete")) {
          modal.querySelectorAll(".delete").forEach(function (el) {
            el.remove();
          });
        }
      }
    });
  };

  try {
    openModal('[data-application]', '[data-modal]');
  } catch (_unused3) {}

  try {
    openModal('[data-request]', '[data-modal-request]');
  } catch (_unused4) {}

  try {
    openModal("[data-addQuestion]", "[data-modal-question]");
  } catch (_unused5) {}
} catch (_unused6) {}

try {
  var soundVolume = true;
  document.querySelectorAll("[data-radioBtn]").forEach(function (item) {
    item.addEventListener("click", function (e) {
      if (item.classList.contains("radio__pause")) {
        if (soundVolume) {
          document.getElementById('radio_player').volume = 0.5;
          soundVolume = false;
        }

        item.classList.remove("radio-btn--active");
        document.querySelector(".radio__play").classList.add("radio-btn--active");
        console.log(document.getElementById('radio_player'));
        document.getElementById('radio_player').play();
      } else {
        item.classList.remove("radio-btn--active");
        document.querySelector(".radio__pause").classList.add("radio-btn--active");
        document.getElementById('radio_player').pause();
      }
    });
  });
  var sound = document.querySelector("[data-sound]");
  sound.addEventListener("click", function () {
    var parentMenu = sound.closest(".radio__menu");
    var parent = sound.closest(".sound");
    var wrapper = parent.querySelector(".sound__wrapper");
    var regular = parent.querySelector(".radio__sound-regular");
    var range = document.querySelector(".radio__range");

    if (!parent.classList.contains("sound--active")) {
      parent.classList.add("sound--active");
      regular.classList.add("radio__sound-regular--active");
      wrapper.classList.add("sound__wrapper--active");

      if (window.innerWidth >= 1236) {
        range.style.width = "64%";
        parentMenu.style.width = "15%";
      } else {
        parentMenu.style.width = "25%";
      }
    } else {
      parent.classList.remove("sound--active");
      regular.classList.remove("radio__sound-regular--active");
      wrapper.classList.remove("sound__wrapper--active");

      if (window.innerWidth >= 1236) {
        range.style.width = "66%";
        parentMenu.style.width = "7%";
      } else {
        parentMenu.style.width = "7%";
      }
    } // parent.classList.add("sound--active")

  });
  var userAgent = navigator.userAgent.toLowerCase();
  var InternetExplorer = false;
  if (/mozilla/.test(userAgent) && !/firefox/.test(userAgent) && !/chrome/.test(userAgent) && !/safari/.test(userAgent) && !/opera/.test(userAgent) || /msie/.test(userAgent)) InternetExplorer = true;

  if (!InternetExplorer) {
    document.querySelector(".radio__sound-regular").addEventListener("input", function (e) {
      var val;

      if (e.target.value == 100) {
        val = 1;
      } else if (e.target.value <= 9) {
        val = "0.0".concat(e.target.value);
      } else if (e.target.value === 0) {
        val = 0;
      } else {
        val = "0.".concat(e.target.value);
      }

      document.getElementById('radio_player').volume = val;
    });
  } else {
    document.querySelector(".radio__sound-regular").addEventListener("change", function (e) {
      var val;

      if (e.target.value == 100) {
        val = 1;
      } else if (e.target.value <= 9) {
        val = "0.0".concat(e.target.value);
      } else if (e.target.value === 0) {
        val = 0;
      } else {
        val = "0.".concat(e.target.value);
      }

      document.getElementById('radio_player').volume = val;
    });
  }

  var footerDown = document.querySelector(".footer__down");

  if (window.outerWidth <= 1100) {
    footerDown.addEventListener("click", function (e) {
      var miniRadio = footerDown.querySelector(".footer__down-mobile-container");
      var mainRadio = footerDown.querySelector(".footer__down-desc-container");

      if (e.target.closest(".radio__pause") || e.target.closest(".radio__play") || e.target.closest(".radio__sound")) {} else {
        if (miniRadio.classList.contains("footer__down-mobile-container--active")) {
          miniRadio.classList.remove("footer__down-mobile-container--active");
          mainRadio.classList.add("footer__down-desc-container--active");
        } else {
          miniRadio.classList.add("footer__down-mobile-container--active");
          mainRadio.classList.remove("footer__down-desc-container--active");
        }
      }
    });
  } else {
    footerDown.addEventListener("mousemove", function () {
      var miniRadio = footerDown.querySelector(".footer__down-mobile-container");
      var mainRadio = footerDown.querySelector(".footer__down-desc-container");
      miniRadio.classList.remove("footer__down-mobile-container--active");
      mainRadio.classList.add("footer__down-desc-container--active");
    });
    footerDown.addEventListener("mouseleave", function () {
      var miniRadio = footerDown.querySelector(".footer__down-mobile-container");
      var mainRadio = footerDown.querySelector(".footer__down-desc-container");
      miniRadio.classList.add("footer__down-mobile-container--active");
      mainRadio.classList.remove("footer__down-desc-container--active");
    });
  }
} catch (_unused7) {}

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".rate__content-item").forEach(function (item) {
    if (item.querySelectorAll(".rate__content-card").length === 0) {
      item.remove();
    }
  });
  document.querySelectorAll(".rate__content").forEach(function (item) {
    if (!item.querySelector(".rate__content-item")) {
      var id = item.getAttribute("data-maincontent");

      if (document.querySelector("[data-maintab=\"".concat(id, "\"]"))) {
        document.querySelector("[data-maintab=\"".concat(id, "\"]")).remove();
      }
    }
  });

  if (!document.querySelector(".rate--constructor")) {
    document.querySelectorAll("[data-maintab]").forEach(function (block, i) {
      block.classList.remove("rate__catalog-link--active");

      if (i === 0) {
        var id = block.getAttribute("data-maintab");
        document.querySelector("[data-maincontent=\"".concat(id, "\"]")).classList.add("rate__content--active");
        block.classList.add("rate__catalog-link--active");
      }
    });
  }
});
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
      document.querySelector(".header-down-actiove-mobile").classList.remove("header-down-actiove-mobile");
    }

    if (document.querySelectorAll(".header-down__list-mobile")) {
      document.querySelectorAll(".header-down__list-mobile").forEach(function (el) {
        if (el.classList.contains("header-down__list-mobile")) {
          el.classList.remove("header-down__list-mobile");
        }

        if (el.classList.contains("header-down__list-block")) {
          el.classList.remove("header-down__list-block");
        }

        if (el.classList.contains("header-down__list-fadeIn")) {
          el.classList.remove("header-down__list-fadeIn");
        }
      });
    }
  }
}); // import checkInput from "./form";

console.log(window.location.href);

if (window.location.href.indexOf("t-tk") !== -1) {
  var element = document.createElement('script');
  element.src = 'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit';
  element.classList.add("google-script");
  element.async = true;
  document.head.appendChild(element);
} // setTimeout(() => {
//   var oneCap;
//   var twoCap;
// }, 4000);


var oneCap;
var twoCap;

function onloadCallback() {
  setTimeout(function () {
    console.log("работает");

    if (document.querySelector("#capcha1")) {
      oneCap = grecaptcha.render('capcha1', {
        'sitekey': '6LcprRkbAAAAAEBQCjQ_te7OhFSjE22sqgGpafGz'
      });
    }

    if (document.querySelector("#capcha2")) {
      twoCap = grecaptcha.render('capcha2', {
        'sitekey': '6LcprRkbAAAAAEBQCjQ_te7OhFSjE22sqgGpafGz'
      });
    }
  }, 4000);
}

function sendForm(item) {
  $(item).on('submit', function (e) {
    e.preventDefault();

    if ($(this).children("#recaptchaError")) {
      $(this).children("#recaptchaError").text('');
    } // alert(myAjax.ajarl);


    var capHave = false;

    if ($(this).children(".g-recaptcha").length !== 0) {
      capHave = true;
    }

    var captcha;

    if (capHave === true) {
      // console.log($(this).children(".g-recaptcha")[0].attr('id'))
      console.log($(this).children(".g-recaptcha").attr('id'));

      switch ($(this).children(".g-recaptcha").attr('id')) {
        case "capcha2":
          captcha = grecaptcha.getResponse(twoCap);
          break;

        default:
          captcha = grecaptcha.getResponse();
      } // captcha = grecaptcha.getResponse($(this).children(".g-recaptcha").attr('id'));


      if (!captcha.length) {
        // Выводим сообщение об ошибке
        $('#recaptchaError').text('* Вы не прошли проверку "Я не робот"');
      } else {
        // получаем элемент, содержащий капчу
        $('#recaptchaError').text('');
      }
    }

    if (checkInput($(this)) && (capHave === false || captcha.length)) {
      var form = $(this).serializeArray();
      var action = $(this).attr('action');
      $.post(myajax.url, {
        form: form,
        action: action
      }, function (data) {
        for (var i = 0; i < $('form').length; i++) {
          $('form')[i].reset();
        }

        if (document.querySelector(".modal-active")) {
          document.querySelector(".modal-active").classList.remove("modal-active");
        }

        if (document.querySelector(".delete")) {
          document.querySelectorAll(".delete").forEach(function (el) {
            el.remove();
          });
        }

        document.querySelector(".modal--send").classList.add("modal-active");
        setTimeout(function () {
          if (document.querySelector(".modal-active")) {
            document.querySelector(".modal-active").classList.remove("modal-active");
            document.querySelector("body").style.overflow = "";
          }
        }, 4000);
      });
    }
  });
}

sendForm(".block-question__form");
sendForm(".modal__form--zayvka");
sendForm(".modal__form--contact");
sendForm(".white-form__form");

try {
  // if (document.querySelector(".button--all-rate")) {
  //     if (document.querySelector(".rate__catalog-link--active")) {
  //         let el = document.querySelector(".rate__catalog-link--active");
  //          let url = el.getAttribute("data-url");
  //          document.querySelector(".button--all-rate").setAttribute("href", url)
  //     }
  // }
  document.addEventListener("DOMContentLoaded", function () {
    function tabs(btnSelector) {
      var contentSelector = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";
      var activeClassBtn = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "";
      var activeClassContent = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : "";
      var btns = document.querySelectorAll(btnSelector);
      var contents = document.querySelectorAll("[".concat(contentSelector, "]"));
      btns.forEach(function (btn) {
        btn.addEventListener("click", function (e) {
          var target = e.target;
          btns.forEach(function (item, i) {
            item.classList.remove(activeClassBtn);

            if (item === target) {
              item.classList.add(activeClassBtn);
            }
          });
          contents.forEach(function (item, i) {
            item.classList.remove(activeClassContent);
          });
          var selectorWithoutBracket = btnSelector.slice(1, -1);
          var id = target.getAttribute(selectorWithoutBracket);
          document.querySelector("[".concat(contentSelector, "=\"").concat(id, "\"]")).classList.add(activeClassContent);
        });
      });
    }

    tabs("[data-mainTab]", "data-mainContent", "rate__catalog-link--active", "rate__content--active");
  });
} catch (_unused8) {} //TAБЫ


try {
  var contents = document.querySelectorAll(".page [data-content]").forEach(function (content, i) {
    content.classList.remove("page__content--active");

    if (i === 0) {
      content.classList.add("page__content--active");
    }
  });

  if (window.outerWidth <= 976) {
    var tab = document.querySelector(".page__right--tabs");
    tab.addEventListener("click", function (e) {
      var target;

      if (e.target.closest(".page__right-item--active")) {
        target = e.target.closest(".page__right-item--active");
      }

      if (target.classList.contains("page__right-item--active")) {
        if (target.closest(".page__right-list--active")) {
          target.closest("ul").classList.remove("page__right-list--active");
          target.closest(".page__right--tabs").classList.remove("page__right--tabs-active");
        } else {
          target.closest(".page__right--tabs").classList.add("page__right--tabs-active");
          target.closest("ul").classList.add("page__right-list--active");
        }
      }
    });
  }

  var btns = document.querySelectorAll(".page [data-tab]").forEach(function (btn, i) {
    btn.classList.remove("page__right-item--active");

    if (i === 0) {
      btn.classList.add("page__right-item--active");
    }

    btn.addEventListener("click", function (e) {
      var idBtn = btn.getAttribute("data-tab");
      var contentWithId = document.querySelector("[data-content='".concat(idBtn, "']"));
      document.querySelectorAll(".page__right-item--active").forEach(function (btnOld, index) {
        btnOld.classList.remove("page__right-item--active");
      });
      document.querySelectorAll(".page__content--active").forEach(function (contentOld, index) {
        contentOld.classList.remove("page__content--active");
      });
      contentWithId.classList.add("page__content--active");
      btn.classList.add("page__right-item--active");
    });
  });
} catch (_unused9) {} // $(document).on("click", ".page__inner .page__right-list div", function () {
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
// $(document).ready(function () {


if ($('#preloader')) {
  var img_load = function img_load() {
    progress += percent;
    loadedImg++;

    if (progress >= 100 || loadedImg == imagesCount) {
      preloader.delay(200).fadeOut('slow'); // qBody.css('overflow', '');

      clearInterval(time);
    }

    $(".dws-progress-bar").circularProgress('animate', progress, 500);
  };

  var preloader = $('#preloader');
  var imagesCount = $('img').length;
  var percent = 100 / imagesCount;
  var progress = 0;
  var loadedImg = 0; // if (document.querySelector("#preloader")) {
  // }

  document.querySelector("#preloader").style.display = "block";
  var time = setInterval(function () {
    count++;
    document.querySelector("#preloader").style.backgroundPosition = "-".concat(count, "px");
  }, 7);
  $(".dws-progress-bar").circularProgress({
    color: "#D22730",
    line_width: 10,
    height: "110px",
    width: "110px",
    percent: 0,
    counter_clockwise: false,
    starting_position: 200
  }).circularProgress('animate', percent, 1000);

  for (var i = 0; i < imagesCount; i++) {
    // создаем клон изображений
    var img_copy = new Image();
    img_copy.src = document.images[i].src;
    img_copy.onload = img_load;
    img_copy.onerror = img_load;
  }

  var count = 0;
} // });