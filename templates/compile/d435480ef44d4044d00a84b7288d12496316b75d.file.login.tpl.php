<?php /* Smarty version Smarty-3.1.11, created on 2014-07-02 08:12:29
         compiled from "D:\xampp\htdocs\dentx\templates\admin\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1156353b3beed2a1a90-15290518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd435480ef44d4044d00a84b7288d12496316b75d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\dentx\\templates\\admin\\login.tpl',
      1 => 1404288747,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1156353b3beed2a1a90-15290518',
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
  'unifunc' => 'content_53b3beed2e0104_06738665',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b3beed2e0104_06738665')) {function content_53b3beed2e0104_06738665($_smarty_tpl) {?><head>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/admin/util/headerControls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body>
    <div class="login-wrapper">
        <div class="login-header admin-header">
            <div class="admin-logo">Admin Login</div>
        </div>
        <form class="login-form" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/admin/do_login">
           <div class="login-wrapper-content">
               <span>Username:</span><input class="input-type-text-design" type="text" name="username"/>
           </div> 
           <div class="login-wrapper-content">
               <span>Password:</span><input class="input-type-text-design" type="password" name="password"/>  
           </div> 
            
            <?php if (isset($_smarty_tpl->tpl_vars['ns']->value['error_message'])){?>
            <div class="error" style="color:red">
               <?php echo $_smarty_tpl->tpl_vars['ns']->value['error_message'];?>

              </div>
             <?php }?>  
            <input class="white-button" type="submit" />    
        </form>
    </div>
</body>
</html><?php }} ?>