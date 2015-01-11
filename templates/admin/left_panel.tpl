<ul>
    <li>
        <a href="{$SITE_PATH}/admin/copters">Active Copters</a>
    </li>
    {if $ns.userLevel === $ns.userGroupsAdmin}
        <li>
            <a href="{$SITE_PATH}/dyn/admin/do_logout">Logout</a>
        </li>
    {/if}
</ul>