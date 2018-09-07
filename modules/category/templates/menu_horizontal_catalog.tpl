{if $tree[$id][0] != ""}

    {if $tree[$id]|@count}
        {math assign="polovina" equation="x/2" x=$tree[$id]|@count}
        {assign var="polovina" value=$polovina|ceil}
        {if $level != 0}<div>{/if}
            <ul>
                {foreach from=$tree[$id] key="key" item="subtree" name="name"}
                    {assign var="parent_id" value=$subtree->id}
                    {if $subtree->is_visible == 1 && (($subtree->is_param_1 == 1 && $level == 0) || $level != 0)}
                        {assign var="tmp_var_id" value=$tree[$id][$key]->id}
                        {if $level == 0}
                            <li><a  href="{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}" {if $open_category_id == $parent_id || $parents_category_arr.$parent_id} class="active"{/if}>{$subtree->param_str_1|default:$subtree->name|stripslashes}</a>{*/if*}{if $tree[$tmp_var_id][0] && $level < 1}{include file="menu_horizontal_catalog.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 offset=$offset}{/if}</li>
                            {elseif $level == 1} {*Убрать if $level == 1 чтобы снять ограничение на 2 уровня*}
                           
                                {counter assign="i" name="counter"}

                                {if $smarty.foreach.name.iteration == $polovina+1}
                            </ul>
                            <ul>
                            {/if}
                             <li>
                {if !($open_category_id == $parent_id || $parents_category_arr.$parent_id)}<a href="{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}">{$subtree->param_str_1|default:$subtree->name|stripslashes}</a>{else}<span onclick="location.href = '{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}'">{$subtree->param_str_1|default:$subtree->name|stripslashes}</span>{/if}{if $tree[$tmp_var_id][0] && $level < 1}{include file="menu_horizontal_catalog.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 offset=$offset}{/if}</li>
                {/if}
            {/if}
        {/foreach}
</ul> 
{if $level != 0}</div>{/if}
{/if} 
{/if}