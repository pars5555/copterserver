<?php /* Smarty version Smarty-3.1.11, created on 2014-10-11 07:47:00
         compiled from "D:\xampp\htdocs\clinics\templates\admin\util\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8665438e0746d8bf2-58258190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba01d8e1ecfc565efc0f1b5aa9638a4ad93218b1' => 
    array (
      0 => 'D:\\xampp\\htdocs\\clinics\\templates\\admin\\util\\header.tpl',
      1 => 1413013549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8665438e0746d8bf2-58258190',
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
  'unifunc' => 'content_5438e0746e5073_51212849',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5438e0746e5073_51212849')) {function content_5438e0746e5073_51212849($_smarty_tpl) {?>Admin Header</br>
<?php if ($_smarty_tpl->tpl_vars['ns']->value['userLevel']===$_smarty_tpl->tpl_vars['ns']->value['userGroupsAdmin']){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/admin/do_logout">Logout</a>
<?php }?>
<?php }} ?>