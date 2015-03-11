<?php

require_once (CLASSES_PATH . "/loads/admin/BaseAdminLoad.class.php");
require_once(CLASSES_PATH . "/managers/CoptersHomeManager.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class CopterHomeListLoad extends BaseAdminLoad {

    public function load() {
        $copterUniqueId = null;
        if (isset($_REQUEST['copter_unique_id'])) {
            $copterUniqueId = $this->secure($_REQUEST['copter_unique_id']);
        } else {
            $copterUniqueId = $this->args['copter_unique_id'];
        }
        $coptersHomeManager = CoptersHomeManager::getInstance();
        $copterHomeDtos = $coptersHomeManager->selectByField('copter_unique_id', $copterUniqueId);
        $this->addParam("copterHomeDtos", $copterHomeDtos);
        $dtosToJSON = AbstractDto::dtosToJSON($copterHomeDtos);
        $this->addParam("copterHomesJson", $dtosToJSON);
        }
    
    public function getTemplate() {
        return TEMPLATES_DIR . "/admin/copter_home_list.tpl";
    }

}

?>