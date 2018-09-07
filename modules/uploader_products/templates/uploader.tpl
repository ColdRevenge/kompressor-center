
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
    action: '{$url}uploader_products/upload/?type={$type|default:0}{if $product_id}&product_id={$product_id}{/if}',
    debug: true,
    name: 'uploader_images_{$type}', 
    onComplete: function(id, fileName, responseJSON){

    AjaxRequest('uploader_images_{$type}', '{$url}uploader_products/get/{$type|default:0}/{$product_id|default:0}/');
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

    </script>
<div id="uploader_images_{$type}">
    {include file='getFiles.tpl' type=$type}
</div>