$(window).on('load', function () {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
        $('body').addClass('ios');
    } else {
        $('body').addClass('web');
    }
    ;

});

$.fn.setCursorPosition = function (pos) {
    if ($(this).get(0).setSelectionRange) {
        $(this).get(0).setSelectionRange(pos, pos);
    } else if ($(this).get(0).createTextRange) {
        var range = $(this).get(0).createTextRange();
        range.collapse(true);
        range.moveEnd('character', pos);
        range.moveStart('character', pos);
        range.select();
    }
};

jQuery.validator.addMethod('phonenu', function (value, element) {
    return value.match(/\d/g).length === 11;
}, '');


$(document).ready(function () {

    $('.form-call').each(function () {
        var position = $(this).data('position');

        $(this).validate({
            errorElement: 'div',
            errorPlacement: function (error, element) {
                element.parent().append(error);
            },
            rules: {
                name: {required: true},
                phone: {required: true, phonenu: true},
            },
            messages: {
                name: {required: ""},
                phone: {required: "", },
            },
            submitHandler: function (form) {
                BX.ajax.runComponentAction('internal:forms', 'sendForm', {
                    mode: 'class',
                    data: {
                        'formType': 'callback',
                        'data': {
                            'name': $(form).find("[name='name']").val(),
                            'phone': $(form).find("[name='phone']").val(),
                        },
                    },
                }).then((response) => {
                    form.reset()
                    var id = response.data.id;
                    sendFormToGtm(position, $(form).find("[name='phone']").val(), 'callback')
                    $.fancybox.open({
                        src: '#popup-call-thank',
                        type: 'inline',
                        touch: false,
                        closeExisting: true,
                        autoFocus: false,
                        btnTpl: {
                            smallBtn:
                                '<button type="button" data-id="' + id + '" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}">' +
                                '<span><i class="icon-close"></i></span>' +
                                "</button>"
                        },
                    });
                }).catch((errors) => {
                    alert(errors);
                });
            }
        });
    });

    $('.form-request').each(function () {
        var position = $(this).data('position');

        $(this).validate({
            errorElement: 'div',
            errorPlacement: function (error, element) {
                element.parent().append(error);
            },
            rules: {
                name: {required: true},
                phone: {required: true, phonenu: true},
                email: {required: true, email: true},
                date: {required: true},
                // message: {required: true},
                agree: {required: true},
            },
            messages: {
                name: {required: ""},
                phone: {required: ""},
                email: {required: "", email: ""},
                date: {required: ""},
                // message: {required: ""},
                agree: {required: ""},
            },
            submitHandler: function (form) {
                BX.ajax.runComponentAction('internal:forms', 'sendForm', {
                    mode: 'class',
                    data: {
                        'formType': 'request',
                        'data': {
                            'name': $(form).find("[name='name']").val(),
                            'phone': $(form).find("[name='phone']").val(),
                            'message': $(form).find("[name='message']").val(),
                            // 'email': $(form).find("[name='email']").val(),
                            // 'agree': $(form).find("[name='agree']").val(),
                            // 'date': $(form).find("[name='date']").val(),
                        },
                    },
                }).then((response) => {
                    var id = response.data.id;
                    sendFormToGtm(position, $(form).find("[name='phone']").val(), 'request')
                    $.fancybox.open({
                        src: '#popup-request-thank',
                        type: 'inline',
                        touch: false,
                        closeExisting: true,
                        autoFocus: false,
                        btnTpl: {
                            smallBtn:
                                '<button type="button" data-id="' + id + '" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}">' +
                                '<span><i class="icon-close"></i></span>' +
                                "</button>"
                        },
                    });
                }).catch((errors) => {
                    alert(errors);
                });
            }
        });
    });


    $('.form-subscribe').each(function () {
        $(this).validate({
            errorElement: 'div',
            errorPlacement: function (error, element) {
                element.parent().append(error);
            },
            rules: {
                email: {required: true, email: true},
                // agree: {required: true},
            },
            messages: {
                email: {required: "", email: ""},
                // agree: {required: ""},
            },
            submitHandler: function (form) {
                form.reset()
                var id = $(form).closest('.popup_thank').find('.fancybox-close-small').data('id');
                BX.ajax.runComponentAction('internal:forms', 'addEmail', {
                    mode: 'class',
                    data: {
                        'id': id,
                        'agree': $(form).find("[name='agree']").val(),
                        'email': $(form).find("[name='email']").val(),
                    },
                }).then((response) => {
                    $.fancybox.close();
                }).catch((errors) => {
                    alert(errors);
                });
            }
        });
    });


    function sendFormToGtm(position, phone, goal) {
        window.dataLayer = window.dataLayer || [];
        var data = {
            'event': 'sendForm',
            'action': goal,
            'position': position,
            'phone': phone,
            'dateTime': $('#dateTime').text(),
            'pageUrl': window.location.pathname,
            'goal': goal
        }
        window.dataLayer.push(data)
    }

    function showDiv() {
        if ($(window).scrollTop() > 0) {
            $("#header").addClass('fixed');
        } else {
            $("#header").removeClass('fixed');
        }
    }

    showDiv();
    $(window).scroll(showDiv);

    $('.fixed-panel .main-subnav__link').on('click', function (event) {

        if ($(this).parents('.main-subnav__item').hasClass('active')) {
            // $(this).parents('.main-subnav__item').removeClass('active');
            // $(this).next('.main-subnav-wrapper').hide();
            // $('.main-subnav').removeClass('active-subnav');
        } else {
            $('.main-subnav__item').removeClass('active');
            $('.main-subnav-wrapper').hide();

            $(this).parents('.main-subnav__item').addClass('active');
            $(this).next('.main-subnav-wrapper').show();
            $('.main-subnav').addClass('active-subnav');
            return false;
        }
    });

    $('.main-nav__link').on('click', function (event) {
        if (!$(this).parents('.main-nav').hasClass('main-nav-closed')) {
            //$(this).next('.main-subnav').toggleClass('active');
            $(this).next('.main-subnav').toggleClass('notactive');
            return false;
        }
    });

    $('.js-slider-doctors .y-row').slick({
        infinite: true,
        arrows: true,
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        fade: false,
        prevArrow: '<button type="button" class="slick-prev"><span class="icon-arrow-left"></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="icon-arrow-right"></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 741,
                settings: {
                    slidesToShow: 2,
                    appendArrows: $('.doctors-nav'),
                    appendDots: $('.doctors-nav'),
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                    appendArrows: $('.doctors-nav'),
                    appendDots: $('.doctors-nav'),
                }
            }
        ]
    });

    $('.js-slider-reviews .y-row').slick({
        infinite: true,
        arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: false,
        prevArrow: '<button type="button" class="slick-prev"><span class="icon-arrow-left"></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="icon-arrow-right"></button>',
        responsive: [
            {
                breakpoint: 741,
                settings: {
                    appendArrows: $('.reviews-nav'),
                    appendDots: $('.reviews-nav'),
                }
            }
        ]
    });

    $('.js-slider-works > .y-row').slick({
        infinite: true,
        arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: false,
        prevArrow: '<button type="button" class="slick-prev"><span class="icon-arrow-left"></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="icon-arrow-right"></button>',
        responsive: [
            {
                breakpoint: 741,
                settings: {
                    appendArrows: $('.works-nav'),
                    appendDots: $('.works-nav'),
                }
            }
        ]
    });

    $(".input-phone").click(function () {
        /*$(this).setCursorPosition(4);*/
    }).mask("+7 (999) 999 99 99", {autoclear: false, placeholder: ""});

    $(".email-input-js").inputmask({mask: "*{3,20}@*{3,20}.*{2,7}"});

    $('[data-fancybox]').fancybox({
        touch: false,
        closeExisting: true,
        autoFocus: false,
        // hideScrollbar: false,
        btnTpl: {
            smallBtn:
                '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}">' +
                '<span><i class="icon-close"></i></span>' +
                "</button>"
        },
        beforeShow: function () {
            $('.header').css({transition: 'none'})
            $('.header__top').css({paddingRight: 17, transition: 'none'})
            $('.header__nav').css({paddingRight: 17, transition: 'none'})
        },
        afterClose: function () {
            $('.header__top').css('padding-right', '')
            $('.header__nav').css('padding-right', '')
            setTimeout(() => {
                $('.header').css({transition: ''})
                $('.header__top').css({transition: ''})
            }, 100)
        }
    });


    $('.form-call').each(function () {
        $(this).validate({
            errorElement: 'div',
            errorPlacement: function (error, element) {
                element.parent().append(error);
            },
            rules: {
                name: {required: true},
                phone: {required: true, phonenu: true},
            },
            messages: {
                name: {required: ""},
                phone: {required: ""},
            },
            submitHandler: function (form) {
                form.reset()
                $.fancybox.open({
                    src: '#popup-thank',
                    type: 'inline',
                    touch: false,
                    closeExisting: true,
                    autoFocus: false,
                    btnTpl: {
                        smallBtn:
                            '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}">' +
                            '<span><i class="icon-close"></i></span>' +
                            "</button>"
                    },
                });

            }
        });
    });

    $('.input-date').datepicker({
        language: 'ru-RU',
        format: 'dd.mm.yyyy',
        autoHide: true,
        zIndex: 200000,
        startDate: new Date()
    });

    $('textarea').each(function () {
        this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
    }).on('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });


    $(".js-aside-menu").click(function () {
        $('#fixed-panel').toggle();
        $('body').toggleClass('menu-open');
        $('.header-menu').toggleClass('is-active');
        return false;
    });

    $('.js-fixed-panel').click(function () {
        $('.fixed-panel-menu').hide();
        $('.fixed-panel-subnav').hide();
        $('.fixed-panel-subnav_' + $(this).attr('data-subnav')).show();
        return false;
    });


    $('.js-fixed-panel-menu').click(function () {
        $('.fixed-panel-menu').show();
        $('.fixed-panel-subnav').hide();
        return false;
    });

    if ($('#section-inside').length) {
        $(window).scroll(function () {
            var s_top = $(window).scrollTop();
            var s_height = $('#section-inside').innerHeight();
            var s_menu = $('.main-subnav').innerHeight();
            var s_header = $('#header').innerHeight();

            var s_contact = $('#section-contact').offset().top;

            if (s_top > s_contact - s_menu - s_header) {
                $('.main-subnav').addClass('closed');
            } else {
                $('.main-subnav').removeClass('closed');
            }

        })
    }

    $('.js-slider-works-2 > .y-row').slick({
        infinite: true,
        arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: false,
        appendArrows: $('.works-nav'),
        appendDots: $('.works-nav'),
        prevArrow: '<button type="button" class="slick-prev"><span class="icon-arrow-left"></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="icon-arrow-right"></button>',
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 741,
                settings: {}
            }
        ]
    });

    $('.js-slider-reviews-2 .y-row').slick({
        infinite: true,
        arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: false,
        prevArrow: '<button type="button" class="slick-prev"><span class="icon-arrow-left"></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="icon-arrow-right"></button>',
        appendArrows: $('.reviews-nav'),
        appendDots: $('.reviews-nav'),
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 741,
                settings: {}
            }
        ]
    });


    var $pr_slider = $('.js-list-doctors .y-row');
    var pr_slider_settings = {
        infinite: false,
        infinite: true,
        arrows: true,
        dots: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        fade: false,
        appendArrows: $('.doctors-nav'),
        appendDots: $('.doctors-nav'),
        prevArrow: '<button type="button" class="slick-prev"><span class="icon-arrow-left"></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="icon-arrow-right"></button>',
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 9999,
                settings: "unslick"
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    };

    $pr_slider.slick(pr_slider_settings);
    $(window).on('resize', function () {
        if (!$pr_slider.hasClass('slick-initialized')) {
            return $pr_slider.slick(pr_slider_settings);
        }
    });

    var sertificates = $('.js-slider-sertificates .y-row'),
        sertificatesItemsCount = sertificates.children().length;

    sertificates.slick({
        infinite: true,
        arrows: true,
        dots: false,
        slidesToShow: sertificatesItemsCount > 4 ? 4 : sertificatesItemsCount,
        slidesToScroll: 1,
        fade: false,
        prevArrow: sertificatesItemsCount > 4 ? '<button type="button" class="slick-prev"><span class="icon-arrow-left"></button>' : null,
        nextArrow: sertificatesItemsCount > 4 ? '<button type="button" class="slick-next"><span class="icon-arrow-right"></button>' : null,
        responsive: [

            {
                breakpoint: 741,
                settings: {
                    dots: true,
                    appendArrows: $('.sertificates-nav'),
                    appendDots: $('.sertificates-nav'),
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 3,
                    dots: true,
                    appendArrows: $('.sertificates-nav'),
                    appendDots: $('.sertificates-nav'),
                }
            }
        ]
    });


    $('.scroll').click(function () {
        var tt = $($(this).attr('href')).offset().top - $('#header').height() - 10;
        $('html, body').animate({
            scrollTop: tt
        }, 500);

        return false;
    })

    $('.video__play').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        helpers: {
            media: {}
        }
    });
});


