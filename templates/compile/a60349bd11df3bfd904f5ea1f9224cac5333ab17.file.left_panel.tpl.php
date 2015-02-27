<?php /* Smarty version Smarty-3.1.11, created on 2015-02-27 10:58:20
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\left_panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2596154ad011f4c3433-88428505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a60349bd11df3bfd904f5ea1f9224cac5333ab17' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\left_panel.tpl',
      1 => 1421778496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2596154ad011f4c3433-88428505',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54ad011f4c4f82_45380090',
  'variables' => 
  array (
    'ns' => 0,
    'SITE_PATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ad011f4c4f82_45380090')) {function content_54ad011f4c4f82_45380090($_smarty_tpl) {?><div id="mainLeftPanel"  class="left-panel">
    <div class="left-panel_content">    
        <h1 class="any_categories"><span class="glyphicon"></span> Categories</h1>            
        <ul>
            <li>
                <a class="<?php if ($_smarty_tpl->tpl_vars['ns']->value['load_name']=='copters'){?>selected<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/admin/copters">Active Copters</a>
            </li>
            <li>
                <a href="#">Category</a>
            </li>
            <li>
                <a href="#">Category</a>
            </li>
            <li>
                <a href="#">Category</a>
            </li>
        </ul>
    </div>
</div><?php }} ?>