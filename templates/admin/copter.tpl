<div class="main_content">
    <input type="hidden" id="copter_ip" value="{$ns.copter->getIp()}" />
    <input type="hidden" id="copter_id" value="{$ns.copter->getId()}"/>
    <input type="hidden" id="copter_unique_id" value="{$ns.copter->getUniqueId()}"/>

    <div class="status">
        <div class="copter_image_box">
            <div class="copter_image" id="copter_image" style="background-image:url({$SITE_PATH}/img/copters/{$ns.copter->getUniqueId()}/1.jpg)"></div>
            <h2 class="main_title">{$ns.copter->getName()}</h2>
        </div> 
        <div class="copter_status_box">
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
        </div>
    </div>
</div>
