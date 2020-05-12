<?php

namespace App;

class Core
{
    protected $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        $keyExists = array_key_exists($key, $this->data);
        if ($keyExists) {
            return $this->data[$key];
        }
        return null;
    }
}
