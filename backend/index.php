<?php

    require_once '../restler/restler.php';
    #set autoloader
    #do not use spl_autoload_register with out parameter
    #it will disable the autoloading of formats
    /*
    $_array =explode('/',$_SERVER["REQUEST_URI"]);
  
    $_className =$_array[3];
    $file = strtolower( $_className);
    $filefull = strtolower( $_className).'.php';
   
    if('admin.php'==$filefull){
        require_once 'admin.php';
    }else{
        $_path = '../'.$file.'/'. $filefull;
        //var_dump($_path);
        require_once  $_path; 
    }
   */
    require_once 'admin.php';
    $r = new Restler();
   // $r->addAPIClass($_className);
    $r->addAPIClass('Admin');
    $r->handle();

