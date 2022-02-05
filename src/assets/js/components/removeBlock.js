document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".rate__content-item").forEach(item => {
        if (item.querySelectorAll(".rate__content-card").length === 0) {
            item.remove()
        }
    })
    document.querySelectorAll(".rate__content").forEach(item => {
        if (!item.querySelector(".rate__content-item")) {
            const id = item.getAttribute("data-maincontent")
            if (document.querySelector(`[data-maintab="${id}"]`)) {
                document.querySelector(`[data-maintab="${id}"]`).remove()
            }
        }
    })
    if (!document.querySelector(".rate--constructor")) {
        document.querySelectorAll("[data-maintab]").forEach((block, i) => {
            block.classList.remove("rate__catalog-link--active")
            if(i === 0) {
                const id = block.getAttribute("data-maintab")
                document.querySelector(`[data-maincontent="${id}"]`).classList.add("rate__content--active")
                block.classList.add("rate__catalog-link--active")
            }
        })
    }
})