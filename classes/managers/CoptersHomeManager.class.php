<?php

require_once (CLASSES_PATH . "/framework/AbstractManager.class.php");
require_once (CLASSES_PATH . "/dal/mappers/CoptersHomeMapper.class.php");

class CoptersHomeManager extends AbstractManager {

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
        $this->mapper = CoptersHomeMapper::getInstance();
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
            self::$instance = new CoptersHomeManager();
        }
        return self::$instance;
    }
    
    public function addCopterHome($unique_id, $lng, $lat){
        $dto = $this->createDto();
        $dto->setCopterUniqueId($unique_id);
        $dto->setLng($lng);
        $dto->setLat($lat);
        $this->insertDto($dto);
        return true;
    }

}

?>