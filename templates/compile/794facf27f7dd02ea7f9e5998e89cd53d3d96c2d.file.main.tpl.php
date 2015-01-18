<?php /* Smarty version Smarty-3.1.11, created on 2015-01-18 15:43:50
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:280154acfec57ce629-14540193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '794facf27f7dd02ea7f9e5998e89cd53d3d96c2d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\main.tpl',
      1 => 1421581410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280154acfec57ce629-14540193',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54acfec57fe211_54959506',
  'variables' => 
  array (
    'ns' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54acfec57fe211_54959506')) {function content_54acfec57fe211_54959506($_smarty_tpl) {?><?php if (!is_callable('smarty_function_nest')) include 'D:/xampp/htdocs/copterserver/classes/lib/smarty/plugins\\function.nest.php';
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
 
            <div id="main_content">
                <?php echo smarty_function_nest(array('ns'=>'content'),$_smarty_tpl);?>

            </div>
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/admin/util/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 

        </div>
    </body>
</html><?php }} ?>