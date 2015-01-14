{include file="$TEMPLATE_DIR/admin/left_panel.tpl"} 
<input type="hidden" id="copter_ip" value="{$ns.copter->getIp()}" />
<input type="hidden" id="copter_id" value="{$ns.copter->getId()}"/> 
<h2>{$ns.copter->getName()}</h2>

Camera Resolution: <select id="camera_resolution">
    {foreach from = $ns.CameraResolutions key=title item=width_height_array}
        {assign var="value" value="{$width_height_array.0}_{$width_height_array.1}"}
        <option value="{$value}" {if $value==$ns.selected_resolution}selected{/if}>{$title}</option>
    {/foreach}
</select>

Frames per second: <select id="camera_fps">
    {html_options values=$ns.CameraFPS output=$ns.CameraFPS selected=$ns.selected_fps}
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