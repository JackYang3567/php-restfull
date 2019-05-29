<?php

    //// 准许跨域请求。
    header("Access-Control-Allow-Origin: * ");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
    /**
     * 浏览器第一次在处理复杂请求的时候会先发起OPTIONS请求。路由在处理请求的时候会导致PUT请求失败。
     * 在检测到option请求的时候就停止继续执行
     */
    if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        exit;

    }
    
    require_once '../restler/restler.php';
    #set autoloader
    #do not use spl_autoload_register with out parameter
    #it will disable the autoloading of formats
    require_once 'member.php';
    $r = new Restler();
    $r->setSupportedFormats('JsonFormat');
    $r->addAPIClass('Member');
    $r->handle();
   