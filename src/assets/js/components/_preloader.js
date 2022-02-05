
// $(document).ready(function () {
    if ($('#preloader')) {
        const preloader = $('#preloader')
    const imagesCount = $('img').length
    const percent = 100 / imagesCount;
    let progress = 0
    let loadedImg = 0
        // if (document.querySelector("#preloader")) {
    // }
        document.querySelector("#preloader").style.display = "block"
        let time = setInterval(() => {
            count++;
            document.querySelector("#preloader").style.backgroundPosition = `-${count}px`
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
        
        
        for (var i = 0; i < imagesCount; i++){ // создаем клон изображений
            let img_copy            = new Image();
                img_copy.src        = document.images[i].src;
                img_copy.onload     = img_load;
                img_copy.onerror    = img_load;
        } 
        let count = 0

        function img_load() {
            progress += percent;
            loadedImg++;    
            if (progress >= 100 || loadedImg == imagesCount){
                preloader.delay(200).fadeOut('slow');
                // qBody.css('overflow', '');
                clearInterval(time)
            }
            $(".dws-progress-bar").circularProgress('animate', progress, 500);
        }      
    }
    
// }); 

