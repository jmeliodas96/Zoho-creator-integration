<?php

// namespace class;
use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
use zcrmsdk\oauth\ZohoOAuth;
use zcrmsdk\oauth\exception\ZohoOAuthException;
use zcrmsdk\oauth\utility\ZohoOAuthConstants;
use Curl\Curl;

class record {

  public function __construct(){

    $curl = new Curl();
    $this->curl = $curl;

  }
  
  // get refresh token
  public function getRefreshToken(){

    $client_id = "1000.JYYT5YSHWFDU0C350KETGIU80MKTLR";
    $client_secret = "c6e21ba320f9afded6941c4a6b910ba5c9e32de6f6";

    $redirect_url = "https://accounts.zoho.com";
    $user_email_id = "user1@demo1.novazys.com";
    $apiVersion = "v2";
    $apiBaseUrl = "https://developer.zohoapis.com";

    $configuration =array("client_id"=> $client_id,"client_secret"=> $client_secret, "redirect_uri"=> $redirect_url,"currentUserEmail"=> $user_email_id, "apiBaseUrl" => $apiBaseUrl, "apiVersion" => $apiVersion);


    // Generate access token and refresh token  
    // ZCRMRestClient->setCurrentUser()
    ZCRMRestClient::initialize($configuration);
    $oAuthClient = ZohoOAuth::getClientInstance();
    // Generate by refresh token
    // $refreshToken = "1000.4f5dcdbca286fffc85e15856b0799746.bcf6c96899348ff60ba04da819528066";
    $userIdentifier = "user1@demo1.novazys.com";
    
    // Generate by grant token
    // $grantToken = "1000.2ab2f27f2b1a06ddaac903a91d834ca8.eec33fec761574089ccdf9ffaa3cbb6b";
    // $oAuthTokens = $oAuthClient->generateAccessToken($grantToken);

    // refreshAccessToken
    // $oAuthTokens = $oAuthClient->refreshAccessToken($refreshToken,$userIdentifier);
    $oAuthTokens = $oAuthClient->getAccessToken($userIdentifier);

    return $oAuthTokens;
  }
  
  // get records
  public function getPayments(){

    $token = $this->getRefreshToken();                                                       
    $this->curl->setHeader('Content-Type', 'application/json ');
    $this->curl->setHeader('Authorization', 'Zoho-oauthtoken '.$token);
    $this->curl->get('https://creator.zoho.com/api/v2/user1_demo115/evaluaci-n/report/Pago_Report');

    if ($this->curl->error) {
        // if token is expired, then refresh for be authenticate again 
        echo 'Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n";
    } else {
        $response = $this->curl->response;
        return $response;
    }    

  }


  // get records
  public function getClients(){

    $token = $this->getRefreshToken();                                                       
    $this->curl->setHeader('Content-Type', 'application/json ');
    $this->curl->setHeader('Authorization', 'Zoho-oauthtoken '.$token);
    $this->curl->get('https://creator.zoho.com/api/v2/user1_demo115/evaluaci-n/report/Cliente_Report');

    if ($this->curl->error) {
        // if token is expired, then refresh for be authenticate again 
        echo 'Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n";
    } else {
        $response = $this->curl->response;
        return $response;
    }    

  }

  // Create client
  public function createEmployee($object){

    $token = $this->getRefreshToken();
    $this->curl->setHeader('Content-Type', 'application/json ');
    $this->curl->setHeader('Authorization', 'Zoho-oauthtoken '.$token);
    $this->curl->post('https://creator.zoho.com/api/v2/user1_demo115/evaluaci-n/form/Cliente', $object);

    if ($this->curl->error) {
        // if token is expired, then refresh for be authenticate again 

        echo 'Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n";
    } else {        
        $response = $this->curl->response;
        return $response;
    }  
  } 


  // create payment
  public function createPayment($object){

    $token = $this->getRefreshToken();
    $this->curl->setHeader('Content-Type', 'application/json ');
    $this->curl->setHeader('Authorization', 'Zoho-oauthtoken '.$token);
    $this->curl->post('https://creator.zoho.com/api/v2/user1_demo115/evaluaci-n/form/Pago', $object);

    if ($this->curl->error) {
        // if token is expired, then refresh for be authenticate again 
        echo 'Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n";
    } else {        
        $response = $this->curl->response;
        return $response;
    }  
  } 




}

?>