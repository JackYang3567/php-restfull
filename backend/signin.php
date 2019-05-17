<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require '../libs/Smarty.class.php';
require_once '../admin/admin.php';
session_start();

$admin = new Admin();
$smarty = new Smarty;
//$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
$smarty->assign("Name", "登录", true);
$smarty->display('signin.tpl');
      




