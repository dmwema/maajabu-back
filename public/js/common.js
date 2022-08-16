"use strict";
/*Global variables*/

/*===> Is mobile function <===*/
function isMobileDeviceUsed() {
    var isMobile = false;
    if (
        /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(
            navigator.userAgent
        ) ||
        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
            navigator.userAgent.substr(0, 4)
        )
    )
        isMobile = true;
    return isMobile;
}

/*===> Lazy load image script <===*/
function lazyLoader() {
    $(function () {
        $(".lazy").Lazy({
            combined: true,
            delay: 50,
            afterLoad: function (element) {
                element.removeClass("lazy").addClass("lazyLoaded");
                mansoryInit();
            },
        });
    });
}

/*===> Slick init <===*/
function slickInit() {
    // Main slider
    if ($(".main-slider").length > 0) {
        var mySlider = $(".main-slider");
        mySlider.on("init", function (event, slick, currentSlide, nextSlide) {
            mySlider.find(".slick-current").addClass("animate");
        });

        mySlider.slick();

        mySlider.on(
            "beforeChange",
            function (event, slick, currentSlide, nextSlide) {
                mySlider.find(".slick-current").removeClass("animate");
            }
        );
        mySlider.on(
            "afterChange",
            function (event, slick, currentSlide, nextSlide) {
                mySlider.find(".slick-current").addClass("animate");
            }
        );
    }

    // Studio slider
    if ($(".studio-slider").length > 0) {
        var studioSlider = $(".studio-slider");
        studioSlider.on(
            "init",
            function (event, slick, currentSlide, nextSlide) {
                studioSlider.find(".slick-current").addClass("animate");
            }
        );

        studioSlider.slick();

        studioSlider.on(
            "beforeChange",
            function (event, slick, currentSlide, nextSlide) {
                studioSlider.find(".slick-current").removeClass("animate");
            }
        );
        studioSlider.on(
            "afterChange",
            function (event, slick, currentSlide, nextSlide) {
                studioSlider.find(".slick-current").addClass("animate");
            }
        );
    }

    // Project slider
    if ($(".project-slider").length > 0) {
        var projectSlider = $(".project-slider");

        projectSlider.slick();
    }

    // News slider
    if ($(".news-slider").length > 0) {
        var newsSlider = $(".news-slider");

        newsSlider.slick();
    }

    // Testimonials slider
    if ($(".testimonials-slider").length > 0) {
        var testimonialsSlider = $(".testimonials-slider");

        testimonialsSlider.slick();
    }

    // Team slider
    if ($(".team-slider").length > 0) {
        var teamSlider = $(".team-slider");

        teamSlider.slick();
    }

    // clients slider
    if ($(".clients-slider").length > 0) {
        var clientsSlider = $(".clients-slider");

        clientsSlider.slick();
    }

    // blog-post slider
    if ($(".blog-post-slider").length > 0) {
        var blogPostSlider = $(".blog-post-slider");

        blogPostSlider.slick();
    }

    // product slider
    if ($(".product-slider").length > 0) {
        var productSlider = $(".product-slider");

        productSlider.slick();
    }

    // product-nav slider
    if ($(".product-slider-nav").length > 0) {
        var productSliderNav = $(".product-slider-nav");

        productSliderNav.slick();
    }

    // product-nav slider
    if ($(".similar-slider .product-list").length > 0) {
        var similarSlider = $(".similar-slider .product-list");

        similarSlider.slick();
    }

    setSlickArrow();
}

function responsiveSlider() {
    $(window).on("load resize", function () {
        var winWid = $(window).width();
        if (winWid < 1200) {
            // Engineer slider
            if ($(".engineer-slider:not(.slick-initialized)").length > 0) {
                var engineerSlider = $(
                    ".engineer-slider:not(.slick-initialized)"
                );
                engineerSlider.slick();
            }

            // skill-list-slider
            if ($(".skill-list-slider:not(.slick-initialized)").length > 0) {
                var skillSlider = $(
                    ".skill-list-slider:not(.slick-initialized)"
                );
                skillSlider.slick();
            }

            /*if ($('.prices-slider:not(.slick-initialized)').length > 0 ) {
                var pricesSlider = $('.prices-slider:not(.slick-initialized)');
                pricesSlider.slick();
            }*/
        }
    });
}

