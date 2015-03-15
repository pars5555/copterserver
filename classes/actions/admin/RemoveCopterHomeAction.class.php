<?php

require_once (CLASSES_PATH . "/actions/admin/BaseAdminAction.class.php");
require_once (CLASSES_PATH . "/managers/CoptersHomeManager.class.php");

/**
 * @author Levon Naghashyan
 */
class RemoveCopterHomeAction extends BaseAdminAction {

    public function service() {
        $id = $_REQUEST['id'];
        $coptersHomeManager = CoptersHomeManager::getInstance();
        $coptersHomeManager->deleteByPK($id);
        $this->ok();
    }

}

?>