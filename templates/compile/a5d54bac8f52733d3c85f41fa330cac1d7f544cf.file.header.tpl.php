<?php /* Smarty version Smarty-3.1.11, created on 2014-10-11 07:38:08
         compiled from "D:\xampp\htdocs\clinics\templates\clinic\util\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33695438de60d9bab7-78978907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5d54bac8f52733d3c85f41fa330cac1d7f544cf' => 
    array (
      0 => 'D:\\xampp\\htdocs\\clinics\\templates\\clinic\\util\\header.tpl',
      1 => 1413012909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33695438de60d9bab7-78978907',
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
  'unifunc' => 'content_5438de60daa5f1_01859043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5438de60daa5f1_01859043')) {function content_5438de60daa5f1_01859043($_smarty_tpl) {?>Clinic Header</br>
<?php if ($_smarty_tpl->tpl_vars['ns']->value['userLevel']===$_smarty_tpl->tpl_vars['ns']->value['userGroupsClinic']){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/clinic/do_logout">Logout</a>
<?php }?>
<?php }} ?>