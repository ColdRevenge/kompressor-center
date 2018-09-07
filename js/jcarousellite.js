/*
 * jQuery jCarouselLite
 * Version: 1.0.1
 */

(function($) {				// Compliant with jquery.noConflict()
$.fn.jCarouselLite = function(o) {
	o = $.extend({
		btnPrev: null,		// РџР°СЂР°РјРµС‚СЂ, СѓРєР°Р·С‹РІР°СЋС‰РёР№ РЅР° РєР»Р°СЃСЃ РёР»Рё id РєРЅРѕРїРєРё, РєРѕС‚РѕСЂС‹Р№ РІРµРґРµС‚ СЃСЂР°Р·Сѓ Рє РїСЂРµРґС‹РґСѓС‰РµРјСѓ СЌР»РµРјРµРЅС‚Сѓ [".prev"]
		btnNext: null,		// РџР°СЂР°РјРµС‚СЂ, СѓРєР°Р·С‹РІР°СЋС‰РёР№ РЅР° РєР»Р°СЃСЃ РёР»Рё id РєРЅРѕРїРєРё, РєРѕС‚РѕСЂС‹Р№ РІРµРґРµС‚ СЃСЂР°Р·Сѓ Рє СЃР»РµРґСѓСЋС‰РµРјСѓ СЌР»РµРјРµРЅС‚Сѓ [".next"]
		btnGo: null,		// РџР°СЂР°РјРµС‚СЂ, СѓРєР°Р·С‹РІР°СЋС‰РёР№ РЅР° РєР»Р°СЃСЃС‹ РёР»Рё id РєРЅРѕРїРѕРє, РєРѕС‚РѕСЂС‹Рµ РІРµРґСѓС‚ СЃСЂР°Р·Сѓ Рє РѕРїСЂРµРґРµР»РµРЅРЅРѕРјСѓ СЌР»РµРјРµРЅС‚Сѓ РіР°Р»РµСЂРµРё [".0", ".1", ".2"]

		auto: null,		// Р’СЂРµРјСЏ С‡РµСЂРµР· РєРѕС‚РѕСЂРѕРµ РіР°Р»Р»РµСЂРµСЏ Р°РІС‚РѕРјР°С‚РёС‡РµСЃРєРё РїСЂРѕРєСЂСѓС‚РёС‚СЃСЏ [1СЃРµРє = 1000]
		hoverPause: false,	// РџСЂРё РЅР°РІРµРґРµРЅРёРё РЅР° СЌР»РµРјРµРЅС‚ РіР°Р»РµСЂРµРё РѕСЃС‚Р°РЅР°РІР»РёРІР°РµС‚СЃСЏ Р°РІС‚РѕРјР°С‚РёС‡РµСЃРєР°СЏ РїСЂРѕРєСЂСѓС‚РєР° [false - РЅРµ РѕСЃС‚Р°РЅР°РІР»РёРІР°С‚СЊ, true - РѕСЃС‚Р°РЅР°РІР»РёРІР°С‚СЊ]
		mouseWheel: false,	// Р’РєР»СЋС‡Р°РµС‚ РїСЂРѕРєСЂСѓС‚РєСѓ РєРѕР»РµСЃРёРєРѕРј РјС‹С€РєРё, РЅРµРѕР±С…РѕРґРёРј mousewheel.js [false - РІС‹РєР»СЋС‡РµРЅРѕ, true - РІРєР»СЋС‡РµРЅРѕ]

		speed: 500,		// РЎРєРѕСЂРѕСЃС‚СЊ РїСЂРѕР»РёСЃС‚С‹РІР°РЅРёСЏ [1СЃРµРє = 1000]
		easing: null,		// Р”РµСЂРіР°СЋС‰РёР№СЃСЏ СЌС„С„РµРєС‚, РЅРµРѕР±С…РѕРґРёРј easing.js ["easeOutElastic"]

		vertical: false,	// Р’РєР»СЋС‡Р°РµС‚ РІРµСЂС‚РёРєР°Р»СЊРЅРѕРµ РѕС‚РѕР±СЂР°Р¶РµРЅРёРµ, РїРѕ СѓРјРѕР»С‡Р°РЅРёСЋ РіРѕСЂРёР·РѕРЅС‚Р°Р»СЊРЅР°СЏ [false - РіРѕСЂРёР·РѕРЅС‚Р°Р»СЊРЅРѕРµ, true - РІРµСЂС‚РёРєР°Р»СЊРЅРѕРµ]
		circular: true,		// РћС‚РєР»СЋС‡Р°РµС‚ С†РёРєР», РїРѕ СѓРјРѕР»С‡РЅРёСЋ РІРєР»СЋС‡РµРЅ [false - РІС‹РєР»СЋС‡РµРЅРѕ, true - РІРєР»СЋС‡РµРЅРѕ]
		visible: 1,		// РљРѕР»РёС‡РµСЃС‚РІРѕ РѕС‚РѕР±СЂР°Р¶Р°РµРјС‹С… СЌР»РµРјРµРЅС‚РѕРІ
		start: 0,		// РЎ РєР°РєРѕРіРѕ СЌР»РµРјРµРЅС‚Р° РЅР°С‡РёРЅР°С‚СЊ РїРѕРєР°Р·С‹РІР°С‚СЊ
		scroll: 1,		// РЎРєРѕР»СЊРєРѕ СЌР»РµРјРµРЅС‚РѕРІ РїСЂРѕРєСЂСѓС‡РёРІР°РµС‚ Р·Р° РѕРґРЅРѕ РЅР°Р¶Р°С‚РёРµ РёР»Рё РїСЂРѕРєСЂСѓС‚РєСѓ РєРѕР»РµСЃРёРєРѕРј РјС‹С€РєРё

		beforeStart: null,	// РћР±СЂР°С‚РЅР°СЏ С„СѓРЅРєС†РёСЏ РЅР°С‡Р°Р»Р° РїРѕРєР°Р·Р°, РІС‹РїРѕР»РЅСЏРµС‚СЃСЏ СЃСЂР°Р·Сѓ Р¶Рµ РїСЂРё РїРµСЂРµР»РёСЃС‚С‹РІР°РЅРёРё [function(a) {alert("Before animation starts:" + a);]
		afterEnd: null		// РћР±СЂР°С‚РЅР°СЏ С„СѓРЅРєС†РёСЏ РєРѕРЅС†Р° РїРѕРєР°Р·Р°, СЃСЂР°Р±Р°С‚С‹РІР°РµС‚ СЃСЂР°Р·Сѓ РїРѕСЃР»Рµ Р·Р°РІРµСЂС€РµРЅРёСЏ РїРµСЂРµР»РёСЃС‚С‹РІР°РЅРёСЏ [function(a) {alert("After animation ends:" + a);]
    }, o || {});

    return this.each(function() {	// Returns the element collection. Chainable.

        var running = false, animCss=o.vertical?"top":"left", sizeCss=o.vertical?"height":"width";
        var div = $(this), ul = $("ul", div), tLi = $("li", ul), tl = tLi.size(), v = o.visible;

        if(o.circular) {
            ul.prepend(tLi.slice(tl-v+1).clone()) // add last visible part, to the begin of the ul 
              .append(tLi.slice(0,o.scroll).clone());  // add first visble part, to the end of the ul
            o.start += v-1; //the script added an item at the front, move the start position with one part
        }

        var li = $("li", ul), itemLength = li.size(), curr = o.start;
        div.css("visibility", "visible");
        div.closest('#slider').css("display", "block");

        li.css({overflow: "hidden", float: o.vertical ? "none" : "left"});
        ul.css({margin: "0", padding: "0", position: "relative", "list-style-type": "none", "z-index": "1"});
        div.css({overflow: "hidden", position: "relative", "z-index": "2", left: "0px"});

        var liSize = o.vertical ? height(li) : width(li);   // Full li size(incl margin)-Used for animation
        var ulSize = liSize * itemLength;                   // size of full ul(total length, not just for the visible items)
        var divSize = liSize * v;                           // size of entire div(total length for just the visible items)

        li.css({width: li.width(), height: li.height()});
        ul.css(sizeCss, ulSize+"px").css(animCss, -(curr*liSize));

        div.css(sizeCss, divSize+"px");                     // Width of the DIV. length of visible images

        if(o.btnPrev) {
            $(o.btnPrev).click(function() {
                return go(curr-o.scroll);
            });
            //not needed (scriptbreaker)
            /*
            if(o.hoverPause) {
                $(o.btnPrev).hover(function(){stopAuto();}, function(){startAuto();});
            }
            */
        }


        if(o.btnNext) {
            $(o.btnNext).click(function() {
                return go(curr+o.scroll);
            });
            //not needed (scriptbreaker)
            /*
            if(o.hoverPause) {
                $(o.btnNext).hover(function(){stopAuto();}, function(){startAuto();});
            }
            */
        }

        if(o.btnGo)
            $.each(o.btnGo, function(i, val) {
                $(val).click(function() {
                	//added by the scriptbreaker extension
                	return go(o.circular ? (o.visible+i-1) : i);
                	
                	//why is that?
                	//return go(o.circular ? o.visible+i : i);
                });
            });

        if(o.mouseWheel && div.mousewheel)
            div.mousewheel(function(e, d) {
                return d>0 ? go(curr-o.scroll) : go(curr+o.scroll);
            });

        var autoInterval;

        function startAuto() {
          stopAuto();
          autoInterval = setInterval(function() {
                  go(curr+o.scroll);
              }, o.auto+o.speed);
        };

        function stopAuto() {
            clearInterval(autoInterval);
        };

        if(o.auto) {
            if(o.hoverPause) {
            	//scriptbreaker extention add the hover pause to the children instead of the element itself
                div.children().hover(function(){stopAuto();}, function(){startAuto();});
            }
            startAuto();
        };

        function vis() {
            return li.slice(curr).slice(0,v);
        };

        function go(to) {
            if(!running) {
            	
                if(o.beforeStart)
                    o.beforeStart.call(this, vis());

                if(o.circular) {            // If circular we are in first or last, then goto the other end
                    if(to<0) {           // If before range, then go around
                        ul.css(animCss, -( (curr + tl) * liSize)+"px");
                        curr = to + tl;
                    } else if(to>itemLength-v) { // If beyond range, then come around
                        ul.css(animCss, -( (curr - tl) * liSize ) + "px" );
                        curr = to - tl;
                    } else curr = to;
                } else {                    // If non-circular and to points to first or last, we just return.
                    if(to<0 || to>itemLength-v) return;
                    else curr = to;
                }                           // If neither overrides it, the curr will still be "to" and we can proceed.

                running = true;

                ul.animate(
                    animCss == "left" ? { left: -(curr*liSize) } : { top: -(curr*liSize) } , o.speed, o.easing,
                    function() {
                        if(o.afterEnd)
                            o.afterEnd.call(this, vis(), curr, o.btnGo);
                        running = false;
                    }
                );
                // Disable buttons when the carousel reaches the last/first, and enable when not
                if(!o.circular) {
                    $(o.btnPrev + "," + o.btnNext).removeClass("disabled");
                    $( (curr-o.scroll<0 && o.btnPrev)
                        ||
                       (curr+o.scroll > itemLength-v && o.btnNext)
                        ||
                       []
                     ).addClass("disabled");
                }

            }
            return false;
        };
    });
};

function css(el, prop) {
    return parseInt($.css(el[0], prop)) || 0;
};
function width(el) {
    return  el[0].offsetWidth + css(el, 'marginLeft') + css(el, 'marginRight');
};
function height(el) {
    return el[0].offsetHeight + css(el, 'marginTop') + css(el, 'marginBottom');
};

})(jQuery);