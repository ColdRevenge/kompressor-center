//Этот файл не должен меняться под конкретные проекты
//

AutoLoaderProduct = {
    next_product_button: null,
    next_product_button_offset: null,
    upLastShowButton: function () {
        AutoLoaderProduct.next_product_button = $('.next-product');
        AutoLoaderProduct.next_product_button_offset = $('.next-product').offset();
        return true;
    },
    LoaderScrool: function () {
        AutoLoaderProduct.upLastShowButton();
        $(window).on("scroll", function () {
            AutoLoaderProduct.upLastShowButton();
            if (AutoLoaderProduct.next_product_button_offset !== null) {
                if ($(window).scrollTop() >= AutoLoaderProduct.next_product_button_offset['top'] - 650) {
                    AutoLoaderProduct.next_product_button.click();
                }
            }
        });
    }
}

$(document).ready(function () {
    if ($('.product').length > 0) {
        AutoLoaderProduct.LoaderScrool();
    }
});
function trim(str, charlist) {
    charlist = !charlist ? ' \s\xA0' : charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '\$1');
    var re = new RegExp('^[' + charlist + ']+|[' + charlist + ']+$', 'g');
    return str.replace(re, '');
}

//Этот файл не должен меняться под конкретные проекты
function setFieldPay() {
    //Название, ИНН, Юр.адрес, Банк, БИК, Р/с, КПП.
    _pay = $('#is_jur_person_1');

    if (_pay) {
        if (_pay.attr('checked') !== undefined) {
            $('#mail_notify').fadeIn(); //* в поле email
            $('#payment_2').removeAttr('disabled');
            $('#payment_2+label').removeClass('label-hover');
            $('#payment_3').attr('disabled', 'disabled');
            $('#payment_3+label').addClass('label-hover');
            $('#payment_4').attr('disabled', 'disabled');
            $('#payment_4+label').addClass('label-hover');
        }
        else {
            $('#mail_notify').fadeOut(); //* в поле email
            $('#payment_2').attr('disabled', 'disabled');
            $('#payment_2+label').addClass('label-hover');
            $('#payment_3').removeAttr('disabled');
            $('#payment_3+label').removeClass('label-hover');
            $('#payment_4').removeAttr('disabled');
            $('#payment_4+label').removeClass('label-hover');
        }
    }
}
/**
 * Доставка
 */
function delivery_methods() {
    $('#delivery_methods .delivery_radio input[type="radio"]').change(function () {
        /**
         * Если у доставки есть дети
         */
        $('.delivery_child').fadeOut('fast', function () {
            $(this).find('input[type="radio"]:first').removeAttr('checked');
        });
        $('.delivery_child_' + $(this).val() + ':first').find('input[type="radio"]').attr('checked', 'checked');
        $('.delivery_child_' + $(this).val()).fadeIn('slow');
        
        /**
         * Подгрузка сервисов доставки
         */
        if ($(this).attr('rel')) { //Если у метода доставки есть сервис
            AjaxQuery('delivery_service_' + $(this).val(), base_url + 'delivery/service/' + $(this).attr('rel') + '/' + $(this).val() + '/');
            $('.delivery_service').fadeOut('fast');
            $('.delivery_service').html(' ');
            $('#delivery_service_' + $(this).val()).fadeIn('slow');
        }
    });

//    $('#delivery_methods input').change(function() {
//       $('#check_out_hidden input').val('');
//    });
    $('input[name="is_jur_person"]').change(function () {
        setFieldPay();
    });
    $('#email_check').change(function () {
        if ($(this).val().length > 2) {
            $('#is_send_email').attr('checked', 'checked');
        }
        else {
            $('#is_send_email').removeAttr('checked');
        }
    });
    $('#email_check').change();
}


