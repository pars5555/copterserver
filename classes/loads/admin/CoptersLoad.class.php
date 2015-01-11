<?php

require_once (CLASSES_PATH . "/loads/admin/BaseAdminLoad.class.php");
require_once(CLASSES_PATH . "/managers/ActiveCoptersManager.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class CoptersLoad extends BaseAdminLoad {

    public function load() {
        $activeCoptersManager = ActiveCoptersManager::getInstance();
        $activeCoptersDtos = $activeCoptersManager->selectAll();
        $this->addParam('copters', $activeCoptersDtos);
        $this->addParam('visible_fields_names', array('id', 'uniqueId', 'name', 'ip'));
        
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/admin/copters.tpl";
    }

}

?>