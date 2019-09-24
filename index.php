<?php
/*
$yml = yaml_parse_file("Config/settings.yaml");
var_dump($yml);

$data = array(
    "contact" => array(
        "path" => "/contact",
        "command" => "Contact"
    )
);

yaml_emit_file("Config/settings.yaml", $data);*/

declare(strict_types=1);

#set_include_path("/home/bartosz/PhpstormProjects/Zandstra/Design_Patterns/");
set_include_path(dirname(getcwd()).DIRECTORY_SEPARATOR);

spl_autoload_register(function ($path){
    if (preg_match('/\\\\/', $path)){
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    }
    if (file_exists(get_include_path()."${path}.php")){
        require_once("${path}.php");
    }
});

use Framework\Core\App;


App::run();
