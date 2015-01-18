<?php

require_once(CLASSES_PATH . "/actions/BaseAction.class.php");
require_once(CLASSES_PATH . "/managers/ActiveCoptersManager.class.php");
require_once(CLASSES_PATH . "/managers/CoptersTrackManager.class.php");

class SetCopterGpsDataAction extends BaseAction {

    public function service() {       
        if (!isset($_REQUEST['unique_id'])) {
            $this->error(array('message' => 'Missing `unique_id` parameter!'));
        }
        if (!isset($_REQUEST['gps_data_json'])) {
            $this->error(array('message' => 'Missing `gps_data_json` parameter!'));
        }
        $unique_id = $this->secure($_REQUEST['unique_id']);
        $gps_data_json = $this->secure($_REQUEST['gps_data_json']);
        $gps_data = json_decode(htmlspecialchars_decode($gps_data_json));
        if (empty($gps_data)) {
            $this->error(array('message' => 'Can not decode `gps_data_json` parameter!: '.$gps_data_json ));
        }
        $lng = isset($gps_data->lng) ? $gps_data->lng : null;
        $lat = isset($gps_data->lat) ? $gps_data->lat : null;
        $activeCoptersManager = ActiveCoptersManager::getInstance();
        $coptersTrackManager = CoptersTrackManager::getInstance();
        $coptersTrackManager->addRow($unique_id, $lng, $lat);
        $ret = $activeCoptersManager->setCopterLngLat($unique_id, $lng, $lat);
        if ($ret === true) {
            $this->ok();
        } else {
            $this->error(array('message' => 'copter does not exist with unique_id: ' . $unique_id));
        }
    }

}

?>