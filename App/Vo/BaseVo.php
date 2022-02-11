<?php

namespace App\Vo;

class BaseVo
{
    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }

    public function __get($value)
    {
        return $this->$value; 
    }
}