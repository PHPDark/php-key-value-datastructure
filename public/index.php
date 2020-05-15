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


/* example 1*/
$core->storeValue(
    'key1',
    ['address', 'mobile', 'pin', 'interest'],
    ['Dhaka Bangladesh', ['0165545454', '97987877'], [1223, 324, 324], 'table tenis']
);


/** example 2 */
$storeValue = $core->storeValue(
    'key1',
    ['address', 'mobile', 'pin', 'interest'],
    ['Dhaka Bangladesh', '0165545454', '9874', ['cricket', 'hockey', 'badminton']]
);

print_r($storeValue);