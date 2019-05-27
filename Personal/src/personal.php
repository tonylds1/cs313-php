<?php

$greetings = [
    'Good Morning Visitor',
    'Good Afternoon Visitor',
    'Good Evening Visitor',
];
var_dump($greetings);

$date = new DateTime();
$hour = (int) $date->format('H');
$index = 0;
if ($hour > 18) {
    $index = 2;
} else if ($hour > 12) {
    $index = 1;
}

$statement = 'Hi! I am the server in '. $date->getTimezone()->getName()
    . '. Here it is ' . $date->format('H:i')
    . '. So, ' . $greetings[$index];
