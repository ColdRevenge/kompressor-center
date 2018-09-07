base = {
    slideMenu: function () {
        if ($('#left-menu').css('left') != '0px') {
            $('#left-menu-shadow').css('display', 'block');
            $('#left-menu').animate({
                left: '0'
            }, 200);
        }
        else {
            $('#left-menu-shadow').css('display', 'none');
            $('#left-menu').animate({
                left: '-180'
            }, 200);
        }
    }
}
$(document).ready(function () {
    $('#left-menu-shadow').click(function () {
        base.slideMenu();
    });
    $('#menu-icon').click(function () {
        base.slideMenu();
    });
    $('#find-icon').click(function () {
        if ($('#find').css('display') != 'none') {
            $('#find').slideUp('fast');
        }
        else {
            $('#find').slideDown('fast');
        }
    });
    $('.slideParamProduct').click(function () {
        if ($(this).next('div').css('display') != 'none') {
            $(this).next('div').slideUp('fast');
        }
        else {
            $('.slideParamProduct+div').slideUp('fast');
            $(this).next('div').slideDown('fast');
        }
    });
    delivery_methods();
    setFieldPay();
});

function upPriceCatalog(price_block, price, old_price, is_list) {
    if (is_list === 1) { //Вывод в строку товаров
        var price_discount_str = price + ' <span>р.</span><div class="notice">Старая цена: ' + old_price + ' р.</div>'
        var price_str = old_price + ' <span>р.</span>'
    }
    else {
        var price_discount_str = price + ' руб.&nbsp;<span>' + old_price + ' р.</span>'
        var price_str = old_price + ' руб.'
    }

    var price_obj = $(price_block).find('.price');

    $(price_block).find('ul>li input[rel=discount]').change(function () {
        price_obj.html(price_discount_str);

    });
    $(price_block).find('ul>li input[rel!=discount]').change(function () {
        price_obj.html(price_str);
    });
    $(price_block).find('ul>li input:checked').change();
}

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
        //    AutoLoaderProduct.LoaderScrool();
    }
});

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
        }
        else {
            var data = null;
        }

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

                    }
                    else {
                        if (is_append == 1) {
                            $('#' + result_id).append(response);
                        }
                        else {
                            document.getElementById(result_id).innerHTML = response;
                        }
                    }
                    $('#' + result_id + ' script').each(function () {
                        eval($(this).html());
                    });
                }
            },
            complete: function () {
                $('#' + result_id).css({'position': result_position});
                $('#ajax_loading_indicator_box').remove();
                $('#mini-indicator').html(' ')
                if (scrool_to) {
                    jQuery.scrollTo(scrool_to, 1200);
                }
            }
        });
    }
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
                }
            }
        });
    }
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
    $('#basket_added_' + product_id).fadeIn('slow', function () {
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
                    AjaxRequest('basket', _shop_url + 'basket/add/' + product_id + '/' + mod_id + '/' + selected_image_id + '/' + char_1_id + '/' + char_2_id + '/' + char_3_id + '/' + '/' + char_4_id + '/' + char_5_id + '/' + add_count + '/1/');
                }
                else {
                    alert('Нет на складе!')
                }
                break;
            case 2: //Полное удаление
                AjaxRequest('basket', _shop_url + 'basket/del/' + product_id + '/' + mod_id + '/?char_1_id=' + char_1_id + '&char_2_id=' + char_2_id);
                break;
            case 3: //Изменение кол-ва
                AjaxRequest('basket', _shop_url + 'basket/add/' + product_id + '/' + mod_id + '/' + selected_image_id + '/' + char_1_id + '/' + char_2_id + '/' + char_3_id + '/' + char_4_id + '/' + char_5_id + '/' + add_count + '/');
                break;
            case 4: //Удаление одной позиции
                AjaxRequest('basket', _shop_url + 'basket/del/' + product_id + '/' + mod_id + '/?is_one=1&char_1_id=' + char_1_id + '&char_2_id=' + char_2_id);
                break;
        }
//    setTimeout(function() {
        AjaxRequest('basket_detailed', _shop_url + 'basket/' + not_detailed + '/');





//<div class="basket_added">Товар успешно добавлен в корзину!</div>
        $('#basket_added_' + product_id).fadeOut('slow');
    });
}

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
                }
            }
        });
    }
}
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
        $('#delivery_child_' + $(this).val()).fadeIn('slow', function () {
            $(this).find('input[type="radio"]:first').attr('checked', 'checked');
        });
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
            },
            error: function (response) {
                document.getElementById(result_id).innerHTML = response;
            }
        });
    }
}