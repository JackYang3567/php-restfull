<?php

    require_once '../handler/cors.php';
    
    require_once '../restler/restler.php';
    #set autoloader
    #do not use spl_autoload_register with out parameter
    #it will disable the autoloading of formats
    require_once 'member.php';
    $r = new Restler();
    $r->setSupportedFormats('JsonFormat');
    $r->addAPIClass('Member');
    $r->handle();
   