function setSlickArrow() {
    $(".slick-prev").html(
        '<svg width="22" height="41" viewBox="0 0 22 41" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5312 40.5L0.53125 20.5L20.5312 0.5L21.4688 1.4375L2.44531 20.5L21.4688 39.5625L20.5312 40.5Z" fill="#3D3B42"/></svg>'
    );
    $(".slick-next").html(
        '<svg width="22" height="41" viewBox="0 0 22 41" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.66875 40.5L21.6688 20.5L1.66875 0.5L0.731251 1.4375L19.7547 20.5L0.731251 39.5625L1.66875 40.5Z" fill="#3D3B42"/></svg>'
    );
}

/*===> Sticky header <===*/
function stickyHeder() {
    if ($(".header-wrap") !== undefined) {
        var headToStick = $(".header-wrap"),
            scroll = $(window).scrollTop(),
            headToStickScroll = headToStick.offset().top;

        if ($(window).width() <= 992 || $(window).height() <= 570) {
            headToStickScroll = 25;
        } else {
            headToStickScroll = 25;
        }

        var navHeight = headToStick.outerHeight(true);
        $('<div class="clone-nav"></div>')
            .insertAfter(".header-wrap")
            .css("height", navHeight)
            .show();

        refresh(scroll);

        $(window).on("scroll", function () {
            scroll = $(window).scrollTop();
            refresh(scroll);
        });

        $(window).on("resize", function () {
            refreshVar();
        });

        function refresh(scroll) {
            if (scroll > headToStickScroll) {
                headToStick.addClass("is-scroll");
                $(".clone-nav").show();
            } else {
                headToStick.removeClass("is-scroll");
                $(".clone-nav").show();
            }

            if (scroll > 0) {
                $(".quickLinks-wrap").addClass("scroll");
            } else {
                $(".quickLinks-wrap").removeClass("scroll");
            }
        }

        function refreshVar() {
            headToStick = $(".header-wrap");
            // headToStickScroll = 199;
            scroll = $(window).scrollTop();
            navHeight = headToStick.outerHeight(true);
            $(".clone-nav").css("height", navHeight);

            if ($(window).width() <= 992 || $(window).height() <= 570) {
                headToStickScroll = 49;
            } else {
                headToStickScroll = 49;
            }

            refresh(scroll, headToStickScroll);
        }
    }
}

/*===> Menu hover <===*/
function menuHover() {
    var controllElem = $(".main-nav .menu-gradient");

    if (controllElem.length > 0) {
        var hovOfsLeft, hovWidth;
        var setOfsLeft = $(".main-nav .menu>li.active").position().left;
        var setWidth = $(".main-nav .menu>li.active").width();

        controllElem.css({
            left: setOfsLeft + "px",
            width: setWidth + "px",
        });

        $(".main-nav .menu>li").on("mouseover", function () {
            hovOfsLeft = $(this).position().left;
            hovWidth = $(this).width();
            controllElem.css({
                left: hovOfsLeft + "px",
                width: hovWidth + "px",
            });
        });

        $(".main-nav").on("mouseleave", function () {
            controllElem.css({
                left: setOfsLeft + "px",
                width: setWidth + "px",
            });
        });
    }
}
/*===> Mobile menu <===*/
function mobileMenu() {
    $(".hamburger").on("click", function () {
        $(".main-nav").toggleClass("show-menu");
        $(".hamburger").toggleClass("open");
    });

    $(".show-sub-menu").on("click", function (e) {
        e.preventDefault();
        $(this).closest("a").toggleClass("active");
        $(this).closest("li").find(">.sub-menu").slideToggle();
    });
}

