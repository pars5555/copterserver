<a class="main_logo" href="{$SITE_PATH}">Arm Copter Server</a>
{if $ns.userLevel === $ns.userGroupsAdmin}
    <a class="logout button grey" href="{$SITE_PATH}/dyn/admin/do_logout">Logout</a>
{/if}
<div class="clear"></div>

<div class="menu_btn f_menu_btn" data-pos="left" data-menu="coopter-controls">
    <span class="glyphicon"></span>
    <span>Copter Controls</span>
</div>

<div class="menu_btn f_menu_btn" data-pos="right" data-menu="coopter-map">
    <span>Copter Map</span>
    <span class="glyphicon"></span>
</div>

<div class="clear"></div>

