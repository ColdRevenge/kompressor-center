{* Быстрое редактирование *}
{assign var="time" value=$smarty.now}
<div style="float: right; margin-top: -5px;"><a href="" onclick="$('.set_char_product_value').remove();
        $('#char_set_form').remove();
        return false;"><img src="/images/sys/close_1.png" alt="" /></a></div>
        {if $is_del == 1}
    <h2 style="margin-top: 5px">Значение успешно удалено!</h2>
{elseif $add_value_id} {* Если условие закоментить будет после добавление редактирование включаться *}
    <h2 style="margin-top: 5px">Значение успешно добавлено!</h2>

{elseif $is_edit == 1} {* Если закоментить то будет после редактирование опять редактирование *}

    <h2 style="margin-top: 5px">Значение успешно сохранено!</h2>
{else}

    {if !$get_value->id}
        <h2 style="margin-top: 0">Добавить значение</h2>
        <input type="hidden" name="value_id" value="0" />
    {else}
        <h2 style="margin-top: 0">Редактировать значение</h2>
        <input type="hidden" name="value_id" value="{$get_value->id}" />
    {/if}
    <input type="hidden" name="characteristic_id" value="{$param_tpl.characteristic_id}" />
    <div class="clear">&nbsp;</div>
    <input type="text" value="{$get_value->name|stripslashes|replace:'"':'&quot;'}" name="value_name" placeholder="Значение характеристики" />
    <input type="text" value="{$get_value->unit|stripslashes|replace:'"':'&quot;'}" name="value_unit" style="width: 50px;"  placeholder="ед. изм." />
    <button onclick="$(this).hide();
            AjaxFormRequest('char_set_block_result', 'char_set_form', '{$admin_url}characteristics/product_quick/{$param_tpl.characteristic_id}/{$add_value_id|default:$param_tpl.value_id}/');
            return false;"> {if !$get_value->id}Добавить{else}Сохранить{/if}</button>
    {if $get_value->id}<button onclick="if (confirm('Вы действительно хотите удалить значение {$get_value->name|stripslashes|replace:'"':'&quot;'}')) {
                $(this).hide();
                AjaxRequestAsync('char_set_block_result', '{$admin_url}characteristics/product_quick/del/1/{$param_tpl.characteristic_id}/{$add_value_id|default:$param_tpl.value_id}/');
                return false;
            }">Удалить</button>{/if}
    {/if}



    {if $is_change == 1} {* Обновить селект в продуктах *} 
            <script type="text/javascript">
                AjaxRequestAsync('characteristic_select_{$param_tpl.characteristic_id}', '{$admin_url}characteristics/product_quick/select/{$param_tpl.characteristic_id}/{$add_value_id|default:$param_tpl.value_id}/');
                $('#characteristic_select_{$param_tpl.characteristic_id}').next('a').find('img').attr('src', ($('#characteristic_select_{$param_tpl.characteristic_id} option:selected').val() == 0) ? '/images/sys/admin/add.png' : '/images/sys/admin/edit.png');
            </script>
        {/if}


{*        {if $is_del == 1 || $is_edit == 1 || $add_value_id} 
            <script type="text/javascript">
            $('#img_char_{$characteristic_id}')
                $('.set_char_product_value').fadeOut(3500, function() {
                    $('.set_char_product_value').remove();
                    $('#char_set_form').remove();
                });
            </script>
        {/if}*}