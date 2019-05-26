<?php

require_once '../vendor/autoload.php';

$myFirstClass = new cs313\HelloWorld\HelloWorld\HelloWorld();
$greeting = $myFirstClass->greeting();

$persistence = new \cs313\Condominium\Infrastructure\Persistence();

$connection = $persistence->getConection();

$sql = "
    select * from condominium.person p
    join condominium.user u on u.id_person = p.id
    join condominium.person_skill ps on ps.id_person = p.id
    join condominium.skill s on s.id = ps.id_skill
";
$statement = $connection->prepare($sql);
$statement->execute();

$teste = $statement->fetchAll();
var_dump($teste); exit;

include 'hello.php';
