{include file="$TEMPLATE_DIR/admin/left_panel.tpl"} 
<h2>Active Copters</h2>
<table>
    <thead>
        <tr>
            {foreach from=$ns.visible_fields_names item=fieldName}
                <th>
                    {$fieldName}    
                </th>
            {/foreach}
            <th>
                image
            </th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$ns.copters item=copter}
            <tr>
                {foreach from=$ns.visible_fields_names item=fieldName}
                    <td>
                        {if $fieldName=='id'}
                            <a href="{$SITE_PATH}/admin/copter/{$copter->$fieldName}" target="_blank">{$copter->$fieldName}</a>
                        {else}
                            {$copter->$fieldName}    
                        {/if}
                    </td>
                {/foreach}
                <td>
                    <img src="{$SITE_PATH}/img/copters/{$copter->getUniqueId()}/1.jpg" style="max-width: 100px;max-height: 100px"/>    
                </td>
            </tr>
        {/foreach}

    </tbody>
</table>


