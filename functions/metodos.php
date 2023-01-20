<?php

//GET
function get(){

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://reqres.in/api/users/2');

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_error($ch)) {
    echo curl_error($ch);
} else {
    $decoded = json_decode($response, true);
}

var_dump($decoded);
curl_close($ch);
}

function post(){
    $ch = curl_init();

$array = [
    'name' => "Axel",
    'job' => "Programmer"
];

$data = http_build_query($array);

curl_setopt($ch, CURLOPT_URL, 'https://reqres.in/api/users');
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

if(curl_error($ch)){
    echo curl_error($ch);
}else{
    $decoded = json_decode($response,true);
}

foreach($decoded as $index => $value){
    echo "$index $value <br>";
}
curl_close($ch);
}

function patch(){
    //PUT

$ch = curl_init();

$array = [
    'name' => "Axel",
    'job' => "Programmer"
];

$data = json_encode($array);

curl_setopt($ch, CURLOPT_URL, 'https://reqres.in/api/users/2');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if (curl_error($ch)) {
    echo curl_error($ch);
} else {
    $decoded = json_decode($response, true);
}

foreach ($decoded as $index => $value) {
    echo "$index: $value <br>";
}
curl_close($ch);


}