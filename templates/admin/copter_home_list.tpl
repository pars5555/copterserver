<div class="copter_home_list">
    {foreach from=$ns.copterHomeDtos item=homeDto}
        <div>
            <a href="javascript:void(0);" class="copter_home_item" lng="{$homeDto->getLng()}" lat="{$homeDto->getLat()}">
                <img src="{$SITE_PATH}/img/gmap_flag.png"/>
                {$homeDto->getTitle()} (lng: {$homeDto->getLng()}, lat: {$homeDto->getLat()}) 
            </a>
            <a href="javascript:void(0);" class="copter_home_item_remove" style="display: inline-block" home_id="{$homeDto->getId()}">
                <img src="{$SITE_PATH}/img/removex.png"/>
            </a>
        </div>
    {/foreach}
    <input type="hidden" value='{$ns.copterHomesJson}' id="copterHomesJson"/>

    <div>
        title:
        <input type="text"  id="add_home_title"/>
        lng:
        <input type="text"  id="add_home_lng"/>
        lat:
        <input type="text"  id="add_home_lat"/>
        <a href="javascript:void(0);" class="button green" id="add_copter_home_btn"/>Add New Home</a>

    </div>
</div>
