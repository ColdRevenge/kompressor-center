<div class="block-page">
    {include file=$template_message message=$message error=$error}
    <div  class="menu-list" style="float: left;">
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 220px;font-size: 12px;">
            {$catalog}
        </table>
    </div>
    <div class="page" id="product_list" style="width: 550px;margin-left: 10px;float: left">
        {include file="news_product_list.tpl"}
    </div>
</div>