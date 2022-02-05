// import checkInput from "./form";


console.log(window.location.href )
  if(window.location.href.indexOf("t-tk") !== -1) {
    var element = document.createElement('script');
  
    element.src= 'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit';
    element.classList.add("google-script");
    element.async = true;
    document.head.appendChild(element);
  }

  // setTimeout(() => {
  //   var oneCap;
  //   var twoCap;


  // }, 4000);
  var oneCap;
  var twoCap;
  function onloadCallback() {
    setTimeout(() => {
      console.log("работает")
      if (document.querySelector("#capcha1") ) {
        oneCap = grecaptcha.render('capcha1', {
          'sitekey' : '6LcprRkbAAAAAEBQCjQ_te7OhFSjE22sqgGpafGz',
      });
      }
      if (document.querySelector("#capcha2")) {
        twoCap = grecaptcha.render('capcha2', {
          'sitekey' : '6LcprRkbAAAAAEBQCjQ_te7OhFSjE22sqgGpafGz'
      });
      }
  
    }, 4000);
  }



  function sendForm(item) {
  
    $(item).on('submit', function (e) {
      e.preventDefault();
      if ($(this).children("#recaptchaError")) {
        $(this).children("#recaptchaError").text('');
      }
      // alert(myAjax.ajarl);
      let capHave = false
      if ($(this).children(".g-recaptcha").length !== 0) {
        capHave = true
      }
      var captcha
      if (capHave === true) {
        // console.log($(this).children(".g-recaptcha")[0].attr('id'))
        console.log($(this).children(".g-recaptcha").attr('id'))
        switch ($(this).children(".g-recaptcha").attr('id')) {
          case "capcha2":
            captcha = grecaptcha.getResponse(twoCap);
            break
          default:
            captcha = grecaptcha.getResponse();
        }
        // captcha = grecaptcha.getResponse($(this).children(".g-recaptcha").attr('id'));
        if (!captcha.length) {
          // Выводим сообщение об ошибке
          $('#recaptchaError').text('* Вы не прошли проверку "Я не робот"');
        } else {
          // получаем элемент, содержащий капчу
          $('#recaptchaError').text('');
        }
      }
      if ((checkInput($(this))) && (capHave === false || captcha.length)) {
          var form = $(this).serializeArray();
          var action = $(this).attr('action');
            $.post(
              myajax.url,
              {
                form: form,
                action: action
              },
              function (data) {
                for (var i = 0; i < $('form').length; i++) {
                  $('form')[i].reset();
                }
                if (document.querySelector(".modal-active")) {
                  document.querySelector(".modal-active").classList.remove("modal-active")
                }
                if(document.querySelector(".delete")) {
                    document.querySelectorAll(".delete").forEach(el => {
                        el.remove();
                    })
                }
                document.querySelector(".modal--send").classList.add("modal-active")
                setTimeout(() => {
                  if (document.querySelector(".modal-active")) {
                    document.querySelector(".modal-active").classList.remove("modal-active")
                    document.querySelector("body").style.overflow = "";
                  }
                }, 4000);
              }
            )
      }
    });
    
  }
  sendForm(".block-question__form")
  sendForm(".modal__form--zayvka")
  sendForm(".modal__form--contact")
  sendForm(".white-form__form")






