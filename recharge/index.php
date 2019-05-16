<?php
    require_once '../restler/restler.php';
    #set autoloader
    #do not use spl_autoload_register with out parameter
    #it will disable the autoloading of formats
    //spl_autoload_register('spl_autoload');
    require_once 'recharge.php';
    $r = new Restler();
    $r->setSupportedFormats('JsonFormat');
    $r->addAPIClass('AccessToken');
    $r->handle();