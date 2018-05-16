<?php
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;

class DbPlugin extends Plugin
{
    private $logger;
    private $profiler;
    public function __construct(){
        $this->logger = $logger = new Phalcon\Logger\Adapter\File(APP_PATH."/sqllog/sql-".date('Ymd').".txt");
        $this->profiler = new Phalcon\Db\Profiler();
        }
    
    public function beforeQuery()
    {
        $this->profiler->startProfile($this->db->getSQLStatement());
    }
    public function afterQuery()
    {
        $profile = $this->profiler->getLastProfile();
        $sql = $profile->getSQLStatement();
        $param = $this->db->getSqlVariables();
        $executeTime = $profile->getTotalElapsedSeconds();
        (is_array($param) && count($param)) && $param = json_encode($param);
        $this->logger->log("[".$executeTime." ms ] ".$sql.$param);
    }
    
}