/*===> First latter <===*/
function firstLettet() {
    $(".f-letter").html(function (i, html) {
        return html.replace(
            /^[^a-zA-Z]*([a-zA-Z])/g,
            '<span class="f-letter-wrap">$1</span>'
        );
    });
}

/*===> Paroller initialization <===*/
function initParoller() {
    $(".tt-paroller").paroller();
}

/*===> AWP player initialization <===*/
function iniPlayer() {
    if (
        location.hostname === "localhost" ||
        location.hostname === "127.0.0.1" ||
        location.hostname === ""
    ) {
        return false;
    } else {
        var ctx = document.createElement("canvas").getContext("2d");
        var progress_color = ctx.createLinearGradient(0, 0, 1000, 0);
        progress_color.addColorStop(0, "#7B16D9");
        progress_color.addColorStop(1, "#FF6600");
        if ($("#awp-project-player").length) {
            var awp_player1;
            var settings = {
                instanceName: "voicer1",
                sourcePath: "",
                playlistList: "#awp-project-playlist",
                activePlaylist: "playlist-1",
                activeItem: 0,
                volume: 0.5,
                autoPlay: false,
                randomPlay: false,
                loopingOn: true,
                autoAdvanceToNextMedia: true,
                mediaEndAction: "loop",
                useKeyboardNavigationForPlayback: true,
                usePlaylistScroll: true,
                playlistScrollOrientation: "vertical",
                playlistScrollTheme: "records",
                useDownload: true,
                useShare: true,
                useTooltips: false,
                useNumbersInPlaylist: true,
                numberTitleSeparator: ".  ",
                artistTitleSeparator: " - ",
                playlistItemContent: "title",
                wavesurfer: {
                    waveColor: "#6e6e6e",
                    progressColor: progress_color,
                    barWidth: 1,
                    cursorColor: "transparent",
                    cursorWidth: 1,
                    height: 50,
                },
            };
            awp_player1 = $("#awp-project-player").awp(settings);
        }
        if ($("#awp-home-player").length) {
            var awp_player2;
            var settings = {
                instanceName: "voicer2",
                sourcePath: "",
                playlistList: "#awp-home-playlist",
                activePlaylist: "playlist-2",
                activeItem: 0,
                volume: 0.5,
                autoPlay: false,
                drawWaveWithoutLoad: false,
                randomPlay: false,
                loopingOn: true,
                autoAdvanceToNextMedia: true,
                mediaEndAction: "loop",
                useKeyboardNavigationForPlayback: false,
                numberTitleSeparator: ".  ",
                artistTitleSeparator: " - ",
                playlistItemContent: "title",
                wavesurfer: {
                    waveColor: "#6e6e6e",
                    progressColor: progress_color,
                    barWidth: 1,
                    cursorColor: "transparent",
                    cursorWidth: 1,
                    height: 50,
                },
            };
            awp_player2 = $("#awp-home-player").awp(settings);
        }
        if ($("#awp-grid-player").length) {
            var awp_player3;
            var settings = {
                instanceName: "voicer3",
                sourcePath: "",
                playlistList: "#awp-grid-playlist",
                activePlaylist: "playlist-3",
                activeItem: 0,
                volume: 0.5,
                autoPlay: false,
                drawWaveWithoutLoad: false,
                randomPlay: false,
                loopingOn: true,
                autoAdvanceToNextMedia: true,
                mediaEndAction: "loop",
                numberTitleSeparator: ".  ",
                artistTitleSeparator: " - ",
                playlistItemContent: "title",
                wavesurfer: {
                    waveColor: "#6e6e6e",
                    progressColor: progress_color,
                    barWidth: 1,
                    cursorColor: "transparent",
                    cursorWidth: 1,
                    height: 50,
                },
            };
            awp_player3 = $("#awp-grid-player").awp(settings);
        }
        $(".popup-player-link").on("click", function () {
            var trackNum = parseInt($(this).attr("data-track"), 10);
            awp_player3.loadMedia(trackNum - 1);
            return false;
        });
    }
}

