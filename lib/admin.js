
minimizeMenu = {
    minimizeMenu: function () {
        $('.minumizeMenu').each(function () {
            var src = $(this).find('img').attr('src');
            if (src !== undefined) {
//                $(this).hover(function () {
//                    if (src.indexOf('_l.png') !== -1) {
//                       // $(this).find('img').attr('src', '/images/sys/admin/menu_arrow_m.png');
//                    }
//                }, function () {
//                    if (src.indexOf('_l.png') !== -1) {
//                        //$(this).find('img').attr('src', '/images/sys/admin/menu_arrow_l.png');
//                    }
//                });
                $(this).click(function () {
                    minimizeMenu.Minimize($(this), $(this).find('img').attr('class'), $(this).find('img').attr('rel'));
                })
            }
        });
    },
    Minimize: function (obj, class_name, category_id) {
        if ($('tbody.' + class_name).css('display') !== 'none') {
            $('tbody.' + class_name).fadeOut('fast', function () {
                $(obj).find('img').attr('src', '/images/sys/admin/menu_arrow_l.png');
            });
            AjaxRequestAsync('testtest', base_url + 'xadmin/products/ajax/minimize/' + category_id + '/1/');
        }
        else {
            $('tbody.' + class_name).fadeIn('fast', function () {
                $(obj).find('img').attr('src', '/images/sys/admin/menu_arrow_m.png');
            });
            AjaxRequestAsync('', base_url + 'xadmin/products/ajax/minimize/' + category_id + '/2/');
        }
    }
}
/**
 * Изменения в скидке и доставки заказа
 * @returns {undefined}
 */
function setOrderDiscountDelivery(obj_sum_total, order_sum, delivery_price, discount_price, discount_type) {
    var sum = order_sum;
    if (discount_price > 0) {
        if (discount_type == '1') {
            sum = parseInt(order_sum) - ((parseInt(order_sum) * discount_price) / 100);
        }
        else {
            sum = parseInt(order_sum) + discount_price;
        }
    }
    sum = parseInt(sum) + parseInt(delivery_price);
    $(obj_sum_total).val(sum);
}

/**
 * 
 * Редактирование значений характеристик в модуле продукты
 * @returns {undefined}
 */
