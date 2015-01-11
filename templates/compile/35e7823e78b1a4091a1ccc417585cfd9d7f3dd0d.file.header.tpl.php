<?php /* Smarty version Smarty-3.1.11, created on 2014-11-20 11:31:31
         compiled from "D:\xampp\htdocs\shiptoarmenia\templates\main\util\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5610546dce36bd2246-48279094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35e7823e78b1a4091a1ccc417585cfd9d7f3dd0d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\shiptoarmenia\\templates\\main\\util\\header.tpl',
      1 => 1416483090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5610546dce36bd2246-48279094',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_546dce36bd3ea9_74312237',
  'variables' => 
  array (
    'ns' => 0,
    'SITE_PATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546dce36bd3ea9_74312237')) {function content_546dce36bd3ea9_74312237($_smarty_tpl) {?>main header
<?php if ($_smarty_tpl->tpl_vars['ns']->value['userLevel']===$_smarty_tpl->tpl_vars['ns']->value['userGroupsUser']){?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/user/do_logout">logout</a>    
<?php }?>
</br><?php }} ?>