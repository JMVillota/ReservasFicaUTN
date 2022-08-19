<?php
$host     = 'bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com';
$username = 'uobaba3u7tzwepfv';
$password = 'VnpoDdEI73A3gZL3GaUd';
$dbname   ='bmfmhv5m3p9lyxmjs6du';

$conn = new mysqli($host, $username, $password, $dbname);
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}