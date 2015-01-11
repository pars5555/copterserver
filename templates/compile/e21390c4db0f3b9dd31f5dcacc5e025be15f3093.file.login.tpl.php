<?php /* Smarty version Smarty-3.1.11, created on 2014-11-20 11:23:39
         compiled from "D:\xampp\htdocs\shiptoarmenia\templates\user\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:797546dcf3b515fb2-96484586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e21390c4db0f3b9dd31f5dcacc5e025be15f3093' => 
    array (
      0 => 'D:\\xampp\\htdocs\\shiptoarmenia\\templates\\user\\login.tpl',
      1 => 1416482409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '797546dcf3b515fb2-96484586',
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
  'unifunc' => 'content_546dcf3b51fb12_14632262',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546dcf3b51fb12_14632262')) {function content_546dcf3b51fb12_14632262($_smarty_tpl) {?><form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
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