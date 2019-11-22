<?php


namespace Framework\Controllers;


use Framework\Core\Controller;
use Framework\Core\Request;

class BlogController extends Controller
{

    public function doExecute(Request $request): int
    {
        echo "Cześć tu blog";
        return 0;
    }
}