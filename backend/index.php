<?php

    require_once '../restler/restler.php';
    #set autoloader
    #do not use spl_autoload_register with out parameter
    #it will disable the autoloading of formats
    require_once 'admin.php'; 
    $r = new Restler();
    $r->addAPIClass('Admin');
    $r->handle();

