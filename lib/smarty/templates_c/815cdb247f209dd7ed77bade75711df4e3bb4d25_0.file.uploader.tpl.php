<?php /* Smarty version 3.1.24, created on 2018-07-02 09:00:50
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/uploader/templates/uploader.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:8683843735b39bf92c96e32_38159113%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '815cdb247f209dd7ed77bade75711df4e3bb4d25' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/uploader/templates/uploader.tpl',
      1 => 1530509516,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8683843735b39bf92c96e32_38159113',
  'variables' => 
  array (
    'type' => 0,
    'url' => 0,
    'admin_url' => 0,
    'category_id' => 0,
    'page_id' => 0,
    'width' => 0,
    'height' => 0,
    'formats' => 0,
    'resize_width_1' => 0,
    'resize_width_2' => 0,
    'resize_width_3' => 0,
    'resize_width_4' => 0,
    'resize_width_5' => 0,
    'resize_width_6' => 0,
    'resize_heigth_1' => 0,
    'resize_heigth_2' => 0,
    'resize_heigth_3' => 0,
    'resize_heigth_4' => 0,
    'resize_heigth_5' => 0,
    'resize_heigth_6' => 0,
    'resize_right_prefix_1' => 0,
    'resize_right_prefix_2' => 0,
    'resize_right_prefix_3' => 0,
    'resize_right_prefix_4' => 0,
    'resize_right_prefix_5' => 0,
    'resize_right_prefix_6' => 0,
    'resize_scallign_1' => 0,
    'resize_scallign_2' => 0,
    'resize_scallign_3' => 0,
    'resize_scallign_4' => 0,
    'resize_scallign_5' => 0,
    'resize_scallign_6' => 0,
    'resize_is_convas_1' => 0,
    'resize_is_convas_2' => 0,
    'resize_is_convas_3' => 0,
    'resize_is_convas_4' => 0,
    'resize_is_convas_5' => 0,
    'resize_is_convas_6' => 0,
    'resize_type' => 0,
    'upload_dir_type' => 0,
    'water_file_1' => 0,
    'water_file_2' => 0,
    'water_file_3' => 0,
    'water_file_4' => 0,
    'water_file_5' => 0,
    'water_file_6' => 0,
    'pos_top_1' => 0,
    'pos_top_2' => 0,
    'pos_top_3' => 0,
    'pos_top_4' => 0,
    'pos_top_5' => 0,
    'pos_top_6' => 0,
    'pos_bottom_1' => 0,
    'pos_bottom_2' => 0,
    'pos_bottom_3' => 0,
    'pos_bottom_4' => 0,
    'pos_bottom_5' => 0,
    'pos_bottom_6' => 0,
    'pos_left_1' => 0,
    'pos_left_2' => 0,
    'pos_left_3' => 0,
    'pos_left_4' => 0,
    'pos_left_5' => 0,
    'pos_left_6' => 0,
    'pos_right_1' => 0,
    'pos_right_2' => 0,
    'pos_right_3' => 0,
    'pos_right_4' => 0,
    'pos_right_5' => 0,
    'pos_right_6' => 0,
    'action_id' => 0,
    'act_width' => 0,
    'act_height' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39bf92da5fc6_12287689',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39bf92da5fc6_12287689')) {
function content_5b39bf92da5fc6_12287689 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8683843735b39bf92c96e32_38159113';
?>

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
    action: '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
uploader/upload/?type=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['type']->value)===null||$tmp==='' ? 0 : $tmp);
if ($_smarty_tpl->tpl_vars['category_id']->value) {?>&category_id=<?php echo $_smarty_tpl->tpl_vars['category_id']->value;
}
if ($_smarty_tpl->tpl_vars['page_id']->value) {?>&page_id=<?php echo $_smarty_tpl->tpl_vars['page_id']->value;
}
if ($_smarty_tpl->tpl_vars['width']->value) {?>&width=<?php echo $_smarty_tpl->tpl_vars['width']->value;
}
if ($_smarty_tpl->tpl_vars['height']->value) {?>&height=<?php echo $_smarty_tpl->tpl_vars['height']->value;
}
if ($_smarty_tpl->tpl_vars['formats']->value) {?>&formats=<?php echo $_smarty_tpl->tpl_vars['formats']->value;
}?>&resize_width=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_width_1']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_width_2']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_width_3']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_width_4']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_width_5']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_width_6']->value)===null||$tmp==='' ? 0 : $tmp);?>
&resize_heigth=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_heigth_1']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_heigth_2']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_heigth_3']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_heigth_4']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_heigth_5']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_heigth_6']->value)===null||$tmp==='' ? 0 : $tmp);?>
&resize_right_prefix=<?php echo $_smarty_tpl->tpl_vars['resize_right_prefix_1']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['resize_right_prefix_2']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['resize_right_prefix_3']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['resize_right_prefix_4']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['resize_right_prefix_5']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['resize_right_prefix_6']->value;?>
&resize_scallign=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_scallign_1']->value)===null||$tmp==='' ? 1 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_scallign_2']->value)===null||$tmp==='' ? 1 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_scallign_3']->value)===null||$tmp==='' ? 1 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_scallign_4']->value)===null||$tmp==='' ? 1 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_scallign_5']->value)===null||$tmp==='' ? 1 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_scallign_6']->value)===null||$tmp==='' ? 1 : $tmp);?>
&resize_is_convas=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_is_convas_1']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_is_convas_2']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_is_convas_3']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_is_convas_4']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_is_convas_5']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_is_convas_6']->value)===null||$tmp==='' ? 0 : $tmp);?>
&resize_type=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resize_type']->value)===null||$tmp==='' ? 0 : $tmp);
if ($_smarty_tpl->tpl_vars['upload_dir_type']->value) {?>&upload_dir_type=<?php echo $_smarty_tpl->tpl_vars['upload_dir_type']->value;
}?>&water_file=<?php echo $_smarty_tpl->tpl_vars['water_file_1']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['water_file_2']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['water_file_3']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['water_file_4']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['water_file_5']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['water_file_6']->value;?>
&pos_top=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_top_1']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_top_2']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_top_3']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_top_4']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_top_5']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_top_6']->value)===null||$tmp==='' ? 0 : $tmp);?>
&pos_bottom=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_bottom_1']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_bottom_2']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_bottom_3']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_bottom_4']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_bottom_5']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_bottom_6']->value)===null||$tmp==='' ? 0 : $tmp);?>
&pos_left=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_left_1']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_left_2']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_left_3']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_left_4']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_left_5']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_left_6']->value)===null||$tmp==='' ? 0 : $tmp);?>
&pos_right=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_right_1']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_right_2']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_right_3']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_right_4']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_right_5']->value)===null||$tmp==='' ? 0 : $tmp);?>
|<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pos_right_6']->value)===null||$tmp==='' ? 0 : $tmp);?>
',
    debug: true,
    name: 'uploader_images_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
', 
    onComplete: function(id, fileName, responseJSON){

    AjaxRequest('uploader_images_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
uploader/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['type']->value)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['category_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
/0/0/<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
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
//window.onload = createUploader_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
;     
<?php if ($_smarty_tpl->tpl_vars['action_id']->value) {?> 
$(document).ready(function() {
$(".fancy_up_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
").fancybox({
type            : 'iframe',
width		: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['act_width']->value)===null||$tmp==='' ? '400' : $tmp);?>
,
height		: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['act_height']->value)===null||$tmp==='' ? '200' : $tmp);?>
,
frameWidth	: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['act_width']->value)===null||$tmp==='' ? '400' : $tmp);?>
,
frameHeight	: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['act_height']->value)===null||$tmp==='' ? '200' : $tmp);?>
,
fitToView	: false,
closeClick	: false,
openEffect	: 'none',
closeEffect	: 'none',
            autoSize: false
});
});
    <?php echo '</script'; ?>
>
<?php }?>
<div id="uploader_images_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
    <?php echo $_smarty_tpl->getSubTemplate ('getFiles.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</div><?php }
}
?>