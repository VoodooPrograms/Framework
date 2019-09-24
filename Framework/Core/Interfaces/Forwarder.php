<?php


namespace Framework\Core\Interfaces;


interface Forwarder
{
    public function forward(string $path): void ;
}