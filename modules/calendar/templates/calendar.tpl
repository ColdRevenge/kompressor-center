{literal}<style type="text/css">
    #calendar {{/literal}
        width:182px;
        height:164px;
        text-align: center;
        background: url({$image_url}calendar_bg.png) left top no-repeat;{literal}
    }

    #week, #days_week {
        clear: both;
        margin: 0px 15px 0px 18px;
    }
    #week div, #days_week div {
        width: 21px;
        float: left;
        height: {/literal}{if $count_rows > 5}18{else}21{/if}px;{literal}
        text-align: center;
    }
    #days_week a {
        color:#444b2d;
        text-decoration: none;
        }


    #week {
        height: {/literal}{if $count_rows > 5}18{else}21{/if}px;{literal}
        border-bottom: 1px solid green;
        margin-bottom:5px;
    }

    .clear {
        clear: left;
    }

    #back {
        clear: both;
        float: left;
        padding-left: 35px;
    }
    #forward {
        float: right;
        padding-right: 35px;
    }
    #back, #forward {
        cursor: pointer;
        padding-top: 2px;
    }
    #month {
        margin-bottom: 2px;
        padding-bottom: 2px;
        text-align: center;
    }
</style>{/literal}

<div id="calendar"><div style="width: 1px; height: 12px;"></div>
    <img src="{$image_url}calendar_back.png" id="back" onclick="AjaxQuery('calendar', '{$url}calendar/{$year}/{$month-1}/{$day}/')" alt="Предыдущий месяц"/>
    <img src="{$image_url}calendar_next.png" id="forward" onclick="AjaxQuery('calendar', '{$url}calendar/{$year}/{$month+1}/{$day}/')" alt="Следующий месяц"/>
    <div id="month">{$month_str}, {$year}</div>


    <div id="week">
        <div>пн</div><div>вт</div><div>ср</div><div>чт</div><div>пт</div><div>сб</div><div>вс</div>
    </div>
    <div id="days_week">
        {section start=1 loop=$week_first_day name="test"}{* Сдвигаем в зависимости от того, какой день недели 1-е число *}
        <div></div>
        {/section}
        {section start=$week_first_day loop=$count_days name="days"}{assign var='key' value=$smarty.section.days.iteration}
        <div {if !(($smarty.section.days.index-1) % 7)}class="clear"{/if}><a {if $is_calendar_publ.$key}href="{$url}find/date/{$year}/{$month}/{$smarty.section.days.iteration}/"{else}href="javascript:void(0)" class="disabled_link"{/if}>{$smarty.section.days.iteration}</a></div>
        {/section}
    </div>
</div>#calendar {{/literal}
        width:182px;
        height:164px;
        text-align: center;
        background: url({$image_url}calendar_bg.png) left top no-repeat;{literal}
    }

    #week, #days_week {
        clear: both;
        margin: 0px 15px 0px 18px;
    }
    #week div, #days_week div {
        width: 21px;
        float: left;
        height: {/literal}{if $count_rows > 5}18{else}21{/if}px;{literal}
        text-align: center;
    }
    #days_week a {
        color:#444b2d;
        text-decoration: none;
        }


    #week {
        height: {/literal}{if $count_rows > 5}18{else}21{/if}px;{literal}
        border-bottom: 1px solid green;
        margin-bottom:5px;
    }

    .clear {
        clear: left;
    }

    #back {
        clear: both;
        float: left;
        padding-left: 35px;
    }
    #forward {
        float: right;
        padding-right: 35px;
    }
    #back, #forward {
        cursor: pointer;
        padding-top: 2px;
    }
    #month {
        margin-bottom: 2px;
        padding-bottom: 2px;
        text-align: center;
    }