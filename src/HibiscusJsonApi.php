<?php

namespace Hibiscus;

use \GuzzleHttp\Client;

class HibiscusJsonApi{
    private $hostname;
    private $port;
    private $username;
    private $password;
    private $http_client;
    private $response;

    public function __construct($hostname = 'localhost', int $port = 8080, $username, $password, bool $verify_ssl = true){
        $this->hostname = $hostname;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->http_client = new Client(['base_uri' => 'https://' . $this->hostname . ':' . $this->port . '/webadmin/rest/hibiscus/', 'verify' => $verify_ssl]);
    }

    private function process($method){
        $response = $this->http_client->get($method, ['auth' =>  [$this->username, $this->password]]);
        
        if($response->getStatusCode() == 200){
            $this->response = json_decode($response->getBody());
            return true;
        }

        unset($this->response);
        return false;
    }

    public function transactionsByDays(int $account_id, int $days = 30){
        return $this->process('konto/' . $account_id . '/umsaetze/days/' . $days);
    }

    public function getResponse(){
        return $this->response;
    }
}