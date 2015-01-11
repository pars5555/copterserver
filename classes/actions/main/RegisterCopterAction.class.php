<?php

require_once(CLASSES_PATH . "/actions/BaseAction.class.php");
require_once(CLASSES_PATH . "/managers/ActiveCoptersManager.class.php");

class RegisterCopterAction extends BaseAction {

    public function service() {
        if (!isset($_REQUEST['copter_ip'])) {
            $this->error(array('message' => 'Missing `copter_ip` parameter!'));
        }
        if (!isset($_REQUEST['name'])) {
            $this->error(array('message' => 'Missing `name` parameter!'));
        }
        if (!isset($_REQUEST['unique_id'])) {
            $this->error(array('message' => 'Missing `unique_id` parameter!'));
        }
        $copter_ip = $this->secure($_REQUEST['copter_ip']);
        $name = $this->secure($_REQUEST['name']);
        $unique_id = $this->secure($_REQUEST['unique_id']);
        $activeCoptersManager = ActiveCoptersManager::getInstance();
        $activeCoptersManager->addCopter($unique_id, $name, $copter_ip);
        $this->ok();
    }

}

?>