<?php /* Smarty version Smarty-3.1.11, created on 2015-01-18 17:28:20
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\util\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:341554acfec5889312-16641448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24cbbf4fe582be91ca00b9bb9b97dcaab5e76e87' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\util\\header.tpl',
      1 => 1421587515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '341554acfec5889312-16641448',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54acfec58946c5_42468686',
  'variables' => 
  array (
    'SITE_PATH' => 0,
    'ns' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54acfec58946c5_42468686')) {function content_54acfec58946c5_42468686($_smarty_tpl) {?><a class="main_logo" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
">Copter Server</a>
<?php if ($_smarty_tpl->tpl_vars['ns']->value['userLevel']===$_smarty_tpl->tpl_vars['ns']->value['userGroupsAdmin']){?>
    <a class="logout button blue" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/admin/do_logout">Logout</a>
<?php }?>
<div class="clear"></div>

<?php }} ?>