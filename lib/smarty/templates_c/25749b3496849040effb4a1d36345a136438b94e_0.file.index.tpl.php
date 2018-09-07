<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:32
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:28526757155f573e8c5db23_92582737%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25749b3496849040effb4a1d36345a136438b94e' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/index.tpl',
      1 => 1441303051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28526757155f573e8c5db23_92582737',
  'variables' => 
  array (
    'content' => 0,
    'is_main' => 0,
    'is_read_topic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f573e8c9a629_61200679',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573e8c9a629_61200679')) {
function content_55f573e8c9a629_61200679 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '28526757155f573e8c5db23_92582737';
if ($_smarty_tpl->tpl_vars['content']->value) {?>
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php } elseif ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("forum_main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } elseif ($_smarty_tpl->tpl_vars['is_read_topic']->value == 1) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("forum_topic_read.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ("forum_topic.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }?>

<?php }
}
?>