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



print_r($core->storeValue('key1','address','Dhaka Bangladesh'));


/**
 * task1
 * ami amon akta function banate chacchi like dhoren amar function ee 3 ta
 * parameter thakbe. $key, $field, $value .. so eita akta array hisabe thakbe!
 * so ami ei 3 ta param diye akta array te data store korte chacchi
 *
 *
 * task 2
 * haee then abar arekta method thakbe jeita te get($key, $field)
 * param pass koirlei oi data gulo array te return korbe
 *
 * task 3
 * array er akta akta key thakbe.. oi key diye array access hobee!
 * ar jokhon get method dibo tokhon get($key, $field) argument hisabe jabe.. 2 ta method hobee..
 * set($key, $field, $value)
 * get($key,$field)
 */