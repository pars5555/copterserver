<?php /* Smarty version Smarty-3.1.11, created on 2015-01-07 09:39:17
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2464454acfec58ad7b0-91470088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc6a2224934361645d7308c1cef0a7fbf242ebd0' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\login.tpl',
      1 => 1413013567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2464454acfec58ad7b0-91470088',
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
  'unifunc' => 'content_54acfec58b66e5_04702741',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54acfec58b66e5_04702741')) {function content_54acfec58b66e5_04702741($_smarty_tpl) {?><form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/admin/do_login">
    <span>Username:</span><input  type="text" name="username"/>
    <span>Password:</span><input type="password" name="password"/>  
    <?php if (isset($_smarty_tpl->tpl_vars['ns']->value['error_message'])){?>
        <div class="error" >
            <?php echo $_smarty_tpl->tpl_vars['ns']->value['error_message'];?>

        </div>
    <?php }?>  
    <input class="white-button" type="submit" />    
</form><?php }} ?>