<?php


namespace Framework\Core;


use Framework\Controllers\SimpleController;

class AppController
{
    private $setmgr = null;
    private $reg;

    public function __construct(){
        $this->reg = Register::instance();
        $this->reg->set($this);
        $this->setmgr = $this->reg->get(SettingsManager::class);
    }

    public function getController(Request $request): Controller {
        $controler = $this->setmgr->matchRoute($request);
        return new $controler;
    }

    public function getView(Request $request){

    }
}