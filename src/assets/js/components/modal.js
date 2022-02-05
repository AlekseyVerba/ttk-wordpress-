try {


    function openModal(btnsSelector, modalSelector) {
        const buttons = document.querySelectorAll(btnsSelector);
        const modal = document.querySelector(modalSelector);
        buttons.forEach(button => {
            button.addEventListener("click", () => {
                modal.classList.add("modal-active");
                document.querySelector("body").style.overflow = "hidden";
                if (button.getAttribute('data-request') !== null) {
                    const inputCard = document.createElement("input")
                    inputCard.setAttribute("type", "hidden")
                    if (button.closest(".rate__content-card")) {
                        const parent = button.closest(".rate__content-card")
                        const nameCard = parent.querySelector(".rate__content-card-header").textContent.trim()
                        const formModal = modal.querySelector(".modal__info-block")

                        if (button.closest(".rate__content-item")) {
                            const tarif = button.closest(".rate__content-item")
                            if (tarif.querySelector("span.rate__checkbox")) {
                                const tarifText = tarif.querySelector("span.rate__checkbox").textContent.trim();
                                const tarifInp = document.createElement("input")
                                tarifInp.setAttribute("type", "hidden")
                                tarifInp.value = tarifText
                                tarifInp.name = "service"
                                tarifInp.classList.add("delete")
                                formModal.append(tarifInp)
                            }
                        }

                        if (document.querySelector(".rate__catalog-link--active")) {
                            const serviceName = document.querySelector(".rate__catalog-link--active").textContent.trim()
                            const inputService = document.createElement("input")
                            inputService.setAttribute("type", "hidden")
                            inputService.value = serviceName
                            inputService.name = "category"
                            inputService.classList.add("delete")
                            formModal.append(inputService)
                           
                        }

                        inputCard.value = nameCard
                        inputCard.name = "nameCard"
                        inputCard.classList.add("delete")
                        formModal.append(inputCard)

                        const inputPrice = document.createElement("input")
                            inputPrice.setAttribute("type", "hidden")
                            inputPrice.name = "priceCard"
                            inputPrice.classList.add("delete")
                        if (parent.querySelector(".rate__content-card-price")) {
                            inputPrice.value = parent.querySelector(".rate__content-card-price").textContent.trim()
                        } else {
                            inputPrice.value = 0
                        }

                        formModal.append(inputPrice)

                    }
                }

                if (button.closest(".result")) {
                    const formModal = modal.querySelector(".modal__info-block")
                    const activeContent = document.querySelector(".rate__content--active")
                    activeContent.querySelectorAll(".rate__content-galka").forEach(item => {
                        if (window.getComputedStyle(item).display == "block") {
                            const card = item.closest(".rate__content-card")
                            const cardName = card.querySelector(".rate__content-card-header").textContent.trim()
                            let cardPrice = ""
                            if (card.querySelector(".rate__content-card-price")) {
                                cardPrice = card.querySelector(".rate__content-card-price").textContent.trim()
                            } else {
                                cardPrice = `0 ₽`
                            }
                            const serviceWrap = card.closest(".rate__content-wrapper")
                            const serviceName = serviceWrap.querySelector("div.checkbox__text").textContent.trim();
                            const content = serviceWrap.closest(".rate__content").getAttribute("data-maincontent")
                            const catalogName = document.querySelector(`[data-maintab="${content}"]`).textContent.trim()
                            
                            const inpCardName = document.createElement("input")
                            const inpServiceName = document.createElement("input")
                            const inpCatalogName= document.createElement("input")
                            const inpCardPrice= document.createElement("input")
                            

                            inpCardName.setAttribute("type", "hidden")
                            inpCardName.value = cardName
                            inpCardName.name = "nameCard"
                            inpCardName.classList.add("delete")

                            inpServiceName.setAttribute("type", "hidden")
                            inpServiceName.value = serviceName
                            inpServiceName.name = "service"
                            inpServiceName.classList.add("delete")

                            inpCatalogName.setAttribute("type", "hidden")
                            inpCatalogName.value = catalogName
                            inpCatalogName.name = "category"
                            inpCatalogName.classList.add("delete")

                            inpCardPrice.setAttribute("type", "hidden")
                            inpCardPrice.value = cardPrice
                            inpCardPrice.name = "priceCard"
                            inpCardPrice.classList.add("delete")

                            formModal.append(inpCatalogName)
                            formModal.append(inpServiceName)
                            formModal.append(inpCardName)
                            formModal.append(inpCardPrice)



                        }
                    })
                }

            })
        })
        modal.addEventListener("mousedown", (e) => {
            if (e.target.classList.contains("modal-active") || e.target.classList.contains("modal__close")) {
                modal.classList.remove("modal-active");
                document.querySelector("body").style.overflow = "";
                if(modal.querySelector(".delete")) {
                    modal.querySelectorAll(".delete").forEach(el => {
                        el.remove();
                    })
                }
            }
        })
    }
    try {
        openModal('[data-application]', '[data-modal]');
    } catch {}
    try {
        openModal('[data-request]', '[data-modal-request]');
    } catch {}
    try {
        openModal("[data-addQuestion]", "[data-modal-question]");
    } catch{}
} catch { }