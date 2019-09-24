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

    public function setDbsett(array $dbsett){
        $this->dbsett = $dbsett;
    }

    public function matchRoute(Request $request){
        $path = $request->getPath();
        $this->matchRegex($request);
        foreach ($this->routing as $route){
            if ($route["path"] == $path){
                $action = $route["action"];
            }
        }
        if (is_null($action)){
            http_response_code(404);
            return new HttpResponse();
        }
        if (!class_exists($action)){
/*            $request->addFeedback("Can not match to any class in system");
            return new self::$defaultcmd();*/
        }
        $refclass = new \ReflectionClass($action);
        if (!$refclass->isSubclassOf(Controller::class)){
/*            $request->addFeedback("This cmd is not sub class of Command");
            return new self::$defaultcmd();*/
        }
        return $refclass->newInstance();
    }

    public function matchRegex(Request $request){
        $url = parse_url($request->getPath());
        $arr = explode("/", $url["path"]);
        $pattern = preg_quote($url["path"], "/");
        echo $pattern;
        echo "<br />";
        echo $url["path"];
        foreach ($this->routing as $route){
            if (preg_match("/${pattern}/", $route["path"])){
                echo "Match".PHP_EOL;
            }
            if ($route["path"] == $url["path"]){
            }
        }
    }
}