function editCharValue(obj, characteristic_id) {
    $('.set_char_product_value').remove();
    $('#char_set_form').remove();
    var char_value_id = $(obj).parent().find('select option:selected').val();
    var form = AjaxRequestAsync(null, base_url + 'xadmin/characteristics/product_quick/' + characteristic_id + '/' + char_value_id + '/');

    $(obj).parent().prepend('<form method="post" action="" id="char_set_form"><div class="set_char_product_value" id="char_set_block_result">' + form + "</div></form>");
    $('.set_char_product_value').css({
        left: $(obj).position().left + 20,
        top: $(obj).position().top + 20
    });
    $(obj).parent().find('select').change(function () {
        $('.set_char_product_value').remove();
    });
}
$("a[rel^='fancy']").fancybox({
    width: 755,
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
function AjaxFormRequestAsync(result_id, form_id, url) {
    jQuery.ajax({
        url: url,
        dataType: "html",
        type: "POST",
        data: jQuery('#' + form_id).serialize(),
        async: false,
        cache: false,
        success: function (response) {
            if (document.getElementById(result_id).nodeName == 'INPUT') {
                document.getElementById(result_id).value = response;
            }
            else
                document.getElementById(result_id).innerHTML = response;
        },
        error: function (response) {
            document.getElementById(result_id).innerHTML = response;
        }
    });
}
/**
 * Файл используется только системой управления, 
 * создан разгрузить fronted-файлы 
 */
function pasteImage(full_img, small_img) {
    var myField = tinyMCE.get("SMSBody");

    //IE support
    if (document.selection) {
        myField.focus();
        sel = document.selection.createRange();
        if (small_img != '') {
            sel.text = '<a href="' + full_img + '"><img src="' + small_img + '" alt="" /></a>';
        }
        else {
            sel.text = '<img src="' + full_img + '" alt="" />';
        }
    }
    else if (document.getSelection) {
        if (small_img != '') {
            tinyMCE.activeEditor.selection.setContent('<a href="' + full_img + '" rel="prettyPhoto[gallery1]"><img src="' + small_img + '" alt="" /></a>');
        }
        else {
            tinyMCE.activeEditor.selection.setContent('<img src="' + full_img + '" alt="" />');
        }
        myField.focus();
    }
}
function setBuyMarketStatus(result_id, form_id, status_id, url) {
    var result = 0;
    var status = null;
//alert(url)
    jQuery.ajax({
        url: url,
        dataType: "text",
        type: "POST",
        async: false,
        cache: false,
        data: jQuery('#' + form_id).serialize(),
        success: function (response) {
            res = JSON.parse(response);
            if (res.is_error == '1') {
                result = 2
            }
            else {
                result = res.is_ok;
                status = res.status;
            }
        },
        error: function (response) {
            document.getElementById(result_id).innerHTML = response;
        }
    });
    if (result == 1) {
        jQuery('#' + result_id).html('<div style="color:#1a70b5;margin-top:5px;"><b>Статус успешно изменен!</b></div>');
    }
    else if (result == 2) {
        document.getElementById(result_id).innerHTML = 'Токен не найден';
        jQuery('#' + result_id).html('<div style="color:red;margin-top:5px;"><b>Токен не найден (Заказ оставлен из другого магазина)</b></div>');
    }
    else {
        jQuery('#' + result_id).html('<div style="color:red;margin-top:5px;"><b>Ошибка! Попробуйте изменить статус позже. Если ошибка будет повторяться обратитесь к администратору</b></div>');
    }

}
function strip_tags(str, allowed_tags)
{
    var key = '', allowed = false;
    var matches = [];
    var allowed_array = [];
    var allowed_tag = '';
    var i = 0;
    var k = '';
    var html = '';
    var replacer = function (search, replace, str) {
        return str.split(search).join(replace);
    };
    // Build allowes tags associative array
    if (allowed_tags) {
        allowed_array = allowed_tags.match(/([a-zA-Z0-9]+)/gi);
    }
    str += '';

    // Match tags
    matches = str.match(/(<\/?[\S][^>]*>)/gi);
    // Go through all HTML tags
    for (key in matches) {
        if (isNaN(key)) {
            // IE7 Hack
            continue;
        }

        // Save HTML tag
        html = matches[key].toString();
        // Is tag not in allowed list? Remove from str!
        allowed = false;

        // Go through all allowed tags
        for (k in allowed_array) {            // Init
            allowed_tag = allowed_array[k];
            i = -1;

            if (i != 0) {
                i = html.toLowerCase().indexOf('<' + allowed_tag + '>');
            }
            if (i != 0) {
                i = html.toLowerCase().indexOf('<' + allowed_tag + ' ');
            }
            if (i != 0) {
                i = html.toLowerCase().indexOf('</' + allowed_tag);
            }

            // Determine
            if (i == 0) {
                allowed = true;
                break;
            }
        }
        if (!allowed) {
            str = replacer(html, "", str); // Custom replace. No regexing
        }
    }
    return str;
}


function pasteFile(file_url, file_size) {
    var myField = tinyMCE.get("SMSBody");

    //IE support
    if (document.selection) {
        myField.focus();
        sel = document.selection.createRange();
        sel.text = '<a href="' + file_url + '">Скачать файл</a> [' + file_size + ' кб]';

    }
    else if (document.getSelection) {
        tinyMCE.activeEditor.selection.setContent('<a href="' + file_url + '">Скачать файл</a> [' + file_size + ' кб]');
        myField.focus();
    }
}

/**
 * Добавляет tr-ки в таблицу
 */
function AjaxRequestTable(result_id, url) {
    jQuery.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        async: false,
        cache: false,
        error: function () {
            // alert('Ошибка соединения');
        },
        success: function (response) { //success - функция, которая вызывается, когда запрос прошёл успешно и данные (data) получены
            tbody = null;
            if (document.getElementById(result_id)) {
                tbody = document.createElement('tboby');

                tr = document.createElement('tr');
                tr.setAttribute('class', 'tbody')
                tr.innerHTML = response;
                tbody.appendChild(tr);

                obj = document.getElementById(result_id);
                obj.appendChild(tr);
            }
            else
                alert('Таблица в AjaxRequestTable не найдена ');
        }
    });

}
/**
 *Для модификаций в продуктах
 */
