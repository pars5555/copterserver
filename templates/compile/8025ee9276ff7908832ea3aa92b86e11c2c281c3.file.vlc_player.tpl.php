<?php /* Smarty version Smarty-3.1.11, created on 2015-01-18 18:45:35
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\vlc_player.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1033154ad483e52a9d7-22129411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8025ee9276ff7908832ea3aa92b86e11c2c281c3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\vlc_player.tpl',
      1 => 1421592325,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1033154ad483e52a9d7-22129411',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54ad483e553330_54894886',
  'variables' => 
  array (
    'ns' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ad483e553330_54894886')) {function content_54ad483e553330_54894886($_smarty_tpl) {?><OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
        codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab"
        width="480" height="360" id="vlc" events="True">
    <param name="Src" value="http://<?php echo $_smarty_tpl->tpl_vars['ns']->value['copter']->getIp();?>
:8080/" />
    <param name="ShowDisplay" value="True" />
    <param name="AutoLoop" value="False" />
    <param name="AutoPlay" value="True" />
    <embed id="vlcEmb" type="application/x-google-vlc-plugin" version="VideoLAN.VLCPlugin.2" autoplay="yes" loop="no" width="480" height="360"
           target="http://<?php echo $_smarty_tpl->tpl_vars['ns']->value['copter']->getIp();?>
:8080" >
    </embed>
</OBJECT><?php }} ?>