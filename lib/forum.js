
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

            AjaxQueryScriptWrapper();
            $('#' + result_id + ' script').each(function () {
                eval($(this).html());
            });
        },
        error: function (response) {
            document.getElementById(result_id).innerHTML = response;
        }
    });
}

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

            AjaxQueryScriptWrapper();
            $('#' + result_id + ' script').each(function () {
                eval($(this).html());
            });
        },
        error: function (response) {
            document.getElementById(result_id).innerHTML = response;
        }
    });
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

$(document).ready(function () {
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


    $("a[rel^='set']").fancybox({
        width: 717,
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

    $('#find-button').click(function () {
        if ($('#find').css('display') != 'none') {
            $('#find').slideUp('fast');
        }
        else {
            $('#find').slideDown('fast');
        }
    });

    $('.soc>li').rotate({
        bind:
                {
                    mouseover: function () {
                        jQuery(this).find('a').rotate({
                            animateTo: 360
                        })
                    },
                    mouseout: function () {
                        jQuery(this).find('a').rotate({
                            animateTo: 0
                        })
                    }
                }

    });
});

function sendMessage(tinymce) {
    $('#forum_form').hide();
    $('#forum_form').after('<div id="message_forum_ind"><img src="/images/sys/ind_mini.gif" alt="Загрузка"  /></div>');
    tinymce.remove();
    AjaxFormRequest('content', 'forum_form', location.href);
//    $('#message_forum_ind').remove();
}

function sendUserMessage(user_id, parent_id) {
    $('#form_message_ind').html('<img src="/images/sys/ind_mini.gif" />');
    setTimeout(function () {
        AjaxFormRequestAsync('message_result', 'form_message_id', base_url + 'forum/post/add/' + user_id + '/');

        if (parent_id > 0) {
            AjaxRequestAsync('topics', base_url + 'forum/post/read/' + parent_id + '/');
        }
    }, 10)
    return false;
}



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