/*===> Tilt init <===*/
function tiltInit() {
    $(".js-tilt").tilt({
        perspective: 1000,
        speed: 50,
    });
}

/*===> form element <===*/
function inputMask() {
    $('input[type="tel"]').mask("+0-000-000-00-00");

    if ($(".datetimepicker").length) {
        $(".datetimepicker").datetimepicker({
            format: "DD/MM/YYYY",
            ignoreReadonly: true,
            // debug: true,
            icons: {
                time: "far fa-clock",
                date: "far fa-calendar-alt",
                up: "fas fa-angle-up",
                down: "fas fa-angle-down",
                previous: "fas fa-angle-left",
                next: "fas fa-angle-right",
                today: "far fa-calendar-alt",
                clear: "fas fa-times",
                close: "fas fa-times",
            },
        });
    }
    if ($(".timepicker").length) {
        $(".timepicker").datetimepicker({
            format: "LT",
            ignoreReadonly: true,
            icons: {
                time: "far fa-clock",
                up: "fas fa-angle-up",
                down: "fas fa-angle-down",
                previous: "fas fa-angle-left",
                next: "fas fa-angle-right",
            },
        });
    }
}

/*===> Call popup <===*/
function callPopup() {
    $(".open-popup-link").on("click", function (e) {
        e.preventDefault();
        var $this = $(this),
            popupElem = $this.attr("href"),
            popupElem2 = $this.attr("data-href");

        $(popupElem).addClass("show");
        $(popupElem2).addClass("show");
    });

    $(".form-popup .close").on("click", function () {
        $(this).closest(".popup-wrap").removeClass("show");
    });

    $(document).mouseup(function (e) {
        var div = $(".form-popup");
        if (!div.is(e.target) && div.has(e.target).length === 0) {
            div.closest(".popup-wrap").removeClass("show");
        }
    });
}

/*===> text slider <===*/
function textSlider() {
    var animationDelay = 2500,
        lettersDelay = 50;
    initHeadline();

    function initHeadline() {
        singleLetters($(".cd-headline").find("li"));
        animateHeadline($(".cd-headline"));
    }

    /*function singleLetters($words) {
        $words.each(function () {
            var word = $(this),
                letters = word.text().split(''),
                selected = word.hasClass('is-visible');
            var i, l;
            for (i = 0, l = letters.length; i < l; i++) {
                letters[i] = '<em>' + letters[i] + '</em>';
                letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>' : '<i>' + letters[i] + '</i>';
            }
            var newLetters = letters.join('');
            word.html(newLetters);
        });
    }*/

    function singleLetters($words) {
        $words.each(function () {
            var word = $(this),
                letters = word.text(),
                selected = word.hasClass("is-visible");
            var i, l;

            letters = "<em>" + letters + "</em>";
            letters = selected
                ? '<i class="in">' + letters + "</i>"
                : "<i>" + letters + "</i>";

            var newLetters = letters;
            word.html(newLetters);
        });
    }

    function animateHeadline($headlines) {
        var duration = animationDelay;
        $headlines.each(function () {
            var headline = $(this);
            var spanWrapper = headline.find(".cd-words-wrapper");
            // newWidth = spanWrapper.width() + 5;
            // spanWrapper.css('width', newWidth);
            setTimeout(function () {
                hideWord(headline.find(".is-visible").eq(0));
            }, duration);
        });
    }

    function hideWord($word) {
        var nextWord = takeNext($word);
        if ($word.parents(".cd-headline").hasClass("letters")) {
            var bool =
                $word.children("i").length >= nextWord.children("i").length
                    ? true
                    : false;
            hideLetter($word.find("i").eq(0), $word, bool, lettersDelay);
            showLetter(nextWord.find("i").eq(0), nextWord, bool, lettersDelay);
        } else {
            switchWord($word, nextWord);
            setTimeout(function () {
                hideWord(nextWord);
            }, animationDelay);
        }
    }

    function hideLetter($letter, $word, $bool, $duration) {
        $letter.removeClass("in").addClass("out");
        if (!$letter.is(":last-child")) {
            setTimeout(function () {
                hideLetter($letter.next(), $word, $bool, $duration);
            }, $duration);
        } else if ($bool) {
            setTimeout(function () {
                hideWord(takeNext($word));
            }, animationDelay);
        }
        if (
            $letter.is(":last-child") &&
            $("html").hasClass("no-csstransitions")
        ) {
            var nextWord = takeNext($word);
            switchWord($word, nextWord);
        }
    }

    function showLetter($letter, $word, $bool, $duration) {
        $letter.addClass("in").removeClass("out");
        if (!$letter.is(":last-child")) {
            setTimeout(function () {
                showLetter($letter.next(), $word, $bool, $duration);
            }, $duration);
        } else {
            if (!$bool) {
                setTimeout(function () {
                    hideWord($word);
                }, animationDelay);
            }
        }
    }

    function takeNext($word) {
        return !$word.is(":last-child")
            ? $word.next()
            : $word.parent().children().eq(0);
    }

    function takePrev($word) {
        return !$word.is(":first-child")
            ? $word.prev()
            : $word.parent().children().last();
    }

    function switchWord($oldWord, $newWord) {
        $oldWord.removeClass("is-visible").addClass("is-hidden");
        $newWord.removeClass("is-hidden").addClass("is-visible");
    }
}

