
    // wp-caption

    document.querySelectorAll(".wp-caption").forEach(item => {
        if (item.querySelector(".wp-caption-text")) {
            const par = item.querySelector(".wp-caption-text")
            const text = par.textContent.length

            if (text < 15) {
                par.style.maxWidth = "20%"
            } else if(text >= 15 && text <= 30) {
                par.style.maxWidth = "27%"
            } else if(text >= 31 && text <= 50) {
                par.style.maxWidth = "50%"
            }else if(text >= 51 && text <= 80) {
                par.style.maxWidth = "70%"
            }else if(text >= 81) {
                par.style.maxWidth = "100%"
            }
            item.querySelector(".wp-caption-text").remove();
            const wrapper = document.createElement("div")
            wrapper.classList.add("wp-caption-text__wrapper")
            wrapper.append(par)
            item.append(wrapper)
        }
    })