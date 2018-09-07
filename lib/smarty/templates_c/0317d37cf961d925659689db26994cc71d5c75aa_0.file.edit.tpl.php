<?php /* Smarty version 3.1.24, created on 2018-07-02 10:06:50
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/banners/templates/edit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16136976835b39cf0a8a3682_51102968%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0317d37cf961d925659689db26994cc71d5c75aa' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/banners/templates/edit.tpl',
      1 => 1530509434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16136976835b39cf0a8a3682_51102968',
  'variables' => 
  array (
    'is_save_banner' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39cf0a9129f9_90329824',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39cf0a9129f9_90329824')) {
function content_5b39cf0a9129f9_90329824 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16136976835b39cf0a8a3682_51102968';
if ($_smarty_tpl->tpl_vars['is_save_banner']->value == 1) {?>
    <?php echo '<script'; ?>
 type="text/javascript">
        parent.$.fancybox.close();
    <?php echo '</script'; ?>
>
<?php }?>
<div class="page">
    <form method="post" action="">
        <h2>Добавить ссылку на баннер</h2>
        <div>Название: </div>
        <input type="text" value="<?php echo $_POST['short_desc'];?>
" name="short_desc" style="width: 300px;" maxlength="255" />
        <div>Ссылка: </div>
        <input type="text" value="<?php echo $_POST['link'];?>
" name="link" style="width: 300px;" maxlength="255" />
        <button style="margin-left: 220px;width: 90px">Сохранить</button>
    </form>
</div><?php }
}
?>