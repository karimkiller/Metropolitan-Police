<?php
/* Smarty version 4.3.4, created on 2023-12-04 05:03:57
  from 'C:\xampp\htdocs\roster\custom\templates\Cobalt\widgets\statistics.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_656da40d408a04_12989658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '081ac8a5215cf2a4c34d655a16a19400fd48864c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\roster\\custom\\templates\\Cobalt\\widgets\\statistics.tpl',
      1 => 1679755976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656da40d408a04_12989658 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card widget-card stats-card">
    <div class="card-header header-theme widget-header"><?php echo $_smarty_tpl->tpl_vars['STATISTICS']->value;?>
</div>
    <div class="card-body">
      <?php if ((isset($_smarty_tpl->tpl_vars['FORUM_STATISTICS']->value))) {?>
        <?php echo $_smarty_tpl->tpl_vars['TOTAL_THREADS']->value;?>
<b class="float-right"><?php echo $_smarty_tpl->tpl_vars['TOTAL_THREADS_VALUE']->value;?>
</b><br />
        <?php echo $_smarty_tpl->tpl_vars['TOTAL_POSTS']->value;?>
<b class="float-right"><?php echo $_smarty_tpl->tpl_vars['TOTAL_POSTS_VALUE']->value;?>
</b><br />
      <?php }?>
      <?php echo $_smarty_tpl->tpl_vars['USERS_REGISTERED']->value;?>
<b class="float-right"><?php echo $_smarty_tpl->tpl_vars['USERS_REGISTERED_VALUE']->value;?>
</b><br />
      <?php if ($_smarty_tpl->tpl_vars['USERS_ONLINE']->value) {
echo $_smarty_tpl->tpl_vars['USERS_ONLINE']->value;?>
<b class="float-right"><?php echo $_smarty_tpl->tpl_vars['USERS_ONLINE_VALUE']->value;?>
</b><br /><?php }?>
      <?php if ($_smarty_tpl->tpl_vars['GUESTS_ONLINE']->value) {
echo $_smarty_tpl->tpl_vars['GUESTS_ONLINE']->value;?>
<b class="float-right"><?php echo $_smarty_tpl->tpl_vars['GUESTS_ONLINE_VALUE']->value;?>
</b><br /><?php }?>
      <?php if ($_smarty_tpl->tpl_vars['TOTAL_ONLINE']->value) {
echo $_smarty_tpl->tpl_vars['TOTAL_ONLINE']->value;?>
<b class="float-right"><?php echo $_smarty_tpl->tpl_vars['TOTAL_ONLINE_VALUE']->value;?>
</b><br /><?php }?>
      <?php echo $_smarty_tpl->tpl_vars['LATEST_MEMBER']->value;?>
<br /><a class="white-link" style="<?php echo $_smarty_tpl->tpl_vars['LAST_MEMBER_VALUE']->value['style'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['LATEST_MEMBER_VALUE']->value['profile'];?>
" data-poload="<?php echo $_smarty_tpl->tpl_vars['USER_INFO_URL']->value;
echo $_smarty_tpl->tpl_vars['LATEST_MEMBER_VALUE']->value['id'];?>
" data-html="true" data-placement="top"><b><?php echo $_smarty_tpl->tpl_vars['LATEST_MEMBER_VALUE']->value['nickname'];?>
</b></a>
    </div>
</div><?php }
}