//Списки на странице услуги
$(document).ready(function () {

    if ($('.service-info').hasClass('active')) {
        $('.service-info.active').find('.service-info__text--list').show();
        $('.service-info.active').find('.service-full_text').addClass('active');
    }

    $('.service-info__title').on('click', function () {
        var full = $(this).find('.service-full_text');
        info = $(this).closest('.service-info');
        infoDeks = $(this).closest('.service-info--dekstop');
        infoBox = info.find('.service-info__text--list');
        infoBoxOther = info.find('.service-info__text--other');

        $(this).toggleClass('active');
        full.toggleClass('active');
        console.log(infoBox.is(':visible'));
        if (screen.width > 480) {
            if (info.hasClass('service-info_list')) {
                info.toggleClass('active');
            }
            if (info.hasClass('service-info--dekstop')) {
                info.addClass('active');
                infoBox.slideDown();
            } else {
                if (infoBox.is(':visible')) {
                    full.text('Читать все');
                    infoBox.slideUp();
                } else {
                    full.text('Скрыть');
                    infoBox.slideDown();
                }
            }
        } else {
            if (infoBox.is(':visible')) {
                infoBox.slideUp();
                info.removeClass('active');
            } else {
                infoBox.slideDown();
                info.removeClass('active');
                if (info.hasClass('service-info_list')) {
                    info.addClass('active');
                }
            }
            if (infoBoxOther.is(':visible')) {
                infoBoxOther.slideUp();
                infoDeks.removeClass('active');
            } else {
                infoBoxOther.slideDown();
                if (!info.hasClass('service-info_list')) {
                    infoDeks.addClass('active');
                }
            }
        }
    });


    $("a.anchor").click(function () {
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top - 80 + "px"
        }, {
            duration: 500,
            easing: "swing"
        });
        return false;
    });
});