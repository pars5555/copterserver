<?php /* Smarty version Smarty-3.1.11, created on 2014-06-04 08:41:23
         compiled from "D:\xampp\htdocs\dentx\templates\dentist\left_panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6156538edbb358b331-48164856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25ef2a52e11a88a1d258ac220f733ad0bf66d529' => 
    array (
      0 => 'D:\\xampp\\htdocs\\dentx\\templates\\dentist\\left_panel.tpl',
      1 => 1401869900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6156538edbb358b331-48164856',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_PATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_538edbb35906a9_84314300',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538edbb35906a9_84314300')) {function content_538edbb35906a9_84314300($_smarty_tpl) {?><div class="dentist-panel-left-wrapper">
    <ul class="left-panel-nav">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/dentist/calendar">
            <li class="f_active publication-wrapper">
                <span class="glyph posts"></span>
                Calendar
            </li>
        </a>

    </ul>
</div>
<?php }} ?>