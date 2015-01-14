<?php

require_once(CLASSES_PATH . "/actions/BaseAction.class.php");
require_once(CLASSES_PATH . "/managers/ActiveCoptersManager.class.php");

class SetCopterPositionAction extends BaseAction {

    public function service() {
        if (!isset($_REQUEST['copter_unique_id'])) {
            $this->error(array('message' => 'Missing parameter `copter_unique_id`'));
        }
        if (!isset($_REQUEST['lng'])) {
            $this->error(array('message' => 'Missing parameter `lng`!'));
        }
        if (!isset($_REQUEST['lat'])) {
            $this->error(array('message' => 'Missing parameter `lat`!'));
        }

        $unique_id = $this->secure($_REQUEST['copter_unique_id']);
        $lng = $this->secure($_REQUEST['lng']);
        $lat = $this->secure($_REQUEST['lat']);
        $activeCoptersManager = ActiveCoptersManager::getInstance();
        $coptersTrackManager = CoptersTrackManager::getInstance();
        
        $ret = $coptersTrackManager->addRow($unique_id, $lng, $lat);
        $ret = $activeCoptersManager->setCopterLngLat($unique_id, $lng, $lat);
        if ($ret === true) {
            $this->ok();
        } else {
            $this->error(array('message' => 'copter does not exist with unique_id: ' . $unique_id));
        }
    }

}

?>