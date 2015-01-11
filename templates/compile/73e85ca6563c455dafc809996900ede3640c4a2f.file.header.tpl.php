<?php /* Smarty version Smarty-3.1.11, created on 2014-11-20 11:24:25
         compiled from "D:\xampp\htdocs\shiptoarmenia\templates\user\util\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32756546dcf3b4bc4e3-14739134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73e85ca6563c455dafc809996900ede3640c4a2f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\shiptoarmenia\\templates\\user\\util\\header.tpl',
      1 => 1416482664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32756546dcf3b4bc4e3-14739134',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_546dcf3b4d5600_01893204',
  'variables' => 
  array (
    'ns' => 0,
    'SITE_PATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546dcf3b4d5600_01893204')) {function content_546dcf3b4d5600_01893204($_smarty_tpl) {?>User Header</br>
<?php if ($_smarty_tpl->tpl_vars['ns']->value['userLevel']===$_smarty_tpl->tpl_vars['ns']->value['userGroupsUser']){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/user/do_logout">Logout</a>
<?php }?>
<?php }} ?>