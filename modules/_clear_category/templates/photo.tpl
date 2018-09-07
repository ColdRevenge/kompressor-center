<div class="block">
    {include file="_menu_clear.tpl"}
    <div class="page">
        <h1>Незаполненные товары</h1>
        <a href="/xadmin/_clear_category/empty/desc/" style="font-size: 15px">Товары без описаний</a> / 
        <a href="/xadmin/_clear_category/empty/photo/" style="font-size: 15px">Товары без изображений</a> / 
        <a href="/xadmin/_clear_category/empty/char/" style="font-size: 15px">Товары без характеристик</a> / 
        <a href="/xadmin/_clear_category/empty/category_2_3/" style="font-size: 15px">Товары без камней</a> / 
        <a href="/xadmin/_clear_category/empty/category_4_5/" style="font-size: 15px">Товары без знака зодиака</a>
        <br/><br/>  

        <h1>Товары без изображений</h1>
        <style type="text/css">
            .table {
                text-align: center;
            }
        </style>
        <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
            <thead>
                <tr>
                    <td>Название товара: </td>
                    {*                    <td>Ссылка на карточку</td>*}
                    <td>Ссылка на админку</td>
                </tr>
            </thead>
            {foreach from=$category_arr item="cat" key="menu_id"}
                <tbody class="table_header">
                    <tr>
                        <td colspan="2" style="background-color: #1E79C4; color: white; font-size: 21px;">{if $menu_id == 0}Без категории{else}{$cat->name|stripslashes}{/if}</td>
                    </tr>
                </tbody>    

                {foreach from=$products_not_images.$menu_id item="item"}<tbody class="tbody">
                        {counter assign="i" }
                        <tr><td><a href="{$url}products/{$item->pseudo_dir}/" target="_blank">{$item->article|stripslashes}</a> <span class="notice">{$item->created}</span></td>
                            <td><a href="{$url}xadmin/products/edit/0/9023/{$item->id}/{$item->id}/" target="_blank">Редактировать</a></td>
                        </tr></tbody>
                    {/foreach}
                {/foreach}

            <tfoot>
                <tr>
                    <td colspan="3" style="text-align: right;"> Всего <b>{$i}</b></td>
                </tr>
            </tfoot>

        </table>
    </div>
</div>