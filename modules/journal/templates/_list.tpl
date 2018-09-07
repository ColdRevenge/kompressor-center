<div class="journal-list">
    {foreach from=$list item="journal" key="ind"}
        {assign var="month" value=$journal->published_at|date_format:"%m"}
        {assign var="month_int" value=$month*1-1}
        <div class="journal-list__item">
            <a href="{$url}journal/look/{$journal->id}/" class="journal-list__image">
                <img class="journal-list__img" src="/images/news/small_{$journal->image}" alt="{$journal->title}" />
            </a>
            <div class="journal-date">{$journal->published_at|date_format:"%d"} {$months.$month_int} {$journal->published_at|date_format:"%Y"}</div>
            <a href="{$url}journal/look/{$journal->id}/" class="journal-list__title">{$journal->title}</a>
        </div>
        {if ($ind + 1) % 3 == 0}
			<div class="clear"></div>
        {/if}
    {/foreach}
</div>