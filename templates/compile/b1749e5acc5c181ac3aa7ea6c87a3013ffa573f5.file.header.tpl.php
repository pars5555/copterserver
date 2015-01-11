<?php /* Smarty version Smarty-3.1.11, created on 2014-07-02 08:10:00
         compiled from "D:\xampp\htdocs\dentx\templates\admin\util\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:520553b3be58b409a4-74207954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1749e5acc5c181ac3aa7ea6c87a3013ffa573f5' => 
    array (
      0 => 'D:\\xampp\\htdocs\\dentx\\templates\\admin\\util\\header.tpl',
      1 => 1401869933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '520553b3be58b409a4-74207954',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_PATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53b3be58b46b14_45494137',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b3be58b46b14_45494137')) {function content_53b3be58b46b14_45494137($_smarty_tpl) {?><div class="admin-panel-header">
    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/admin">
        <div class="logo-wrapper">
            Admin Panel
        </div>
    </a>
    <ul class="header-nav">
        <li class="nav-item f_showMenu">
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/admin/do_logout"> <span class="glyph logout"></span> </a>
        </li>
    </ul>
</div><?php }} ?>