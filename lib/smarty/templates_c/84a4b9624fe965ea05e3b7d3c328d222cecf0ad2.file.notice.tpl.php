<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-05 17:55:26
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/notice.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174984157555e9ac2dec6616-83375945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84a4b9624fe965ea05e3b7d3c328d222cecf0ad2' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/notice.tpl',
      1 => 1441464925,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174984157555e9ac2dec6616-83375945',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e9ac2df075b5_79443302',
  'variables' => 
  array (
    'is_ajax' => 0,
    'action_notice' => 0,
    'url' => 0,
    'param_tpl' => 0,
    'topic_name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e9ac2df075b5_79443302')) {function content_55e9ac2df075b5_79443302($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_ajax']->value==1) {?>
    <?php if ($_smarty_tpl->tpl_vars['action_notice']->value!=2) {?>
        <a href="javascript:void(0)" onclick="AjaxRequestAsync('is_notice', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
forum/notice/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['topic_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['user_id'];?>
/1/')">Подписаться на тему</a>
    <?php } else { ?>
        <a href="javascript:void(0)" onclick="AjaxRequestAsync('is_notice', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
forum/notice/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['topic_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['user_id'];?>
/0/')">Отписаться от темы</a>
    <?php }?>
<?php } else { ?>
    <h1>Уведомления в теме "<?php echo $_smarty_tpl->tpl_vars['topic_name']->value;?>
"</h1>
    <br/><br/> <br/><br/> <br/><br/>
    <?php if ($_smarty_tpl->tpl_vars['action_notice']->value!=2) {?>
        <h3 style="text-align: center">Вы успешно отписаны от темы "<?php echo $_smarty_tpl->tpl_vars['topic_name']->value;?>
"</h3>
    <?php } else { ?>
        <h3 style="text-align: center">Вы успешно подписаны от темы "<?php echo $_smarty_tpl->tpl_vars['topic_name']->value;?>
"</h3>
    <?php }?>
     <br/><br/> <br/><br/>
<?php }?><?php }} ?>
