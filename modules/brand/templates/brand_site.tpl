
<table id="brands_list_table" class="catalogfirst" border="0" cellspacing="0" cellpadding="5" width="800">
    <tbody>
    {foreach from=$brands item="brand" name="brand"}
        {if $smarty.foreach.brand.iteration%3 == 1}<tr>{/if}
            <td width="33%">
                <table border="0" cellspacing="0" cellpadding="5" width="100%">
                    <tbody>
                        <tr>
                            <td width="90"><a href="{$url}catalog/brand/{$brand->pseudo_dir}/"><img title="Аккумуляторы American" src="{$icons_url}{$brand->icon}" border="0" alt="Аккумуляторы American" /></a></td>
                            <td>
                                <a href="{$url}catalog/brand/{$brand->pseudo_dir}/"><strong>{$brand->name}</strong></a></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        {if $smarty.foreach.brand.iteration%3 == 0}</tr>{/if}
    {/foreach}
    </tbody>
</table>