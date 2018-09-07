{if $id === NULL}
    <h1>Карта сайта</h1>
    {*    <h2>Каталог товаров</h2>*}

    <div style="margin:5px 0px 10px 20px;" class="blue_link_block">
        {include file="map_site.tpl" id=0 tree=$category inc="map_site.tpl" level=0}
    </div>
    {*    <h3>Верхнее меню</h3>*}
    <div style="margin:5px 0px 10px 20px;" class="blue_link_block">
        {include file="map_site.tpl" id=0 tree=$category_1 inc="map_site.tpl" level=0}
    </div>
    {*    <h3>Нижнее меню</h3>*}
    <div style="margin:5px 0px 10px 20px;" class="blue_link_block">
        {include file="map_site.tpl" id=0 tree=$category_5 inc="map_site.tpl" level=0}
    </div>
    <br/>
{else}
    {if $tree[$id][0] != ""}
        {foreach from=$tree[$id] key="key" item="subtree"}
            {if $subtree->is_visible == 1}
                {this->getCategoryAdress category_id=$subtree->id assign="category_adress"}
                {assign var="current_id" value=$tree[$id][$key]->id}
                <div style="margin-left:{$level*20}px;">




                    {if $subtree->id != 790 && $subtree->id != 823 && $subtree->parent_id != 790 && $subtree->parent_id != 823 && $subtree->type == 0}
                        <a href="{if $subtree->type==0}{$url}{$category_adress}{else}{$url}page/{$subtree->pseudo_dir}/{/if}" class="h1">
                            {$subtree->name}</a> 
                            {include file=$base_dir|cat:"modules/catalog/templates/test.tpl" open_category_id=$subtree->id}
                        {else}
                        <a href="{if $subtree->type==0}{$url}{$category_adress}{else}{$url}page/{$subtree->pseudo_dir}/{/if}" >
                            {$subtree->name}</a> 
                        {/if}
                </div>
            {/if}
            {include file="map_site.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1}
        {/foreach}
    {/if}
{/if}