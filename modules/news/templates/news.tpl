{* Новости на главную старницу
{if $param_tpl.type == 3}
        <div id="news">
            <div class="h1">Статьи</div>
            {foreach from=$news item="item_news" key="key" name="news"}
                <a href="{$url}news/look/{$item_news->id}/">{$item_news->name}</a>

            {/foreach} 
        </div>
    {else*}
        <div id="news" style="background: #fff;">
            <table style="padding:5px;width: 100%;">
                {foreach from=$news item="item_news" key="key" name="news"}
                    {assign var="month" value=$item_news->date|date_format:"%m"}
                    {assign var="month_int" value=$month*1-1}
                    {assign var="month_int_0" value=$month*1}
                    <tr>
                        <td valign="top" style="border-bottom: 1px solid #eee;padding: 10px 10px 10px 10px;text-align: center;">
							{if $item_news->icon}
								<a href="{$url}news/look/{$item_news->id}/" title="">
									<img src="{$news_image_url}{setFile->setFile file=$item_news->icon}" alt="" style="margin-top: 4px;" width="100px"  />
								</a>
							{/if}
							<span style="display: block;">{$item_news->date|date_format:"%d"} {$months.$month_int} {$item_news->date|date_format:"%Y"}</span>
						</td>
                        <td valign="top" style="padding: 10px 10px 10px 10px;border-bottom: 1px solid #eee;">
							<a style="display: block;font-size: 17px;" href="{$url}news/look/{$item_news->id}/" title="">{$item_news->name|strip_tags|trim|truncate:55:"..":true:false|stripslashes}</a>
                            <p>{$item_news->text|strip_tags|trim|truncate:75:" ...":true:false|stripslashes}</p>
                        </td>
                    </tr>
                {/foreach} 
            </table>
        </div>
    {*/if*}