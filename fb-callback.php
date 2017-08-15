<?php

session_start();


require_once __DIR__ . '/inc/Facebook/autoload.php';

use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKExpection;


$_SESSION['FBRLH_state']=$_GET['state'];
$_SESSION['fb_access_token'] = (string) $accessToken;

$fb = new Facebook([
  'app_id' => 'app-id', //  your app id
  'app_secret' => 'app-secret', // Your app secret 
  'default_graph_version' => 'v2.10',
  ]);
  $helper = $fb->getRedirectLoginHelper();
try {
 
  $accessToken = $helper->getAccessToken();
  
  $response = $fb->get('/me?fields=id,name,email', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

echo 'Name: ' . $user['name'];
echo $user['email'];

 
?>
