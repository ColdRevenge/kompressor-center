{if $is_main != 1 && $smarty.get.not_detailed_catalog != 1}
    {if  $is_ajax != 1}
        <div class="breadcrumbs">
            <div class="container">
                <ul class="breadcrumbs__cont">
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/">Главная</a></li>
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/catalog">Каталог товаров</a></li>
                    {assign var="adress" value=''}
                    {foreach from=$bread_page_arr item="bread" name="bread"}
                        {assign var="adress" value=$adress|cat:$bread->pseudo_dir|cat:'/'}
                        {if $smarty.foreach.bread.total == $smarty.foreach.bread.iteration}
                            {if $bread_desc_char}
                                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="{$url}{$adress}">{$bread->bread_name|default:$bread->name}</a></li> 
                                <li class="breadcrumbs__item">{$bread_desc_char|stripslashes}</li>
                            {else}
                                <li class="breadcrumbs__item">{$bread->bread_name|default:$bread->name} </li>
                            {/if}
                        {else}
                            <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="{$url}{$adress}">{$bread->bread_name|default:$bread->name}</a></li> 
                        {/if}
                    {/foreach}
                    {if $brand_name && !$bread_page_arr|@count}
                        <li class="breadcrumbs__item">{$brand_name}</li>
                    {/if}

                    {foreach from=$bread_catalog_root item="bread_catalog" name="name"}
                        {if $bread_catalog.link && $smarty.foreach.name.itaration != $smarty.foreach.name.total -1}
                            <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="{$url}{$bread_catalog.link}">{$bread_catalog.name}</a></li> 
                        {else}
                            <li class="breadcrumbs__item">{$bread_catalog.name}</li>
                        {/if}

                    {/foreach}
                </ul>
            </div>
        </div>
        <div class="container">
            {if $brand_name}
                <h1 class="headline">{$brand_name|stripslashes}</h1>
            {elseif $is_find == 1}
                <h1 class="headline">Поиск товаров - "{$smarty.get.find|stripslashes|strip_tags}"</h1>
            {else}
                <h1 class="headline">
                    {if $all_brands|@count}
                        Производители
                    {else}
                        {$h1|stripslashes|default:$catalog->name|default:"Каталог товаров"|stripslashes}
                    {/if}
                </h1>
            {/if}
            <div class="c-catalog__content l-layout">
                <aside class="l-layout__sidebar c-menu">
                    {foreach from=$allCategories.0 item="icategory" name="icategory"}
                        <div class="c-menu__item">
                            <div class="c-menu-item {if ($open_category_parent_id == $icategory->id || $open_category_id == $icategory->id)}-active{/if}">
                                <div class="c-menu-item__head">
                                    <a href="{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$icategory->id}" class="c-menu-item__head-link">
                                        <span>{$icategory->name|stripslashes}</span>
                                    </a>
                                    {if $allCategories[$icategory->id]}
                                        <span class="c-menu-item__head-arrow js-open-categories-submenu sprite -arrow-down"></span>
                                    {/if}
                                </div>
                                {if $allCategories[$icategory->id]}
                                    <ul class="c-menu-item__submenu c-submenu">
                                        {foreach from=$allCategories[$icategory->id] item="isubcat" name="isubcat"}
                                            <li class="c-submenu__item">
                                                <a href="{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$isubcat->id}" 
                                                   class="c-submenu__link 
                                                          {if ($open_category_parent_id == $isubcat->id || $open_category_id == $isubcat->id)}_active{/if}">
                                                    {$isubcat->name|stripslashes}
                                                </a>
                                            </li>
                                        {/foreach}
                                    </ul>
                                {/if}
                            </div>
                        </div>
                    {/foreach}
                </aside>

                <div class="l-layout__content">

                    {if  $is_ajax != 1}
                        {if $category->text_top}
                            {$category->text_top|stripslashes}<br/>
                        {/if}
                    {/if}

                    {* Для брендов текст *}
                    {$brand_text_top|stripslashes}

                    {/if}
                    {if $smarty.get.not_detailed_catalog != 1}
                        {if $is_brand == 1}
                            {if $brands_categoryes}
                                <ul class="brand-category">
                                    {foreach from=$brands_categoryes item="icategory" name="icategory"}
                                        
                                        <li{if $open_category_id == $icategory->id} class="active"{/if}{if $smarty.foreach.icategory.index%3 == 0} style="clear: both"{/if}>
                                            <a href="{$url}brands/{$icategory->pseudo_dir}/">
                                                {$icategory->name|stripslashes} от производителя {$icategory->brand_name|stripslashes}
                                            </a>
                                        </li>
                                            
                                    {/foreach}
                                    <li class="clear">&nbsp;</li>
                                </ul>
                                <div class="clear">&nbsp;</div>
                            {/if}
                        {else}
                        {/if}
                    {/if}

                    {if $content_text}
                        <div style="margin-bottom: 10px;">{$content_text}</div>
                    {/if}

                    {if $categoryes.$category_id}
                        {include file='getCategoriesList.tpl' categoriesList=$categoryes.$category_id modificator='catalog'}
                    {/if}

                    {if $is_selection_find == 1 && $products|@count == 0}
                        <h2>Товаров не найдено</h2>
                    {/if}

                    {if $products.0 && ! $categoryes.$category_id}

                        {include file=$template_products_catalog|default:'getProduct.tpl'}

                        {* Товары в которых входит характеристика *}
                        {if $product_in_chars|@count > 0}<br/><br/>
                            <div class="h1">
                                Другие товары cодержащие 
                                {if $product_characteristic_id == 5}
                                    камень
                                {/if} 
                                "{$product_in_char_name|stripslashes}" 
                                {if $product_characteristic_id == 2}цвет{/if}
                            </div>
                            {include file=$template_products_catalog|default:'getProduct.tpl' products=$product_in_chars product_images=$product_in_char_images}
                        {/if}

                        {if $select_page+1 < $count_products && $is_find != 1}
                            <div class="page-number">
                                <div>Страница {$select_page+2}</div>
                            </div>

                            {if $is_selection_find == 1}
                                <button class="next-product"  onclick="$(this).prev('.page-number').css({ldelim}'display': 'block'{rdelim});
                                    $(this).remove();
                                    AjaxRequestInd('left_box', '{$url}{$catalog_dir}/find-selection/?not_detailed_catalog=1&page={$select_page+1}&params={$smarty.post|serialize|urlencode}', '#add_scrool_page_{$select_page+1}', 1, '{*#add_scrool_page_{$select_page+1}*}');"></button>

                            {elseif $smarty.get.is_category_brand_id} {* Если бренд *}
                                <button class="next-product"  onclick="$(this).prev('.page-number').css({ldelim}'display': 'block'{rdelim});
                                    $(this).remove();
                                    AjaxRequestInd('left_box', '{$url}{$catalog_dir}/brand/category/{$pseudo_dir}/{$select_page+1}/{$catalog->id}/?not_detailed_catalog=1&page={$select_page+1}', '#add_scrool_page_{$select_page+1}', 1, '{*#add_scrool_page_{$select_page+1}*}');"></button>

                            {elseif $is_brand == 1} {* Если бренд *}
                                <button class="next-product"  onclick="$(this).prev('.page-number').css({ldelim}'display': 'block'{rdelim});
                                    $(this).remove();
                                    AjaxRequestInd('left_box', '{$url}{$catalog_dir}/brand/{$param_tpl.brand}/{$select_page+1}/{$catalog->id}/?not_detailed_catalog=1&page={$select_page+1}', '#add_scrool_page_{$select_page+1}', 1, '{*#add_scrool_page_{$select_page+1}*}');"></button>

                            {else} {* Если каталог *}
                                <button class="next-product"  onclick="$(this).prev('.page-number').css({ldelim}'display': 'block'{rdelim});
                                    $(this).remove();
                                    AjaxRequestInd('left_box', '{$url}{$catalog_dir}/id/{$catalog->id}/?not_detailed_catalog=1&{if $char_adress}char_adress={$char_adress}&{/if}page={$select_page+1}', '#add_scrool_page_{$select_page+1}', 1, '{*#add_scrool_page_{$select_page+1}*}', '', 2);"></button>
                            {/if}

                            {* {include file='navigation_pages.tpl'}*}
                        {/if}


                        <div id="sorting_pages" style="display: none">{include file='navigation_pages.tpl' is_scrool=1}</div>
                        <div class="clear"></div>

                        {* Показываем список подкатегорий и категорий *}

                    {elseif ( ! $products.0) && ($category_id != 0 || $is_find == 1)}

                        {if $is_category != 1} 
                            {* ЕСЛИ ни чего не найдено, то:  *}  
                            <h3>Товаров не найдено</h3>

                        {/if} {*Если поиск не по категориям*}

                    {elseif ( ! $products.0) && !($child_categoryes|@count) && $open_category_id != 0}
                        <h3>Нет товаров</h3>
                    {/if}

                    {if  $is_ajax != 1}
                        <div>
                            {if $is_brand == 1}
                                {if $brands_categoryes}
                                    <ul class="brand-category">
                                        {foreach from=$brands_categoryes item="icategory" name="icategory"}
                                            <li {if $open_category_id == $icategory->id}class="active"{/if}>
                                                <a href="{$url}brands/{$icategory->pseudo_dir}/">
                                                    {$icategory->name|stripslashes} от производителя {$icategory->brand_name|stripslashes}
                                                </a>
                                            </li>
                                        {/foreach}
                                        <li class="clear">&nbsp;</li>
                                    </ul>
                                    <div class="clear">&nbsp;</div>
                                {/if}
                            {/if}

                            {if $open_category_id == 0}
                                {$category_text|stripslashes}
                            {/if}

                            {$category->text_bottom|stripslashes}

                            {$brand_text_bottom|stripslashes} 
                        </div>
                    {/if}

                    {if $is_category == 1} 
                        {*Поиск по категориям*}

                        {if $category_find|@count == 0}
                            <h2>Продуктов не найдено</h2>
                        {else}    
                            <div class="category-group {if $is_find == 1} find-category-list{/if}">
                                {foreach from=$category_find item="icategory"}
                                    <div class="category-list">
                                        <a href="{$url}{$catalog_dir}/find/category/{$icategory->category_pseudo_dir}/?find={$smarty.get.find}&shop_type={$smarty.get.shop_type}">
                                            <span>
                                                <img src="/images/icons/{if $icategory->category_icon}{$icategory->category_icon}{else}no-image.png{/if}" alt="" />
                                            </span>
                                            {$icategory->category_name|stripslashes} [{$icategory->count}]
                                        </a>
                                    </div>
                                {/foreach}
                            </div>
                        {/if}
                    {/if}
                </div><!-- /.l-layout__content -->
            </div><!-- /.l-layout -->
        </div><!-- /.container -->
    {/if}

    {if  $is_ajax != 1}{if $smarty.get.not_detailed_catalog != 1}

        <div class="{if  $is_ajax != 1}container{/if}">
            {if $child_categoryes|@count}
                <div class="category-group">
                    {foreach from=$child_categoryes item="icategory" name="icategory"}
                        <div class="category-list">
                            <a href="{if $icategory->link}{$icategory->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$icategory->id}{/if}">
                                <img src="/images/icons/{if $icategory->icon}{$icategory->icon}{else}no-image.png{/if}" alt="" />
                                <br/>
                                <span>{$icategory->name|stripslashes}</span>
                            </a>
                        </div>
                    {/foreach}
                </div>
            {/if}
        </div>
    {/if}
{/if}

