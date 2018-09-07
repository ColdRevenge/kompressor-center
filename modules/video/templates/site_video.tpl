{foreach from=$files item="file"}
<div style="text-align: center; margin-right: 25px;">
<object type="application/x-shockwave-flash" data="{$lib_url}uflvplayer_500x375.swf" height="340" width="400"><param name="bgcolor" value="#000000" /><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="movie" value="{$lib_url}uflvplayer_500x375.swf" /><param name="FlashVars" value="way=http://www.rixa-boxing.ru/video/{$file->file}&amp;swf={$lib_url}uflvplayer_500x375.swf&amp;w=400&amp;h=340&amp;pic=&amp;autoplay=0&amp;tools=1&amp;skin={$lib_url}skin_aluminium2.swf&amp;volume=100&amp;q=&amp;comment=" /></object>
</div>
{/foreach}