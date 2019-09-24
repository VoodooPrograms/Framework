<?php


namespace Framework\Core;


class Register
{
    private static $instance;
    private $services = [];

    public function __construct(){}
    public function __destruct(){}
    public function __clone(){}

    public static function instance(): Register {
        if (is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function reset(){
        self::$instance = null;
    }

    public function get(string $key): ?object {
        if (!isset($this->services[$key])){
            $ref = new \ReflectionClass($key);
            $this->set($ref->newInstance());
        }
        return $this->services[$key];
    }

    public function set(object $obj): void {
        $this->services[get_class($obj)] = $obj;
    }

    public function dump(): void {
        var_dump($this->services);
    }
}
