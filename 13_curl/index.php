<?php

$url = 'https://jsonplaceholder.typicode.com/users';
// // Sample example to get data.
// $resource = curl_init($url);
// curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($resource);

// curl_close($resource);

// // Get response status code
// $code = curl_getinfo($resource, CURLINFO_HTTP_CODE);

// echo '<pre>';
// var_dump($code);
// echo '</pre>';
// echo $result;

$resource = curl_init();

$user = [
    'name' => 'John Doe',
    'username' => 'john',
    'email' => 'john@example.com'
];

curl_setopt_array($resource, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($user),
    CURLOPT_HTTPHEADER => array('Content-Type: application/json')
]);
$result = curl_exec($resource);
curl_close($resource);
echo '<pre>';
var_dump ($result);
echo '</pre>';