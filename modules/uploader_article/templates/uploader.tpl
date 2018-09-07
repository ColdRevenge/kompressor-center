
<div id="file-uploader_{$type}">	
</div>
<form method="post" action="">
    <div class="qq-upload-extra-drop-area"></div>
    <input type="hidden" value="test_post" name="trrrr" />
</form>
<script src="{$url}js/uploader/fileuploader.js" type="text/javascript"></script>
<script type="text/javascript">        
    function createUploader_{$type}(){   
    var uploader = new qq.FileUploader({
    element: document.getElementById('file-uploader_{$type}'),
    action: '{$url}uploader_article/upload/?type={$type|default:0}{if $category_id}&category_id={$category_id}{/if}{if $page_id}&page_id={$page_id}{/if}{if $width}&width={$width}{/if}{if $height}&height={$height}{/if}{if $formats}&formats={$formats}{/if}&resize_width={$resize_width_1|default:0}|{$resize_width_2|default:0}|{$resize_width_3|default:0}|{$resize_width_4|default:0}|{$resize_width_5|default:0}|{$resize_width_6|default:0}&resize_heigth={$resize_heigth_1|default:0}|{$resize_heigth_2|default:0}|{$resize_heigth_3|default:0}|{$resize_heigth_4|default:0}|{$resize_heigth_5|default:0}|{$resize_heigth_6|default:0}&resize_right_prefix={$resize_right_prefix_1}|{$resize_right_prefix_2}|{$resize_right_prefix_3}|{$resize_right_prefix_4}|{$resize_right_prefix_5}|{$resize_right_prefix_6}&resize_scallign={$resize_scallign_1|default:1}|{$resize_scallign_2|default:1}|{$resize_scallign_3|default:1}|{$resize_scallign_4|default:1}|{$resize_scallign_5|default:1}|{$resize_scallign_6|default:1}&resize_is_convas={$resize_is_convas_1|default:0}|{$resize_is_convas_2|default:0}|{$resize_is_convas_3|default:0}|{$resize_is_convas_4|default:0}|{$resize_is_convas_5|default:0}|{$resize_is_convas_6|default:0}&resize_type={$resize_type|default:0}{if $upload_dir_type}&upload_dir_type={$upload_dir_type}{/if}&water_file={$water_file_1}|{$water_file_2}|{$water_file_3}|{$water_file_4}|{$water_file_5}|{$water_file_6}&pos_top={$pos_top_1|default:0}|{$pos_top_2|default:0}|{$pos_top_3|default:0}|{$pos_top_4|default:0}|{$pos_top_5|default:0}|{$pos_top_6|default:0}&pos_bottom={$pos_bottom_1|default:0}|{$pos_bottom_2|default:0}|{$pos_bottom_3|default:0}|{$pos_bottom_4|default:0}|{$pos_bottom_5|default:0}|{$pos_bottom_6|default:0}&pos_left={$pos_left_1|default:0}|{$pos_left_2|default:0}|{$pos_left_3|default:0}|{$pos_left_4|default:0}|{$pos_left_5|default:0}|{$pos_left_6|default:0}&pos_right={$pos_right_1|default:0}|{$pos_right_2|default:0}|{$pos_right_3|default:0}|{$pos_right_4|default:0}|{$pos_right_5|default:0}|{$pos_right_6|default:0}',
    debug: true,
    name: 'uploader_images_{$type}', 
    onComplete: function(id, fileName, responseJSON){

    AjaxRequest('uploader_images_{$type}', '{$url}uploader_article/get/{$type|default:0}/{$category_id|default:0}/{$page_id|default:0}/0/0/{$action_id}/');
},
extraDropzones: [qq.getByClass(document, 'qq-upload-extra-drop-area')[0]]
});           
}

// in your app create uploader as soon as the DOM is ready
// don't wait for the window to load  
jQuery(document).ready(function()
{
createUploader_{$type}();
});
//window.onload = createUploader_{$type};     
{if $action_id} {* Экшены *}
$(document).ready(function() {
$(".fancy_up_{$type}").fancybox({
type            : 'iframe',
width		: {$act_width|default:'400'},
height		: {$act_height|default:'200'},
frameWidth	: {$act_width|default:'400'},
frameHeight	: {$act_height|default:'200'},
fitToView	: false,
closeClick	: false,
openEffect	: 'none',
closeEffect	: 'none'
});
});
{/if}
    </script>
<div id="uploader_images_{$type}">
    {include file='getFiles.tpl'}
</div>