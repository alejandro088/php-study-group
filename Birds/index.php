<?php

require_once('Chicken.php');

$chicken = new Chicken();

$eggChicken = $chicken->lay();

var_dump($eggChicken); // egg

$res = $eggChicken->hatch();

var_dump($res); // chicken

$res = $eggChicken->hatch();

var_dump($res); // chicken

