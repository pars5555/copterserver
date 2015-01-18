<?php

require_once (CLASSES_PATH . "/loads/admin/BaseAdminLoad.class.php");
require_once(CLASSES_PATH . "/managers/ActiveCoptersManager.class.php");
require_once(CLASSES_PATH . "/util/CameraResolutions.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class CopterLoad extends BaseAdminLoad {

    public function load() {
        if (isset($_REQUEST['copter_id'])) {
            $copterId = $this->secure($_REQUEST['copter_id']);
        } else {
            $copterId = $this->secure($this->args[0]);
        }
        $activeCoptersManager = ActiveCoptersManager::getInstance();
        $copter = $activeCoptersManager->selectByPK($copterId);
        if (isset($copter)) {
            $this->addParam('copter', $copter);
            $selectedResolution = current(CameraResolutions::$RESOLUTIONS);
            $selectedFPS = CameraResolutions::$FPS[1];
            if (isset($_REQUEST['camera_resolution'])) {
                $selectedResolution = $this->secure($_REQUEST['camera_resolution']);
            }
            if (isset($_REQUEST['camera_fps'])) {
                $selectedFPS = $this->secure($_REQUEST['camera_fps']);
            }
            $this->addParam('CameraResolutions', CameraResolutions::$RESOLUTIONS);
            $this->addParam('selected_resolution', $selectedResolution);
            $this->addParam('CameraFPS', CameraResolutions::$FPS);
            $this->addParam('selected_fps', $selectedFPS);
        }
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/admin/copter.tpl";
    }

}

?>