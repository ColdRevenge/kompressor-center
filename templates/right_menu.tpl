<!-- calculator-box -->
<div class="calculator-box">
    <a href="#">
        <span class="title-box">Калькулятор</span>
        on-line
    </a>
</div>
<!-- end calculator-box -->
 
<!-- photo-preview-list -->
<div class="photo-preview-list">
    <h2>Фотогалерея</h2>
    <ul>
        <li>

            <!-- photo-preview-box -->
            <div class="photo-preview-box">
                <span class="img-box"><img src="{$fronted_images_url}img28.jpg" alt="" /></span>
                <span class="txt-box">Краткое описание на пару строк</span>
                <span class="btn-box"><button href="#" class="black-btn" onclick="alert('В разработке');">Подробнее</button></span>
            </div>
            <!-- end photo-preview-box -->

        </li>

        <li>

            <!-- photo-preview-box -->
            <div class="photo-preview-box">
                <span class="img-box"><img src="{$fronted_images_url}img29.jpg" alt="" /></span>
                <span class="txt-box">Краткое описание на пару строк</span>
                <span class="btn-box"><button class="black-btn" onclick="alert('В разработке');">Подробнее</button>
            </div>
            <!-- end photo-preview-box -->

        </li>
    </ul>

    <a href="#" class="all-btn">Смотреть все</a>
</div>
<!-- end photo-preview-list -->

<!-- info-menu-list -->
<div class="info-menu-list">
    <h3>Полезная информация</h3>
	<ul>
	{foreach from=$articles_block item="articles"}
		<li><a href="{$url}news/look/{$articles->id}/">{$articles->name|stripslashes}</a></li>
	{/foreach}
    </ul>
</div>
<!-- end info-menu-list -->

<!-- comment-preview-slider -->
<div class="comment-preview-slider">

    <h3>Отзывы</h3>
    <i class="line-bg"></i>

    <ul class="bxslider">
        {*<li>
            Полезное
            <br />Как выбрать мебель
            <br />Советы по монтажу
            <br />Выбор мойки и сместителя
            <br />Уголок покупателя
            <span class="bottom-line">
                Виталий, “Вертус6”
            </span>
        </li>

        <li>
            Полезное
            <br />Как выбрать мебель
            <br />Советы по монтажу
            <br />Выбор мойки и сместителя
            <br />Уголок покупателя
            <span class="bottom-line">
                Виталий, “Вертус6”
            </span>
        </li>

        <li>
            Полезное
            <br />Как выбрать мебель
            <br />Советы по монтажу
            <br />Выбор мойки и сместителя
            <br />Уголок покупателя
            <span class="bottom-line">
                Виталий, “Вертус6”
            </span>
        </li>

        <li>
            Полезное
            <br />Как выбрать мебель
            <br />Советы по монтажу
            <br />Выбор мойки и сместителя
            <br />Уголок покупателя
            <span class="bottom-line">
                Виталий, “Вертус6”
            </span>
        </li>*}
		
		{foreach from=$opinion item="item_opinion"}
		<li>
            <br/>{$item_opinion->text|stripslashes|nl2br}
            <span class="bottom-line">
				{$item_opinion->name|stripslashes} {if $item_opinion->profession|stripslashes}, {$item_opinion->profession|stripslashes}{/if}
			</span>
		</li>
        {/foreach}
		
    </ul>

    <div class="bottom-btn">
        <button class="black-btn" onclick="location.href='{$url}otzuvy/';">Все отзывы</button>
        <div class="clear"></div>
    </div>

</div>
<!-- end comment-preview-slider -->
