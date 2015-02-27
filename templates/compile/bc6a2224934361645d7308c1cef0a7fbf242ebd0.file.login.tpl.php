<?php /* Smarty version Smarty-3.1.11, created on 2015-02-27 10:58:10
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38354c35240e4b734-06190942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc6a2224934361645d7308c1cef0a7fbf242ebd0' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\login.tpl',
      1 => 1421778496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38354c35240e4b734-06190942',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54c35240e62e33_33382923',
  'variables' => 
  array (
    'SITE_PATH' => 0,
    'ns' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c35240e62e33_33382923')) {function content_54c35240e62e33_33382923($_smarty_tpl) {?><form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/admin/do_login">
    <div class="login-wrapper">
        <div class="form-group">
            <label class="input_label">Username:</label>
            <input class="text"  type="text" name="username"/>
        </div>
        <div class="form-group">
            <label class="input_label">Password:</label>
            <input class="text" type="password" name="password"/>  
        </div>
        <?php if (isset($_smarty_tpl->tpl_vars['ns']->value['error_message'])){?>
            <div class="error" >
                <?php echo $_smarty_tpl->tpl_vars['ns']->value['error_message'];?>

            </div>
        <?php }?>  
        <div class="login_btn">
            <input class="button grey" type="submit" value="Login" />    
        </div>
    </div>
</form><?php }} ?>