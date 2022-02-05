document.addEventListener("DOMContentLoaded", () => {
    function checked(selectorCheck, activeClass) {
        const checks = document.querySelectorAll(`[${selectorCheck}]`);
        checks.forEach(check => {
            const content = check.parentElement.nextElementSibling;
            if (check.checked) {
                content.classList.add(activeClass);
            } else {
                if (content.classList.contains(activeClass)) {
                    content.classList.remove(activeClass);
                }
            }
    
            check.addEventListener("change", (e) => {
                const target = e.target;
                if (target.checked) {
                    content.classList.add(activeClass);
                } else {
                    if (content.classList.contains(activeClass)) {
                        content.classList.remove(activeClass);
                    }
                }
            })
        })
    }
    
    
    checked("data-checkRate", "rate__content-items--active");
})