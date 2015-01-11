<?php /* Smarty version Smarty-3.1.11, created on 2014-07-02 08:12:48
         compiled from "D:\xampp\htdocs\dentx\templates\dentist\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46538edbb014fa85-55092626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e5cc40e1f049c21dd6e763a2d68aca39b8800db' => 
    array (
      0 => 'D:\\xampp\\htdocs\\dentx\\templates\\dentist\\login.tpl',
      1 => 1404288767,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46538edbb014fa85-55092626',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_538edbb0210ae4_62094783',
  'variables' => 
  array (
    'SITE_PATH' => 0,
    'ns' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538edbb0210ae4_62094783')) {function content_538edbb0210ae4_62094783($_smarty_tpl) {?><head>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/dentist/util/headerControls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body>
    <div class="login-wrapper">
        <div class="login-header dentist-header">
            <div class="dentist-logo">Dentist Login</div>
        </div>
        
        <form class="login-form" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/dentist/do_login">
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