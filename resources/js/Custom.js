//preloader
$(document).ready(function () {
    document.querySelector('.preloader').classList.add('hidePreloader')
});

//slider
$(document).ready(function () {
    $('.responsive').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.lazy').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
});

//login validation

$(function () {
    $.validator.setDefaults({

        highlight: function (element) {
            $(element).closest('.form-control').addClass('have-error');
        },

        unhighlight: function (element) {
            $(element).closest('.form-control').removeClass('have-error');
        },
    });

    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            }
        },
        messages: {
            email: {
                required: 'لطفا ایمیل را وارد کنید',
            },

            password: {
                required: 'لطفا رمز عبور را وارد کنید',
            }
        }
    });

});

//register validation

$(function () {

    $.validator.addMethod('emailCustom', function (value, element) {
        return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(value);
    });

    $.validator.addMethod('wordOnly', function (value, element) {
        return this.optional(element) || /^[a-zآ-ی]+$/i.test(value);
    });


    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-control').addClass('have-error');
        },

        unhighlight: function (element) {
            $(element).closest('.form-control').removeClass('have-error');
        },
    });

    $("#registerForm").validate({

        rules: {
            name: {
                required: true,
                maxlength: 255,
                minlength: 3,
                wordOnly: true
            },

            family: {
                required: true,
                maxlength: 255,
                minlength: 3,
                wordOnly: true
            },
            email: {
                emailCustom: true,
                remote: {
                    url: 'http://127.0.0.1:8000/emailCheck',
                    type: 'POST',
                    data: {
                        email: function () {
                            return $("#email").val()
                        },
                        _token: function () {
                            return $('input[name="_token"]').val();
                        }
                    },
                }
            },
            phone: {
                required: true,
                digits: true,
                maxlength: 11,
                minlength: 11,
                remote: {
                    url: 'http://127.0.0.1:8000/phoneCheck',
                    type: 'POST',
                    data: {
                        phone: function () {
                            return $("#phone").val()
                        },
                        _token: function () {
                            return $('input[name="_token"]').val();
                        }
                    }
                }
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 255,
            },

            password_confirmation: {
                required: true,
                equalTo: "#password",
            }
        },


        messages: {
            name: {
                required: 'لطفا نام خود را وارد کنید',
                maxlength: "تعداد کارکتر ها بیش از حد مجاز است",
                minlength: "تعداد کارکتر ها کمتر از حد مجاز است",
                wordOnly: "نام باید فقط شامل کارکتر حروف فارسی یا انگلیسی باشد",
            },
            family: {
                required: 'لطفا نام خانوادگی خود را وارد کنید',
                maxlength: "تعداد کارکتر ها بیش از حد مجاز است",
                minlength: "تعداد کارکتر ها کمتر از حد مجاز است",
                wordOnly: "نام باید فقط شامل کارکتر حروف فارسی یا انگلیسی باشد",
            },

            email: {
                emailCustom: 'لطفا یک ایمیل معتبر وارد کنید',
                remote: 'این ایمیل توسط کاربر دیگری از قبل در سیستم ثبت شده است'
            },

            phone: {
                required: 'لطفا شماره موبایل را وارد کنید',
                digits: 'لطفا شماره موبایل معتبر وارد کنید',
                maxlength: 'تعداد شماره موبایل باید 11 عدد باشد',
                minlength: 'تعداد شماره موبایل باید 11 عدد باشد',
                remote: 'این شماره توسط کاربر دیگری از قبل در سیستم ثبت شده است'
            },
            password: {
                required: 'لطفا رمز عبور را وارد کنید',
                maxlength: 'تعداد رمز عبور بیشتر از حد کجاز است',
                minlength: 'تعداد رمز عبور نباید کمتر از 8 باشد',
            },

            password_confirmation: {
                required: 'لطفا رمز عبور را وارد کنید',
                equalTo: 'تکرار رمز عبور وارد شده مطابقت ندارد'
            }
        }
    })
});

//session alert
$(function () {
    let sessionValue = $("#hdnInput").data('value');
    if (sessionValue) {
        Notiflix.Notify.Success(sessionValue, {
            position: "right-bottom",
            width: "400px",
            borderRadius: 15,
            fontSize: 20,
            cssAnimation: true, cssAnimationDuration: 400, cssAnimationStyle: 'zoom',
        });
    }
});

$(function () {
    let sessionValue = $("#errorInput").data('value');
    if (sessionValue) {
        Notiflix.Report.Failure("عملیات نا موفق",
            "ایمیل یا رمز عبور وارد شده اشتباه میباشد",
            'متوجه شدم');
    }
});

$(function () {
    let sessionValue = $("#CardSuccess").data('value');
    if (sessionValue) {
        Notiflix.Report.Success(
            "عملیات موفق",
            sessionValue,
            "متوجه شدم",
        );
    }
});

$(function () {
    let sessionValue = $("#cardExist").data('value');
    if (sessionValue) {
        Notiflix.Report.Warning(
            "",
            sessionValue,
            "متوجه شدم",
        );
    }
});


const images = document.querySelectorAll("[data-src]");

function preloadImage(img) {
    const src = img.getAttribute("data-src");
    if (!src) {
        return;
    }
    img.src = src;
}

const imgOptions = {};

const imgObserver = new IntersectionObserver((entries, imgObserver) => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            return;
        } else {
            preloadImage(entry.target);
            imgObserver.unobserve(entry.target);
        }
    })
}, imgOptions);

images.forEach(image => {
    imgObserver.observe(image);
});


//product-gallery-slide-popup
$(document).ready(function () {
    $(".products-gallery").magnificPopup({
        delegate: "a",
        type: "image",
        tLoading: "Loading image #%curr%...",
        mainClass: "mfp-img-mobile",
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    });
});
