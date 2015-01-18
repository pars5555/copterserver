<?php /* Smarty version Smarty-3.1.11, created on 2015-01-18 21:41:37
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\copters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1976554bbf051e049c1-57784268%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f610d65e7d39011e5fbcb5a972fbe97bdd28281' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\copters.tpl',
      1 => 1421602894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1976554bbf051e049c1-57784268',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ns' => 0,
    'fieldName' => 0,
    'SITE_PATH' => 0,
    'copter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54bbf051ea0dc8_75034134',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bbf051ea0dc8_75034134')) {function content_54bbf051ea0dc8_75034134($_smarty_tpl) {?><h2 class="main_title">Active Copters</h2>
<div class="main_content">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/admin/left_panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
    <div class="right-content">

        <div class="copters_table">
            <div class="ct_row ct_head">
                    <?php  $_smarty_tpl->tpl_vars['fieldName'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fieldName']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ns']->value['visible_fields_names']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fieldName']->key => $_smarty_tpl->tpl_vars['fieldName']->value){
$_smarty_tpl->tpl_vars['fieldName']->_loop = true;
?>
                        <div class="ct_cell">
                            <?php echo $_smarty_tpl->tpl_vars['fieldName']->value;?>
    
                        </div>
                    <?php } ?>
                    <div class="ct_cell">
                        image
                    </div>
            </div>
                    <div class="ct_row">
                <?php  $_smarty_tpl->tpl_vars['copter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['copter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ns']->value['copters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['copter']->key => $_smarty_tpl->tpl_vars['copter']->value){
$_smarty_tpl->tpl_vars['copter']->_loop = true;
?>
                        <?php  $_smarty_tpl->tpl_vars['fieldName'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fieldName']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ns']->value['visible_fields_names']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fieldName']->key => $_smarty_tpl->tpl_vars['fieldName']->value){
$_smarty_tpl->tpl_vars['fieldName']->_loop = true;
?>
                            <div class="ct_cell">
                                <?php if ($_smarty_tpl->tpl_vars['fieldName']->value=='id'){?>
                                    <a class="current_copter button grey" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/admin/copter/<?php echo $_smarty_tpl->tpl_vars['copter']->value->{$_smarty_tpl->tpl_vars['fieldName']->value};?>
" target="_blank">Open</a>
                                <?php }else{ ?>
                                    <?php echo $_smarty_tpl->tpl_vars['copter']->value->{$_smarty_tpl->tpl_vars['fieldName']->value};?>
    
                                <?php }?>
                            </div>
                        <?php } ?>
                        <div class="ct_cell">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/img/copters/<?php echo $_smarty_tpl->tpl_vars['copter']->value->getUniqueId();?>
/1.jpg" style="max-width: 100px;max-height: 100px"/>    
                        </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

<?php }} ?>