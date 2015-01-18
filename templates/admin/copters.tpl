<h2 class="main_title">Active Copters</h2>
<div class="main_content">
    {include file="$TEMPLATE_DIR/admin/left_panel.tpl"} 
    <div class="right-content">

        <div class="copters_table">
            <div class="ct_row ct_head">
                    {foreach from=$ns.visible_fields_names item=fieldName}
                        <div class="ct_cell">
                            {$fieldName}    
                        </div>
                    {/foreach}
                    <div class="ct_cell">
                        image
                    </div>
            </div>
                    <div class="ct_row">
                {foreach from=$ns.copters item=copter}
                        {foreach from=$ns.visible_fields_names item=fieldName}
                            <div class="ct_cell">
                                {if $fieldName=='id'}
                                    <a class="current_copter" href="{$SITE_PATH}/admin/copter/{$copter->$fieldName}" target="_blank">{$copter->$fieldName}</a>
                                {else}
                                    {$copter->$fieldName}    
                                {/if}
                            </div>
                        {/foreach}
                        <div class="ct_cell">
                            <img src="{$SITE_PATH}/img/copters/{$copter->getUniqueId()}/1.jpg" style="max-width: 100px;max-height: 100px"/>    
                        </div>
                {/foreach}

            </div>
        </div>
    </div>
</div>