$(document).ready(function () {
    delivery_methods();
    setFieldPay();
    slide('#parent_0', '43px', '39px');

    $(".carousel-brand").jCarouselLite({
        btnNext: ".carousel-wrap .prevBrand",
        btnPrev: ".carousel-wrap .nextBrand",
        visible: 5,
        mouseWheel: true,
        start: 0
    });

    $("a[rel^='fancy']").fancybox({
        width: 765,
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
    $("a[rel^='page']").fancybox({
        width: 985,
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
    $("a[rel^='fancy-size']").fancybox({
        width: 420,
        height: 134,
        modal: true,
        scrolling: 'no',
        type: 'iframe',
        cyclic: false,
        fitToView: false,
        autoSize: false,
        closeClick: true,
        openEffect: 'none',
        closeEffect: 'none',
        hideOnOverlayClick: true,
        hideOnContentClick: true,
        enableEscapeButton: true,
        showCloseButton: true
    });
    $("a[rel^='call_back']").fancybox({
        width: 380,
        height: 442,
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
    $("a[rel^='call_back_update']").fancybox({
        width: 380,
        height: 490,
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
    $("a[rel^='page_mini']").fancybox({
        width: 558,
        height: 550,
        modal: true,
        type: 'iframe',
        cyclic: false,
        fitToView: false,
        autoSize: false,
        closeClick: true,
        openEffect: 'none',
        closeEffect: 'none',
        hideOnOverlayClick: true,
        hideOnContentClick: true,
        enableEscapeButton: true,
        showCloseButton: true
    });
});
var is_footer_bottom = true; //Если подвал виден
function footerPanel() {
    var top = $(document).scrollTop();
    if (top < 86) {
        if (is_footer_bottom === false) {
            footer_panel.stop(true, false);
            footer_logo.stop(true, false);
            is_footer_bottom = true;
            footer_logo.animate({
                left: '-80px',
                opacity: 0
            }, 500, 'swing', function () {
                $('#update-shop').animate({
                    marginTop: '40px'
                }, 300, 'swing', function () {
                    footer_panel.animate({
                        bottom: '-39px'
                    }, 400
                            )
                });
            });
        }
    }
    else {
        if (is_footer_bottom === true) {
            footer_panel.stop(true, false);
            footer_logo.stop(true, false);
            is_footer_bottom = false;
            footer_panel.animate({
                bottom: '0px'
            }, 400, 'swing', function () {
                footer_logo.animate({
                    left: menu_center_pos_left,
                    opacity: 1
                }, 500, 'swing', function () {
                    $('#update-shop').animate({
                        marginTop: '5px'
                    }, 700)
                });
            });
        }
    }
}

$(window).load(function () {
    footer_panel = $("#footer_panel");
    footer_logo = $("#footer_logo");

    if ($('#footer_panel .center').offset() !== null) {
        menu_center_pos_left = parseInt($('#footer_panel .center').offset()['left'] - 12) + 'px';
        $(window).scroll(function () {
            footerPanel();
        });
        footerPanel();
    }
});
/**
 * Выделяет текст в текстовое поле
 */
function select_text_field(id) {
    //    ie='\v'=='v'
    //    if(ie){
    var oTextBox = document.getElementById(id);
    oTextBox.focus();
    oTextBox.select();
//    } else {
//        var selection = window.getSelection();
//        var range = document.createRange();
//        var tab = document.getElementById(id);
//
//        range.selectNodeContents(tab);
//        selection.addRange(range);
//    }
}

var selected_image_id; //Если есть выбор между картинками, то выбранная картинка помещается сюда
function basket(action_id, product_id, mod_id, not_detailed, image_id, char_1_id, char_2_id, char_3_id, char_4_id, char_5_id, add_count, shop_type) {

    _shop_url = base_url;
    if (shop_type == 1) {
        _shop_url = 'https://lalipop.ru/'
    }
    else if (shop_type == 2) {
        _shop_url = 'https://lady.lalipop.ru/'
    }
    else if (shop_type == 3) {
        _shop_url = 'https://platok.lalipop.ru/'
    }
    else if (shop_type == 4) {
        _shop_url = 'https://sumka.lalipop.ru/'
    }
    else if (shop_type == 5) {
        _shop_url = 'https://woman.lalipop.ru/'
    }
    //alert(_shop_url)
    if (add_count === undefined) {
        add_count = 1;
    }

    if (image_id)
        selected_image_id = image_id;
//    is_warehouse = isWarehouse(product_id, mod_id);
    is_warehouse = 1000;
    // alert(base_url + 'basket/add/'+ product_id + '/' + mod_id + '/' +selected_image_id + '/' + char_1_id + '/' + char_2_id + '/' + char_3_id + '/'  + add_count + '/1/');
    switch (action_id) {
        case 1:
            if (is_warehouse > 0) {
                AjaxRequestAsync('basket', _shop_url + 'basket/add/' + product_id + '/' + mod_id + '/' + selected_image_id + '/' + char_1_id + '/' + char_2_id + '/' + char_3_id + '/' + '/' + char_4_id + '/' + char_5_id + '/' + add_count + '/1/');
            }
            else {
                alert('Нет на складе!')
            }
            break;
        case 2: //Полное удаление
            delivery_methods();
            setFieldPay();
            AjaxRequestAsync('basket', _shop_url + 'basket/del/' + product_id + '/' + mod_id + '/?char_1_id=' + char_1_id + '&char_2_id=' + char_2_id);
            break;
        case 3: //Изменение кол-ва
            delivery_methods();
            setFieldPay();
            AjaxRequestAsync('basket', _shop_url + 'basket/add/' + product_id + '/' + mod_id + '/' + selected_image_id + '/' + char_1_id + '/' + char_2_id + '/' + char_3_id + '/' + char_4_id + '/' + char_5_id + '/' + add_count + '/');
            break;
        case 4: //Удаление одной позиции
            delivery_methods();
            setFieldPay();
            AjaxRequestAsync('basket', _shop_url + 'basket/del/' + product_id + '/' + mod_id + '/?is_one=1&char_1_id=' + char_1_id + '&char_2_id=' + char_2_id);
            break;
    }
//    setTimeout(function() {
    AjaxRequestAsync('basket_detailed', base_url + 'basket/' + not_detailed + '/');

    setFieldPay();
    delivery_methods();
//    AjaxRequest('basket-bottom-count', base_url + 'basket/get-count-product');
//    }, 290);
}



function basketModal(image_box_id, img_id, product_id, mod_id, image_id, char_1_id, char_2_id, char_3_id, char_4_id, char_5_id, add_count) {
    _shop_url = base_url;
    if (shop_type == 1) {
        _shop_url = 'https://lalipop.ru/'
    }
    else if (shop_type == 2) {
        _shop_url = 'https://lady.lalipop.ru/'
    }
    else if (shop_type == 3) {
        _shop_url = 'https://platok.lalipop.ru/'
    }
    else if (shop_type == 4) {
        _shop_url = 'https://sumka.lalipop.ru/'
    }
    else if (shop_type == 5) {
        _shop_url = 'https://woman.lalipop.ru/'
    }

    $('#basket_added').fadeIn('slow', function () {


        action_id = 1;
        not_detailed = 1;

        if (image_id)
            selected_image_id = image_id;
//    is_warehouse = isWarehouse(product_id, mod_id);
        is_warehouse = 1000;
        // alert(base_url + 'basket/add/'+ product_id + '/' + mod_id + '/' +selected_image_id + '/' + char_1_id + '/' + char_2_id + '/' + char_3_id + '/'  + add_count + '/1/');
        switch (action_id) {
            case 1:
                if (is_warehouse > 0) {
                    AjaxQueryParentFrame('basket', _shop_url + 'basket/add/' + product_id + '/' + mod_id + '/' + selected_image_id + '/' + char_1_id + '/' + char_2_id + '/' + char_3_id + '/' + '/' + char_4_id + '/' + char_5_id + '/' + add_count + '/1/');
                }
                else {
                    alert('Нет на складе!')
                }
                break;
            case 2: //Полное удаление
                AjaxQueryParentFrame('basket', _shop_url + 'basket/del/' + product_id + '/' + mod_id + '/?char_1_id=' + char_1_id + '&char_2_id=' + char_2_id);
                break;
            case 3: //Изменение кол-ва
                AjaxQueryParentFrame('basket', _shop_url + 'basket/add/' + product_id + '/' + mod_id + '/' + selected_image_id + '/' + char_1_id + '/' + char_2_id + '/' + char_3_id + '/' + char_4_id + '/' + char_5_id + '/' + add_count + '/');
                break;
            case 4: //Удаление одной позиции
                AjaxQueryParentFrame('basket', _shop_url + 'basket/del/' + product_id + '/' + mod_id + '/?is_one=1&char_1_id=' + char_1_id + '&char_2_id=' + char_2_id);
                break;
        }
//    setTimeout(function() {
        AjaxQueryParentFrame('basket_detailed', _shop_url + 'basket/' + not_detailed + '/');






        $('#basket_added').fadeOut('slow');
    });
}



basket_left = clone_id = basket_top = image_box_left = image_box_top = null;

function basketAnimated(image_box_id, img_id, product_id, mod_id, image_id, char_1_id, char_2_id, char_3_id, char_4_id, char_5_id, add_count) {

    var scrool_pos = 0;
    if (typeof (window.pageYOffset) == 'number') {
        scrool_pos = window.pageYOffset;
    } else if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
        scrool_pos = document.body.scrollTop;
    } else if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) {
        scrool_pos = document.documentElement.scrollTop;
    }

    $('.product-wrapp').css({//ЗАПЛАТКА для Gift66 и modatime
        position: 'static'
    });

    if (basket_left === null) {
        basket_left = $("#basket").offset()['left'] + 40;
        basket_top = $("#basket").offset()['top'] + 10;
    }
    image_box_left = $(image_box_id).offset()['left'];
    image_box_top = $(image_box_id).offset()['top'];

    if (clone_id !== null) {
        return false;
    }
    clone_id = $(img_id).clone().appendTo(image_box_id)
            .css({
                'position': 'absolute',
                'z-index': '10000',
                'left': image_box_left,
                'top': image_box_top
            })
            .animate({
                opacity: 0.05,
                left: basket_left,
                top: basket_top,
                width: '20px'
            }, 700, function () {
                $('.product-wrapp').css({//ЗАПЛАТКА для Gift66 и modatime
                    position: 'absolute'
                });

                $(this).remove();
                $('#basket-img').animate({
                    width: '44px',
                    height: '44px',
                    left: '-9px',
                    top: '-5x'
                }
                , 50, function () {
                    $('#basket-img').animate({
                        width: '36px',
                        height: '36px',
                        left: '0px',
                        top: '0px'
                    }
                    , 850, function () {

                    });
                    basket(1, product_id, mod_id, 0, image_id, char_1_id, char_2_id, char_3_id, char_4_id, char_5_id, add_count);

                    clone_id.detach();
                    clone_id = null;
                });
            });
}



/**
 * Проверка на наличие товара в корзине
 */
function isWarehouse(product_id, mod_id) {
    var result = 0;
    jQuery.ajax({
        url: base_url + 'basket/is_product/' + product_id + '/' + mod_id + '/?x=11',
        dataType: "text",
        type: "POST",
        async: false,
        cache: false,
        success: function (response) {
            res = JSON.parse(response);
            if (response) {
                if (res.warehouse > 0) {
                    if (parseInt(res.count) < parseInt(res.warehouse)) {
                        result = 1;
                    }
                    else
                        result = 0;
                }
                else
                    result = 0;
            }
            else
                result = 0;
        },
        error: function (response) {
            result = 0;
        }
    });
    //            alert(url + 'basket/is_product/' + product_id + '/' + mod_id + '/' + "%%%" + result + '##' + product_id + " ||| " + mod_id);
    return result;
}


function detectIE6() {
    var browser = navigator.appName;
    if (browser == "Microsoft Internet Explorer") {
        var b_version = navigator.appVersion;
        var re = /\MSIE\s+(\d\.\d\b)/;
        var res = b_version.match(re);
        if (res != undefined) {
            if (res[1] <= 7) {
                return true;
            }
        }
    }
    return false;
}
if (detectIE6()) {
    alert('Вы используете устаревший браузер. \n\nДля просмотра сайта в правильном представлении, пожалуйста обновите ваш браузер');
}
function addBookmark(a) {
    try {
        // Internet Explorer
        window.external.AddFavorite('https://girlshop.ru', 'Интернет-магазин профессиональной косметики');
    } catch (e) {
        try {
            // Mozilla
            window.sidebar.addPanel('Интернет-магазин профессиональной косметики', 'https://girlshop.ru', "");
        }
        catch (e) {
            // Opera
            if (typeof (opera) == "object") {
                a.rel = "sidebar";
                a.title = 'Интернет-магазин профессиональной косметики';
                a.url = 'https://my-pack.ru/';
                return true;
            } else {
                // Unknown
                alert('Нажмите Ctrl-D чтобы добавить страницу в закладки');
            }
        }
    }
}


/**
 * Устанавливает текст в тектовом поле,
 * при потере фокуса если текст не изменился то опять возвращает его
 */
function setDefaultInputText(id, text) {
    var obj = document.getElementById(id);
    if (obj) {
        if (obj.nodeName == 'TEXTAREA') {

            if (obj.innerHTML == '') {
                obj.innerHTML = text;
                obj.style.color = '#5A5A5A';
            }

            obj.onclick = function () {
                obj.style.color = 'black';
                if (obj.innerHTML == text) {
                    obj.innerHTML = '';
                    obj.style.color = '#5A5A5A';
                }
            }
            obj.onblur = function () {
                if (obj.innerHTML == '') {
                    obj.innerHTML = text;
                    obj.style.color = '#5A5A5A';
                }
                this.className = 'text'
            }
        }
        else {
            if (obj.value == '') {
                obj.value = text;
                obj.style.color = '#5A5A5A';
            }
            obj.onclick = function () {
                if (obj.value == text) {
                    obj.value = '';
                    obj.style.color = 'black';
                }
            }
            obj.onblur = function () {
                if (obj.value == '') {
                    obj.value = text;
                    obj.style.color = '#5A5A5A';
                }
                this.className = 'text'
            }
        }
    }
}
/**
 * Только для ламината
 * 
 */
function getOtbor() {
    location.href = '/' + catalog_dir + '/podbor/find/' + document.getElementById('char_1').options[document.getElementById('char_1').selectedIndex].value + '/' + document.getElementById('char_2').options[document.getElementById('char_2').selectedIndex].value + '/' + document.getElementById('char_3').options[document.getElementById('char_3').selectedIndex].value + '/';
}


function showMenu(id) {
    document.getElementById(id).style.display = 'block';
}
function hideMenu(id) {
    document.getElementById(id).style.display = 'none';
}

$(function () {
    //при двойном клике на текстовое поле
    //Картинки )
    $("a[rel^='prettyPhoto']").prettyPhoto({
        allowresize: true,
        social_tools: ''
    });
});
function order_info(obj) {
    //    alert(obj.id);
    obj.id = 'order_link';
    //    alert(obj.id);
    //    $("a[id^='order_link']").prettyPopin({
    $("a#order_link").prettyPopin({
        width: 432,
        height: 158,
        followScroll: false
    });
}

function slide(navigation_id, pad_out, pad_in) {
    var list_elements = navigation_id + ">li";
    var link_elements = list_elements + ">a";
    jQuery(link_elements).each(function (i)
    {
        jQuery(this).hover(
                function ()
                {
                    jQuery(this).animate({
                        paddingLeft: pad_out
                    }, 150);
                },
                function ()
                {
                    jQuery(this).animate({
                        paddingLeft: pad_in
                    }, 150);
                });
    });
}


function Show(id) {
    document.getElementById(id).style.display = (document.getElementById(id).style.display == 'block') ? 'none' : 'block';
}

/**
 * Развороты в меню
 */
var open_menu = new Array();
var no_close = 0;
function show_menu(result_id, url) {
    no_close = 1;
    open_menu[open_menu.length] = result_id;
    menu_hide(result_id);
    AjaxQuery(result_id, url);
    document.getElementById(result_id).style.display = 'block';
}

function menu_hide(result_id) {
    if (no_close == 0 || typeof (result_id) != "undefined") {
        for (i = 0; i < open_menu.length; i++) {
            if (document.getElementById(open_menu[i])) {
                if (document.getElementById(open_menu[i]).style.display == 'block') {
                    document.getElementById(open_menu[i]).style.display = 'none';
                }
            }
        }
    }
    if (typeof (result_id) == "undefined") {
        no_close = 0;
    }
}

/**
 * Автоподгрузка иконок
 */
var img_hover = new Array();
var img_obj = new Array();
function setHoverImg(img_obj_id, img_over) {
    if (document.getElementById(img_obj_id) && document.getElementById(img_obj_id).src) {
        img_obj[img_obj_id] = document.getElementById(img_obj_id);
        img_hover[img_obj_id] = new Image();
        img_hover[img_obj_id].src = img_obj[img_obj_id].src;
        img_obj[img_obj_id].onmouseout = function () {
            img_obj[img_obj_id].src = img_hover[img_obj_id].src;
        }

        img_hover[img_over] = new Image();
        img_hover[img_over].src = img_over;
        img_obj[img_obj_id].onmouseover = function () {
            this.src = img_hover[img_over].src;
        }
    }
}
/**
 * Если is_show = 1 - показываем, 2 - скрываем, не указано то автоматом
 */
function ShowHide(id, is_show) {
    if (is_show == 2) {
        document.getElementById(id).style.display = 'none'
    }
    else if (is_show == 1) {
        document.getElementById(id).style.display = 'block';
    }
    else
        document.getElementById(id).style.display = (document.getElementById(id).style.display == 'block') ? 'none' : 'block';
}
/**
 * Если is_show = 1 - показываем, 2 - скрываем, не указано то автоматом
 */
function showJQuery(id, is_show, speed) {
    if (!speed)
        speed = 'slow'
    if (!is_show) {
        if (document.getElementById(id).style.display != 'block') {
            $('#' + id).fadeIn(speed, function () {
                document.getElementById(id).style.display = 'block';
            });
        }
        else {
            $('#' + id).fadeOut(speed, function () {
                document.getElementById(id).style.display = 'none';
            });
        }
    }
    else if (is_show == 1) {
        $('#' + id).fadeIn(speed);
    }
    else if (is_show == 2) {
        $('#' + id).fadeOut(speed);
    }
}
/**
 * Работа с Ajax
 */
/**
 * Сюда добавляем все скрипты которые должны работать после Ajax-изменения
 * @returns {undefined}
 */
function AjaxQueryScriptWrapper() {
    $("a[rel^='prettyPhoto']").prettyPhoto({
        allowresize: true,
        social_tools: ''
    });
}

function AjaxQuery(result_id, url) {
    if (document.getElementById(result_id)) {
        jQuery.ajax({
            url: url,
            dataType: "html",
            type: "POST",
            success: function (response) {
                document.getElementById(result_id).innerHTML = response;
                $('#' + result_id + ' script').each(function () {
                    eval($(this).html());
                });
                AjaxQueryScriptWrapper()
            },
            error: function (response) {
                document.getElementById(result_id).innerHTML = response;
            }
        });
    }
}

function AjaxQueryParentFrame(result_id, url) {
    jQuery.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        data: {
            'session_id': session_id
        },
        error: function () {
            //alert('Ошибка соединения');
        },
        success: function (response) {
//            alert(response);
            window.parent.document.getElementById(result_id).innerHTML = response;
            AjaxQueryScriptWrapper()
        }
    });
}

function AjaxFormRequest(result_id, form_id, url) {
    jQuery.ajax({
        url: url,
        dataType: "html",
        type: "POST",
        data: jQuery('#' + form_id).serialize(),
        success: function (response) {
            if (document.getElementById(result_id).nodeName == 'INPUT') {
                document.getElementById(result_id).value = response;
            }
            else
                document.getElementById(result_id).innerHTML = response;

            AjaxQueryScriptWrapper()
        },
        error: function (response) {
            document.getElementById(result_id).innerHTML = response;
        }
    });
}
function setImage(src) {
    var img = document.createElement("IMG");
    img.setAttribute("src", src);
    img.setAttribute("alt", 'индикатор');
    document.getElementById('load_file').appendChild(img);
}

function AjaxRequestAsync(result_id, url) {
    if (document.getElementById(result_id)) {
        jQuery.ajax({
            url: url,
            dataType: "text",
            type: "POST",
            async: false,
            cache: false,
            data: {
                'session_id': session_id
            },
            error: function () {
                // alert('Ошибка соединения');
            },
            success: function (response) { //success - функция, которая вызывается, когда запрос прошёл успешно и данные (data) получены

                if (document.getElementById(result_id)) {
                    if (document.getElementById(result_id).nodeName == 'INPUT') {
                        document.getElementById(result_id).value = response;
                        $('#' + result_id + ' script').each(function () {
                            eval($(this).html());
                        });
                    }
                    else {
                        document.getElementById(result_id).innerHTML = response;

                        $('#' + result_id + ' script').each(function () {
                            eval($(this).html());
                        });
                    }
                    AjaxQueryScriptWrapper()
                }
            }
        });
    }
}
/**
 * Аналог AjaxRequest с индикатором загрузки
 * @param {type} result_id
 * @param {type} url
 * Если is_append = 1 то текст добавляется к result_id
 * @returns {undefined}
 */
function AjaxRequestInd(result_id, url, indicator_id, is_append, scrool_to, form_id, animate_id) {
    if (document.getElementById(result_id)) {
        if (!indicator_id) {
            indicator_id = result_id; //Если id индиктора не задан - то id это result_id
        }
        if (!animate_id) {
            animate_id = 1;
        }
        var result_position = $('#' + result_id).css('position');
        if (form_id) { //Если указана форма, то берем из нее переменные
            var data = jQuery('#' + form_id).serialize();
            history.pushState({title: '', href: (url + '?' + data)}, null, (url + '?' + data)); 
//            alert( (url + '?post=' + data))
//            window.addEventListener("popstate", function (e) {
//                alert(e.state.href);
//            }, false);
        }
        else {
            var data = null;
            history.pushState({title: '', href: url.replace(/not_detailed_catalog=1/, 'not_detailed_catalog=0')}, null, url.replace(/not_detailed_catalog=1/, 'not_detailed_catalog=0'));
        }
//        alert(data + '#')

        jQuery.ajax({
            url: url,
            dataType: "text",
            type: "POST",
            data: data,
            error: function () {
                // alert('Ошибка соединения');
            },
            beforeSend: function () {
                if (animate_id === 1) {
                    $('#' + result_id).css({'position': 'relative'});
                    $('#ajax_loading_indicator_box').remove();
                    $(indicator_id).prepend('<div id="ajax_loading_indicator_box"><img src="/images/sys/ind_1.gif" alt="Загрузка" id="ajax_loading_indicator" /></div>');
                    //Только для лади лалипоп и лалипоп
                    $('#mini-indicator').html('<img src="/images/sys/ind_mini.gif" alt="Загрузка"  />')
                }
                else if (animate_id === 2) {
                    $(indicator_id).prepend('<img src="/images/sys/ind_5.gif" alt="Загрузка" style="margin: 50px auto 0px auto;display:block;" />');
                    //Только для лади лалипоп и лалипоп
                    $('#mini-indicator').html('<img src="/images/sys/ind_mini.gif" alt="Загрузка"  />')
                }
            },
            success: function (response) { //success - функция, которая вызывается, когда запрос прошёл успешно и данные (data) получены


                if (document.getElementById(result_id)) {
                    if (document.getElementById(result_id).nodeName == 'INPUT') {
                        document.getElementById(result_id).value = response;
                        $('#' + result_id + ' script').each(function () {
                            eval($(this).html());
                        });
                    }
                    else {
                        if (is_append == 1) {
                            $('#' + result_id).append(response);
                        }
                        else {
                            document.getElementById(result_id).innerHTML = response;
                        }
                    }
                }
            },
            complete: function () {
                $('#' + result_id).css({'position': result_position});
                $('#ajax_loading_indicator_box').remove();
                $('#mini-indicator').html(' ')
                if (scrool_to) {
                    jQuery.scrollTo(scrool_to, 1200);
                }
                AjaxQueryScriptWrapper()
            }
        });
    }
}

function AjaxRequest(result_id, url) {
    if (document.getElementById(result_id)) {
        jQuery.ajax({
            url: url,
            type: 'POST',
            dataType: 'html',
            error: function (x, r, d) {
                alert('Ошибка соединения ' + d);
            },
            success: function (response) { //success - функция, которая вызывается, когда запрос прошёл успешно и данные (data) получены

                if (document.getElementById(result_id)) {
                    if (document.getElementById(result_id).nodeName == 'INPUT') {
                        document.getElementById(result_id).value = response;
                    }
                    else
                        document.getElementById(result_id).innerHTML = response;


                    $('#' + result_id + ' script').each(function () {
                        eval($(this).html());
                    });
                    AjaxQueryScriptWrapper()
                }
            }
        });
    }
}
function getAjaxPage(result_id, url) {
    if (document.getElementById(result_id).style.display == 'block') {
        document.getElementById(result_id).style.display = 'none';
    }
    else {
        AjaxRequest(result_id, url);
        document.getElementById(result_id).style.display = 'block';
    }
    return true;
}

function AjaxFormQuery(result_id, form_id, url) {
    if (document.getElementById(result_id)) {
        jQuery.ajax({
            url: url,
            dataType: "html",
            type: "POST",
            data: jQuery('#' + form_id).serialize(),
            success: function (response) {
                document.getElementById(result_id).innerHTML = response;
                AjaxQueryScriptWrapper()
            },
            error: function (response) {
                document.getElementById(result_id).innerHTML = response;
            }
        });
    }
}


/**
 * Подсветка звездочек 
 */
var rating_tmp = new Array();
function rating_s(num, prefix, type) {
    if (type == 1) {
        for (i = 1; i <= num; i++) {
            rating_tmp[i] = document.getElementById(prefix + i).src;
            document.getElementById(prefix + i).src = '/images/fronted/rating_active.png';
        }
    }
    else {
        for (i = 1; i <= num; i++) {
            document.getElementById(prefix + i).src = rating_tmp[i];
        }
    }
}

function rating(result_id, voice, voice_id, voice_type, prefix) {
    for (i = 1; i <= 100; i++) {
        if (document.getElementById(prefix + i) != undefined) {
            document.getElementById(prefix + i).onmouseover = function () {
            };
            document.getElementById(prefix + i).onmouseout = function () {
            };
            document.getElementById(prefix + i).onclick = function () {
            };
        }
        else
            break;
    }
    AjaxRequest(result_id, '/rating/voice/' + voice_type + '/' + voice_id + '/' + voice + '/');
}


function makepage(src) {
    // We break the closing script tag in half to prevent
    // the HTML parser from seeing it as a part of
    // the *main* page.
    return "<html>\n" +
            "<head>\n" +
            "<title></title>\n" +
            "<script>\n" +
            "function step1() {\n" +
            "  setTimeout('step2()', 10);\n" +
            "}\n" +
            "function step2() {\n" +
            "  window.print();\n" +
            "  window.close();\n" +
            "}\n" +
            "</scr" + "ipt>\n" +
            "</head>\n" +
            "<body onLoad='step1()'>\n" +
            "<img src='" + src + "'/>\n" +
            "</body>\n" +
            "</html>\n";
}
function printme(src) {
    link = "about:blank";
    var pw = window.open(link, "_new");
    pw.document.open();
    pw.document.write(makepage(src));
    pw.document.close();
}
function AjaxJsonRequest(url) {
    var res = false;
    jQuery.ajax({
        url: url,
        dataType: "text",
        type: "POST",
        async: false,
        cache: false,
        success: function (response) {
            res = JSON.parse(response);
        },
        error: function (response) {
            return false;
        }
    });
    return res;
//    alert(url);
}

jQuery(document).ready(function () {

    $("a[rel^='vs']").fancybox({
        modal: true,
        width: 1000,
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
function vs(link_id, checkbox_id, is_checkbox, product_id, category_id) {
    var checkbox = document.getElementById(checkbox_id)
    var obj = document.getElementById(link_id);
    if (!checkbox.checked && !is_checkbox || is_checkbox == 1 && checkbox.checked) {
        obj.innerHTML = 'Сравнить';
        obj.className = 'vs_selected';
        obj.href = 'javascript:void(0)';
        obj.setAttribute('rel', '');
        if (!is_checkbox) {
            checkbox.checked = true;
        }

        AjaxJsonRequest(base_url + 'vs_product/add/' + product_id + '/');
    }
    else {
        if (is_checkbox == 1) { //Если клик на чекбокс
            obj.innerHTML = 'К сравнению';
            obj.className = '';
            AjaxJsonRequest(base_url + 'vs_product/del/' + product_id + '/');
            if (!is_checkbox)
                checkbox.checked = false;
        }
        obj.href = base_url + 'vs_product/' + category_id + '/?is_modal=1&is_blue_bg=1';
        obj.setAttribute('rel', 'vs');
    }
    if (document.getElementById('vs_porduct_links')) {
        jQuery('#vs_porduct_links').fadeOut('slow', function () {
            AjaxRequest('vs_porduct', url + 'vs_product/site/');
            jQuery('#vs_porduct_links').fadeIn('slow');
        });
    }
    else {
        AjaxRequest('vs_porduct', url + 'vs_product/site/');
    }


    return false;
}