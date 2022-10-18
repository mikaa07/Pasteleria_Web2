<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class variedadView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
        
    }

    
    function showHome($variedades) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($variedades)); 
        $this->smarty->assign('variedades', $variedades);
        // mostrar el tpl
        $this->smarty->display('varietyList.tpl');
    }

    public function formAddVariedad($aviso="",$isAdmin=""){
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('aviso', $aviso);
        $this->smarty->display("templates/ingresarvariedad.tpl");
    }

    public function showLocationToAddFormVariedad(){
        header("Location: ".BASE_URL."agregarvariedad");   
    }

    public function renderTableVariedades($tablaVariedades,$isAdmin){    
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('tablaVariedades', $tablaVariedades);
        $this->smarty->display("templates/editarborrarvariedad.tpl");
    }

    public function renderTableOfLocationVariedades(){
        header("Location: " . BASE_URL . "tablavariedades");
    }
}