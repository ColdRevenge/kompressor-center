
<select name="{$prefix}day" id="{$prefix}day"  style="width: 65px;">
    {section start=1 loop=$count_days name="days"}<option value="{$smarty.section.days.index}"{if $smarty.section.days.index == $current_day}selected{/if}>{$smarty.section.days.index}</option>{/section}
</select>
<select name="{$prefix}month" id="{$prefix}month" style="width: 120px;" onchange="date_gen_select_form('{$prefix}day',date_count_days($('{$prefix}year').options[$('{$prefix}year').selectedIndex].value, this.options[this.selectedIndex].value), $('{$prefix}day').options[$('{$prefix}day').selectedIndex].value)">
    {foreach from=$months item="month" name="month"}<option value="{$smarty.foreach.month.iteration}"{if $smarty.foreach.month.index == $current_month}selected{/if}>{$month}</option>{/foreach}
</select>
<select name="{$prefix}year" id="{$prefix}year" style="width: 80px;" onchange="date_gen_select_form('{$prefix}day',date_count_days(this.options[this.selectedIndex].value, $('{$prefix}month').options[$('{$prefix}month').selectedIndex].value), $('{$prefix}day').options[$('{$prefix}day').selectedIndex].value)">
    {section start=$start_year loop=$year name="year"}<option value="{$smarty.section.year.index}"{if $smarty.section.year.index == $current_year} selected{/if}>{$smarty.section.year.index}</option>{/section}
</select>