<?php

function PrepararURL()
{
    require_once('../control/model/authorization.php');
    $autorizarion = new Authorization;
    $url = [];

    $keys = $autorizarion->GetKeys();

    $url['url_base'] = 'https://gateway.marvel.com:443/v1/public/';
    $url['autorizacaobase'] = '?ts=' . $keys['timestamp'] . '&apikey=' . $keys['public'] . '&hash=' . $keys['hash'];

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
            $allParams = $allParams . '&' . $param . '=' . str_replace(' ', '%20', trim($value));
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

    return $response = json_decode($response);

    if (!is_null($response) && $response->code == 200) {
        return $response;
    } elseif (is_null($response)) {
        return '<b>Erro PROC02</b><br>Ocorreu um erro com a requisição. Por favor, entre em contato com os desenvolvedores!';
    } elseif (isset($response->code)) {
        return $response->message;
    } elseif (isset($response->status) && $response->status == 'Error') {
        return $response->code;
    } else {
        return null;
    }
}

function TraduzirTexto(string $texto)
{
    if ($texto != ' ' && $texto != '') {

        $texto = trim(substr($texto, 0, 100));
        $textoSemEspaco = str_replace(' ', '%20', $texto);

        $url = 'https://api.mymemory.translated.net/get?langpair=en-us|pt-br&q=';

        $urlPrepare = $url . $textoSemEspaco;

        $ch = curl_init($urlPrepare);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);

        if (isset($response->responseStatus) && $response->responseStatus == 200) {
            return trim($response->responseData->translatedText);
        } else {
            return $texto;
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
        $sizeName = '-' . $size;
    } else {
        $sizeName = '';
    }

    $imagename = basename($path . $sizeName . '.' . $extension);
    
    $caminho =  'images/content/' . $imagename;

    if (file_exists('images/content/' . $imagename)) {
        return $caminho;
    } else {
        if ($size != '') {
            $size = '/' . $size;
        }
        $url = PrepararURL();
        $urlPrepare = $path . $size . '.' . $extension . $url['autorizacaobase'];
        $image = GetImage($urlPrepare);
        file_put_contents('images/content/' . $imagename, $image);
        return $caminho;
    }
}

function RefreshNumbers(string $categoria, int $valor)
{
    if (file_exists('../config/statistics.txt')) {
        $arquivo = fopen('../config/statistics.txt', 'r');
        $novoArq = '';
        while ($linha = fgets($arquivo, 1024)) {
            $linhaExplodida = explode('=', $linha);
            if ($linhaExplodida[0] == $categoria) {
                $novoArq = ($novoArq . $categoria . '=' . $valor) . PHP_EOL;
            } else {
                $novoArq = $novoArq . $linha;
            }
        }
        fclose($arquivo);
        $arquivo = fopen('../config/statistics.txt', 'w+');
        fwrite($arquivo, $novoArq);
        fclose($arquivo);
        return true;
    } else {
        return false;
    }
}

function GetNumbers()
{
    $statistics = [];
    if (file_exists('../config/statistics.txt')) {
        $arquivo = fopen('../config/statistics.txt', 'r');
        while ($linha = fgets($arquivo, 1024)) {
            $linhaExplodida = explode('=', $linha);
            switch ($linhaExplodida[0]) {
                case 'creators':
                    $statistics['creators'] = $linhaExplodida[1];
                    break;
                case 'stories':
                    $statistics['stories'] = $linhaExplodida[1];
                    break;
                case 'events':
                    $statistics['events'] = $linhaExplodida[1];
                    break;
                case 'characters':
                    $statistics['characters'] = $linhaExplodida[1];
                    break;
                case 'comics':
                    $statistics['comics'] = $linhaExplodida[1];
                    break;
                case 'series':
                    $statistics['series'] = $linhaExplodida[1];
                    break;
            }
        }
        return $statistics;
    } else {
        return false;
    }
}
