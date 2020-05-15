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

    public function hset($key, $field, $value)
    {
        $this->data[$key][$field] = $value;
    }

    public function hget($key, $field)
    {
        $keyExists = array_key_exists($key, $this->data);
        if ($keyExists) {
            return $this->data[$key][$field];
        }
    }

    public function hmset($key, $field, $value)
    {
        if (!$this->exists($key)) { //if key is not already exist
            if (!is_array($field) && !is_array($value)) {
                $this->data[$key][$field] = $value;
            } else {
                for ($i = 0; $i < count($field); $i++) {
                    $this->data[$key][$field[$i]] = $value[$i];
                }
            }
        } else { //if key is already exist

        }

    }

    public function hgetAll($key)
    {
        $keyExists = array_key_exists($key, $this->data);

        if ($keyExists) {
            return $this->data[$key];
        } else {
            return null;
        }
    }

}
