<?php

use App\Core;

include_once '../vendor/autoload.php';

$core = new Core;

$valueStore = $core->set('key1', [
    'name' => 'Faiyaz',
    'email' => 'faiyaz@gmail.com'
]);

$valueStore2 = $core->set('key2', [
    'name' => 'Pranto',
    'email' => 'pranto@gmail.com'
]);

$core->lpush('key1', [
    'age' => 18,
]);

$core->rpush('key2', [
    'age' => 21,
]);

$get = $core->get('key2');
print_r($get);