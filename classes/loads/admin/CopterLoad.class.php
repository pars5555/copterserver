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

    private $copter;

    public function load() {
        $this->copter = $this->getCopterDto();
        if (isset($this->copter)) {
            $this->addParam('copter', $this->copter);
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

    private function getCopterDto() {
        if (isset($_REQUEST['copter_id'])) {
            $copterId = $this->secure($_REQUEST['copter_id']);
        } else {
            $copterId = $this->secure($this->args[0]);
        }
        $activeCoptersManager = ActiveCoptersManager::getInstance();
        return $activeCoptersManager->selectByPK($copterId);
    }

    public function getDefaultLoads($args) {
        $loads = array();
        $loadName = "CopterHomeListLoad";
        $loads["copter_home_list"]["load"] = "loads/admin/" . $loadName;
        $loads["copter_home_list"]["args"] = array('copter_unique_id' => $this->copter->getUniqueId());
        $loads["copter_home_list"]["loads"] = array();
        return $loads;
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/admin/copter.tpl";
    }

}

?>