try {
    let soundVolume = true;
document.querySelectorAll("[data-radioBtn]").forEach(item => {
    item.addEventListener("click", (e) => {
        if (item.classList.contains("radio__pause")) {
            if (soundVolume) {
                document.getElementById('radio_player').volume = 0.5;
                soundVolume = false;
            }
            item.classList.remove("radio-btn--active");
            document.querySelector(".radio__play").classList.add("radio-btn--active");
            console.log(document.getElementById('radio_player'))
            document.getElementById('radio_player').play()
        } else {
            item.classList.remove("radio-btn--active");
            document.querySelector(".radio__pause").classList.add("radio-btn--active");
            document.getElementById('radio_player').pause()
        }
    })
})

const sound = document.querySelector("[data-sound]")
sound.addEventListener("click", () => {
    const parentMenu = sound.closest(".radio__menu")
    const parent = sound.closest(".sound");
    const wrapper = parent.querySelector(".sound__wrapper")
    const regular = parent.querySelector(".radio__sound-regular");
    const range = document.querySelector(".radio__range")
    if (!parent.classList.contains("sound--active")) {
        parent.classList.add("sound--active")
        regular.classList.add("radio__sound-regular--active")
        wrapper.classList.add("sound__wrapper--active")
        if (window.innerWidth >= 1236) {
            range.style.width = "64%";
            parentMenu.style.width = "15%";
        } else {
            parentMenu.style.width = "25%";
        }
    } else {
        parent.classList.remove("sound--active")
        regular.classList.remove("radio__sound-regular--active")
        wrapper.classList.remove("sound__wrapper--active")
        if (window.innerWidth >= 1236) {
            range.style.width = "66%";
            parentMenu.style.width = "7%";
        } else {
            parentMenu.style.width = "7%";
        }
    }
    // parent.classList.add("sound--active")
})
var userAgent = navigator.userAgent.toLowerCase();
var InternetExplorer = false;
	if((/mozilla/.test(userAgent) && !/firefox/.test(userAgent) && !/chrome/.test(userAgent) && !/safari/.test(userAgent) && !/opera/.test(userAgent)) || /msie/.test(userAgent))
		InternetExplorer = true;

if (!InternetExplorer) {
    document.querySelector(".radio__sound-regular").addEventListener("input", (e) => {
        let val;
        if (e.target.value == 100) {
            val = 1
        } else if (e.target.value <= 9) {
            val = `0.0${e.target.value}`
        } else if (e.target.value === 0) {
            val = 0
        } else {
            val = `0.${e.target.value}`;
        }
        document.getElementById('radio_player').volume = val
    })
} else {
    document.querySelector(".radio__sound-regular").addEventListener("change", (e) => {
        let val;
        if (e.target.value == 100) {
            val = 1
        } else if (e.target.value <= 9) {
            val = `0.0${e.target.value}`
        } else if (e.target.value === 0) {
            val = 0
        } else {
            val = `0.${e.target.value}`;
        }
        document.getElementById('radio_player').volume = val
    })
}

const footerDown = document.querySelector(".footer__down");
if (window.outerWidth <= 1100) {
    footerDown.addEventListener("click", (e) => {
        const miniRadio = footerDown.querySelector(".footer__down-mobile-container");
        const mainRadio = footerDown.querySelector(".footer__down-desc-container");
        if (e.target.closest(".radio__pause") || e.target.closest(".radio__play") || e.target.closest(".radio__sound")) {

        } else {
            if (miniRadio.classList.contains("footer__down-mobile-container--active")) {
                miniRadio.classList.remove("footer__down-mobile-container--active");
                mainRadio.classList.add("footer__down-desc-container--active");
            } else {
                miniRadio.classList.add("footer__down-mobile-container--active");
                mainRadio.classList.remove("footer__down-desc-container--active");
            }
        }
    })
} else {
    footerDown.addEventListener("mousemove", () => {
        const miniRadio = footerDown.querySelector(".footer__down-mobile-container");
        const mainRadio = footerDown.querySelector(".footer__down-desc-container");
        miniRadio.classList.remove("footer__down-mobile-container--active");
        mainRadio.classList.add("footer__down-desc-container--active");
    })
    footerDown.addEventListener("mouseleave", () => {
        const miniRadio = footerDown.querySelector(".footer__down-mobile-container");
        const mainRadio = footerDown.querySelector(".footer__down-desc-container");
        miniRadio.classList.add("footer__down-mobile-container--active");
        mainRadio.classList.remove("footer__down-desc-container--active");
    })
}


} catch{}

