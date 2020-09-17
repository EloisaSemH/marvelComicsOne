<?php
class AuthAPI
{
    private $privatekey;
    private $publickey;
    private $timestamp;

    function setPrivateKey($privatekey){  
        $this->privatekey = $privatekey;
    }

    function getPrivateKey(){
        return $this->privatekey;
    }

    function setPublicKey($publickey){  
        $this->publickey = $publickey;
    }

    function getPublicKey(){
        return $this->publickey;
    }

    function setTimestamp($timestamp){  
        $this->timestamp = $timestamp;
    }

    function getTimestamp(){
        return $this->timestamp;
    }
}
