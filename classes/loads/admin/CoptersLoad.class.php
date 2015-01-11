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
        $allCoptersDtos = $activeCoptersManager->selectAll();
        $this->pingToAllCoptersAndRemovefNotAvailable($allCoptersDtos);
        $activeCoptersDtos = $activeCoptersManager->selectByField('enable', 1);
        $this->addParam('copters', $activeCoptersDtos);
        $this->addParam('visible_fields_names', array('id', 'uniqueId', 'name', 'ip'));
    }

    private function pingToAllCoptersAndRemovefNotAvailable($allCoptersDtos) {
        $activeCoptersManager = ActiveCoptersManager::getInstance();
        foreach ($allCoptersDtos as $copterDto) {
            $ip = $copterDto->getIp();
            $fp = fSockOpen($ip, 22, $errno, $errstr, 3);
            if ($fp !== false) {
                $copterDto->setEnable(1);
                fclose($fp);
            } else {
                $copterDto->setEnable(0);
            }
            $activeCoptersManager->updateByPK($copterDto);
        }
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/admin/copters.tpl";
    }

}

?>