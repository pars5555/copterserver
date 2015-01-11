<?php

require_once (CLASSES_PATH . "/loads/admin/BaseAdminLoad.class.php");
require_once(CLASSES_PATH . "/managers/ActiveCoptersManager.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class VlcPlayerLoad extends BaseAdminLoad {

    public function load() {    
        $copterId = $this->secure($_REQUEST['copter_id']);
        $width= $this->secure($_REQUEST['width']);
        $height= $this->secure($_REQUEST['height']);
        $activeCoptersManager = ActiveCoptersManager::getInstance();
        $copter = $activeCoptersManager->selectByPK($copterId);
        if (isset($copter)) {
            $this->addParam('copter', $copter);
            $this->addParam('width', $width);
            $this->addParam('height', $height);
        }
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/admin/vlc_player.tpl";
    }

}

?>