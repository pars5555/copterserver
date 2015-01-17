<?php /* Smarty version Smarty-3.1.11, created on 2015-01-15 00:03:02
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\copter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153954b6cb76bc30a4-49516622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac3d6cfc249af47c1892011decbe8fb4614d6155' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\copter.tpl',
      1 => 1421264249,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153954b6cb76bc30a4-49516622',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ns' => 0,
    'width_height_array' => 0,
    'value' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54b6cb76c27502_85288763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b6cb76c27502_85288763')) {function content_54b6cb76c27502_85288763($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:/xampp/htdocs/copterserver/classes/lib/smarty/plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['TEMPLATE_DIR']->value)."/admin/left_panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<input type="hidden" id="copter_ip" value="<?php echo $_smarty_tpl->tpl_vars['ns']->value['copter']->getIp();?>
" />
<input type="hidden" id="copter_id" value="<?php echo $_smarty_tpl->tpl_vars['ns']->value['copter']->getId();?>
"/> 
<h2><?php echo $_smarty_tpl->tpl_vars['ns']->value['copter']->getName();?>
</h2>

Camera Resolution: <select id="camera_resolution">
    <?php  $_smarty_tpl->tpl_vars['width_height_array'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['width_height_array']->_loop = false;
 $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ns']->value['CameraResolutions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['width_height_array']->key => $_smarty_tpl->tpl_vars['width_height_array']->value){
$_smarty_tpl->tpl_vars['width_height_array']->_loop = true;
 $_smarty_tpl->tpl_vars['title']->value = $_smarty_tpl->tpl_vars['width_height_array']->key;
?>
        <?php $_smarty_tpl->tpl_vars["value"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['width_height_array']->value[0])."_".((string)$_smarty_tpl->tpl_vars['width_height_array']->value[1]), null, 0);?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['value']->value==$_smarty_tpl->tpl_vars['ns']->value['selected_resolution']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</option>
    <?php } ?>
</select>

Frames per second: <select id="camera_fps">
    <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['ns']->value['CameraFPS'],'output'=>$_smarty_tpl->tpl_vars['ns']->value['CameraFPS'],'selected'=>$_smarty_tpl->tpl_vars['ns']->value['selected_fps']),$_smarty_tpl);?>

</select>

<button id="startCameraStreamingBtn">Start Camera Streaming</button>
<button id="stopCameraStreamingBtn">Stop Camera Streaming</button>
<button id="startCameraRaspistillBtn">Start Camera Raspistill</button>
<button id="stopCameraRaspistillBtn">Stop Camera Raspistill</button>

<div>Status:<span id="copterStatus"></span></div>
<div id="conectionLog"></div>

<div id="copterCameraContainer"></div>
<div id="copterCameraStillContainer"></div>

<div style=" width:400px;height:300px; margin: 0; padding: 0;" id="map-canvas"></div>



  <div id="video-jwplayer_wrapper" style="position: relative; display: block; width: 640px; height: 480px;">
      <object type="application/x-shockwave-flash" data="/jwplayer/jwplayer.flash.swf" width="100%" height="100%" bgcolor="#000000" id="video-jwplayer" name="video-jwplayer" tabindex="0">
        <param name="allowfullscreen" value="true">
        <param name="allowscriptaccess" value="always">
        <param name="seamlesstabbing" value="true">
        <param name="wmode" value="opaque">
      </object>
      <div id="video-jwplayer_aspect" style="display: none;"></div>
      <div id="video-jwplayer_jwpsrv" style="position: absolute; top: 0px; z-index: 10;"></div>
    </div><?php }} ?>