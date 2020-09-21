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

/**
* Envia uma requisição para a API da Marvel
*
* @param string       $categoria Aceita as categorias "characters", "comics", "creators", "events", "series" e "stories".
*
* @param string|array $queryParams    Parâmetros para a pesquisa como "name", "nameStartsWith", "title" etc. Exemplo:
*                                     array (
*                                        'nameStartsWith' => 'Spider',
*                                        'orderBy' => '-name'
*                                     )
*/
function GetResposeApi(string $categoria, $queryParams = null)
{
    if (is_array($queryParams)) {
        $allParams = '&';
        foreach ($queryParams as $param => $value) {
            $allParams = $allParams . '&' . $param . '=' . $value;
        }
    } elseif (is_string($queryParams)) {
        $allParams = '&' . $queryParams;
    } else {
        $allParams = '';
    }

    $url = PrepararURL();
    $urlPrepare = $url['url_base'] . $categoria . $url['autorizacaobase'] . $allParams;

    $ch = curl_init($urlPrepare);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $response = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($response);

    if (!is_null($response) && $response->code == 200) {
        return $response->data->results;
    } elseif (is_null($response)) {
        return '<b>Erro PROC02</b><br>Ocorreu um erro com a requisição. Por favor, entre em contato com os desenvolvedores!';
    } elseif ($response->status == 'Error') {
        return $response->code;
    } else {
        return $response;
    }
}

function TraduzirTexto(string $texto)
{
    if ($texto != ' ' && $texto != '') {
        $url = 'https://api.mymemory.translated.net/get?langpair=en-us|pt-br&q=';

        $urlPrepare = $url . $texto;

        $ch = curl_init($urlPrepare);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);

        if (!is_null($response) && !$response->quotaFinished && !$response->responseStatus == 200) {
            return $response->matches->translation;
        } elseif (is_null($response)) {
            return '<b>Erro PROC03</b><br>Ocorreu um erro com a requisição. Por favor, entre em contato com os desenvolvedores!';
        } elseif ($response->quotaFinished) {
            return '<b>Erro PROC03.2</b><br>O limite de traduções foi atingido!';
        } elseif (!is_null($response->exception_code)) {
            return $response->exception_code;
        } else {
            return $response;
        }
    }
}

function GetImage(string $url)
{
    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';
    $headers[] = 'Connection: Keep-Alive';
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
    $useragent = 'php';
    $process = curl_init($url);
    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($process, CURLOPT_HEADER, 0);
    curl_setopt($process, CURLOPT_USERAGENT, $useragent);
    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
    $return = curl_exec($process);
    curl_close($process);
    return $return;
}

function SaveImage(string $path, string $extension, $size = '')
{
    if ($size != '') {
        $size = '/' . $size;
    }

    $url = PrepararURL();
    $urlPrepare = $path . $size . '.' . $extension . $url['autorizacaobase'];

    $imagename= basename($path.'.'.$extension);
    if (file_exists('./'.$imagename)) {
        echo 'a';
    }
    $image = GetImage($urlPrepare);
    file_put_contents('./'.$imagename, $image);
    
    var_dump();
}
