<?php
/* Smarty version 4.3.4, created on 2023-12-04 05:01:55
  from 'C:\xampp\htdocs\roster\custom\templates\Cobalt\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_656da3930a4862_87941594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d26a67e1bc8695fded30ed4b2120e3cd168678a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\roster\\custom\\templates\\Cobalt\\header.tpl',
      1 => 1679755966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header-top.tpl' => 1,
  ),
),false)) {
function content_656da3930a4862_87941594 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header-top.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </head>
	<body>
    <?php if (((isset($_smarty_tpl->tpl_vars['THEME_LOADING_ANIMATION']->value)) && preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['THEME_LOADING_ANIMATION']->value, $tmp) > 2)) {?>
        <div class="load-wrapper"><div class="loader"><div class="loader-inner line-scale"><div></div><div></div><div></div><div></div><div></div></div></div></div>
    <?php }
}
}
