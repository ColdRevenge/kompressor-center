<div class="breadcrumbs">
    <div class="container">
	    <ul class="breadcrumbs__cont">
	        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/">Главная</a></li>
        	<li class="breadcrumbs__item">Избранное</li>
    	</ul>
	</div>
</div>
<div class="container">
	<h1 class="headline">Избранное</h1>
	{if $products}
		{include file='getProduct.tpl'}
	{else}
		<div>Товаров не найдено</div>
	{/if}
</div>