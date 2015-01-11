<?php /* Smarty version Smarty-3.1.11, created on 2015-01-07 15:34:26
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\copters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:701854ad19c241edb0-32783146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f610d65e7d39011e5fbcb5a972fbe97bdd28281' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\copters.tpl',
      1 => 1420630431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '701854ad19c241edb0-32783146',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ns' => 0,
    'fieldName' => 0,
    'copter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54ad19c245cb26_15192196',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ad19c245cb26_15192196')) {function content_54ad19c245cb26_15192196($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/admin/left_panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<h2>Active Copters</h2>
<table>
    <thead>
        <tr>
            <?php  $_smarty_tpl->tpl_vars['fieldName'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fieldName']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ns']->value['visible_fields_names']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fieldName']->key => $_smarty_tpl->tpl_vars['fieldName']->value){
$_smarty_tpl->tpl_vars['fieldName']->_loop = true;
?>
                <th>
                    <?php echo $_smarty_tpl->tpl_vars['fieldName']->value;?>
    
                </th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['copter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['copter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ns']->value['copters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['copter']->key => $_smarty_tpl->tpl_vars['copter']->value){
$_smarty_tpl->tpl_vars['copter']->_loop = true;
?>
            <tr>
                <?php  $_smarty_tpl->tpl_vars['fieldName'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fieldName']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ns']->value['visible_fields_names']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fieldName']->key => $_smarty_tpl->tpl_vars['fieldName']->value){
$_smarty_tpl->tpl_vars['fieldName']->_loop = true;
?>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['copter']->value->{$_smarty_tpl->tpl_vars['fieldName']->value};?>
    
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php }} ?>