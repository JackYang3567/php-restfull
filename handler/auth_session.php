<?php
 require '../libs/Smarty.class.php';

 //session_start();

class AuthSession {
    public $pdo;
    public $smarty;

    // determine login status
    public $loggedIn ;
    public $loggedAdmin;
    public $loggedMember;
    // session thumbprint
    public $thumbPrint ;
    public $storedPrint ;
    function __construct(){
	    
        //$this->pdo = new Conn();
        session_start();
        session_regenerate_id();
        $this->loggedIn = $_SESSION['isLoggedIn'] ?? FALSE;
        $this->loggedAdmin = $_SESSION['admin'] ?? 'guest';

        $this->loggedMember = $_SESSION['member'] ?? 'guest';

        // session thumbprint
        $this->thumbPrint = md5($_SERVER['REMOTE_ADDR']
                    . $_SERVER['HTTP_USER_AGENT']
                    . $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $this->storedPrint = $_SESSION['thumbprint'] ?? '';

        $this->smarty = new Smarty;
    }


     public function render($tpl='index.tpl',$data)
    {
         //$smarty->force_compile = true;
            //$this->smarty->debugging = true;
            //$this->smarty->caching = true;
            $this->smarty->cache_lifetime = 120;
            $this->smarty->assign("Name", "GK数据API", true);
            $this->smarty->assign("context", $data);

            $this->smarty->display($tpl);
    }

}