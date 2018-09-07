<?php /* Smarty version 3.1.24, created on 2016-02-16 19:00:30
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/rating/templates/rating.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:55666899556c3479e520337_63228066%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e521e95e4b77bcec7982e8936b2d77807f523b2' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/rating/templates/rating.tpl',
      1 => 1450788678,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55666899556c3479e520337_63228066',
  'variables' => 
  array (
    'isVoice' => 0,
    'voice_id' => 0,
    'voices' => 0,
    'fronted_images_url' => 0,
    'voice_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56c3479e621072_73847660',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c3479e621072_73847660')) {
function content_56c3479e621072_73847660 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '55666899556c3479e520337_63228066';
if ($_smarty_tpl->tpl_vars['isVoice']->value == 0) {?> 
    <div id="rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
" class="rating">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop'] = is_array($_loop=5) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['name'] = "rating";
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total']);
?>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop'] = is_array($_loop=5) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['name'] = "rating";
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total']);
?>
                <?php if ($_smarty_tpl->tpl_vars['voices']->value->rating < $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'] && ceil($_smarty_tpl->tpl_vars['voices']->value->rating) == $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration']) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
rating.png" alt="" id="id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
" onclick="rating('rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
', <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
, <?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['voice_type']->value;?>
, 'id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_')" onmouseover="rating_s(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
, 'id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_', 1)" onmouseout="rating_s(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
, 'id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_', 0)" />
                <?php } elseif ($_smarty_tpl->tpl_vars['voices']->value->rating >= $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration']) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
rating_full.png" alt="" id="id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
" onclick="rating('rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
', <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
, <?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['voice_type']->value;?>
, 'id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_')" onmouseover="rating_s(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
, 'id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_', 1)" onmouseout="rating_s(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
, 'id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_', 0)" />
                <?php } else { ?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
rating_noactive.png" alt="" id="id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
" onclick="rating('rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
', <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
, <?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['voice_type']->value;?>
, 'id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_')" onmouseover="rating_s(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
, 'id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_', 1)" onmouseout="rating_s(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'];?>
, 'id_rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
_', 0)" />
                <?php }?>
            <?php endfor; endif; ?><span>(<?php echo $_smarty_tpl->tpl_vars['voices']->value->count;?>
 голосов)</span>
        <?php endfor; endif; ?>
    </div>
<?php } else { ?>
    <div id="rating_<?php echo $_smarty_tpl->tpl_vars['voice_id']->value;?>
" class="rating">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop'] = is_array($_loop=5) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['name'] = "rating";
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["rating"]['total']);
?>
            <?php if ($_smarty_tpl->tpl_vars['voices']->value->rating < $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration'] && ceil($_smarty_tpl->tpl_vars['voices']->value->rating) == $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration']) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
rating.png" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['voices']->value->rating >= $_smarty_tpl->getVariable('smarty')->value['section']['rating']['iteration']) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
rating_full.png" alt="" /><?php } else { ?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
rating_noactive.png" alt="" /><?php }?> 
<?php endfor; endif; ?><span>(<?php echo $_smarty_tpl->tpl_vars['voices']->value->count;?>
 голосов)</span>
    </div>
<?php }
}
}
?>