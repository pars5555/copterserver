<?php /* Smarty version Smarty-3.1.11, created on 2014-06-04 08:41:23
         compiled from "D:\xampp\htdocs\dentx\templates\dentist\util\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10047538edbb354a164-18517421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ec598c2a7298eb375f54a355007bab8cc1e05ef' => 
    array (
      0 => 'D:\\xampp\\htdocs\\dentx\\templates\\dentist\\util\\header.tpl',
      1 => 1401869791,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10047538edbb354a164-18517421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_PATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_538edbb3550a77_68891893',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538edbb3550a77_68891893')) {function content_538edbb3550a77_68891893($_smarty_tpl) {?><div class="dentist-panel-header">
    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dentist">
        <div class="logo-wrapper">
            Dentist Panel
        </div>
    </a>
    <ul class="header-nav">
        <li class="nav-item f_showMenu">
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/dentist/do_logout"> <span class="glyph logout"></span> </a>
        </li>
    </ul>
</div><?php }} ?>