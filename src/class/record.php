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

    $redirect_url = "https://accounts.zoho.com";
    $user_email_id = "user1@demo1.novazys.com";
    $apiVersion = "v2";
    $apiBaseUrl = "https://developer.zohoapis.com";

    $configuration =array("client_id"=> $client_id,"client_secret"=> $client_secret, "redirect_uri"=> $redirect_url,"currentUserEmail"=> $user_email_id, "apiBaseUrl" => $apiBaseUrl, "apiVersion" => $apiVersion);


    // Generate access token and refresh token  
    ZCRMRestClient::initialize($configuration);
    $oAuthClient = ZohoOAuth::getClientInstance();
    $userIdentifier = "user1@demo1.novazys.com";
    

    // refreshAccessToken
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
