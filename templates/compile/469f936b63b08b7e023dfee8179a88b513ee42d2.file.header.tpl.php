<?php /* Smarty version Smarty-3.1.11, created on 2014-10-11 07:33:18
         compiled from "D:\xampp\htdocs\clinics\templates\dentist\util\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:229365438cd00005ae8-12393069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '469f936b63b08b7e023dfee8179a88b513ee42d2' => 
    array (
      0 => 'D:\\xampp\\htdocs\\clinics\\templates\\dentist\\util\\header.tpl',
      1 => 1413012796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '229365438cd00005ae8-12393069',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5438cd0000b507_20989754',
  'variables' => 
  array (
    'ns' => 0,
    'SITE_PATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5438cd0000b507_20989754')) {function content_5438cd0000b507_20989754($_smarty_tpl) {?>Dentist Header</br>
<?php if ($_smarty_tpl->tpl_vars['ns']->value['userLevel']===$_smarty_tpl->tpl_vars['ns']->value['userGroupsDentist']){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/dentist/do_logout">Logout</a>
<?php }?>
<?php }} ?>