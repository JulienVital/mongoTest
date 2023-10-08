<?php

use MongoDB\Client;

require __DIR__ . '/vendor/autoload.php';

$local_conf = getenv();
define('DB_USERNAME', $local_conf['DB_USERNAME']);
define('DB_PASSWORD', $local_conf['DB_PASSWORD']);
define('DB_HOST', $local_conf['DB_HOST']);

$db_client = new Client('mongodb://'. DB_USERNAME .':' . DB_PASSWORD . '@'. DB_HOST . ':27017/');
$collection = $db_client->selectDatabase('documentCustom');


$document = $collection->document->findOne(['id' => "1"]);

if($document){

    echo(json_encode($document));
    die;
}

$jsonDocument = json_decode(file_get_contents(__DIR__ ."/document.json"),true);


$insertOneResult = $collection->document->insertOne($jsonDocument);
var_dump($insertOneResult);
