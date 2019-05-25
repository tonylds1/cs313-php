<?php

require_once '../vendor/autoload.php';

$myFirstClass = new cs313\HelloWorld\HelloWorld\HelloWorld();
$greeting = $myFirstClass->greeting();

include 'hello.php';