function showCollapse() {
    $("[data-show-collapse]").on("click", function (e) {
        e.preventDefault();
        var showElem = $(this).attr("data-show-collapse");
        $(showElem).show();
        $(this).addClass("hide");
    });
}

// instagram feed
function instaFeed() {
    if ($("#instafeed").length) {
        var userFeed = new Instafeed({
            get: "user",
            userId: "self",
            template:
                '<a href="{{link}}" target="_blank"><span><img src="{{image}}"/></span><span class="icn"><svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.2023 20.25H5.39766C4.69453 20.25 4.03047 20.1133 3.40547 19.8398C2.79349 19.5794 2.25313 19.2214 1.78438 18.7656C1.32865 18.2969 0.964063 17.7565 0.690625 17.1445C0.430209 16.5195 0.3 15.849 0.3 15.1328V5.34766C0.3 4.64453 0.430209 3.98698 0.690625 3.375C0.964063 2.75 1.32865 2.20964 1.78438 1.75391C2.25313 1.28516 2.79349 0.920573 3.40547 0.660156C4.03047 0.386719 4.69453 0.25 5.39766 0.25H15.2023C15.9055 0.25 16.563 0.386719 17.175 0.660156C17.8 0.920573 18.3404 1.28516 18.7961 1.75391C19.2648 2.20964 19.6294 2.75 19.8898 3.375C20.1633 3.98698 20.3 4.64453 20.3 5.34766V15.1328C20.3 15.849 20.1633 16.5195 19.8898 17.1445C19.6294 17.7565 19.2648 18.2969 18.7961 18.7656C18.3404 19.2214 17.8 19.5794 17.175 19.8398C16.563 20.1133 15.9055 20.25 15.2023 20.25ZM5.39766 1.38281C4.8638 1.38281 4.35599 1.48698 3.87422 1.69531C3.39245 1.90365 2.96927 2.1901 2.60469 2.55469C2.2401 2.91927 1.95365 3.34245 1.74531 3.82422C1.55 4.29297 1.45234 4.80078 1.45234 5.34766V15.1328C1.45234 15.6797 1.55 16.194 1.74531 16.6758C1.95365 17.1576 2.2401 17.5807 2.60469 17.9453C2.96927 18.2969 3.39245 18.5768 3.87422 18.7852C4.35599 18.9935 4.8638 19.0977 5.39766 19.0977H15.2023C15.7362 19.0977 16.244 18.9935 16.7258 18.7852C17.2076 18.5768 17.6307 18.2969 17.9953 17.9453C18.3599 17.5807 18.6398 17.1576 18.8352 16.6758C19.0435 16.194 19.1477 15.6797 19.1477 15.1328V5.34766C19.1477 4.80078 19.0435 4.29297 18.8352 3.82422C18.6398 3.34245 18.3599 2.91927 17.9953 2.55469C17.6307 2.1901 17.2076 1.91016 16.7258 1.71484C16.244 1.50651 15.7362 1.40234 15.2023 1.40234H5.39766V1.38281ZM19.7336 7.75H12.6828C12.5266 7.75 12.3898 7.69792 12.2727 7.59375C12.1685 7.47656 12.1164 7.33984 12.1164 7.18359C12.1164 7.02734 12.1685 6.89714 12.2727 6.79297C12.3898 6.67578 12.5266 6.61719 12.6828 6.61719H19.7336C19.8898 6.61719 20.0201 6.67578 20.1242 6.79297C20.2414 6.89714 20.3 7.02734 20.3 7.18359C20.3 7.33984 20.2414 7.47656 20.1242 7.59375C20.0201 7.69792 19.8898 7.75 19.7336 7.75ZM7.76094 7.75H0.866406C0.710156 7.75 0.573438 7.69792 0.45625 7.59375C0.352084 7.47656 0.3 7.33984 0.3 7.18359C0.3 7.02734 0.352084 6.89714 0.45625 6.79297C0.573438 6.67578 0.710156 6.61719 0.866406 6.61719H7.76094C7.91719 6.61719 8.05391 6.67578 8.17109 6.79297C8.28828 6.89714 8.34688 7.02734 8.34688 7.18359C8.34688 7.33984 8.28828 7.47656 8.17109 7.59375C8.05391 7.69792 7.91719 7.75 7.76094 7.75ZM10.3 14.7031C9.68802 14.7031 9.10859 14.5859 8.56172 14.3516C8.02786 14.1172 7.55911 13.7982 7.15547 13.3945C6.75182 12.9909 6.43281 12.5221 6.19844 11.9883C5.96406 11.4414 5.84688 10.862 5.84688 10.25C5.84688 9.63802 5.96406 9.0651 6.19844 8.53125C6.43281 7.98438 6.75182 7.50911 7.15547 7.10547C7.55911 6.70182 8.02786 6.38281 8.56172 6.14844C9.10859 5.91406 9.68802 5.79688 10.3 5.79688C10.912 5.79688 11.4849 5.91406 12.0188 6.14844C12.5656 6.38281 13.0409 6.70182 13.4445 7.10547C13.8482 7.50911 14.1672 7.98438 14.4016 8.53125C14.6359 9.0651 14.7531 9.63802 14.7531 10.25C14.7531 10.862 14.6359 11.4414 14.4016 11.9883C14.1672 12.5221 13.8482 12.9909 13.4445 13.3945C13.0409 13.7982 12.5656 14.1172 12.0188 14.3516C11.4849 14.5859 10.912 14.7031 10.3 14.7031ZM10.3 6.92969C9.38854 6.92969 8.60729 7.25521 7.95625 7.90625C7.30521 8.55729 6.97969 9.33854 6.97969 10.25C6.97969 11.1615 7.30521 11.9427 7.95625 12.5938C8.60729 13.2448 9.38854 13.5703 10.3 13.5703C11.2115 13.5703 11.9927 13.2448 12.6438 12.5938C13.2948 11.9427 13.6203 11.1615 13.6203 10.25C13.6203 9.33854 13.2948 8.55729 12.6438 7.90625C11.9927 7.25521 11.2115 6.92969 10.3 6.92969ZM16.7648 6.28516H14.1867C14.0305 6.28516 13.8938 6.23307 13.7766 6.12891C13.6724 6.01172 13.6203 5.86849 13.6203 5.69922V3.14062C13.6203 2.98438 13.6724 2.84766 13.7766 2.73047C13.8938 2.61328 14.0305 2.55469 14.1867 2.55469H16.7648C16.9211 2.55469 17.0513 2.61328 17.1555 2.73047C17.2727 2.84766 17.3313 2.98438 17.3313 3.14062V5.69922C17.3313 5.86849 17.2727 6.01172 17.1555 6.12891C17.0513 6.23307 16.9211 6.28516 16.7648 6.28516ZM14.7531 5.13281H16.1789V3.70703H14.7531V5.13281Z" fill="#FF6600"/></svg></span></a>',
            accessToken: "3483630941.1677ed0.66c4618b32444ac08a70cb2fe84c1bf8",
            limit: 16,
            resolution: "low_resolution",
            sortBy: "most-recent",
        });
        userFeed.run();
    }
}

