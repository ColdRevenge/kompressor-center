<div class="podbor-list__cell podbor-item">
    <div class="podbor-item__data">
        <div class="podbor-item__title">{$name}:</div>
        <div class="podbor-item__value _range">
            <span class="podbor-item__from">от</span>
            <input type="text" class="podbor-item__range" name="char_min_range[{$id}]" value="{$smarty.post.char_min_range.$id|default:$chars_id->min_name|number_format:0:"":""|default:0}" />
            <span class="podbor-item__to">до</span>
            <input type="text" class="podbor-item__range" name="char_max_range[{$id}]" value="{$smarty.post.char_max_range.$id|default:$chars_id->max_name|number_format:0:"":""|default:0}"/> 
        </div>
    </div>
</div>