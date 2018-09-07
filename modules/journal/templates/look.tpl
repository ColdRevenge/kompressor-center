<div class="breadcrumbs">
    <div class="container">
	    <ul class="breadcrumbs__cont">
	        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/">Главная</a></li>
	        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="{$url}journal/">Интернет-журнал</a></li>
	        <li class="breadcrumbs__item">{$journal->title}</li>
    	</ul>
	</div>
</div>
<div class="container">
	<h1 class="headline">{$journal->title}</h1>
	{assign var="month" value=$journal->published_at|date_format:"%m"}
	{assign var="month_int" value=$month*1-1}
	<div class="journal-date">{$journal->published_at|date_format:"%d"} {$months.$month_int} {$journal->published_at|date_format:"%Y"}</div>
	<div class="text">
	    <div class="text-page">
	        <p>{$journal->text}</p>
	        
	    </div>
	</div>
	<br/>
	<div style="margin: 10px auto;text-align: center;">
	    <a href="{$url}journal/" class="font-data">Вернуться</a>
	</div>
</div>