<?php
/* Smarty version 4.3.4, created on 2023-12-04 05:01:54
  from 'C:\xampp\htdocs\roster\custom\templates\Cobalt\members\members.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_656da392e5b1c6_77876464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0521ac8852d0e437c6b11cdd87b63da7a915289' => 
    array (
      0 => 'C:\\xampp\\htdocs\\roster\\custom\\templates\\Cobalt\\members\\members.tpl',
      1 => 1679755966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_656da392e5b1c6_77876464 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <div class="row">

        <?php if (count($_smarty_tpl->tpl_vars['WIDGETS_LEFT']->value)) {?>
            <div class="col-lg-3">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WIDGETS_LEFT']->value, 'widget');
$_smarty_tpl->tpl_vars['widget']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['widget']->value) {
$_smarty_tpl->tpl_vars['widget']->do_else = false;
?>
                    <?php echo $_smarty_tpl->tpl_vars['widget']->value;?>

                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        <?php }?>

        <div class="<?php if (count($_smarty_tpl->tpl_vars['WIDGETS_LEFT']->value) && count($_smarty_tpl->tpl_vars['WIDGETS_RIGHT']->value)) {?>col-lg-6<?php } elseif (count($_smarty_tpl->tpl_vars['WIDGETS_LEFT']->value) || count($_smarty_tpl->tpl_vars['WIDGETS_RIGHT']->value)) {?>col-lg-9<?php } else { ?>col-lg-12<?php }?>">
            <div class="card">
                <div class="card-header header-theme"><?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</div>
                <div class="card-body">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['ALL_LINK']->value;?>
" class="btn btn-theme mb-3"><?php echo $_smarty_tpl->tpl_vars['DISPLAY_ALL']->value;?>
</a>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['GROUPS']->value, 'groups');
$_smarty_tpl->tpl_vars['groups']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['groups']->value) {
$_smarty_tpl->tpl_vars['groups']->do_else = false;
?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['groups']->value['link'];?>
" class="btn btn-theme mb-3"><?php echo $_smarty_tpl->tpl_vars['groups']->value['name'];?>
</a>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <div class="table-responsive">
                        <table class="table table-striped dataTables-users">
                            <thead>
                                <tr>
                                    <th><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['GROUP']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['CREATED']->value;?>
</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MEMBERS']->value, 'member');
$_smarty_tpl->tpl_vars['member']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['member']->value) {
$_smarty_tpl->tpl_vars['member']->do_else = false;
?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['member']->value['avatar'];?>
" class="avatar-img mr-1" style="height:30px; width:30px;" alt="<?php echo $_smarty_tpl->tpl_vars['member']->value['nickname'];?>
" />
                                            <a class="username" style="<?php echo $_smarty_tpl->tpl_vars['member']->value['style'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['member']->value['profile'];?>
"><?php echo $_smarty_tpl->tpl_vars['member']->value['nickname'];?>
</a>
                                        </td>
                                        <td><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['member']->value['groups'], 'group');
$_smarty_tpl->tpl_vars['group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->do_else = false;
?><span class="d-inline-block mr-2"><?php echo $_smarty_tpl->tpl_vars['group']->value;?>
</span><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['member']->value['joined'];?>
</td>
                                    </tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php if (count($_smarty_tpl->tpl_vars['WIDGETS_RIGHT']->value)) {?>
            <div class="col-lg-3">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WIDGETS_RIGHT']->value, 'widget');
$_smarty_tpl->tpl_vars['widget']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['widget']->value) {
$_smarty_tpl->tpl_vars['widget']->do_else = false;
?>
                    <?php echo $_smarty_tpl->tpl_vars['widget']->value;?>

                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        <?php }?>

    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
