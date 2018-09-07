<div class="block-page">
    {include file=$template_message message=$message error=$error}
    <div  class="menu-list" style="float: left;">
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 300px;font-size: 12px;">
            {$catalog}
        </table>
    </div>

    <div class="page" id="product_list" style="width: 830px;margin-left: 10px;float: left">

    </div>
    <script type="text/javascript">
            AjaxRequest('product_list', '{$admin_url}related/add/product/{$type}/{$category_id}/{$product_id}/');
    </script>
</div>