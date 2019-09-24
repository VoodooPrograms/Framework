<?php


namespace Framework\Core;


class SettingsManager
{
    private $reg;
    private $routing = [];
    private $dbsett = [];


    public function __construct(){
        $this->reg = Register::instance();
    }

    public function setRoutingTable(array $routing): void {
        $this->routing = $routing;
    }

    public function matchRoute(Request $request){
        $path = $request->getPath();
        foreach ($this->routing as $route){
            if ($route["path"] == $path){
                $action = $route["action"];
            }
        }
        if (is_null($action)){
            $request->addFeedback("Can not match any URL");
            return new self::$defaultcmd();
        }
        if (!class_exists($action)){
            $request->addFeedback("Can not match to any class in system");
            return new self::$defaultcmd();
        }
        $refclass = new \ReflectionClass($action);
        if (!$refclass->isSubclassOf(Controller::class)){
            $request->addFeedback("This cmd is not sub class of Command");
            return new self::$defaultcmd();
        }
        return $refclass->newInstance();
    }

    public function setDbsett(array $dbsett){
        $this->dbsett = $dbsett;
    }
}