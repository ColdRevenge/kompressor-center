<div class="block">
    <div class="menu">
        {include file="_menu_category.tpl"}
    </div>
    <div class="page">
        <script type="text/javascript">
            checkMenu = {
                checkAll: function (obj) {
                    if ($(obj).attr('checked') === 'checked') {
                        $(obj).parent().parent().parent().parent().parent().find('tbody input[type=checkbox]').attr('checked', 'checked');
                    }
                    else {
                        $(obj).parent().parent().parent().parent().parent().find('tbody input[type=checkbox]').removeAttr('checked')
                    }
                },
                checkClass: function (obj, className) {
                    if ($(obj).attr('checked') === 'checked') {
                        $('.' + className + ' input[type="checkbox"]').attr('checked', 'checked').change();
                    }
                    else {
                        $('.' + className + ' input[type="checkbox"]').removeAttr('checked').change();
                    }
                }
            }
        </script>
        {include file=$template_message message=$message error=$error}
        {if $list_edit == 1}<h1>Добавить раздел</h1>
            <form method="post" action="{$admin_url}category/list/edit/{$type}/{$edit_id}">
                <div class="quick_add">
                    <table cellpadding="2" cellspacing="0" border="0" >
                        {if $type != 1} <tr>
                                <td valign="middle" align="right">Родительская категория <span class="asterix">*</span>:</td>
                                <td valign="middle" align="left">
                                    <select name="category_id" id="category_id" style="width: 250px;">
                                        <option value="0">...</option>
                                        {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 current_id=$edit_id selected_id=$smarty.post.category_id}
                                    </select>
                                </td>
                            </tr>{/if}
                            <tr>
                                <td valign="middle" align="right">Название <span class="asterix">*</span>:</td>
                                <td valign="middle" align="left"><input type="text" name="name" value='{$smarty.post.name|stripslashes|replace:"'":'"'}' maxlength="255" style="width: 246px;"/></td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">Ссылка:</td>
                                <td valign="middle" align="left"><input type="text"  name="link" value="{$smarty.post.link}" maxlength="255" style="width: 246px;"/></td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">Сортировка</td>
                                <td valign="middle" align="left"><input type="text" name="order" value="{$smarty.post.order}" maxlength="7" style="width: 50px;"/> <input type="checkbox" name="is_visible" value="0" {if $smarty.post.is_visible == 0}checked{/if} class="checkbox" id="is_visible"/><label for="is_visible">Скрытый раздел</label></td>
                            </tr>
                           {* <tr>
                                <td valign="middle" align="right">&nbsp;</td>
                                <td valign="middle" align="left"><input type="checkbox" name="param_str_1" value="0" {if $smarty.post.param_str_1 == 1}checked{/if} class="checkbox" id="param_str_1"/><label for="param_str_1">Мобильная версия</label></td>
                            </tr>*}
                            <tr>
                                <td valign="middle" align="right" colspan="2">
                                    {if $edit_id > 0}<button>Сохранить</button>{else}<button>Добавить</button>{/if}
                            </tr>
                        </table>
                    </div>
                </form>{/if}

                <h1>Разделы {if $type == 0}каталога{else}меню{/if}</h1>

                <form method="post" action="{$admin_url}category/list/{$type}/">

                    <div class="small-navigation">
                        <div>
                            <img src="{$sys_images_url}admin/add.png" /><a href="{if $type == 0}{$MyURL}add/{$type}/{else}{$MyURL}list/edit/{$type}/{/if}" title="Добавить раздел {if $type == 0}каталога{else}меню{/if}" >Добавить раздел {if $type == 0}каталога{else}меню{/if}</a>
                        </div>
                        <div>
                            <img src="{$sys_images_url}admin/vydel.png" />
                            <span>
                                Выбранные категории: &nbsp; <select style="width: 350px;" name="action_product">
                                    <option value="-1">Не выбрано</option>
                                    <option value="-2">Удалить</option>
                                    <option value="-3">Сделать видимым</option>
                                    <option value="-4">Сделать невидимым</option>

                                    <optgroup label="Перенести в раздел:">
                                        {include file=$select_tree_file inc=$select_tree_file tree=$category  id=0 current_id=0 selected_id=0}
                                    </optgroup>
                                </select>
                            </span>

                            <button>Сохранить</button>
                        </div>
                    </div>


                    <table class="table" border="0" cellpadding="4" cellspacing="1" width="100%">
                        <thead>
                            <tr>
                                <td align="center" valign="middle" style="width: 33px;">
                                    <label class="p-check"><input type="checkbox" value="1" name="category_id[]" onchange="checkMenu.checkAll(this);" /><em>&nbsp;</em></label>
                                </td>
                                <td align="center" valign="middle">Название раздела меню</td>
                                <td align="center" valign="middle" width="75">Сортировка</td>
                                <td align="center" valign="middle" width="75">&nbsp;</td>
                            </tr>
                        </thead>
                        {include file=$file_tree id=0 tree=$category inc=$file_tree level=0}
                        <tfoot>
                            <tr>
                                <td align="left" valign="middle" colspan="2">

                                </td>
                                <td align="right" valign="middle" colspan="2">
                                    <button name="save_order">Сохранить</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>