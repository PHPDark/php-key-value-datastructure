<?php

use App\Core;

include_once '../vendor/autoload.php';

$core = new Core;
$set = $core->set('name', 'Faiyaz');
$value = $core->get('name');
