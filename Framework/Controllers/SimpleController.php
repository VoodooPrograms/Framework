<?php


namespace Framework\Controllers;


use Framework\Core\Controller;
use Framework\Core\Request;

class SimpleController extends Controller
{

    public function doExecute(Request $request): int
    {
        echo "Cześć tu simple";
        return 0;
    }
}