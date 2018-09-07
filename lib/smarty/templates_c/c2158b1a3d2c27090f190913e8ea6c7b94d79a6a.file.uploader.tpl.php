<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:37:10
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/uploader_products/templates/uploader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4758316655d46a66025224-93020853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2158b1a3d2c27090f190913e8ea6c7b94d79a6a' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/uploader_products/templates/uploader.tpl',
      1 => 1423307977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4758316655d46a66025224-93020853',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'url' => 0,
    'product_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46a66061a55_96196094',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46a66061a55_96196094')) {function content_55d46a66061a55_96196094($_smarty_tpl) {?>
<div id="file-uploader_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">	
</div>
<form method="post" action="">
    <div class="qq-upload-extra-drop-area"></div>
    <input type="hidden" value="test_post" name="trrrr" />
</form>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/uploader/fileuploader.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">        
    function createUploader_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
(){   
    var uploader = new qq.FileUploader({
    element: document.getElementById('file-uploader_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
'),
    action: '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
uploader_products/upload/?type=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['type']->value)===null||$tmp==='' ? 0 : $tmp);
if ($_smarty_tpl->tpl_vars['product_id']->value) {?>&product_id=<?php echo $_smarty_tpl->tpl_vars['product_id']->value;
}?>',
    debug: true,
    name: 'uploader_images_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
', 
    onComplete: function(id, fileName, responseJSON){

    AjaxRequest('uploader_images_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
uploader_products/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['type']->value)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
/');
},
extraDropzones: [qq.getByClass(document, 'qq-upload-extra-drop-area')[0]]
});           
}

// in your app create uploader as soon as the DOM is ready
// don't wait for the window to load  
jQuery(document).ready(function()
{
createUploader_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
();
});

    <?php echo '</script'; ?>
>
<div id="uploader_images_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
    <?php echo $_smarty_tpl->getSubTemplate ('getFiles.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>$_smarty_tpl->tpl_vars['type']->value), 0);?>

</div><?php }} ?>
