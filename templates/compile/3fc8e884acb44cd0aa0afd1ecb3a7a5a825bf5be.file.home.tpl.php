<?php /* Smarty version Smarty-3.1.11, created on 2014-10-28 12:29:10
         compiled from "D:\xampp\htdocs\clinics\templates\main\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11656544f8c16599715-92910798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fc8e884acb44cd0aa0afd1ecb3a7a5a825bf5be' => 
    array (
      0 => 'D:\\xampp\\htdocs\\clinics\\templates\\main\\home.tpl',
      1 => 1414499348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11656544f8c16599715-92910798',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ns' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_544f8c165cc0b2_11457996',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544f8c165cc0b2_11457996')) {function content_544f8c165cc0b2_11457996($_smarty_tpl) {?><div style="width: 500px;height:700px;background: lightblue;" id="calendar_container">
    <div class="day-col" style="width: 22%;height: 100%;background: green;opacity: 0.2;border-radius: 10px; float: left">
    </div>
    <div class="day-col" style="width: 13%;height: 100%;background: red;opacity: 0.2;border-radius: 10px; float: left">
        <div style="height: 50px;text-align: center;background: violet;opacity: 0.5;line-height: 50px;width: 100%">Monday</div>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['ns']->value['endHour']+1 - ($_smarty_tpl->tpl_vars['ns']->value['startHour']) : $_smarty_tpl->tpl_vars['ns']->value['startHour']-($_smarty_tpl->tpl_vars['ns']->value['endHour'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['ns']->value['startHour'], $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
            <div style="height: 80px;background: yellow;opacity: 0.5;width: 100%"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</div>
        <?php }} ?>
    </div>

</div><?php }} ?>