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

    public function increment($key, $incrementValue = 1)
    {
        $keyExists = array_key_exists($key, $this->data);
        if ($keyExists) {
            $this->set($key, $this->get($key) + $incrementValue);
        } else {
            $this->set($key, $incrementValue);
        }
    }

    public function decrement($key, $decrementValue = 0)
    {
        $keyExists = array_key_exists($key, $this->data);
        if ($keyExists) {
            $this->set($key, $this->get($key) - $decrementValue);
        } else {
            $this->set($key, 0 - $decrementValue);
        }
    }

    public function rpop($key)
    {
        $keyExists = array_key_exists($key, $this->data);
        if ($keyExists) {
            $retrivedKeyValue = $this->get($key);
            is_array($retrivedKeyValue) ? array_pop($retrivedKeyValue) : false;
        }
    }

    /**
     * Store value in an array
     * @param $key
     * @param $field
     * @param $value
     * @return bool|null
     */
    public function storeValue($key, $field, $value)
    {
        if ($this->exists($key)) {
            $this->data[$key][$field] = $value;
            return true;
        } else {
            return null;
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
