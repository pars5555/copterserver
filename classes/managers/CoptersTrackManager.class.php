<?php

require_once (CLASSES_PATH . "/framework/AbstractManager.class.php");
require_once (CLASSES_PATH . "/dal/mappers/CoptersTrackMapper.class.php");

class CoptersTrackManager extends AbstractManager {

    /**
     * @var singleton instance of class
     */
    private static $instance = null;

    /**
     * Initializes DB mappers
     *
     * @param object $config
     * @param object $args
     * @return
     */
    function __construct() {
        $this->mapper = CoptersTrackMapper::getInstance();
    }

    /**
     * Returns an singleton instance of this class
     *
     * @param object $config
     * @param object $args
     * @return
     */
    public static function getInstance() {

        if (self::$instance == null) {
            self::$instance = new CoptersTrackManager();
        }
        return self::$instance;
    }
    
    public function addRow($unique_id, $lng, $lat){
        $dto = $this->createDto();
        $dto->setCopterUniqueId($unique_id);
        $dto->setLng($lng);
        $dto->setLat($lat);
        $dto->setDatetime(date('Y-m-d H:i:s'));
        $this->insertDto($dto);
        return true;
    }

}

?>