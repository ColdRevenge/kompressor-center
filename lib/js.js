function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

var cities = {
    'moscow': 'Москва',
    'spb': 'Санкт-Петербург',
    'pskov': 'Псков',
    'great_luke': 'Великие Луки',
    'kazan': 'Казань',
    'ufa': 'Уфа',
    'chelyabinsk': 'Челябинск',
    'novosibirsk': 'Новосибирск',
};
var currentCities = ['moscow'];

function setCityCookie(value, expires) {
    var dt = new Date(new Date().getTime() + expires);
    document.cookie = 'choose-city=' + value + '; path=/; expires=' + dt.toUTCString();
    setCitySelectValue(value);
}

function setCitySelectValue(value) {
    if (currentCities.indexOf(value) >= 0) {
        $('.choose-city-select a').html('г. ' + cities[getCookie('choose-city')]);
    }
}

jQuery(document).ready(function () {
    /* SELECT CITY */
    $('.choose-city-select a').click(function() {
        $.fancybox({width: 500, href: '#choose-city', type: 'inline'});
        return false;
    })

    if ($('#choose-city').data('city')) {
        setCityCookie($('#choose-city').data('city'), 100*24*60*60*1000);
    } else if ( ! getCookie('choose-city')) {
        $.fancybox({width: 500, href: '#choose-city', type: 'inline'});
        setCityCookie('none', 5*60*1000);// Если просто закроем - окно не будет показываться еще 5 минут
    } else {
        setCitySelectValue(getCookie('choose-city'));
    }

    $('#choose-city a').click(function() {
        var href = $(this).attr('href');
        setCityCookie($(this).data('city'), 100*24*60*60*1000);
        if (currentCities.indexOf($(this).data('city')) >= 0) {
            $.fancybox.close();
            return false;
        }
        return true;
    });
    /* END SELECT CITY */

    $('.ajax-send-data').click(function() {
        var obj = $(this)
        if (obj.data('loading') == 1) { return false; }
        obj.addClass('ajax-loading').data('loading', 1);
        $.post(obj.data('url'), {'id': obj.data('id')}).success(function() {
            if (text = obj.data('success')) {
                var old = obj.text();
                obj.html(text);
                obj.data('success', old);
            }
            obj.removeClass('ajax-loading').data('loading', 0);
        }).error(function() {
            obj.html('Ошибка')
        })
        return false;
    });

    /**
     * Иконки характеристик
     */
    $('.chars-product>div').hover(function () {
        $(this).find('img').animate({
            marginTop: 0
        }, 200)
    }, function () {
        $(this).find('img').animate({
            marginTop: 2
        }, 200)
    });

    $("a[rel^='auth']").fancybox({
        width: 317,
        height: 170,
        modal: true,
        type: 'iframe',
        cyclic: false,
        fitToView: false,
        autoSize: true,
        closeClick: true,
        openEffect: 'none',
        closeEffect: 'none',
        hideOnOverlayClick: true,
        hideOnContentClick: true,
        enableEscapeButton: true,
        showCloseButton: true
    });
    $("a[rel^='register']").fancybox({
        width: 517,
        height: 350,
        modal: true,
        type: 'iframe',
        cyclic: false,
        fitToView: false,
        autoSize: true,
        closeClick: true,
        openEffect: 'none',
        closeEffect: 'none',
        hideOnOverlayClick: true,
        hideOnContentClick: true,
        enableEscapeButton: true,
        showCloseButton: true
    });

});

jQuery(document).ready(function ()
{


    $('.tabs-header').hover(function () {

    }, function () {
        obj = $('.tabs-header>div.active');
        $('.tabs-main-arrow').stop(true, false).animate({
            left: (12 + obj.position()['left'] + parseInt(obj.css('width')) / 2)
        });
    })
    $('.tabs-header>div').hover(function () {
        obj = $(this);
        $('.tabs-main-arrow').stop(true, false).animate({
            left: (12 + obj.position()['left'] + parseInt(obj.css('width')) / 2)
        });
    }, function () {

    })
    $('.tabs-header>div').click(function () {
        obj = $(this);

        $('.tabs-main-arrow').stop(true, false).animate({
            left: (12 + obj.position()['left'] + parseInt(obj.css('width')) / 2)
        });

        tab_num = $(this).index();
        $('.tabs-header>div.active').removeClass('active');
        $(this).addClass('active');
        $('.tabs-content>div').hide();
        $('.tabs-content>div').eq(tab_num).fadeIn('fast');
    });
    //  slide("#catalog_list", 25, 12);
});








jQuery(document).ready(function () {
    $('#main-icon a').rotate({
        bind:
                {
                    mouseover: function () {
                        jQuery(this).find('img').rotate({
                            animateTo: 360
                        })
                    },
                    mouseout: function () {
                        jQuery(this).find('img').rotate({
                            animateTo: 0
                        })
                    }
                }

    });


});
CatalogImg = {
    setCatalogImg: function (obj, img) {
        $(obj).parent().parent().parent().find('.product_img img').attr('src', base_url + 'images/gallery/' + img);
        $(obj).parent().parent().find('img').removeClass('active');
        $(obj).addClass('active');
    },
    setCatalogImgList: function (obj, img) {
        $(obj).parent().parent().parent().find('.img-box span img').attr('src', base_url + 'images/gallery/' + img);
        $(obj).parent().parent().find('img').removeClass('active');
        $(obj).addClass('active');
    }
}

function showSelection(id) {
    if (document.getElementById(id).style.display == 'block') {
        document.getElementById('img_' + id).className = 'plus';
    }
    else {
        document.getElementById('img_' + id).className = 'minus';
    }
    showJQuery(id, 0, 'slow');
}



var min_price = 100;
var max_price = 80000;