<?php

require_once (CLASSES_PATH . "/actions/admin/BaseAdminAction.class.php");
require_once (CLASSES_PATH . "/managers/CoptersHomeManager.class.php");

/**
 * @author Levon Naghashyan
 */
class AddCopterHomeAction extends BaseAdminAction {

    public function service() {
        $copter_unique_id = $_REQUEST['copter_unique_id'];
        $title = $_REQUEST['title'];
        $lng = $_REQUEST['lng'];
        $lat = $_REQUEST['lat'];
        $coptersHomeManager = CoptersHomeManager::getInstance();
        $homeId = $coptersHomeManager->addCopterHome($copter_unique_id, $title, $lng, $lat);
        if ($homeId > 0) {
            $this->ok(array('home_id', $homeId));
        } else {
            $this->error();
        }
    }

}

?>