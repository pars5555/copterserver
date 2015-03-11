<div class="copter_home_list">
    {foreach from=$ns.copterHomeDtos item=homeDto}
        <div>
            <img src="{$SITE_PATH}/img/gmap_flag.png"/>
            {$homeDto->getTitle()}
        </div>
    {/foreach}
    <input type="hidden" value='{$ns.copterHomesJson}' id="copterHomesJson"/>
</div>
