<?php /* Smarty version Smarty-3.1.11, created on 2015-01-07 09:39:14
         compiled from "D:\xampp\htdocs\copterserver\templates\user\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21254acfec25137d5-32235843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c790b360eacd9dd6cb8b0ce8d3f7378c72a714a3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\user\\login.tpl',
      1 => 1416482409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21254acfec25137d5-32235843',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_PATH' => 0,
    'ns' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54acfec254b158_77676226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54acfec254b158_77676226')) {function content_54acfec254b158_77676226($_smarty_tpl) {?><form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/user/do_login">
    <span>Username:</span><input  type="text" name="username"/>
    <span>Password:</span><input type="password" name="password"/>  
    <?php if (isset($_smarty_tpl->tpl_vars['ns']->value['error_message'])){?>
        <div class="error" >
            <?php echo $_smarty_tpl->tpl_vars['ns']->value['error_message'];?>

        </div>
    <?php }?>  
    <input  type="submit" />    
</form><?php }} ?>