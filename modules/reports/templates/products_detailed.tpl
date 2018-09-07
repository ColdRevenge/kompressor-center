<table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: auto;" width="100%">
    <thead>
        <tr>
            <td valign="middle" align="center" style="width: 150px;">Создан</td>
            <td valign="middle" align="center">Товар</td>
            <td valign="middle" align="center">&nbsp;</td>
        </tr>
    </thead>
    {assign var="total" value="0"}
    {foreach from=$reports item="report" name="report"}
        {assign var='order_id' value=$report->id}
        <tbody class="tbody">
            <tr>
                <td valign="middle" align="center">

                    {assign var="_shop_url" value=$url}
                    {$report->created|date_format:"d.m.Y H:i:s"}
                <td valign="middle" align="left">
                    <a href="{$_shop_url}products/{$report->pseudo_dir}/" target="__blank">{$report->name|stripslashes}</a></td>
                </td>
                <td valign="middle" align="center">
                    <a href="{$admin_url}products/edit/0/{$report->category_1_id}/{$report->id}/{$report->id}/?is_modal=1"  rel="related" title="Редактировать товар" ><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                </td>
            </tr>
        </tbody>
        {assign var="total" value=$total+$report->sum_total}
    {/foreach}
</table>