function delMod(obj) {
    obj.parentNode.parentNode.parentNode.innerHTML = null;
}
/*
 * Возвращает кол-во дней в месяце
 */
function date_count_days(year, month) {
    return  32 - new Date(year, month - 1, 32).getDate();
}

/*формирует options для select*/
function date_gen_select_form(select_day_id, count_days, current_day) {
    if (document.getElementById(select_day_id)) {
        document.getElementById(select_day_id).innerHTML = null;
        for (i = 1; i <= count_days; i++) {
            var option = document.createElement("option");
            option.setAttribute("value", i);
            if (i == current_day)
                option.selected = true;
            option.innerHTML = i;
            document.getElementById(select_day_id).appendChild(option);
        }
    }
    else
        alert("id не select_day не найден " + select_day_id);
}

setConfirm = function (text, url) {
    if (confirm(text)) {
        location.href = url;
    }
    else
        return false;
}


/**
 * В релайтед админке
 */
function ShowPlus(id) {
    if (document.getElementById(id).style.display != 'block') {
        document.getElementById(id).style.display = 'block';
        document.getElementById('li_' + id).className = 'minus';
    }
    else {
        document.getElementById('li_' + id).className = 'plus';
        document.getElementById(id).style.display = 'none'
    }
}

/**
 * Для показа отчетов
 */
function fadeReports(obj, id) {
    if ($(id).css('display') == 'none') {
        $(id).fadeIn('fast');
        $(obj).find('img').attr('src', '/images/sys/admin/icon_hide.png');
    }
    else {
        $(id).fadeOut('fast');
        $(obj).find('img').attr('src', '/images/sys/admin/icon_show.png');
    }
}

function setConfirm(text, url) {
    if (confirm(text)) {
        location.href = url;
    }
    else
        return false;
}

function Popup(div_id, e) {
    var obj = null
    obj = document.getElementById(div_id);
    if (obj) {
        obj.style.display = (obj.style.display == 'none') ? 'block' : 'none';

        e = (e) ? e : window.event;

        if ((e.clientX + 20 + parseInt(obj.style.width)) > screen.width) {
            obj.style.left = (e.clientX - 17 - parseInt(obj.style.width)) + 'px';
        }
        else
            obj.style.left = (e.clientX + 8) + 'px';
        //}
        obj.style.top = (e.clientY + document.documentElement.scrollTop + 4) + 'px';
    }
    else
        alert("Ошибка: Объект не задан");
}



