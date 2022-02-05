 function checkInput(item) {
    let sendForm = true
    let inputItem = item[0];

    // const elemnets = [];
    // for (let k; k<)
    inputItem.querySelectorAll("input").forEach(input => {
        clearInfoInput(input);
        const val = input.value;
        switch (input.getAttribute("name")) {
            case "name": {
                if (val.length < 2 || val.trim() === "" || /^[1-9]+$/.test(val)) {
                    sendForm = false
                    createMistake(input, "Введите правильное имя")
                } else {
                    createGoodResult(input)
                }
                break;
            }
            case "mail": {
                if (val.trim() == "") {
                    createGoodResult(input)
                } else if (/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(val) === false) {
                    sendForm = false
                    createMistake(input, "Введите правильную электронную почту")
                }
                else {
                    createGoodResult(input)
                }
                break
            }
            case "phone": {
                if (val.length < 11 || val.trim() === "" || /^[a-zA-z]+$/.test(val)) {
                    sendForm = false
                    createMistake(input, "Некорректный номер телефона")
                } else {
                    createGoodResult(input)
                }
                break;
            }
            case "adress": {
                if (val.length < 15 || val.trim === "") {
                    sendForm = false
                    createMistake(input, "Введите корректный адресс")
                } else {
                    createGoodResult(input)
                }
                break;
            }
            case "number-dog": {
                if (val.length > 16 || val.trim === "") {
                    sendForm = false
                    createMistake(input, "Введите корректный номер договора")
                } else {
                    createGoodResult(input)
                }
                break
            }
            case "checkbox": {
                if (!input.checked) {
                    sendForm = false
                    createMistake(input, "Необходимо подтверждение")
                }
            }
        }
    })
    return sendForm;


    function clearInfoInput(input) {
        if (input.classList.contains("badForm")) {
            input.classList.remove("badForm")
        }
        if (input.classList.contains("goodForm")) {
            input.classList.remove("goodForm")
        }
        if (input.closest("[data-modal-Inputwrap]") && input.closest("[data-modal-Inputwrap]").querySelector(".mistake")) {
            input.closest("[data-modal-Inputwrap]").querySelector(".mistake").remove();
        }
    }

  
    
    function createMistake(input, textMistake) {
        const mistake = document.createElement("div");
        mistake.classList.add("mistake");
        mistake.textContent = `${textMistake}`
        // input.insertAdjacentElement('beforeBegin', mistake);
        input.closest("[data-modal-Inputwrap]").insertAdjacentElement('afterBegin', mistake)
        input.classList.add("badForm")
    }
    
    function createGoodResult(input) {
        input.classList.add("goodForm")
    }
}



$("input[name='phone']").mask('+7 (999) 99-99-999', { autoclear: false })
  document.querySelectorAll("input[name='phone']").forEach(item => {
    item.addEventListener("input", e => {
        if (item.value[4] == 8){
            item.value = item.value.slice(0, 4);
            
        }

    })
})


// export default checkInput;