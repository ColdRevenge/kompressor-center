<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-03 20:57:39
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179277389155dde63a565162-54034298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98c7b434617a81cb2282b4534a2145fe1024379c' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/index.tpl',
      1 => 1441303051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179277389155dde63a565162-54034298',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55dde63a62c713_92647909',
  'variables' => 
  array (
    'content' => 0,
    'is_main' => 0,
    'is_read_topic' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dde63a62c713_92647909')) {function content_55dde63a62c713_92647909($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['content']->value) {?>
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php } elseif ($_smarty_tpl->tpl_vars['is_main']->value==1) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("forum_main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } elseif ($_smarty_tpl->tpl_vars['is_read_topic']->value==1) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("forum_topic_read.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ("forum_topic.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php }} ?>
