<?php /* Smarty version Smarty-3.1.11, created on 2014-07-02 08:11:38
         compiled from "D:\xampp\htdocs\dentx\templates\admin\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2620153b3be0c413870-86889498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21c102ae2e6231049861f589658efd08db0c108b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\dentx\\templates\\admin\\main.tpl',
      1 => 1404288696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2620153b3be0c413870-86889498',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53b3be0c45af22_63382166',
  'variables' => 
  array (
    'ns' => 0,
    'SITE_PATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b3be0c45af22_63382166')) {function content_53b3be0c45af22_63382166($_smarty_tpl) {?><?php if (!is_callable('smarty_function_nest')) include 'D:/xampp/htdocs/dentx/classes/lib/smarty/plugins\\function.nest.php';
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/admin/util/headerControls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </head>    
    <body>
        <div class="wrapper">
            <input type="hidden" id="initialLoad" name="initialLoad" value="admin_main" />		
            <input type="hidden" id="contentLoad" value="<?php echo $_smarty_tpl->tpl_vars['ns']->value['contentLoad'];?>
" />
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/admin/util/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
            <div class="admin-header">
                <div class="admin-logo">
                    Admin Panel
                </div>
                <div class="logout-wrapper button-orange">
                    <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/admin/do_logout">Log Out</a>
                </div>
            </div>            
            <div class="admin-panel-right-wrapper">
                <?php echo smarty_function_nest(array('ns'=>'content'),$_smarty_tpl);?>

            </div>
        </div>
    </body>


</html><?php }} ?>