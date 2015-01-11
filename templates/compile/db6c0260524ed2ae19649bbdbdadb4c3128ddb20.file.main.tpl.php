<?php /* Smarty version Smarty-3.1.11, created on 2014-06-04 08:41:23
         compiled from "D:\xampp\htdocs\dentx\templates\dentist\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30558538edbb341dfc9-39609923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db6c0260524ed2ae19649bbdbdadb4c3128ddb20' => 
    array (
      0 => 'D:\\xampp\\htdocs\\dentx\\templates\\dentist\\main.tpl',
      1 => 1401869900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30558538edbb341dfc9-39609923',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ns' => 0,
    'SITE_PATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_538edbb3506786_56462737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538edbb3506786_56462737')) {function content_538edbb3506786_56462737($_smarty_tpl) {?><?php if (!is_callable('smarty_function_nest')) include 'D:/xampp/htdocs/dentx/classes/lib/smarty/plugins\\function.nest.php';
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/dentist/util/headerControls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </head>
    <body>
        <div class="wrapper">
            <input type="hidden" id="initialLoad" name="initialLoad" value="dentist_main" />		
            <input type="hidden" id="contentLoad" value="<?php echo $_smarty_tpl->tpl_vars['ns']->value['contentLoad'];?>
" />
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/dentist/util/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
                <div class="dentist-header">
                    <div class="dentist-logo">
                        Dentist Panel
                    </div>
                    <div class="logout-wrapper button-orange">
                        <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dyn/dentist/do_logout">Log Out</a>
                    </div>
                </div>            
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/dentist/left_panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
                <div class="dentist-panel-right-wrapper">
                    <?php echo smarty_function_nest(array('ns'=>'content'),$_smarty_tpl);?>

                </div>
            
        </div>
    </body>
</html><?php }} ?>