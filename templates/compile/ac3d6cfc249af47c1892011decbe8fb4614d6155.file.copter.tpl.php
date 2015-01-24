<?php /* Smarty version Smarty-3.1.11, created on 2015-01-24 17:20:51
         compiled from "D:\xampp\htdocs\copterserver\templates\admin\copter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2397854c39c33b17bc1-30148416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac3d6cfc249af47c1892011decbe8fb4614d6155' => 
    array (
      0 => 'D:\\xampp\\htdocs\\copterserver\\templates\\admin\\copter.tpl',
      1 => 1422104963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2397854c39c33b17bc1-30148416',
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
  'unifunc' => 'content_54c39c33c021f5_98624511',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c39c33c021f5_98624511')) {function content_54c39c33c021f5_98624511($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:/xampp/htdocs/copterserver/classes/lib/smarty/plugins\\function.html_options.php';
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



            <div id="video-jwplayer_wrapper" style="position: relative; display: block; width: 160px; height: 120px;">
                <object type="application/x-shockwave-flash" data="/jwplayer/jwplayer.flash.swf" width="100%" height="100%" bgcolor="#000000" id="video-jwplayer" name="video-jwplayer" tabindex="0">
                    <param name="allowfullscreen" value="true">
                    <param name="allowscriptaccess" value="always">
                    <param name="seamlesstabbing" value="true">
                    <param name="wmode" value="opaque">
                </object>
                <div id="video-jwplayer_aspect" style="display: none;"></div>
                <div id="video-jwplayer_jwpsrv" style="position: absolute; top: 0px; z-index: 10;"></div>
            </div>

        </div>

        <div class="copter_engine">
            <h2 class="main_title">Control</h2>
            <button class="button grey" id="startEngine">StartEngine</button>
        </div>

        <div class="copter_map">
            <h2 class="main_title">Map</h2>
            <div class="map_canvas" id="map-canvas"></div>
            <h2 class="main_title">GPIO Control</h2>
            <div class="gpio_control">
                <form autocomplete="off">
                    <div class="pin_ctrl">
                        <div class="form-group">
                            <label class="input_label">PIN</label>
                            <div class="select_wrapper">
                                <select id="pin_num">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                </select>
                            </div>
                        </div>
                        <a href="javascript:void(0)" id="pin_on" class="button grey ">On</a>
                        <a href="javascript:void(0)" id="pin_off" class="button grey">Off</a>
                    </div>
                    <div class="table gpio_ctrl_table">
                        <div class="table-cell">
                            <div class="form-group">
                                <label class="input_label">Duration</label>
                                <input id="duration" class="text" type="number" min="0" value="0">
                            </div>
                        </div>
                        <div class="table-cell">
                            <div class="form-group">
                                <label class="input_label">State</label>
                                <div class="select_wrapper">
                                    <select id="state">
                                        <option value="0">off</option>
                                        <option value="1">on</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table-cell">
                            <a href="javascript:void(0)" id="send_puls_btn" class="button grey">Puls</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php }} ?>