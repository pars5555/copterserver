<?php /* Smarty version Smarty-3.1.11, created on 2014-10-11 07:38:38
         compiled from "D:\xampp\htdocs\clinics\templates\clinic\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46955438de7ede6769-44066696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf90f80ba15c69419255a9b31ef234f3c432d812' => 
    array (
      0 => 'D:\\xampp\\htdocs\\clinics\\templates\\clinic\\login.tpl',
      1 => 1413012949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46955438de7ede6769-44066696',
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
  'unifunc' => 'content_5438de7ee11513_43929015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5438de7ee11513_43929015')) {function content_5438de7ee11513_43929015($_smarty_tpl) {?><form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/clinic/do_login">
    <span>Username:</span><input  type="text" name="username"/>
    <span>Password:</span><input type="password" name="password"/>  
    <?php if (isset($_smarty_tpl->tpl_vars['ns']->value['error_message'])){?>
        <div class="error" >
            <?php echo $_smarty_tpl->tpl_vars['ns']->value['error_message'];?>

        </div>
    <?php }?>  
    <input class="white-button" type="submit" />    
</form><?php }} ?>