<?php
// We need the session to store the correct phrase for later check
session_start();
// Including the autoload (you need to composer install in the main directory)
require_once __DIR__.'/../vendor/autoload.php';
use Gregwar\Captcha\CaptchaBuilder;
// Creating the captcha instance and setting the phrase in the session to store
// it for check when the form is submitted
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$captcha = new CaptchaBuilder;

$captchaText = isset($_GET['type'] )? strtoupper($_GET['type']."-captcha") : strtoupper("captcha");

//$_SESSION['CAPTCHA']
//$_SESSION['FREE-CAPTCHA']
//$_SESSION['ADMIN-CAPTCHA']

$_SESSION[$captchaText] = $captcha->getPhrase();
$captchakey = $captchaText.":".strtoupper($captcha->getPhrase());
$redis->set($captchakey,1);
$redis->expire($captchakey,300);

// Setting the header to image jpeg because we here render an image
header('Content-Type: image/jpeg');
// Running the actual rendering of the captcha image
$captcha
    ->build()
    ->output()
;

