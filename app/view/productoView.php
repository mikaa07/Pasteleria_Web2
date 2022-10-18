<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class productoView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showHome($productos) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($productos)); 
        $this->smarty->assign('productos', $productos);

        // mostrar el tpl
        $this->smarty->display('productList.tpl');
    }

    public function renderFormProducto($productos,$isAdmin){
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->display("templates/ingresarproducto.tpl");
    }

    public function showLocationToAddFormProductos(){
        header("Location: " . BASE_URL . "agregarproducto");
    }

    public function renderTableProductos($isAdmin,$tablaProductos,$aviso=""){
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('tablaProductos', $tablaProductos);
        $this->smarty->assign('aviso', $aviso);
        $this->smarty->display("templates/editarborrarproducto.tpl");
    }

    public function renderTableOfLocationProductos(){
        header("Location: ".BASE_URL."tablaproductos");
    }
}