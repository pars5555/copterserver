<?php /* Smarty version Smarty-3.1.11, created on 2015-01-18 21:19:04
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\copter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:634654bbeb08eeda25-81513529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac3d6cfc249af47c1892011decbe8fb4614d6155' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\copter.tpl',
      1 => 1421601454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '634654bbeb08eeda25-81513529',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ns' => 0,
    'SITE_PATH' => 0,
    'width_height_array' => 0,
    'value' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54bbeb09047a21_60244731',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bbeb09047a21_60244731')) {function content_54bbeb09047a21_60244731($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:/xampp/htdocs/copterserver/classes/lib/smarty/plugins\\function.html_options.php';
?><div class="main_content">
    <input type="hidden" id="copter_ip" value="<?php echo $_smarty_tpl->tpl_vars['ns']->value['copter']->getIp();?>
" />
    <input type="hidden" id="copter_id" value="<?php echo $_smarty_tpl->tpl_vars['ns']->value['copter']->getId();?>
"/>
    <input type="hidden" id="copter_unique_id" value="<?php echo $_smarty_tpl->tpl_vars['ns']->value['copter']->getUniqueId();?>
"/>

    <div class="status">
        <div class="copter_image_box">
            <div class="copter_image" id="copter_image" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/img/copters/<?php echo $_smarty_tpl->tpl_vars['ns']->value['copter']->getUniqueId();?>
/1.jpg)"></div>
            <h2 class="main_title"><?php echo $_smarty_tpl->tpl_vars['ns']->value['copter']->getName();?>
</h2>
        </div> 
        <div class="copter_status_box">
            <div class="copter_status" id="copterStatus">
                <span id="copterStatusText">Connecting...</span>
                <a class="page_reload hide" id="page_reload" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PATH']->value;?>
/admin/copter/<?php echo $_smarty_tpl->tpl_vars['ns']->value['copter']->getId();?>
"></a>
            </div> 
        </div> 
    </div>
    <div class="conection_log_box f_conection_log_box">
        <button class="con_log_btn f_con_log_btn"></button>
        <div id="conectionLog" class="conectionLog">
        </div>
    </div>

    <div class="right-content current_copter">

        <div class="copter_controls">
            <h2 class="main_title">Camera</h2>
            <div class="cc_table">
                <div class="form-group">
                    <label class="input_label">Resolution:</label>
                    <div class="select_wrapper">
                        <select id="camera_resolution">
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
                    </div>
                </div>
                <div class="form-group">
                    <label class="input_label">Frames per second:</label>
                    <div class="select_wrapper">
                        <select id="camera_fps">
                            <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['ns']->value['CameraFPS'],'output'=>$_smarty_tpl->tpl_vars['ns']->value['CameraFPS'],'selected'=>$_smarty_tpl->tpl_vars['ns']->value['selected_fps']),$_smarty_tpl);?>

                        </select>
                    </div>
                </div>
            </div>

            <div class="cc_table">
                <div class="form-group">
                    <button class="button grey" id="startCameraStreamingBtn">Start Camera Streaming</button>
                </div>
                <div class="form-group">
                    <button class="button grey" id="stopCameraStreamingBtn">Stop Camera Streaming</button>
                </div>
            </div>

            <div id="copterCameraContainer"></div>
        </div>

        <div class="copter_engine">
            <h2 class="main_title">Control</h2>
            <button class="button grey" id="startEngine">StartEngine</button>
        </div>

        <div class="copter_map">
            <h2 class="main_title">Map</h2>
            <div class="map_canvas" id="map-canvas"></div>
        </div>
    </div>
</div>
<?php }} ?>