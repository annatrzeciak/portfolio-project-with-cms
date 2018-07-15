$('.navbar a, .footer a, header a').click(function () {
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top
    }, 500);
    return false;
});
$(document).ready(function () {
    if ($('.slider')) {
        $('.slider').slick({
            dots: false,
            arrow: true,
            autoplay: true,
            autoplaySpeed: 3000,
            nextArrow: '<i class="arrow arrow-right"></i>',
            prevArrow: '<i class="arrow arrow-left"></i>',
            slidesToShow: 1
        });
    }
    tinymce.init({
        selector: '#editor',
        language: 'pl',
        plugins: 'code image link',
        toolbar: "formatselect | epi-personalized-content epi-link anchor numlist bullist indent outdent bold italic underline link alignleft aligncenter alignright | image epi-image-editor media code | epi-dnd-processor | removeformat | fullscreen ",
        images_upload_url: '/upload.php',
        images_upload_base_path: '/images',
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/upload.php');
            xhr.onload = function () {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                console.log(json.location);
                success('/' + json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        }
    });
    $(".navbar-nav li a").click(function (event) {
        $(".navbar-collapse").collapse('hide');
    });
    var scrollTop = $(window).scrollTop();

    $(window).scroll(function () {
        scrollTop = $(window).scrollTop();
        if (scrollTop >= 100) {
            $('.navbar').addClass('short-navbar');
        } else if (scrollTop < 100) {
            $('.navbar').removeClass('short-navbar');
        }
        loadSkillsBar();
        loadProject();
    });
    loadSkillsBar();
    loadProject();

});

function loadSkillsBar() {
    var scrollTop = $(window).scrollTop();
    if (scrollTop > ($('#about').height() - 100) && scrollTop < ($('#about').height() + 1 / 2 * $('#home').height())) {
        var skills = $('.skill')
        $.each(skills, function (key, skill) {
            var percent = parseInt($(skill).attr('data-percent'));
            $(skill).children().children('span').attr('data-to', percent);
            $(skill).children().children('.skill-value').css({
                'background-image': 'linear-gradient(90deg, #a21af0 0%, #a21af0 ' + (percent - 2) + '%, transparent ' + (percent + 2) + '%, transparent 100%)',
                'background-image': '-webkit-linear-gradient(90deg, #a21af0 0%, #a21af0 ' + (percent - 2) + '%, transparent ' + (percent + 2) + '%, transparent 100%)',
                'background-image': '-o-linear-gradient(90deg, #a21af0 0%, #a21af0 ' + (percent - 2) + '%, transparent ' + (percent + 2) + '%, transparent 100%) ',
                'background-image': 'linear-gradient(90deg, #a21af0 0%, #a21af0 ' + (percent - 2) + '%, transparent ' + (percent + 2) + '%, transparent 100%) '
            });

            $(skill).children().children('.skill-value').css('width', '100%');

        });
        $('.counter').each(function () {
            var $this = $(this),
                countTo = $this.attr('data-to');

            $({
                countNum: $this.text()
            }).animate({
                countNum: countTo
            }, {
                duration: 3000,
                step: function () {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function () {
                    $this.text(this.countNum);
                }
            });
        })
    }
};

function loadProject() {
    var projects = $('.project:not(.visible)');
    var scrollTop = $(window).scrollTop();
    $.each(projects, function (key, project) {
        if ((scrollTop - 1 / 2 * $(project).height()) > ($(project).offset().top - $(window).height()) && (scrollTop) < ($(project).offset().top + 1 / 2 * $(project).height())) {
            $(project).addClass('visible');
        }
    });

}

(function () {
    //copyright JGA 2013 under MIT License
    var monster = {
        set: function (e, t, n, r) {
            var i = new Date,
                s = "",
                o = typeof t,
                u = "";
            r = r || "/", n && (i.setTime(i.getTime() + n * 24 * 60 * 60 * 1e3), s = "; expires=" + i.toGMTString());
            if (o === "object" && o !== "undefined") {
                if (!("JSON" in window)) throw "Bummer, your browser doesn't support JSON parsing.";
                u = JSON.stringify({
                    v: t
                })
            } else u = escape(t);
            document.cookie = e + "=" + u + s + "; path=" + r
        },
        get: function (e) {
            var t = e + "=",
                n = document.cookie.split(";"),
                r = "",
                i = "",
                s = {};
            for (var o = 0; o < n.length; o++) {
                var u = n[o];
                while (u.charAt(0) == " ") u = u.substring(1, u.length);
                if (u.indexOf(t) === 0) {
                    r = u.substring(t.length, u.length), i = r.substring(0, 1);
                    if (i == "{") {
                        s = JSON.parse(r);
                        if ("v" in s) return s.v
                    }
                    return r == "undefined" ? undefined : unescape(r)
                }
            }
            return null
        },
        remove: function (e) {
            this.set(e, "", -1)
        },
        increment: function (e, t) {
            var n = this.get(e) || 0;
            this.set(e, parseInt(n, 10) + 1, t)
        },
        decrement: function (e, t) {
            var n = this.get(e) || 0;
            this.set(e, parseInt(n, 10) - 1, t)
        }
    };

    if (monster.get('cookieinfo') === 'true') {
        return false;
    }

    var container = document.createElement('div'),
        link = document.createElement('a');

    container.setAttribute('id', 'cookieinfo');
    container.setAttribute('class', 'cookie-alert');
    container.innerHTML = '<h6>Ta strona wykorzystuje pliki cookie</h6><p>Używamy informacji zapisanych za pomocą plików cookies w celu zapewnienia maksymalnej wygody w korzystaniu z naszego serwisu. Mogą też korzystać z nich współpracujące z nami firmy badawcze oraz reklamowe. Jeżeli wyrażasz zgodę na zapisywanie informacji zawartej w cookies kliknij na &bdquo;x&rdquo; w prawym górnym rogu tej informacji. Jeśli nie wyrażasz zgody, ustawienia dotyczące plików cookies możesz zmienić w swojej przeglądarce. <a id="more-cookies-info" title="Wyłaczenie ciasteczek" href="http://ciasteczka.eu/#jak-wylaczyc-ciasteczka" target="_blank">Dowiedź się jak to zrobić</a></p>';

    link.setAttribute('href', '#');
    link.setAttribute('class', 'close');
    link.setAttribute('title', 'Zamknij');


    function clickHandler(e) {
        if (e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }

        container.setAttribute('style', 'opacity: 1');

        var interval = window.setInterval(function () {
            container.style.opacity -= 0.01;

            if (container.style.opacity <= 0.02) {
                document.body.removeChild(container);
                window.clearInterval(interval);
            }
        }, 4);
    }

    if (link.addEventListener) {
        link.addEventListener('click', clickHandler);
    } else {
        link.attachEvent('onclick', clickHandler);
    }

    container.appendChild(link);
    document.body.appendChild(container);

    monster.set('cookieinfo', 'true', 365);

    return true;
})();

function previewFile() {
    var preview = document.querySelector('img');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}
