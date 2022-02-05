document.addEventListener("DOMContentLoaded",() => {
    let elements = [];
document.querySelectorAll(".rate__content-card-add").forEach(btn => {
    btn.addEventListener("click", () => {
        addElement(btn);

    })
})




let fullInfoBlago = []
let selectedBlago = []
let fullInfoPrivate = []
let selectedPrivate = []
let fullInfoLegal = []
let selectedLegal = []


if (document.querySelector("[data-selected]")) {
    addElement(document.querySelector("[data-selected]"))
}


document.querySelectorAll("[data-checkrate]").forEach(item => {
    item.addEventListener("change",() => {
        if (item.checked) {

        } else {
            if (document.querySelector(".result__right-list .result__right-item--now")) {
                document.querySelector(".result__right-list .result__right-item--now").remove();
            }
            // let nameCategoryCardMoment;
            const nameCategoryCard = item.closest(".rate__content").getAttribute("data-maincontent")
            let nameCategoryCardMoment
            switch (+nameCategoryCard) {
                case 0: {
                    nameCategoryCardMoment = "Для квартир"
                    break
                }
                case 1: {
                    nameCategoryCardMoment = "Для частных домов"
                    break
                }
                case 2: {
                    nameCategoryCardMoment = "Для бизнеса и организаций"
                    break
                }
        
            }
            const checkedWrap = item.closest(".rate__content-wrapper").querySelectorAll(".rate__content-card--constructor")
            checkedWrap.forEach(card => {
                const nameCard = card.getAttribute("data-card-constructor-name")
                const priceCard = card.getAttribute("data-card-constructor-price")
                if (nameCategoryCardMoment == "Для квартир") {
                    let arrCheck = [];
                    let withoutEl = []
                    fullInfoBlago.forEach(element => {
                        if (element[0] !== nameCard) {
                            arrCheck.push(element)
                        }
                    })
                    selectedBlago.forEach(item => {
                        if (item !== nameCard) {
                            // //consol(item)
                            withoutEl.push(item)
                        }
                    })
                    selectedBlago = withoutEl
                    fullInfoBlago = arrCheck
                } else if (nameCategoryCardMoment == "Для частных домов") {
                    let arrCheck = [];
                    let withoutEl = []
                    fullInfoPrivate.forEach(element => {
                        if (element[0] !== nameCard) {
                            arrCheck.push(element)
                        }
                    })
                    selectedPrivate.forEach(item => {
                        if (item !== nameCard) {
                            // //consol(item)
                            withoutEl.push(item)
                        }
                    })
                    //consol(arrCheck)
                    selectedPrivate = withoutEl
                    //consol(selectedPrivate)
                    fullInfoPrivate = arrCheck
                    //consol(fullInfoPrivate)
                } else if (nameCategoryCardMoment == "Для бизнеса и организаций") {
                    let arrCheck = [];
                    let withoutEl = []
                    fullInfoLegal.forEach(element => {
                        if (element[0] !== nameCard) {
                            arrCheck.push(element)
                        }
                    })
                    selectedLegal.forEach(item => {
                        if (item !== nameCard) {
                            // //consol(item)
                            withoutEl.push(item)
                        }
                    })
                    selectedLegal = withoutEl
                    fullInfoLegal = arrCheck
                }
            })
            // })


            if (elements.length >= 1) {
                let chet = 0;
                let parentSel = item.parentElement.parentElement.getAttribute("class")
                elements.forEach((btn, i) => {
                    if (i === 0) {
                        chet++;
                    }
                    if (btn.closest(`.${parentSel}`).querySelector("[type='checkbox']") === item) {
                        if (chet === 1) {
                            item.parentElement.parentElement.querySelectorAll(".rate__content-plus").forEach(plus => {
                                plus.style.display = "block"
                            })
                            item.parentElement.parentElement.querySelectorAll(".rate__content-galka").forEach(gal => {
                                gal.style.display = "none"
                            })
                            item.parentElement.parentElement.querySelectorAll(".rate__content-card-add").forEach(wrap => {
                                wrap.classList.add("rate__content-card-add--active")
                            })
                            item.parentElement.parentElement.querySelectorAll(".rate__content-card--constructor-no-active").forEach(block => {
                                block.classList.remove("rate__content-card--constructor-no-active")
                            })
                            item.parentElement.parentElement.querySelectorAll("button").forEach(btn => {
                                btn.removeAttribute("disabled", false)
                            })

                            
                            chet++;
                        }
                    }
                })
                let arr = elements.filter(el =>el.closest(`.${parentSel}`).querySelector("[type='checkbox']") !== item)
                elements = arr;
                
                const price = [];
                const priceNow = [];
                
             
                 elements.forEach(item => {
                     let card
                     
                    card = item.closest("[data-card-constructor]");
                    if (card.getAttribute("data-card-constructor-price").length > 10) {
                        card.setAttribute("data-card-constructor-price", 0)
                    }
            
                    if (card.getAttribute("data-card-constructor-price") === null) {
                        card.setAttribute("data-card-constructor-price", "month")
                    }
                    const parentCardName = card.getAttribute("data-card-constructor-name")
        let cardPrice = card.getAttribute("data-card-constructor-price");
        let cardPay =  card.getAttribute("data-card-constructor-pay");
        //consol(fullInfoBlago)
        //consol(fullInfoPrivate)
        //consol(fullInfoLegal)
        function addPrice(typeCard, fullInfo , selectedItems,price, nameCard, card, category) {
            const id = card.closest(".rate__content").getAttribute("data-maincontent")
            let nameCategory
            if (id == 0) {
                nameCategory = "Для квартир"
            } else if (id == 1) {
                nameCategory = "Для частных домов"
            } else if (id == 2) {
                nameCategory = "Для бизнеса и организаций"
            }
            if (typeCard === "month") {
                if (selectedItems.indexOf(nameCard) == -1 && nameCategory == category) {
                    // //consol(nameCard)
                    selectedItems.push(nameCard)
                    fullInfo.push([nameCard, price, typeCard])
                }

            } else if (typeCard === "now") {
                if (selectProd.indexOf(nameCard) == -1 && nameCategory == category) { 
                    fullInfo.push([nameCard, price, typeCard])
                }
            }
        }
        const nameActiveCategory = document.querySelector(".rate__catalog-link--active").textContent
        if (nameActiveCategory == "Для квартир" && nameActiveCategory == nameCategoryCardMoment && !item.classList.contains("rate__content-card-add--active")) {
            
            addPrice(cardPay, fullInfoBlago, selectedBlago, cardPrice, parentCardName, card, "Для квартир")
        } else if (nameActiveCategory == "Для частных домов" && nameActiveCategory == nameCategoryCardMoment && !item.classList.contains("rate__content-card-add--active")) {
            addPrice(cardPay, fullInfoPrivate, selectedPrivate ,cardPrice, parentCardName, card, "Для частных домов")
        } else if (nameActiveCategory == "Для бизнеса и организаций" && nameActiveCategory == nameCategoryCardMoment && !item.classList.contains("rate__content-card-add--active") ) {
            addPrice(cardPay, fullInfoLegal, selectedLegal ,cardPrice, parentCardName, card, "Для бизнеса и организаций")
        }
                 })
                 let count = 0;
                //  price.forEach(priceCard => {
                //      count += +priceCard;
                //  })
                if (nameCategoryCardMoment == "Для квартир") {
                    fullInfoBlago.forEach(price => {
                        count += +price[1]
                    })
                } else if (nameCategoryCardMoment == "Для частных домов") {
                    fullInfoPrivate.forEach(price => {
                        count += +price[1]
                    })
                }
                if (nameCategoryCardMoment == "Для бизнеса и организаций") {
                    fullInfoLegal.forEach(price => {
                        count += +price[1]
                    })
                }
                 document.querySelector(".result__right-item-price--month").textContent = `${count} ₽`;
                //  let priceNewCount = 
                //  if (priceNow.length >= 1) {
                    const tabActive = document.querySelector(".rate__catalog-link--active")
                    let countNow = 0
                    if (tabActive.textContent == "Для квартир") {
                        fullInfoBlago.forEach(itemNow => {
                            if (item[2] == "now") {
                                countNow += +itemNow;
                            }
                        })
                    }
                     const wrapperPriceNow = document.createElement("ul");
                     wrapperPriceNow.classList.add("result__right-item");
                     // wrapperPriceNow.innerHTML = `
                     //     <span class="result__right-item-name">Единоразовая оплата:</span>
                     //     <span class="result__right-item-price">${countNow} ₽</span>
                     // `;
                     let str;
                     if (window.innerWidth <= 375) {
                        str = "Одноразовая оплата:"
                     } else {
                         str = "Единоразовая оплата:"
                     }
                     document.querySelector(".result__right-item--month").insertAdjacentHTML("beforeBegin",
                     `
                     <li class='result__right-item result__right-item--now'>
                         <span class="result__right-item-name">${str}</span>
                         <span class="result__right-item-price">${countNow} ₽</span>
                     </li>
                 `)
                     // beforeBegin
                //  }
             
                 let arrView = []
                 if (tabActive.textContent == "Для квартир") {
                    fullInfoBlago.forEach(el => {
                         const elView = `
                                 <li class="result__left-item">
                                     <span class="result__left-item-name">${el[0]}</span>
                                     <span class="result__left-item-price">${el[1]} ₽</span>
                                </li>
                         `
                         arrView.push(elView)
                     })
                 } else if (tabActive.textContent == "Для частных домов") {
                     fullInfoPrivate.forEach(el => {
                         const elView = `
                                 <li class="result__left-item">
                                     <span class="result__left-item-name">${el[0]}</span>
                                     <span class="result__left-item-price">${el[1]} ₽</span>
                                </li>
                         `
                         arrView.push(elView)
                     })
                 } else if (tabActive.textContent == "Для бизнеса и организаций") {
                     fullInfoLegal.forEach(el => {
                         const elView = `
                                 <li class="result__left-item">
                                     <span class="result__left-item-name">${el[0]}</span>
                                     <span class="result__left-item-price">${el[1]} ₽</span>
                                </li>
                         `
                         arrView.push(elView)
                     })
                 }

                 const parent = document.querySelector(".result__left-list");
                 parent.innerHTML = "";
                 arrView.forEach(item => {
                     parent.innerHTML += item;
                 })

            }
        }


        

    })
})

function addElement(btn) {
    const price = [];
    const priceNow = [];
    const parentBtn = btn.closest(".rate__content-card--constructor")
    if (!btn.classList.contains("rate__content-card-add")) {
        btn = btn.querySelector(".rate__content-card-add")
    }
    if (document.querySelector(".result__right-list .result__right-item--now")) {
        document.querySelector(".result__right-list .result__right-item--now").remove();
    }
   if (btn.classList.contains("rate__content-card-add--active")) {
       if (btn.classList.contains("rate__content-card-add")) {
        const parentWrap = btn.closest(".rate__content-items.rate__content-items--constructor ")
        const allCardInWrap = parentWrap.querySelectorAll(".rate__content-card.rate__content-card--constructor")
        const nameTarif = parentWrap.closest(".rate__content-wrapper").querySelector(".checkbox__text").textContent
        if (nameTarif !== "Тематическое телевиденье") {
            allCardInWrap.forEach(item => {
                if (item !== parentBtn) {
                    item.classList.add("rate__content-card--constructor-no-active")
                    item.querySelector("button").setAttribute("disabled", true)
                }
            })
        }
        btn.querySelector(".rate__content-plus").style.display = "none"
        btn.querySelector(".rate__content-galka").style.display = "block"
       }
        elements.push(btn);
        btn.classList.remove("rate__content-card-add--active")

   } else {
        if (btn.classList.contains("rate__content-card-add")) {
            const parentWrap = btn.closest(".rate__content-items.rate__content-items--constructor ")

            const allCardInWrap = parentWrap.querySelectorAll(".rate__content-card.rate__content-card--constructor")
            const nameTarif = parentWrap.closest(".rate__content-wrapper").querySelector(".checkbox__text").textContent
            if (nameTarif !== "Тематическое телевиденье") {
                allCardInWrap.forEach(item => {
                    if (item !== parentBtn) {
                        item.classList.remove("rate__content-card--constructor-no-active")
                        item.querySelector("button").removeAttribute("disabled")
                    }
                })
            }
            btn.querySelector(".rate__content-plus").style.display = "block"
            btn.querySelector(".rate__content-galka").style.display = "none"
        }

        elements = elements.filter(item => item !== btn)
        btn.classList.add("rate__content-card-add--active")
   }

   const activeCategoryOne = btn.closest(".rate__content ").getAttribute("data-maincontent")
        let activeCategoryOneName
        switch (+activeCategoryOne) {
            case 0: {
                activeCategoryOneName = "Для квартир"
                break
            }
            case 1: {
                activeCategoryOneName = "Для частных домов"
                break
            }
            case 2: {
                activeCategoryOneName = "Для бизнеса и организаций"
                break
            }

        }
        const nameCardMoment = btn.closest(".rate__content-card").getAttribute("data-card-constructor-name")
        const priceCardMoment = btn.closest(".rate__content-card").getAttribute("data-card-constructor-price")
        if (activeCategoryOneName == "Для квартир") {
            let arrCheck = [];
            let withoutEl = []
            fullInfoBlago.forEach(item => {
                if (item[0] !== nameCardMoment && item[1] !== priceCardMoment) {
                    arrCheck.push(item)
                }
            })

            selectedBlago.forEach(item => {
                if (item !== nameCardMoment) {
                    // //consol(item)
                    withoutEl.push(item)
                }
            })

            fullInfoBlago = arrCheck
            selectedBlago = withoutEl
        } else if (activeCategoryOneName == "Для частных домов") {
            let arrCheck = [];
            let withoutEl = []
            fullInfoPrivate.forEach(item => {
                if (item[0] !== nameCardMoment && item[1] !== priceCardMoment) {
                    arrCheck.push(item)
                }
            })

            selectedPrivate.forEach(item => {
                if (item !== nameCardMoment) {
                    // //consol(item)
                    withoutEl.push(item)
                }
            })

            fullInfoPrivate = arrCheck
            selectedPrivate = withoutEl


        } else if (activeCategoryOneName == "Для бизнеса и организаций") {
            let arrCheck = [];
            let withoutEl = []
            fullInfoLegal.forEach(item => {
                if (item[0] !== nameCardMoment && item[1] !== priceCardMoment) {
                    arrCheck.push(item)
                }
            })

            selectedLegal.forEach(item => {
                if (item !== nameCardMoment) {
                    // //consol(item)
                    withoutEl.push(item)
                }
            })

            fullInfoLegal = arrCheck
            selectedLegal = withoutEl

        }

   let card;
   if (btn.classList.contains("rate__content-card-add")) {
    card = btn.closest("[data-card-constructor]");
   } else {
       card = btn;
   }
   const cardPay =  card.getAttribute("data-card-constructor-pay");

    elements.forEach(item => {
        let card
        const nameCategoryCard = item.closest(".rate__content").getAttribute("data-maincontent")
        let nameCategoryCardMoment
        switch (+nameCategoryCard) {
            case 0: {
                nameCategoryCardMoment = "Для квартир"
                break
            }
            case 1: {
                nameCategoryCardMoment = "Для частных домов"
                break
            }
            case 2: {
                nameCategoryCardMoment = "Для бизнеса и организаций"
                break
            }
    
        }
        if (item.classList.contains("rate__content-card-add")) {
            card = item.closest("[data-card-constructor]");
        } else {
            card = item;
        }
        if (card.getAttribute("data-card-constructor-price").length > 10) {
            card.setAttribute("data-card-constructor-price", 0)
        }

        if (card.getAttribute("data-card-constructor-price") === null) {
            card.setAttribute("data-card-constructor-price", "month")
        }
        const parentCardName = card.getAttribute("data-card-constructor-name")
        let cardPrice = card.getAttribute("data-card-constructor-price");
        let cardPay =  card.getAttribute("data-card-constructor-pay");
        // //consol(fullInfoBlago)
        function addPrice(typeCard, fullInfo , selectedItems,price, nameCard) {
            if (typeCard === "month") {
                if (selectedItems.indexOf(nameCard) == -1) {
                    selectedItems.push(nameCard)
                    fullInfo.push([nameCard, price, typeCard])
                }

            } else if (typeCard === "now") {
                if (selectProd.indexOf(nameCard) == -1) { 
                    selectProd.push(nameCard)
                    arrNow.push(price);
                    fullInfo.push([nameCard, price])
                }
            }
        }
        const nameActiveCategory = document.querySelector(".rate__catalog-link--active").textContent
        if (nameActiveCategory == "Для квартир" && nameActiveCategory == nameCategoryCardMoment && !btn.classList.contains("rate__content-card-add--active")) {
            addPrice(cardPay, fullInfoBlago, selectedBlago, cardPrice, parentCardName)
        } else if (nameActiveCategory == "Для частных домов" && nameActiveCategory == nameCategoryCardMoment && !btn.classList.contains("rate__content-card-add--active")) {
            addPrice(cardPay, fullInfoPrivate, selectedPrivate ,cardPrice, parentCardName)
        } else if (nameActiveCategory == "Для бизнеса и организаций" && nameActiveCategory == nameCategoryCardMoment && !btn.classList.contains("rate__content-card-add--active")) {
            addPrice(cardPay, fullInfoLegal, selectedLegal ,cardPrice, parentCardName)
        }
    })

    
    const tabActive = document.querySelector(".rate__catalog-link--active")
    let count = 0;
    if (tabActive.textContent == "Для квартир") {
        fullInfoBlago.forEach(priceCard => {
            count += +priceCard[1];
        })
    } else if (tabActive.textContent == "Для частных домов") {
        fullInfoPrivate.forEach(priceCard => {
            count += +priceCard[1];
        })
    } else if (tabActive.textContent == "Для бизнеса и организаций") {
        fullInfoLegal.forEach(priceCard => {
            count += +priceCard[1];
        })
    }


    document.querySelector(".result__right-item-price--month").textContent = `${count} ₽`;
    if (priceNow.length >= 1) {
        const wrapperPriceNow = document.createElement("ul");
        wrapperPriceNow.classList.add("result__right-item");
        let countNow = 0
        if (tabActive.textContent == "Для квартир") {
            priceObj.blago.priceNew.forEach(priceCard => {
                countNow += +priceCard;
            })
        } else if (tabActive.textContent == "Для частных домов") {
            priceObj.private.priceNew.forEach(priceCard => {
                countNow += +priceCard;
            })
        } else if (tabActive.textContent == "Для бизнеса и организаций") {
            priceObj.legal.priceNew.forEach(priceCard => {
                countNow += +priceCard;
            })
        }
        // wrapperPriceNow.innerHTML = `
        //     <span class="result__right-item-name">Единоразовая оплата:</span>
        //     <span class="result__right-item-price">${countNow} ₽</span>
        // `;
        let str;
        if (window.innerWidth <= 375) {
            str = "Одноразовая оплата:"
        } else {
            str = "Единоразовая оплата:"
        }
        document.querySelector(".result__right-item--month").insertAdjacentHTML("beforeBegin",
        `
        <li class='result__right-item result__right-item--now'>
            <span class="result__right-item-name">${str}</span>
            <span class="result__right-item-price">${countNow} ₽</span>
        </li>
    `)
        // beforeBegin
    }


    // const newElements = elements.map(item=> {
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

    let arrView = []
    if (tabActive.textContent == "Для квартир") {
        fullInfoBlago.forEach(el => {
            const elView = `
                    <li class="result__left-item">
                        <span class="result__left-item-name">${el[0]}</span>
                        <span class="result__left-item-price">${el[1]} ₽</span>
                   </li>
            `
            arrView.push(elView)
        })
    } else if (tabActive.textContent == "Для частных домов") {
        fullInfoPrivate.forEach(el => {
            const elView = `
                    <li class="result__left-item">
                        <span class="result__left-item-name">${el[0]}</span>
                        <span class="result__left-item-price">${el[1]} ₽</span>
                   </li>
            `
            arrView.push(elView)
        })
    } else if (tabActive.textContent == "Для бизнеса и организаций") {
        fullInfoLegal.forEach(el => {
            const elView = `
                    <li class="result__left-item">
                        <span class="result__left-item-name">${el[0]}</span>
                        <span class="result__left-item-price">${el[1]} ₽</span>
                   </li>
            `
            arrView.push(elView)
        })
    }

    const parent = document.querySelector(".result__left-list");
    parent.innerHTML = "";
    arrView.forEach(item => {
        parent.innerHTML += item;
    })


        

    document.querySelectorAll(".rate__catalog-link").forEach(tab => {
        tab.addEventListener("click", () => {
            let count = 0;
            if (tab.textContent == "Для квартир") {
                fullInfoBlago.forEach(priceCard => {
                    count += +priceCard[1];
                })
            } else if (tab.textContent == "Для частных домов") {
                fullInfoPrivate.forEach(priceCard => {
                    count += +priceCard[1];
                })
            } else if (tab.textContent == "Для бизнеса и организаций") {
                fullInfoLegal.forEach(priceCard => {
                    count += +priceCard[1];
                })
            }


            document.querySelector(".result__right-item-price--month").textContent = `${count} ₽`;
            if (priceNow.length >= 1) {
                const wrapperPriceNow = document.createElement("ul");
                wrapperPriceNow.classList.add("result__right-item");
                let countNow = 0
                // priceNow.forEach(itemNow => {
                //     countNow += +itemNow;

                    if (tab.textContent == "Для квартир") {
                        priceObj.blago.priceNew.forEach(priceCard => {
                            countNow += +priceCard;
                        })
                    } else if (tab.textContent == "Для частных домов") {
                        priceObj.private.priceNew.forEach(priceCard => {
                            countNow += +priceCard;
                        })
                    } else if (tab.textContent == "Для бизнеса и организаций") {
                        priceObj.legal.priceNew.forEach(priceCard => {
                            countNow += +priceCard;
                        })
                    }

                // })
                // wrapperPriceNow.innerHTML = `
                //     <span class="result__right-item-name">Единоразовая оплата:</span>
                //     <span class="result__right-item-price">${countNow} ₽</span>
                // `;
                let str;
                if (window.innerWidth <= 375) {
                    str = "Одноразовая оплата:"
                } else {
                    str = "Единоразовая оплата:"
                }
                document.querySelector(".result__right-item--month").insertAdjacentHTML("beforeBegin",
                `
                <li class='result__right-item result__right-item--now'>
                    <span class="result__right-item-name">${str}</span>
                    <span class="result__right-item-price">${countNow} ₽</span>
                </li>
            `)
                // beforeBegin
            }


            let arrView = []
    if (tab.textContent == "Для квартир") {
        fullInfoBlago.forEach(el => {
            const elView = `
                    <li class="result__left-item">
                        <span class="result__left-item-name">${el[0]}</span>
                        <span class="result__left-item-price">${el[1]} ₽</span>
                   </li>
            `
            arrView.push(elView)
        })
    } else if (tab.textContent == "Для частных домов") {
        fullInfoPrivate.forEach(el => {
            const elView = `
                    <li class="result__left-item">
                        <span class="result__left-item-name">${el[0]}</span>
                        <span class="result__left-item-price">${el[1]} ₽</span>
                   </li>
            `
            arrView.push(elView)
        })
    } else if (tab.textContent == "Для бизнеса и организаций") {
        fullInfoLegal.forEach(el => {
            const elView = `
                    <li class="result__left-item">
                        <span class="result__left-item-name">${el[0]}</span>
                        <span class="result__left-item-price">${el[1]} ₽</span>
                   </li>
            `
            arrView.push(elView)
        })
    }

    const parent = document.querySelector(".result__left-list");
    parent.innerHTML = "";
    arrView.forEach(item => {
        parent.innerHTML += item;
    })
                })
        })
}
})

