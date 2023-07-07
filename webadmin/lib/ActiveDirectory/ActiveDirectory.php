<?php

class ActiveDirectory
{

    public $URL_GET_ONE_ACCOUNT = 'https://www.dmcr.go.th/api/putApiOneAccount.php';
    // public $URL_OAUTH_ACCESS_TOKEN = 'http://oneaccount.dmcr.go.th/auth/v1/accessToken';
    // public $URL_GET_PROFILE = 'http://oneaccount.dmcr.go.th/auth/v1/getProfile';
    public $URL_OAUTH_ACCESS_TOKEN = '/auth/v1/accessToken';
    public $URL_GET_PROFILE = '/auth/v1/getProfile';
    public $URL_CHECK_USER = '/auth/v1/checkUser';
    public $client_key;
    public $client_secretkey;
    public $client_domain;
    public $client_ip;
    public $client_ip_router;

    public function __construct($client_key=null,$client_secretkey=null,$client_domain=null,$client_ip=null,$client_ip_router=null)
    {
        $this->client_key = $client_key;
        $this->client_secretkey = $client_secretkey;
        $this->client_domain = $client_domain;
        $this->client_ip = encodeStrOA($client_ip);
        // $this->client_ip_router = encodeStr($_SERVER['SERVER_ADDR']);
        $this->client_ip_router = encodeStrOA($client_ip_router);
        $this->client_time = encodeStrOA(time());
    }

    public function getURLOneAccount()
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL =>  $this->URL_GET_ONE_ACCOUNT,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_SSL_VERIFYPEER => false
        ));


        $response = curl_exec($curl);
        if($response === false)
        {
            $response = curl_error($curl);
        }

        curl_close($curl);
        $response = json_decode($response);
        if ($response->Result == true) {
          $this->URL_OAUTH_ACCESS_TOKEN = $response->data[0]->url.$this->URL_OAUTH_ACCESS_TOKEN;
          $this->URL_GET_PROFILE = $response->data[0]->url.$this->URL_GET_PROFILE;
          $this->URL_CHECK_USER = $response->data[0]->url.$this->URL_CHECK_USER;
        }else{
          $this->URL_OAUTH_ACCESS_TOKEN = 'http://oneaccount.dmcr.go.th/auth/v1/accessToken';
          $this->URL_GET_PROFILE = 'http://oneaccount.dmcr.go.th/auth/v1/getProfile';
          $this->URL_CHECK_USER = 'https://oneaccount.dmcr.go.th/auth/v1/checkUser';
        }
    }

    public function getTokenForLogin($username=null)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->URL_OAUTH_ACCESS_TOKEN,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "client_key=$this->client_key&client_secret=$this->client_secretkey&client_domain=$this->client_domain&client_ip=$this->client_ip&client_ip_router=$this->client_ip_router&client_time=$this->client_time&username=$username",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
          )
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function loginWebSite($username=null, $password=null, $token=null)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->URL_GET_PROFILE,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "username=$username&password=$password&client_key=$this->client_key&client_secret=$this->client_secretkey&client_domain=$this->client_domain&client_ip=$this->client_ip&client_ip_router=$this->client_ip_router&client_time=$this->client_time",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "Authorization: Bearer ".$token
          )
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public function checkUsername($username=null)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->URL_CHECK_USER,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "username=$username",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          )
        ));

        $response = curl_exec($curl);
        if($response === false){
            $response = curl_error($curl);
        }
        curl_close($curl);

        return $response;
    }
}

function encodeStrOA($variable) {
############################################
    $key = "xitgmLwmp";
    $index = 0;
    $temp = "";
    $variable = str_replace("=", "?O", $variable);
    for ($i = 0; $i < strlen($variable); $i++) {
        $temp .= $variable{$i} . $key{$index};
        $index++;
        if ($index >= strlen($key))
            $index = 0;
    }
    $variable = strrev($temp);
    $variable = base64_encode($variable);
    $variable = utf8_encode($variable);
    $variable = urlencode($variable);
    $variable = str_rot13($variable);
    // $variable = str_replace("%", "WewEb", $variable);
    return $variable;
}