<div id="img_galley">
    {foreach from=$files item="file"}
        <a href="{$gallery_url}{$file->file}" rel="prettyPhoto[sdsd]"><img src="{$gallery_url}{setFile->setFile file=$file->file}" alt="" /></a>
       {/foreach}
</div>