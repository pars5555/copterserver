<?php /* Smarty version Smarty-3.1.11, created on 2014-10-11 07:53:23
         compiled from "D:\xampp\htdocs\clinics\templates\dentist\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168265438e1f35ea341-62927962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df649ac8187e9a3cd655234b9d23cfc44b3ee7b6' => 
    array (
      0 => 'D:\\xampp\\htdocs\\clinics\\templates\\dentist\\login.tpl',
      1 => 1413012960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168265438e1f35ea341-62927962',
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
  'unifunc' => 'content_5438e1f361c476_19536410',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5438e1f361c476_19536410')) {function content_5438e1f361c476_19536410($_smarty_tpl) {?><form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/dentist/do_login">
    <span>Username:</span><input  type="text" name="username"/>
    <span>Password:</span><input type="password" name="password"/>  
    <?php if (isset($_smarty_tpl->tpl_vars['ns']->value['error_message'])){?>
        <div class="error" >
            <?php echo $_smarty_tpl->tpl_vars['ns']->value['error_message'];?>

        </div>
    <?php }?>  
    <input class="white-button" type="submit" />    
</form><?php }} ?>