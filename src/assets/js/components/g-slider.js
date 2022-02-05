window.addEventListener("DOMContentLoaded", () => {
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
                    spaceBetween: 12,
                },
            }
        });
        var galleryTop = new Swiper(item_top, {
            loop: true,
            navigation: {
                nextEl: next,
                prevEl: prev,
            },
            thumbs: {
                swiper: galleryThumbs
            }
        });
    });
})
