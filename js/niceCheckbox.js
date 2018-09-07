// JavaScript Document
jQuery(document).ready(function(){

jQuery(".niceCheck").each(
/* РїСЂРё Р·Р°РіСЂСѓР·РєРµ СЃС‚СЂР°РЅРёС†С‹ РјРµРЅСЏРµРј РѕР±С‹С‡РЅС‹Рµ РЅР° СЃС‚РёР»СЊРЅС‹Рµ checkbox */
function() {
     
     changeCheckStart(jQuery(this));
     
});

                                        });


function changeCheck(el)
/* 
	С„СѓРЅРєС†РёСЏ СЃРјРµРЅС‹ РІРёРґР° Рё Р·РЅР°С‡РµРЅРёСЏ С‡РµРєР±РѕРєСЃР° РїСЂРё РєР»РёРєРµ РЅР° РєРѕРЅС‚РµР№РЅРµСЂ С‡РµРєР±РѕРєСЃР° (С‚РѕС‚, РєРѕС‚СЂС‹Р№ РѕС‚РІРµС‡Р°РµС‚ Р·Р° РЅРѕРІС‹Р№ РІРёРґ)
	el - span РєРѕРЅС‚РµР№РЅРµСЂ РґР»СЏ РѕР±С‹С‡РЅРѕРіРѕ С‡РµРєР±РѕРєСЃР°
	input - С‡РµРєР±РѕРєСЃ
*/
{

	var el = el,
		input = el.find("input").eq(0);
		  
	if(el.attr("class").indexOf("niceCheckDisabled")==-1)
	{	
   		if(!input.attr("checked")) {
			el.addClass("niceChecked");
			input.attr("checked", true);
		} else {
			el.removeClass("niceChecked");
			input.attr("checked", false).focus();
		}
	}
	
    return true;
}

function changeVisualCheck(input)
{
/*
	РјРµРЅСЏРµРј РІРёРґ С‡РµРєР±РѕРєСЃР° РїСЂРё СЃРјРµРЅРµ Р·РЅР°С‡РµРЅРёСЏ
*/
var wrapInput = input.parent();
	if(!input.attr("checked")) {
		wrapInput.removeClass("niceChecked");
	}
	else
	{
		wrapInput.addClass("niceChecked");
	}
}

function changeCheckStart(el)
/* 
	РЅРѕРІС‹Р№ С‡РµРєР±РѕРєСЃ РІС‹РіР»СЏРґРёС‚ С‚Р°Рє <span class="niceCheck"><input type="checkbox" name="[name check]" id="[id check]" [checked="checked"] /></span>
	РЅРѕРІС‹Р№ С‡РµРєР±РѕРєСЃ РїРѕР»СѓС‡Р°РµС‚ С‚РµР¶Рµ name, id Рё РґСЂСѓРіРёРµ Р°С‚СЂРёР±СѓС‚С‹ С‡С‚Рѕ Рё Р±С‹Р»Рё Сѓ РѕР±С‹С‡РЅРѕРіРѕ
*/
{

try
{
var el = el,
	checkName = el.attr("name"),
	checkId = el.attr("id"),
	checkChecked = el.attr("checked"),
	checkDisabled = el.attr("disabled"),
	checkValue = el.attr("value");
	checkTab = el.attr("tabindex");
	if(checkChecked)
		el.after("<span class='niceCheck niceChecked'>"+
			"<input type='checkbox'"+
			"name='"+checkName+"'"+
			"id='"+checkId+"'"+
			"checked='"+checkChecked+"'"+
			"value='"+checkValue+"'"+
			"tabindex='"+checkTab+"' /></span>");
	else
		el.after("<span class='niceCheck'>"+
			"<input type='checkbox'"+
			"name='"+checkName+"'"+
			"id='"+checkId+"'"+
			"value='"+checkValue+"'"+
			"tabindex='"+checkTab+"' /></span>");
	
	/* РµСЃР»Рё checkbox disabled - РґРѕР±Р°РІР»СЏРµРј СЃРѕРѕС‚РІСЃРјС‚РІСѓСЋС‰Рё РєР»Р°СЃСЃ РґР»СЏ РЅСѓР¶РЅРѕРіРѕ РІРёРґР° Рё РґРѕР±Р°РІР»СЏРµРј Р°С‚СЂРёР±СѓС‚ disabled РґР»СЏ РІР»РѕР¶РµРЅРЅРѕРіРѕ chekcbox */		
	if(checkDisabled)
	{
		el.next().addClass("niceCheckDisabled");
		el.next().find("input").eq(0).attr("disabled","disabled");
	}
	
	/* С†РµРїР»СЏРµРј РѕР±СЂР°Р±РѕС‚С‡РёРєРё СЃС‚РёР»РёР·РёСЂРѕРІР°РЅРЅС‹Рј checkbox */		
	el.next().bind("mousedown", function(e) { changeCheck(jQuery(this)) });
	el.next().find("input").eq(0).bind("change", function(e) { changeVisualCheck(jQuery(this)) });
	if(jQuery.browser.msie)
	{
		el.next().find("input").eq(0).bind("click", function(e) { changeVisualCheck(jQuery(this)) });	
	}
	el.remove();
}
catch(e)
{
	// РµСЃР»Рё РѕС€РёР±РєР°, РЅРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµРј
}

    return true;
}
