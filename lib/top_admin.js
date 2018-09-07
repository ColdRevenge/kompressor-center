
$(document).ready(function () {
    $("select#auto_format_currency").change(function(){
        changePrice();
    });

    function changePrice() {
        if ($("#auto_format").is(':checked')) {
            var currency = $("select#auto_format_currency").val();
            var currency_val = $("#auto_format").data('currency-' + currency);
            var mod_cost_price = $("#mod_cost_price").val();
            if (currency_val > 0 && mod_cost_price > 0) {
                $("#mod_price").val(mod_cost_price * currency_val);
            }

        }
    }
    changePrice();

    $("#auto_format").change(function() {
        changePrice();
    });
    $("#mod_cost_price").change(function() {
        changePrice();
    });
});


altasib_up_button='';
altasib_up_pos ='3';
altasib_up_pos_xy = '10'
$(document).ready(function(){
    if($.browser.msie && $.browser.version=='6.0')
    {
        $('#alx_up_page_button').css('position', 'absolute !important');
        if(altasib_up_pos == 1)
            pos = "top: expression(eval(document.documentElement.scrollTop || document.body.scrollTop)+"+altasib_up_pos_xy+"+'px'); right: "+altasib_up_pos_xy+"px;";
        else if(altasib_up_pos == 2)
            pos = "top: expression(eval(document.documentElement.scrollTop || document.body.scrollTop) +(document.documentElement.clientHeight || document.body.clientHeight ) - 38 - "+altasib_up_pos_xy+"+'px'); left: "+altasib_up_pos_xy+"px;";
        else if(altasib_up_pos == 3)
            pos = "top: expression(eval(document.documentElement.scrollTop || document.body.scrollTop) +(document.documentElement.clientHeight || document.body.clientHeight ) - 38 - "+altasib_up_pos_xy+"+'px'); right: "+altasib_up_pos_xy+"px;";
        else if(altasib_up_pos == 4)
            pos = "top: expression(eval(document.documentElement.scrollTop || document.body.scrollTop) +(document.documentElement.clientHeight || document.body.clientHeight ) - 38 - "+altasib_up_pos_xy+"+'px'); left: 50%";
        else
            pos = "top: expression(eval(document.documentElement.scrollTop || document.body.scrollTop)+"+altasib_up_pos_xy+"+'px'); left: "+altasib_up_pos_xy+"px;";
    }
    else
    {
        if(altasib_up_pos == 1)
            pos = "top: "+altasib_up_pos_xy+"px; right: "+altasib_up_pos_xy+"px;";
        else if(altasib_up_pos == 2)
            pos = "bottom: "+altasib_up_pos_xy+"px; left: "+altasib_up_pos_xy+"px;";
        else if(altasib_up_pos == 3)
            pos = "bottom: "+altasib_up_pos_xy+"px; right: "+altasib_up_pos_xy+"px;";
        else if(altasib_up_pos == 4)
            pos = "bottom: "+altasib_up_pos_xy+"px; left: 50%";
        else
            pos = "top: "+altasib_up_pos_xy+"px; left: "+altasib_up_pos_xy+"px;";
    }
    var newDiv = document.createElement('div')
    newDiv.className="up_page_block";
    newDiv.innerHTML = '<div class="alx_up_page_button" id="alx_up_page_button" style="'+pos+'"><img src="/images/sys/up-arrow.png" alt="Up!" /></div>';
    body_id = document.getElementsByTagName('BODY')[0];
    //if(!body_id)alert("Error! No tag 'body' on this page!");
    body_id.appendChild(newDiv);
    scroll_up_page();
})
function scroll_up_page()
{
    $('#alx_up_page_button').css('filter', 'alpha(opacity=80)');
    body_bg = $("body").css("background-image");
    if (body_bg == 'none')
    {
    //         $("body").css("background-image", "url(spacer.gif)");
    }

    scroll_top_page = $(window).scrollTop();
    if(scroll_top_page>0)
    {
        $("#alx_up_page_button").fadeIn(500);
    }
    $(window).bind('scroll resize', function(e){
        scroll_top_page = $(window).scrollTop();
        if(scroll_top_page>0)
        {
            $("#alx_up_page_button").fadeIn(500);
        }
        else
        {
            $("#alx_up_page_button").fadeOut(500);
        }
    })
    $("#alx_up_page_button").click(function(){
        $("body:not(:animated)").animate({
            scrollTop: 0
        }, 1000);
        $("html").animate({
            scrollTop: 0
        }, 1000);
    })

}
