<?php

require_once('../control/model/authorization.php');
$autorizarion = new Authorization; 


$urlMarvel = 'https://gateway.marvel.com:443/v1/public/';

$keys = $autorizarion->GetKeys();
$hash = $autorizarion->CreateHash();

var_dump($keys);
var_dump($hash);