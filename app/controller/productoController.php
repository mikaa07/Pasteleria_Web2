<?php
require_once './app/model/productoModel.php';
require_once './app/view/productoView.php';
require_once './helper/loginHelper.php';
require_once './app/view/loginView.php';
require_once './app/model/variedadModel.php';
class productoController{
    
    private $model;
    private $view;
    private $view_user;
    private $helper;
    private $model_producto;

    public function __construct(){
        $this->model = new productoModel();
        $this->view = new productoView();
        $this->helper = new loginHelper();
        $this->model_materia = new variedadModel();
        $this->view_user = new loginView();

    }


    public function showHome(){
        $productos = $this->model->getAllProducts();
        $this->view->showHome($productos);
    }

    public function formProducto(){
        $isAdmin = $this->helper->checkLoggedIn();
        var_dump($isAdmin);
        $variedades = $this->productoModel->getVariedad();
        $this->view->renderFormProducto($productos, $isAdmin);
    }

    public function addProducto(){
        if (isset($_POST['nombre_producto'], $_POST['precio'], $_POST['id_variedad'])) {
            if (!$this->searchForMatches())
                $this->model->addProducto($_POST['nombre_producto'], $_POST['precio'], $_POST['id_variedad']);
                $this->view->showLocationToAddFormProductos();
        }
    }

    private function searchForMatches(){
        $producto = $this->model->searchForMatches($_POST['id_producto'], $_POST['nombre_producto']);
        return !empty($producto);
    }

    public function showTableOfProductos(){
        $isAdmin = $this->helper->checkLoggedIn();
        $tablaProductos = $this->model->getTableProducto();
        $this->view->renderTableProductos($isAdmin, $tablaProductos);
    }


    public function deleteProducto($id_variedad){
        $isAdmin = $this->helper->checkLoggedIn();
        if ($isAdmin == true) {
            $variedadesAsociadas = $this->model_producto->searchIdVariedadByTableProductos($id_variedad);
         
            if (count($variedadesAsociadas) == 0) {
                $this->model->deleteProducto($id_producto);
                $this->view->renderTableOfLocationProductos();
            } else {

                $tablaProductos =  $this->model->getTableProducto();
                $this->view->renderTableProductos($isAdmin, $tablaProductos, "El producto no se puede borrar porque tiene asociada una variedad");
            }
        } else {
            $this->view_user->renderLogin();
        }
    }

    public function editProducto($id_producto)
    {
        $isAdmin = $this->helper->checkLoggedIn();
        if ($isAdmin == true) {
            $this->model->editProducto($_POST['nombre_producto'], $_POST['precio'], $_POST['id_variedad'], $id_producto);
            $this->view->renderTableOfLocationProductos();
        } else {
            $this->view_user->renderLogin();
        }
    }
    
    
}