// Tabs
function tabInit() {
    $(".tab-links__item").on("click", function () {
        var $this = $(this);
        var tabItem = $this.attr("data-show-tab");
        $this
            .closest(".tab-wrap")
            .find(".tab-links__item")
            .removeClass("active");
        $this
            .closest(".tab-wrap")
            .find(".tab-blocks__item")
            .removeClass("active");
        $this.addClass("active");
        $this
            .closest(".tab-wrap")
            .find(".tab-blocks__item[data-show-tab=" + tabItem + "]")
            .addClass("active");
    });
}

// Client filter
function clientFilterInit() {
    $("[data-for-filter] a").on("click", function (e) {
        e.preventDefault();
        var $this = $(this),
            dataFilter = $this.attr("data-filter"),
            dataParent = $this.closest("[data-for-filter]"),
            dataContainer = dataParent.attr("data-for-filter");

        dataParent.find("a").removeClass("active");
        $this.addClass("active");

        if (dataFilter == "*" || dataFilter == "all") {
            $(dataContainer).find(".filter-elem").slideDown();
        } else {
            $(dataContainer).find(".filter-elem").slideUp();
            $(dataContainer)
                .find("." + dataFilter)
                .slideDown();
        }
    });
}

// Isotope
function mansoryInit() {
    // lazyLoaded
    if ($(".massonry-grid").length > 0) {
        $(".massonry-grid").imagesLoaded(function () {
            $(".massonry-grid").isotope({
                itemSelector: ".gallery-grid__item",
                columnWidth: ".gallery-grid__item",
                isAnimated: !0,
            });
        });
    }
}

