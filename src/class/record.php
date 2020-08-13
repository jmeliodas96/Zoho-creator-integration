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
  
  
  // get records
  public function getEmployees(){

    $refrehsToken = "1000.b197a12d7fe7fb0ef6fce151956b2cda.d6694393b2526027619e960c9cd5c645";
    $headers = array(
      'Authorization: Zoho-oauthtoken '.$refrehsToken    
    );

    $this->curl->setHeader('Authorization', 'Zoho-oauthtoken '.$refrehsToken);
    $this->curl->get('https://creator.zoho.com/api/v2/jmena0396/order-management/report/MenaOrder_Report');

    // var_dump($this->curl->requestHeaders);

    if ($this->curl->error) {
        echo 'Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n";
    } else {
        // echo 'Response:' . "\n";
        // var_dump($this->curl->response);
        
        $response = $this->curl->response;
        return $response;
    }    

  } 



}

?>