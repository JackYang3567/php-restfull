<?php
    require_once '../handler/cors.php';
    require_once '../restler/restler.php';
    #set autoloader
    #do not use spl_autoload_register with out parameter
    #it will disable the autoloading of formats
    //spl_autoload_register('spl_autoload');
    require_once 'payment.php';
    $r = new Restler();
    $r->setSupportedFormats('JsonFormat');
    $r->addAPIClass('Payment');
    $r->handle();