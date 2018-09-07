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
        $('.js-select-city').html('г. ' + cities[getCookie('choose-city')]);
    }
}

function showNotify(status, message) {
	$('.message-box').remove();
    var box = $('<div class="message-box -' + status + '">' + message + '</div>');
    $('body').append(box);
    setTimeout(function() { box.addClass('open'); }, 50)
    setTimeout(function() {
        box.removeClass('open');
        setTimeout(function() {
            box.remove();
        }, 200)
    }, 3000)
}


$(document).ready(function() {
	$('.main-slider .slider').owlCarousel({
		items: 1,
		loop: true,
		autoplay: true
	});
	$('.js-brands-slider').owlCarousel({
	    items: 7,
	    loop: true
	});

	$('.products-slider').owlCarousel({
	    items: 4,
	    loop: true
	});

	

	$('.filters-tabs').children().clone(true,true).appendTo('.filters-tabs__mobile-content');
	$('.filters-tabs__mobile-menu').click(function() {
		$('.filters-tabs__mobile-content').toggle()
		return false;
	})

	$('.chars').scrollbar({
		autoUpdate: true
	});

	$('body').click(function(e) {
		if ( ! $(e.target).closest(".js-feedback").length) {
			$('.js-feedback').removeClass('js-feedback-open');
		}
	});

	$('.js-seo-read-more').click(function() {
		$(this).closest('.seo-text').addClass('js-seo-text-open');
		return false;
	})

	$('.js-open-categories-submenu').click(function() {
		$(this).closest('.c-menu-item').find('.c-menu-item__submenu').slideToggle('fast');
	});

	$('.js-filters-tabs-link').click(function() {
		var id = $(this).attr('href');
		var ind = $(this).closest('.filters-tabs__item').index();
		$('.filters-tabs__item').removeClass('_active');
		$('.filters-tabs').find('.filters-tabs__item').eq(ind).addClass('_active');
		$('.filters-tabs__mobile-content').find('.filters-tabs__item').eq(ind).addClass('_active');
		$('.filters-tabs__mobile-content').hide();

		var content = $(this).closest('.filters').find('.filters-content');
		content.children('div').removeClass('_active');
		$(id).addClass('_active');
		return false;
	});

	$('.js-tab-link').click(function() {
		var id = $(this).attr('href');
		$(this).closest('.tabs__items').children('.js-tab-link').removeClass('_active');
		$(this).addClass('_active');
		$(this).closest('.tabs').find('.tabs__content').removeClass('_active');
		$(id).addClass('_active');
		return false;
	});


	$('body').on('click', '.js-feedback-link', function() {
		$(this).closest('.js-feedback').addClass('js-feedback-open');
		return false;
	});

	$('body').on('click', '.js-product-show-chars', function() {
		$(this).closest('.product').find('.js-product-chars').toggle();
		return false;
	});

	$('body').on('click', '.compare-icon', function() {
		var link = $(this);
		var id = $(this).data('id');
		var active = $(this).hasClass('-active');
		$.get('/vs_product/add/' + id + '/', function() {
			link.addClass('-active');
			$.fancybox.open(link, {type: 'iframe'});
		})
		return false;
	});

	$('body').on('click', '.add-to-fav-icon', function() {
		var link = $(this);
		var id = $(this).data('id');
		var active = $(this).hasClass('-active');
		if ( ! link.hasClass('ajax-loading')) {
			link.addClass('ajax-loading');

			$.post(link.data('url'), {'id': link.data('id')}).success(function(response) {
				if (response == 1) {
	            	link.attr('title', 'Удалить из избранного')
					link.addClass('-active');
				} else {
	            	link.attr('title', 'Добавить в избранное')
					link.removeClass('-active');
				}
	            link.removeClass('ajax-loading').data('loading', 0);
	        }).error(function() {
	            link.html('Ошибка')
	        })
		}
		return false;
	});

	$('body').on('click', '.js-add-to-cart', function() {
		var obj = $(this);
		var productId = obj.data('id');
		var modId = obj.data('mod-id');
		var imageId = obj.data('image-id');
		$.post('/basket/add/' + productId + '/' + modId + '/' + imageId + '/0/0/0/0/0/1', function() {
			showNotify('success', 'Товар добавлен в корзину!');
		});
		return false;
	});

	$('.js-btn-preorder').click(function() {
		$(this).parent().hide();
        $('#order_form').slideDown('fast', function() {
        	 $('html, body').animate({
		        scrollTop: $("#order_form").offset().top
		    }, 300);
        });
        return false;
	});

	$('.js-delivery-radio').change(function() {
		var obj = $(this);
		var id = $(this).val();
		$('.delivery-child').not('#delivery-child-' + id).slideUp('fast')
		$('#delivery-child-' + id).slideDown('fast');

		if ($(this).attr('rel')) { //Если у метода доставки есть сервис
			$.post('/delivery/service/' + obj.attr('rel') + '/' + id + '/', function(data) {
				$('.delivery-service').not('#delivery-service-' + id).slideUp('fast');
				$('#delivery-service-' + id).html(data).slideDown('fast');
				console.log($('#delivery-service-' + id).length);
			})
        }
	});


    $('.js-select-city').click(function() {
        $.fancybox.open($('#choose-city'), {type: 'inline'});
        return false;
    })

    if ($('#choose-city').data('city')) {
        setCityCookie($('#choose-city').data('city'), 100*24*60*60*1000);
    } else if ( ! getCookie('choose-city')) {
        $.fancybox.open($('#choose-city'), {type: 'inline'});
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

    $('form.consult').submit(function() {
    	var form = $(this)
    	setTimeout(function() {
    		form.find('input[type="text"], input[type="email"]').val('');
    		showNotify('success', 'Заявка успешно отправлена!');
    	}, 300)
    	
    	return false;
    });

    $('form.feedback').submit(function() {
    	var form = $(this)
    	setTimeout(function() {
    		form.find('input[type="text"], input[type="email"], textarea').val('');
    		$('.js-feedback-open').removeClass('js-feedback-open');
    		showNotify('success', 'Сообщение успешно отправлено!');
    	}, 300)
    	
    	return false;
    });

});