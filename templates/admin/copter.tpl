<div class="main_content">

    <div class="connection_error_message" id="connection_error_message">
        <span>No connection</span>
    </div>

    <input type="hidden" id="copter_ip" value="{$ns.copter->getIp()}" />
    <input type="hidden" id="copter_id" value="{$ns.copter->getId()}"/>
    <input type="hidden" id="copter_unique_id" value="{$ns.copter->getUniqueId()}"/>

    <div class="status">
        <div class="copter_image_box">
            <div class="copter_image" id="copter_image" style="background-image:url({$SITE_PATH}/img/copters/{$ns.copter->getUniqueId()}/1.jpg)"></div>
            <h2 class="main_title">{$ns.copter->getName()}</h2>
            <div>    
            <span>Temperature: </span>
                <span id="temperature_value">none</span>
            </div>    
            <div>    
                <span>Humidity: </span>
                <span id="humidity_value">none</span>
            </div>    
        </div> 
        <div class="copter_status_box">
            <a class="button grey" id="copter_reboot" >Reboot Copter</a>

            <div class="copter_status" id="copterStatus">
                <span id="copterStatusText">Connecting...</span>
                <a class="page_reload hide" id="page_reload" href="{$SITE_PATH}/admin/copter/{$ns.copter->getId()}"></a>
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
                            {foreach from = $ns.CameraResolutions key=title item=width_height_array}
                                {assign var="value" value="{$width_height_array.0}_{$width_height_array.1}"}
                                <option value="{$value}" {if $value==$ns.selected_resolution}selected{/if}>{$title}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="input_label">Frames per second:</label>
                    <div class="select_wrapper">
                        <select id="camera_fps">
                            {html_options values=$ns.CameraFPS output=$ns.CameraFPS selected=$ns.selected_fps}
                        </select>
                    </div>
                </div>
            </div>

            <div class="cc_table">
                <div class="form-group">
                    <button class="button grey" id="startCameraStreamingBtn">Start Camera Streaming</button>
                </div>
                <div class="form-group">
                    <button class="button grey" id="startCameraStreamingRtmpBtn">Start Camera Streaming (RTMP)</button>
                </div>
                <div class="form-group">
                    <button class="button grey" id="stopCameraStreamingBtn">Stop Camera Streaming</button>
                </div>
            </div>

            <div id="copterVlcContainer"></div>
            <div id="copterJwPlayerContainer"></div>

        </div>

        <div class="copter_engine">
            <div class="copter_controls_container">
                <h2 class="main_title">Control</h2>
                <div class="engine_controls">
                    <div class="ec_block" id="throttle_yaw_container" >
                        <div class="x_line">Yaw</div>
                        <div class="y_line">Throttle</div>
                        <div class="ec_btn f_ec_btn_real" style="display:none"></div>
                        <div class="ec_btn f_ec_btn"></div>
                    </div>
                    <div class="ec_block"  id="pitch_roll_container">
                        <div class="x_line">Roll</div>
                        <div class="y_line">Pitch</div>                    
                        <div class="ec_btn f_ec_btn_real" style="display: none"></div>
                        <div class="ec_btn f_ec_btn" ></div>
                    </div>
                    <div >
                        <div id="throttle_yaw_values"></div>
                        <div id="pitch_roll_values"></div>                    
                    </div>
                </div>
                <button class="button grey" id="startEngine">StartEngine</button>
            </div>
            <div class="distance_meter_container">
                <div id="left_distance_meter_value" style="border-radius: 100% 100% 0 0;border: 2px solid black;width: 100px; height:100px;text-align: center;transform: rotate(-45deg);float:left; margin-top:50px"></div>
                <div id="front_distance_meter_value" style="border-radius: 100% 100% 0 0;border: 2px solid black;width: 100px; height:100px;text-align: center;float:left;margin-left: 50px"></div>
                <div id="right_distance_meter_value" style="border-radius: 100% 100% 0 0;border: 2px solid black;width: 100px; height:100px;text-align: center;transform: rotate(45deg);float:left;margin-left: 50px; margin-top:50px"></div>
                <div style="clear:both"></div>
               
                <div class="onoffswitch" style="float:left">
                    <input type="checkbox" class="onoffswitch-checkbox" id="distance_meters_on_off">
                    <label class="onoffswitch-label" for="distance_meters_on_off">
                        <div class="onoffswitch-inner"></div>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>

            </div>
        </div>

        <div class="copter_map">
            <h2 class="main_title">Map</h2>
            <div  >
                <div class="onoffswitch" style="float:left">
                    <input type="checkbox" class="onoffswitch-checkbox" id="gps_on_off" checked="">
                    <label class="onoffswitch-label" for="gps_on_off">
                        <div class="onoffswitch-inner"></div>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
                <div id="gps_error_message" style="float:right; color:red"></div>
            </div>
            <div style="clear:both"></div>
            <div class="map_canvas" id="map-canvas"></div>
            <div style="clear:both"></div>
            <div id="copter_home_list_container" style="clear:both">                
                {nest ns=copter_home_list}
            </div>
            <h2 class="main_title">MPU 9150</h2>
            <div class="mpu_control">
                <div>
                    <span class="mpu_label">Accelerometer:</span>
                    <a href="javascript:void(0)" id="accel_on" class="button grey ">On</a>
                    <a href="javascript:void(0)" id="accel_off" class="button grey">Off</a>
                </div>
                <div class="accelerometer_state">
                    <div class="cube">
                        <div class="side  front"></div>
                        <div class="side   back"></div>
                        <div class="side  right"></div>
                        <div class="side   left"></div>
                        <div class="side    top"></div>
                        <div class="side bottom"></div>
                    </div>
                </div>
                <div>
                    <span class="mpu_label">Gyroscope:</span>
                    <a href="javascript:void(0)" id="gyro_on" class="button grey ">On</a>
                    <a href="javascript:void(0)" id="gyro_off" class="button grey">Off</a>
                </div>
            </div>
            <h2 class="main_title">GPIO Control</h2>
            <div class="gpio_control">
                <form autocomplete="off">
                    <div class="pin_ctrl">
                        <div class="form-group">
                            <label class="input_label">PIN</label>
                            <div class="select_wrapper">
                                <select id="pin_num">
                                    <option value="0">0</option>
                                    <option value="1" selected>1</option>
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
                                    <option value="20">20</option>
                                </select>
                            </div>
                        </div>
                        <a href="javascript:void(0)" id="pin_on" class="button grey ">On</a>
                        <a href="javascript:void(0)" id="pin_off" class="button grey">Off</a>
                        <a href="javascript:void(0)" id="pin_on_if_hold_btn" class="button grey">On if hold</a>
                    </div>
                    <div class="table gpio_ctrl_table">
                        <div class="table-cell">
                            <div class="form-group">
                                <label class="input_label">Duration</label>
                                <input id="duration" class="text" type="number" min="0" value="500">
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
