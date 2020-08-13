<?php

/*
  1. Make api works online - zoho creator (Create and delete)
  
  2. Create methods > get, create
    2.1 Send request
    2.2 Make validations
    2.3 return response
  3. Handle access token and refresh token 


*/

// use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
// use zcrmsdk\oauth\ZohoOAuth;
// use zcrmsdk\oauth\exception\ZohoOAuthException;
// use zcrmsdk\oauth\utility\ZohoOAuthConstants;


//   require_once __DIR__ . '/../vendor/autoload.php';

// class novazysCrm
// {
    
//     public function __construct()
//     { 
//         $client_id = "1000.6K59NCI8M4Q58BO2S5BS79VDWDJZYT";
//         $client_secret = "82faf338a3454ae7ace6905c9d1c341e9247e5edc9";
//         $redirect_url = "https://accounts.zoho.com";
//         $user_email_id = "jmena0396@gmail.com";
//         $apiVersion = "v2";
//         $apiBaseUrl = "https://developer.zohoapis.com";
        

//         $_SERVER["user_email_id"] = $user_email_id;
//         // $acces_type = "authorization_code";
        
        // $configuration =array("client_id"=> $client_id,"client_secret"=> $client_secret, "redirect_uri"=> $redirect_url,"currentUserEmail"=> $user_email_id, "apiBaseUrl" => $apiBaseUrl, "apiVersion" => $apiVersion);
        
        
        // Generate access token and refresh token
        // ZCRMRestClient->setCurrentUser()
        // ZCRMRestClient::initialize($configuration);
        // $oAuthClient = ZohoOAuth::getClientInstance();

        // Generate by grant token
        // $grantToken = "1000.2bb23a290e13a75f8a538d9dc22fa74c.2e5d13dd396a3d55ee3233c052cdbaeb";
        // $oAuthTokens = $oAuthClient->generateAccessToken($grantToken);

        // Generate by refresh token
        // $refreshToken = "";
        // $userIdentifier = "provide_user_identifier_like_email_here";
        // $oAuthTokens = $oAuthClient->generateAccessTokenFromRefreshToken($refreshToken,$userIdentifier);


        // echo (" >> ".$oAuthTokens);
    
    // }
    
//     public function getAllModules()
//     {   

      
//         $rest = ZCRMRestClient::getInstance(); // to get the rest client
//         $modules = $rest->getAllModules()->getData(); // to get the the modules in form of ZCRMModule instances array

//         var_dump($modules);

     
//     }
    

// }

// $obj = new novazysCrm();//object of the class

// $obj->getAllModules();//function call

?>