function detectIE6() {
    var browser = navigator.appName;
    if (browser == "Microsoft Internet Explorer") {
        var b_version = navigator.appVersion;
        var re = /\MSIE\s+(\d\.\d\b)/;
        var res = b_version.match(re);
        if (res[1] <= 7) {
            return true;
        }
    }
    return false;
}
if (detectIE6()) {
    alert('Вы используете устаревший браузер. \n\nДля просмотра сайта в правильном представлении, пожалуйста обновите ваш браузер');
}
function Show(id) {
    document.getElementById(id).style.display = (document.getElementById(id).style.display == 'block') ? 'none' : 'block';
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
 * Аналог AjaxRequest с индикатором загрузки
 * @param {type} result_id
 * @param {type} url
 * Если is_append = 1 то текст добавляется к result_id
 * @returns {undefined}
 */
function AjaxRequestInd(result_id, url, indicator_id, is_append, scrool_to, indicator_type) {
    if (!indicator_id) {
        indicator_id = result_id; //Если id индиктора не задан - то id это result_id
    }
    var result_position = $('#' + result_id).css('position');

    jQuery.ajax({
        url: url,
        dataType: "text",
        type: "POST",
        error: function () {
//             alert('Ошибка соединения');
        },
        beforeSend: function () {
            $('#' + result_id).css({'position': 'relative'});
            if (indicator_type == 2) { //Для xml выгрузок, индикатор встает на место кнопки
                $(indicator_id).html('<div id="ajax_loading_indicator_box" style="position:relative; background-color:transparent"><img src="/images/sys/ind_1.gif" alt="Загрузка" id="ajax_loading_indicator" style="width:30px;height:30px;margin:0;" /></div>');
            }
            else {
                $(indicator_id).prepend('<div id="ajax_loading_indicator_box"><img src="/images/sys/ind_1.gif" alt="Загрузка" id="ajax_loading_indicator" /></div>');
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
            if (scrool_to) {
                jQuery.scrollTo(scrool_to, 1200);
            }
        }
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
            },
            error: function (response) {
                document.getElementById(result_id).innerHTML = response;
            }
        });
    }
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
            else {
                document.getElementById(result_id).innerHTML = response;
                //  alert(response)
            }
            $('#' + result_id + ' script').each(function () {
                eval($(this).html());
            });
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
function AjaxRequest(result_id, url) {
    jQuery.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        error: function () {
            // alert('Ошибка соединения');
        },
        success: function (response) { //success - функция, которая вызывается, когда запрос прошёл успешно и данные (data) получены

            if (document.getElementById(result_id)) {
                if (document.getElementById(result_id).nodeName == 'INPUT') {
                    document.getElementById(result_id).value = response;
                }
                else
                    document.getElementById(result_id).innerHTML = response;
            }

            $('#' + result_id + ' script').each(function () {
                eval($(this).html());
            });
        }
    });

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
    //  alert(result_id);
}

function AjaxFormQuery(result_id, form_id, url) {
    jQuery.ajax({
        url: url,
        dataType: "html",
        type: "POST",
        data: jQuery('#' + form_id).serialize(),
        success: function (response) {
            document.getElementById(result_id).innerHTML = response;
        },
        error: function (response) {
            document.getElementById(result_id).innerHTML = response;
        }
    });
}

function AjaxQueryParentFrame(result_id, url) {
    jQuery.ajax({
        url: url,
        dataType: "text",
        type: "POST",
        async: false,
        cache: false,
        error: function () {
            //alert('Ошибка соединения');
        },
        success: function (response) {
            window.parent.document.getElementById(result_id).innerHTML = response;
        }
    });
}
function AjaxRequestAsync(result_id, url) {
    var result = null;
    jQuery.ajax({
        url: url,
        dataType: "text",
        type: "POST",
        async: false,
        cache: false,
        error: function () {
            // alert('Ошибка соединения');
        },
        success: function (response) { //success - функция, которая вызывается, когда запрос прошёл успешно и данные (data) получены

            if (result_id != '' && document.getElementById(result_id)) {
                if (document.getElementById(result_id).nodeName == 'INPUT') {
                    document.getElementById(result_id).value = response;
                }
                else {
                    document.getElementById(result_id).innerHTML = response;
                }

                $('#' + result_id + ' script').each(function () {
                    eval($(this).html());
                });
            }
            else { //Если result_id не указан то возвращаем значение
                if (response) {

                    result = response;
                }
            }
        }
    });
    if (result) {
        return result
    }
}

$(document).ready(function () {
    $("a[rel^='windows_400']").fancybox({
        width: 400,
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

function showMenu(id) {
    document.getElementById(id).style.display = 'block';
}
function hideMenu(id) {
    document.getElementById(id).style.display = 'none';
}