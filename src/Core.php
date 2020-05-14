<?php

namespace App;

class Core
{
    protected $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function set($key, $value = null)
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

    public function lpush($key, $value)
    {
        $keyExists = array_key_exists($key, $this->data);
        if ($keyExists) {

            $retrivedKeyValue = $this->get($key);
            $result = is_array($retrivedKeyValue) ? array_unshift($retrivedKeyValue, $value) : false;

            if ($result) {
                $this->set($key, $retrivedKeyValue);
                return $retrivedKeyValue;
            }

        } else {
            $newArray = array();
            array_push($newArray, $value);
            $this->set($key, $newArray);
            return $newArray;
        }
    }

    public function rpush($key, $value)
    {
        $keyExists = array_key_exists($key, $this->data);
        if ($keyExists) {

            $retrivedKeyValue = $this->get($key);
            $result = is_array($retrivedKeyValue) ? array_push($retrivedKeyValue, $value) : false;

            if ($result) {
                $this->set($key, $retrivedKeyValue);
                return $retrivedKeyValue;
            }

        } else {
            $newArray = array();
            array_push($newArray, $value);
            $this->set($key, $newArray);
            return $newArray;
        }
    }

    public function lpop($key)
    {
        $keyExists = array_key_exists($key, $this->data);
        if ($keyExists) {
            $retrivedKeyValue = $this->get($key);
            is_array($retrivedKeyValue) ? array_pop($retrivedKeyValue) : false;
        } else {
            return false;
        }
    }

    public function exists($key)
    {
        $keyExists = array_key_exists($key, $this->data);
        if ($keyExists) {
            return true;
        } else {
            return false;
        }
    }

    public function unsetKey($key)
    {
        $keyExists = array_key_exists($key, $this->data);
        if ($keyExists) {
            unset($this->data[$key]);
        } else {
            return false;
        }
    }
}
