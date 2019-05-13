<?php
 
    //引入restler库
    require_once './restler/restler.php';
    //require_once 'say.php';
    require_once 'api.php';
    $r = new Restler();
    //配置支持的返回数据格式,json,xml等
    //$r->setSupportedFormats('JsonFormat', 'XmlFormat');
    $r->setSupportedFormats('JsonFormat');
    //接口列表文件
    $r->addAPIClass('api');
     $r->handle();
     
 
?>
