<?php /* Smarty version Smarty-3.1.11, created on 2014-11-20 11:32:10
         compiled from "D:\xampp\htdocs\shiptoarmenia\templates\admin\util\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18649546dd13a57b390-43179623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd26197131805ce7dba0b69989a34183d780997b8' => 
    array (
      0 => 'D:\\xampp\\htdocs\\shiptoarmenia\\templates\\admin\\util\\header.tpl',
      1 => 1413013549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18649546dd13a57b390-43179623',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ns' => 0,
    'SITE_PATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_546dd13a588741_68949466',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546dd13a588741_68949466')) {function content_546dd13a588741_68949466($_smarty_tpl) {?>Admin Header</br>
<?php if ($_smarty_tpl->tpl_vars['ns']->value['userLevel']===$_smarty_tpl->tpl_vars['ns']->value['userGroupsAdmin']){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/admin/do_logout">Logout</a>
<?php }?>
<?php }} ?>