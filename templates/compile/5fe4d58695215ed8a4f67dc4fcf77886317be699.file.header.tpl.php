<?php /* Smarty version Smarty-3.1.11, created on 2015-01-18 21:30:47
         compiled from "D:\xampp\htdocs\copterserver\templates\main\util\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132854acfebe5d6162-75729637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fe4d58695215ed8a4f67dc4fcf77886317be699' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\main\\util\\header.tpl',
      1 => 1421587393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132854acfebe5d6162-75729637',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54acfebe5e1671_49436352',
  'variables' => 
  array (
    'ns' => 0,
    'SITE_PATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54acfebe5e1671_49436352')) {function content_54acfebe5e1671_49436352($_smarty_tpl) {?>main header
<?php if ($_smarty_tpl->tpl_vars['ns']->value['userLevel']===$_smarty_tpl->tpl_vars['ns']->value['userGroupsUser']){?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/user/do_logout">logout</a>    
<?php }?>
</br><?php }} ?>