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
        </tr>
    </thead>
    <tbody>
        {foreach from=$ns.copters item=copter}
            <tr>
                {foreach from=$ns.visible_fields_names item=fieldName}
                    <td>
                        {$copter->$fieldName}    
                    </td>
                {/foreach}
            </tr>
        {/foreach}
    </tbody>
</table>


