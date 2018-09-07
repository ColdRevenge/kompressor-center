<ul>
    <li class="active"><span class="selected" onclick="location.href = '{$admin_url}products/list/0/{$category_id}/'" style="cursor: pointer">Список товаров</span></li>
</ul>

<br/><br/>
<div>
    <h1>Товары комплекта <br/><a href="{$admin_url}related/add/0/0/{$temp_image_id}/?is_modal=1" rel="related" style="font-size: 15px;">Добавить</a></h1>
</div>
<div id="related_list_menu_0"> <!-- Тип указывать обязательно для обновления ajax //-->
    {$related_products}
</div>

{*<br/><br/>
<div  style="text-align: center;"> 
    <h1>Сопутствующие товары <br/><a href="{$admin_url}related/add/1/0/{$temp_image_id}/?is_modal=1" rel="related" width="1950" height="680" style="font-size: 15px;">Добавить</a></h1>

</div>
<div id="related_list_menu_1"> Тип указывать обязательно для обновления ajax
    {$related_products_1}
</div>*}
{*{$is_related_products} является сопутствующиим *} 
