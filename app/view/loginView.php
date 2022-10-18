<?php
require_once './libs/smarty-master/libs/Smarty.class.php';

class loginView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    public function showHome(){
        header("Location: ".BASE_URL."home");
    }  

    public function renderLogin($error = null){
        $this->smarty->assign("error", $error);
        $this->smarty->display("templates/formLogin.tpl");
    }


    public function renderPanel($isAdmin,$aviso="",$users=""){
        $this->smarty->assign('isAdmin', $isAdmin);
         $this->smarty->assign('users', $users);
         $this->smarty->assign('aviso', $aviso);
         $this->smarty->display("templates/panel.tpl");
     }



}
