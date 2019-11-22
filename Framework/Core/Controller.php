<?php


namespace Framework\Core;


abstract class Controller
{
    final public function __construct(){}

    public function execute(Request $request){
        $status = $this->doExecute($request);
        $request->setStatus($status);
    }

    abstract public function doExecute(Request $request): int;
}