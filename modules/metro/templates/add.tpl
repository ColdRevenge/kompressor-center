<div class="block">
	<h1>Добавление станции</h1>
	<form method="POST" action="">
		Название<br/>
		<input type="text" name="name" value="{$smarty.post.name}"/><br/>
		{if $param_tpl.edit_stantion_id}<button>Сохранить</button>{else}<button>Добавить</button>{/if}
	</form>
</div>