function gridFilter() {
    $(".massonry-filter-list a").on("click", function (e) {
        e.preventDefault();
        var t = $(this).attr("data-filter"),
            i = $(this).closest(".massonry-grid-wrap").find(".massonry-grid");
        i.find(".gallery-grid__item");
        $(".massonry-filter-list a").removeClass("active"),
            $(this).addClass("active"),
            $(".massonry-grid").isotope({ filter: t });
    });
}

/*===> RANGE BAR <===*/
function myRange() {
    if ($("#slider-range").length > 0) {
        var slider = document.getElementById("slider-range");
        var startPoint = $("#slider-range").attr("data-from") - 0;
        var maxPoint = $("#slider-range").attr("data-to") - 0;
        var sliderStart = $("#slider-range").attr("data-start") - 0;
        var sliderEnd = $("#slider-range").attr("data-end") - 0;

        noUiSlider.create(slider, {
            start: [sliderStart, sliderEnd],
            format: wNumb({
                decimals: 0,
            }),
            connect: true,
            range: {
                min: startPoint,
                max: maxPoint,
            },
            step: 1,
        });

        var snapValues = [
            document.getElementById("slider-from"),
            document.getElementById("slider-to"),
        ];

        slider.noUiSlider.on("update", function (values, handle) {
            snapValues[handle].innerHTML = values[handle];
        });
    }
}

