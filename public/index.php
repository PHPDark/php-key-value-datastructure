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


$intValue = $core->set('int', 99);
$core->increment('int');
$get = $core->get('int');


$storeValue = $core->hmset('student', ['name', 'age', 'roll'], ['faiyaz' , 18, '5']);
$get = $core->hgetAll('student');
print_r($get);