<?php
/* Smarty version 4.3.4, created on 2023-12-04 05:03:57
  from 'C:\xampp\htdocs\roster\custom\templates\Cobalt\widgets\online_users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_656da40d2ea679_55133753',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1a549740c3a01dca2345c7567fcb1ea8f9e014b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\roster\\custom\\templates\\Cobalt\\widgets\\online_users.tpl',
      1 => 1679755976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656da40d2ea679_55133753 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\roster\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.regex_replace.php','function'=>'smarty_modifier_regex_replace',),));
?>
<div class="card widget-card">
    <div class="card-header header-theme widget-header"><div class="widget-header-txt"><?php echo $_smarty_tpl->tpl_vars['ONLINE_USERS']->value;?>
</div><div class="number"><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['TOTAL_ONLINE_USERS']->value,'/[^0-9]+/','');?>
</div></div>
    <div class="card-body">
        <?php if ((isset($_smarty_tpl->tpl_vars['ONLINE_USERS_LIST']->value))) {?> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ONLINE_USERS_LIST']->value, 'user', false, NULL, 'online_users_arr', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_online_users_arr']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_online_users_arr']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_online_users_arr']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_online_users_arr']->value['total'];
?>
        <a class="grey-link" href="<?php echo $_smarty_tpl->tpl_vars['user']->value['profile'];?>
" data-poload="<?php echo $_smarty_tpl->tpl_vars['USER_INFO_URL']->value;
echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" data-html="true" data-placement="top"><?php if ($_smarty_tpl->tpl_vars['SHOW_NICKNAME_INSTEAD']->value) {
echo $_smarty_tpl->tpl_vars['user']->value['nickname'];
} else {
echo $_smarty_tpl->tpl_vars['user']->value['username'];
}?></a>
        <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_online_users_arr']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_online_users_arr']->value['last'] : null)) {?>,<?php }?> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
        <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['NO_USERS_ONLINE']->value;?>
 <?php }?>
    </div>
</div><?php }
}
