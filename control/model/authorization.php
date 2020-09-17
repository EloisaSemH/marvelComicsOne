<?php

require_once('../control/classes/auth.class.php');

class Authorization
{
    private $authapi;
    
    public function __construct()
    {
        $this->authapi = new AuthApi;
    }

    private function SetKeys()
    {
        $keys = [];
        if (file_exists('../config/configkeys.txt')) {
            $arquivo = fopen('../config/configkeys.txt', 'r');
            while ($linha = fgets($arquivo, 1024)) {
                $linhaExplodida = explode('=', $linha);
                switch ($linhaExplodida[0]) {
                case 'timestamp':
                    $keys['timestamp'] = $this->authapi->setTimestamp($linhaExplodida[1]);
                    break;
                case 'private':
                    $keys['private'] = $this->authapi->setPrivatekey($linhaExplodida[1]);
                    break;
                case 'public':
                    $keys['public'] = $this->authapi->setPublickey($linhaExplodida[1]);
                    break;
                }
            }
            return true;
        }else{
            return false;
        }
    }

    public function GetKeys()
    {
        if ($this->SetKeys()){
            $keys = [];
            $keys['timestamp'] = $this->authapi->getTimestamp();
            $keys['private'] = $this->authapi->getPrivatekey();
            $keys['public'] = $this->authapi->getPublickey();
            return $keys;
        }else{
            return 'Erro ao setar keys';
        }
    }

    public function CreateHash()
    {
        $keys = $this->GetKeys();

        if(is_array($keys)){
            $hash = $keys['timestamp'] . $keys['private'] . $keys['public'];
            return md5($hash);
        }else{
            return 'Houve algum erro ao pegar as keys';
        }
    }
}
