<?php

require_once('functions/metodos.php');
require_once('autoload.php');

//get();
//post();
//patch();

use App\Classes\Curl;

$curl = new Curl('https://reqres.in/api/users');

$array = [
    'name' => 'Axel',
    'job' => 'Developer'
];

// $response = $curl->init()->setOption()->setOption(CURLOPT_POST,true)->buildQuery($array)->setOption(CURLOPT_RETURNTRANSFER,true)->decode()->fetch();

$response = $curl->init()
    ->setOption(CURLOPT_URL,$curl->getUrl())
    ->setOption(CURLOPT_SSL_VERIFYPEER, false)
    ->setOption(CURLOPT_POST, true)
    ->buildQuery($array)
    ->setOption(CURLOPT_RETURNTRANSFER, true)
    ->execute()
    ->decode()
    ->fetch();

echo "
<b>Id:</b>
 <br>";
 echo $response['id'];
 echo "<b>Name:</b>  
 <br> ";
 echo $response['name'];
 echo "<b>Job:</b>  
 <br>";
 echo $response['job'];
 echo "<b>Created at:</b> ";
 echo $response['createdAt'];





