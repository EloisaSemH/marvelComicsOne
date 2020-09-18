<?php

function PrepararURL()
{
    require_once('../control/model/authorization.php');
    $autorizarion = new Authorization;
    $url = [];
    
    $keys = $autorizarion->GetKeys();

    $url['url_base'] = 'https://gateway.marvel.com:443/v1/public/';
    $url['autorizacaobase'] = '?ts='. $keys['timestamp'] . '&apikey='. $keys['public'] . '&hash=' . $keys['hash'];
    
    return $url;
}


function GetResposeApi(string $categoria, $queryParams = '')
{
    $url = PrepararURL();
    $urlPrepare = $url['url_base'] . $categoria . $url['autorizacaobase'] . $queryParams;
    $response = file_get_contents($urlPrepare);
    return $response;
}
