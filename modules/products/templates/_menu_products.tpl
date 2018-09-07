<div class="menu">
    <h1>Каталог:</h1>
    <table cellpadding="5" cellspacing="1" border="0" class="table" style="min-width: 340px;">
            {$category_tree_list}
    </table>

    {if $count_product_not_category}
    <br/>
    <div class="notice">--</div>
    <a href="{$MyURL}list/0/0/">Товары без категории </a>({$count_product_not_category})
    {/if}
    <script type="text/javascript">
        minimizeMenu.minimizeMenu();
    </script>
</div>
