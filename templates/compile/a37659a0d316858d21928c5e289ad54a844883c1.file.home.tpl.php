<?php /* Smarty version Smarty-3.1.11, created on 2015-02-26 21:21:51
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:305654ad011f484017-28342004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a37659a0d316858d21928c5e289ad54a844883c1' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\home.tpl',
      1 => 1421587806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '305654ad011f484017-28342004',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54ad011f4aacb2_57186417',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ad011f4aacb2_57186417')) {function content_54ad011f4aacb2_57186417($_smarty_tpl) {?><h2 class="main_title">Welcome To Admin Panel</h2>

<div class="main_content">
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/admin/left_panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
    <div class="right-content">

    </div>
</div>
<?php }} ?>