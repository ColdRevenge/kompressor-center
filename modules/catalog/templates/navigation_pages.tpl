{if $count_products > 1}
    <ul> 
        {*                <li>Страница:</li>*}
        {*                {if $select_page != 0}<li><a href="?page={$smarty.section.page.index}{$select_page-1}" class="prev-page left">Назад</a></li>{/if}*}
        {assign var="visible_count_page" value="12"} {* Сколько страниц будет видно пользовател (остальное  скрывается) *}

        {if $visible_count_page >= $count_products} {* Выводим все страницы *}
                {section loop=$count_products name="page"}
                    {if $select_page == $smarty.section.page.index}
                        <li class="active">{$smarty.section.page.iteration}</li>
                        {else}
                        <li><a href="javascript:void(0)" onclick="AjaxRequestInd('left_box', '{$url}{if $smarty.get.is_category_brand_id}{$catalog_dir}/brand/category/{$pseudo_dir}/{$select_page+1}/?{elseif $is_selection_find == 1}{$catalog_dir}/find-selection/?params={$smarty.post|serialize|replace:'"':'@@@@'|urldecode}&{elseif $is_brand == 1}{$catalog_dir}/brand/{$param_tpl.brand}/{$select_page+1}/{$catalog->id}/?{elseif $navigation_param}{$catalog_dir}/get-product/{$navigation_param}/{else}{$catalog_dir}/id/{$catalog->id}/?{/if}{if $char_adress}char_adress={$char_adress|urldecode}&{/if}page={$smarty.section.page.index}{if $smarty.get.brand_id}&brand_id={$smarty.get.brand_id}{/if}', '#indicator_catalog');{if $is_scrool == 1}jQuery.scrollTo('#left_box', 1200);{/if}">{$smarty.section.page.iteration}</a></li>
                        {/if}
                    {/section}
                {else}


                {if $select_page >= 7 && !($select_page < $count_products-6)} {* Показываем первые 2 страницы *}
                        {section loop=2 name="page" start=0}
                            {assign var="iteration" value=$smarty.section.page.index+1} {* Переменная хранит текущий номер страницы *}
                            <li><a href="javascript:void(0)" onclick="AjaxRequestInd('left_box', '{$url}{if $smarty.get.is_category_brand_id}{$catalog_dir}/brand/category/{$pseudo_dir}/{$select_page+1}/?{elseif $is_selection_find == 1}{$catalog_dir}/find-selection/?params={$smarty.post|serialize|replace:'"':'@@@@'|urldecode}&{elseif $is_brand == 1}{$catalog_dir}/brand/{$param_tpl.brand}/{$select_page+1}/{$catalog->id}/?{elseif $navigation_param}{$catalog_dir}/get-product/{$navigation_param}/?{else}{$catalog_dir}/id/{$catalog->id}/?{/if}{if $char_adress}char_adress={$char_adress|urldecode}&{/if}page={$smarty.section.page.index}{if $smarty.get.brand_id}&brand_id={$smarty.get.brand_id}{/if}', '#indicator_catalog');">{$iteration}</a></li>
                            {/section}
                        ...
                    {/if}

                    {if $select_page < $count_products-6}
                        {assign var="visible_page" value=7} {* Сколько всего будет видно страниц *}
                    {else}
                        {assign var="visible_page" value=9} {* Сколько всего будет видно страниц *}
                    {/if}
                    {if $select_page > 2}
                        {assign var="tmp_left_page" value=3} {* Кол-во знаков с лева от открытой страницы *}
                        {assign var="start" value=$select_page-$tmp_left_page}
                    {else}
                        {assign var="start" value=0}  {* Кол-во знаков с лева от открытой страницы *}
                        {assign var="tmp_left_page" value=$select_page}
                    {/if}
                    {section loop=$select_page+$visible_page-$tmp_left_page name="page" start=$start}
                        {assign var="iteration" value=$smarty.section.page.index+1} {* Переменная хранит текущий номер страницы *}
                        {if $iteration <= $count_products}
                            {if $select_page == $iteration-1}
                                <li class="active">{$iteration}</li>
                                {else}
                                <li><a href="javascript:void(0)" onclick="AjaxRequestInd('left_box', '{$url}{if $smarty.get.is_category_brand_id}{$catalog_dir}/brand/category/{$pseudo_dir}/{$select_page+1}/?{elseif $is_selection_find == 1}{$catalog_dir}/find-selection/?params={$smarty.post|serialize|replace:'"':'@@@@'|urldecode}&{elseif $is_brand == 1}{$catalog_dir}/brand/{$param_tpl.brand}/{$select_page+1}/{$catalog->id}/?{elseif $navigation_param}{$catalog_dir}/get-product/{$navigation_param}/?{else}{$catalog_dir}/id/{$catalog->id}/?{/if}{if $char_adress}char_adress={$char_adress|urldecode}&{/if}page={$smarty.section.page.index}', '#indicator_catalog');">{$iteration}</a></li>
                                {/if}
                            {/if}
                        {/section}
                        {if $select_page < $count_products-6}
                        ...
                        {section loop=$count_products name="page" start=$count_products-2}
                            {assign var="iteration" value=$smarty.section.page.index+1} {* Переменная хранит текущий номер страницы *}
                            <li><a href="javascript:void(0)" onclick="AjaxRequestInd('left_box', '{$url}{if $smarty.get.is_category_brand_id}{$catalog_dir}/brand/category/{$pseudo_dir}/{$select_page+1}/?{elseif $is_selection_find == 1}{$catalog_dir}/find-selection/?params={$smarty.post|serialize|replace:'"':'@@@@'|urldecode}&{elseif $is_brand == 1}{$catalog_dir}/brand/{$param_tpl.brand}/{$select_page+1}/{$catalog->id}/?{elseif $navigation_param}{$catalog_dir}/get-product/{$navigation_param}/?{else}{$catalog_dir}/id/{$catalog->id}/?{/if}{if $char_adress}char_adress={$char_adress|urldecode}&{/if}page={$smarty.section.page.index}{if $smarty.get.brand_id}&brand_id={$smarty.get.brand_id}{/if}', '#indicator_catalog');">{$iteration}</a></li>
                            {/section}
                        {/if}
                    {/if}
                    {*                    {if $select_page+1 != $smarty.section.page.total}<li><a href="?page={$select_page+1}" class="next-page left">Вперед</a></li>{/if}*}
            </ul> 
        {/if}