<?php
require_once './app/model/variedadModel.php';
require_once './app/view/variedadView.php';
require_once './helper/loginHelper.php';
require_once './app/view/loginView.php';
require_once './app/model/productoModel.php';

class variedadController{

    private $model;
    private $view;
    private $view_user;
    private $helper;
    private $model_variedad;

    public function __construct(){
        $this->model = new variedadModel();
        $this->view = new variedadView();

    }

    public function showHome(){
        $variedades = $this->model->getAllVarieties();
        $this->view->showHome($variedades);
    }

    public function redirectHome(){
        $this->view->showHome();
    }

    public function formVariedad(){
        $isAdmin = $this->helper->checkLoggedIn();
        $this->view->FormAddVariedad("",$isAdmin);
    }

    public function addVariedad(){
          $isAdmin = $this->helper->checkLoggedIn();
        
            if (!empty($_POST['nombre_variedad'])) {
                $this->model->addVariedad($_POST['nombre_variedad']);
                $this->view->showLocationToAddFormVariedad();
            
        }else{
           $this->view->formAddVariedad("faltan completar campos",$isAdmin);
        }
    }

    public function showTableOfVariedades(){
            $isAdmin = $this->helper->checkLoggedIn();
            $tablasVariedades = $this->model->getTableOfVariedades();
            $this->view->renderTableVariedades($tablasVariedades, $isAdmin);
        }

        public function deleteSubject($id){
        $isAdmin = $this->helper->checkLoggedIn();
        if ($isAdmin == true) {
            $this->model->deleteVariedad($id);
            $this->view->renderTableOfLocationVariedades();
        }
    }


    public function editVariedad($id_variedad)
    {
        $isAdmin = $this->helper->checkLoggedIn();
        if ($isAdmin == true) {
            $this->model->editVariedad($_POST['nombre_variedad'], $id_variedad);
            $this->view->renderTableOfLocationVariedades();
        } else {
            $this->view_user->renderLogin();
        }
    }
}