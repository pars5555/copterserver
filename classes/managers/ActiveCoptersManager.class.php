<?php

require_once (CLASSES_PATH . "/framework/AbstractManager.class.php");
require_once (CLASSES_PATH . "/dal/mappers/ActiveCoptersMapper.class.php");

class ActiveCoptersManager extends AbstractManager {

    /**
     * @var singleton instance of class
     */
    private static $instance = null;

    /**
     * Initializes DB mappers
     *

     * @return
     */
    function __construct() {
        $this->mapper = ActiveCoptersMapper::getInstance();
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
            self::$instance = new ActiveCoptersManager();
        }
        return self::$instance;
    }


    public function addCopter($uniqueId, $name, $ip) {
        $dto = $this->selectByField('unique_id', $uniqueId);
        if (empty($dto)) {
            $dto = $this->createDto();
            $dto->setUniqueId($uniqueId);
            $dto->setName($name);
            $dto->setIp($ip);
            $dto->setEnable(1);
            return $this->insertDto($dto);
        }
        $dto[0]->setName($name);
        $dto[0]->setIp($ip);
        $dto[0]->setEnable(1);
        $this->updateByPk($dto[0]);
    }

}

?>