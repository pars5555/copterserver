<?php /* Smarty version Smarty-3.1.11, created on 2014-10-11 07:47:00
         compiled from "D:\xampp\htdocs\clinics\templates\admin\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:319875438e074717072-80608418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11fc5446b2c205a527d126f18b0766920f29f394' => 
    array (
      0 => 'D:\\xampp\\htdocs\\clinics\\templates\\admin\\login.tpl',
      1 => 1413013567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319875438e074717072-80608418',
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
  'unifunc' => 'content_5438e074720104_43052584',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5438e074720104_43052584')) {function content_5438e074720104_43052584($_smarty_tpl) {?><form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
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