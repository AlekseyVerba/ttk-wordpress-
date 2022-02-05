document.addEventListener("DOMContentLoaded", () => {

        if (document.querySelector(".search.current-item")) {
            document.querySelector(".search.current-item").textContent = "Поиск"
        }
        function isInternetExplorer() {
            return window.navigator.userAgent.indexOf('MSIE ') > -1 || window.navigator.userAgent.indexOf('Trident/') > -1;
        }

        if (isInternetExplorer()) {
            document.querySelector(".svg-main").style.display = "none";
        }
})