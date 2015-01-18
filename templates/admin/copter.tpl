<h2 class="main_title">{$ns.copter->getName()}</h2>
<div class="main_content">
    <div class="right-content">
        <input type="hidden" id="copter_ip" value="{$ns.copter->getIp()}" />
        <input type="hidden" id="copter_id" value="{$ns.copter->getId()}"/>

        <div class="form-group">
            <label class="input_label">Camera Resolution:</label>
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

        <button id="startCameraStreamingBtn">Start Camera Streaming</button>
        <button id="stopCameraStreamingBtn">Stop Camera Streaming</button>
        <button id="startEngine">StartEngine</button>

        <div>Status:<span id="copterStatus"></span></div>
        <div id="conectionLog"></div>

        <div id="copterCameraContainer"></div>
        <div id="copterCameraStillContainer"></div>

        <div style=" width:400px;height:300px; margin: 0; padding: 0;" id="map-canvas"></div>
    </div>
</div>