/*===> Map init <===*/
function initMap() {
    if ($(".map-block").length > 0) {
        $(".map-block").each(function () {
            var $this = $(this);
            var idMap = $this.attr("id");
            createMap(idMap);
        });
    }

    function createMap(idMap) {
        var element, element2, myMap;

        var setZoom, setLat, setLng, setMarker;

        // if ($("*").is(idMap)) {
        element = document.getElementById(idMap);
        setLat = parseFloat(element.getAttribute("data-lat"), 10);
        setLng = parseFloat(element.getAttribute("data-lng"), 10);
        setZoom = parseFloat(element.getAttribute("data-zoom"), 10);
        // setMarker = "'"+element.getAttribute('data-map-icon')+"'";
        setMarker = element.getAttribute("data-map-icon");
        // }

        var options = {
            zoom: setZoom,
            center: { lat: setLat, lng: setLng },
            // styles: [{"featureType": "water", "elementType": "all", "stylers": [{"hue": "#7fc8ed"}, {"saturation": 55 }, {"lightness": -6 }, {"visibility": "on"} ]}]
            styles: [
                {
                    featureType: "administrative",
                    elementType: "labels.text",
                    stylers: [{ visibility: "on" }],
                },
                {
                    featureType: "poi",
                    elementType: "all",
                    stylers: [{ visibility: "off" }],
                },
                {
                    featureType: "transit.station.rail",
                    elementType: "all",
                    stylers: [
                        { visibility: "simplified" },
                        { saturation: "-100" },
                    ],
                },
                {
                    featureType: "water",
                    elementType: "all",
                    stylers: [{ visibility: "on" }],
                },
            ],
        };

        // if ($("*").is(idMap)) {
        myMap = new google.maps.Map(element, options);
        var markers = [
            {
                coordinates: { lat: setLat, lng: setLng },
                myMap: myMap,
                iconImg: setMarker,
            },
        ];
        for (var i = 0; i < markers.length; i++) {
            addMarker(markers[i]);
        }
        // }

        function addMarker(properties) {
            var marker = new google.maps.Marker({
                position: properties.coordinates,
                map: properties.myMap,
                icon: properties.iconImg,
            });
        }
    }
}

/*====> Begin toTop <====*/
function toTop() {
    if ($(".to-top").length > 0) {
        var scroll;
        $(window).on("scroll", function () {
            scroll = $(window).scrollTop();
            if (scroll > 101) {
                $(".to-top").addClass("show-up");
            } else {
                $(".to-top").removeClass("show-up");
            }
        });

        $(".to-top").on("click", function () {
            $("html, body").animate(
                {
                    scrollTop: 0,
                },
                600
            );
        });
    }
}

function initEvents() {
    $(function () {
        lazyLoader();
        slickInit();
        stickyHeder();
        firstLettet();
        initParoller();
        mobileMenu();
        iniPlayer();
        tiltInit();
        inputMask();
        callPopup();
        textSlider();
        showCollapse();
        responsiveSlider();
        instaFeed();
        tabInit();
        clientFilterInit();
        // mansoryIn-it();
        gridFilter();
        myRange();
        toTop();
    });

    /*Actions on 'Window load' event*/
    $(window).on("load", function () {
        menuHover();
        $(document).on("click", ".awp-contr-btn svg", function () {
            $(this).closest(".awp-contr-btn").toggleClass("is-play");
        });

        $(".preloader").addClass("load");
    });

    $(window).on("resize", function () {
        menuHover();
        setTimeout(setSlickArrow, 400);
    });
    $("body").on("click", ".js-add-history", function () {
        $(this)
            .closest(".history-list")
            .next(".history-list")
            .removeClass("history-list-add");
    });
}

/*Start all functions and actions*/
initEvents();
