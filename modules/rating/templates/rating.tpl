{if $isVoice == 0} {*Если не голосовали*}
    <div id="rating_{$voice_id}" class="rating">
        {section loop=5 name="rating"}
            {section loop=5 name="rating"}
                {if $voices->rating < $smarty.section.rating.iteration && $voices->rating|ceil == $smarty.section.rating.iteration}
                    <img src="{$fronted_images_url}rating.png" alt="" id="id_rating_{$voice_id}_{$smarty.section.rating.iteration}" onclick="rating('rating_{$voice_id}', {$smarty.section.rating.iteration}, {$voice_id}, {$voice_type}, 'id_rating_{$voice_id}_')" onmouseover="rating_s({$smarty.section.rating.iteration}, 'id_rating_{$voice_id}_', 1)" onmouseout="rating_s({$smarty.section.rating.iteration}, 'id_rating_{$voice_id}_', 0)" />
                {elseif $voices->rating >= $smarty.section.rating.iteration}
                    <img src="{$fronted_images_url}rating_full.png" alt="" id="id_rating_{$voice_id}_{$smarty.section.rating.iteration}" onclick="rating('rating_{$voice_id}', {$smarty.section.rating.iteration}, {$voice_id}, {$voice_type}, 'id_rating_{$voice_id}_')" onmouseover="rating_s({$smarty.section.rating.iteration}, 'id_rating_{$voice_id}_', 1)" onmouseout="rating_s({$smarty.section.rating.iteration}, 'id_rating_{$voice_id}_', 0)" />
                {else}
                    <img src="{$fronted_images_url}rating_noactive.png" alt="" id="id_rating_{$voice_id}_{$smarty.section.rating.iteration}" onclick="rating('rating_{$voice_id}', {$smarty.section.rating.iteration}, {$voice_id}, {$voice_type}, 'id_rating_{$voice_id}_')" onmouseover="rating_s({$smarty.section.rating.iteration}, 'id_rating_{$voice_id}_', 1)" onmouseout="rating_s({$smarty.section.rating.iteration}, 'id_rating_{$voice_id}_', 0)" />
                {/if}
            {/section}<span>({$voices->count} голосов)</span>
        {/section}
    </div>
{else}
    <div id="rating_{$voice_id}" class="rating">
        {section loop=5 name="rating"}
            {if $voices->rating < $smarty.section.rating.iteration && $voices->rating|ceil == $smarty.section.rating.iteration}<img src="{$fronted_images_url}rating.png" alt="" />{elseif $voices->rating >= $smarty.section.rating.iteration}<img src="{$fronted_images_url}rating_full.png" alt="" />{else}<img src="{$fronted_images_url}rating_noactive.png" alt="" />{/if} 
{/section}<span>({$voices->count} голосов)</span>
    </div>
{/if}