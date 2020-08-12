<?php


use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
use zcrmsdk\oauth\ZohoOAuth;
use zcrmsdk\oauth\exception\ZohoOAuthException;
use zcrmsdk\oauth\utility\ZohoOAuthConstants;


require_once __DIR__ . '/../vendor/autoload.php';

class novazysCrm
{
    
    public function __construct()
    { 
        $client_id = "1000.6K59NCI8M4Q58BO2S5BS79VDWDJZYT";
        $client_secret = "82faf338a3454ae7ace6905c9d1c341e9247e5edc9";
        $redirect_url = "https://accounts.zoho.com";
        $user_email_id = "jmena0396@gmail.com";
        $apiBaseUrl = "https://developer.zohoapis.com/crm/v2/";
        

        $_SERVER["user_email_id"] = $user_email_id;
        // $acces_type = "authorization_code";
        
        $configuration =array("client_id"=> $client_id,"client_secret"=> $client_secret, "redirect_uri"=> $redirect_url,"currentUserEmail"=> $user_email_id, "apiBaseUrl" => $apiBaseUrl);
        
        ZCRMRestClient::initialize($configuration);
        // ZCRMRestClient->setCurrentUser()
        $oAuthClient = ZohoOAuth::getClientInstance();
        $grantToken = "1000.0aa18121c8fe84aedeb7ee4e70356eaa.dad5acec79b6a777bb70be15c47ae4d0";
        $oAuthTokens = $oAuthClient->generateAccessToken($grantToken);
        echo (" >> ".$oAuthTokens);
    
    }
    
    public function getAllModules()
    {
        $rest = ZCRMRestClient::getInstance(); // to get the rest client
        $modules = $rest->getAllModules()->getData(); // to get the the modules in form of ZCRMModule instances array
     
    }
    

}

$obj = new novazysCrm();//object of the class

// $obj->getOrganizationDetails();//function call