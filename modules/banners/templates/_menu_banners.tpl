<div class="menu">
{if $param_tpl.type == 5}
	<form method="POST" action="">
	<table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
	{$category_tree_list_5}
	</table>
	<br/>
	<a href="/xadmin/category/edit/5/?not_menu=1" rel="add_banners_menu">Добавить новый раздел</a>
	<br/>
	<button>Применить сортировку</button>
	</form>
{else}
    <h1>Верхнее меню:</h1>
    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
        {$category_tree_list_1}
    </table>

   {* <h1>Левое меню:</h1>
    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
        {$category_tree_list_3}
    </table>*}

  {*  <h1>Нижнее меню:</h1>
    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
        {$category_tree_list_2}
    </table>*}
	
    {*<h1>Кнопочки:</h1>
    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
        {$category_tree_list_4}
    </table>*}
    <br/>
    <h1>Каталог:</h1>
    <table cellpadding="5" cellspacing="1" border="0" class="table" style="min-width: 250px;">
        {$category_tree_list_0}
    </table>
{/if}
</div>