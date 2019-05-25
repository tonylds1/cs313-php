<?php

require_once '../vendor/autoload.php';

$myFirstClass = new cs313\HelloWorld\HelloWorld\HelloWorld();
$greetings = $myFirstClass->greeting();
var_dump($greetings); exit;

include 'hello.php';
