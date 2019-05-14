<?php
    require_once '../restler/restler.php';
    #set autoloader
    #do not use spl_autoload_register with out parameter
    #it will disable the autoloading of formats
    //spl_autoload_register('spl_autoload');
    require_once 'lotterytype.php';
    $r = new Restler();
    $r->setSupportedFormats('JsonFormat');
    $r->addAPIClass('LotteryType');
    $r->handle();