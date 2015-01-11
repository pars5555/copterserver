<?php /* Smarty version Smarty-3.1.11, created on 2014-11-20 11:32:10
         compiled from "D:\xampp\htdocs\shiptoarmenia\templates\admin\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21150546dd13a5c4e68-41743254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5395183129f85e2c9d9751ec27856d6c0a0d272' => 
    array (
      0 => 'D:\\xampp\\htdocs\\shiptoarmenia\\templates\\admin\\login.tpl',
      1 => 1413013567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21150546dd13a5c4e68-41743254',
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
  'unifunc' => 'content_546dd13a5cdf80_13567429',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546dd13a5cdf80_13567429')) {function content_546dd13a5cdf80_13567429($_smarty_tpl) {?><form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
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