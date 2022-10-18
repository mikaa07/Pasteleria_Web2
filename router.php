<?php
require_once './app/controller/productoController.php';
require_once './app/controller/variedadController.php';
require_once './app/controller/loginController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'home';

    $params = explode('/', $action);

//instancio los controles que voy a usar
$productoController = new productoController();
$variedadController = new variedadController();
$loginController = new loginController();

switch ($params[0]){

    case 'home':
        if (!isset($params[1]))
            $productoController->showHome($params);
            $variedadController->showHome($params);
            break;

    case 'productos':
        if (!isset($params[1]))
            $productoController->showHome($params);
        else
            $productoController->showHome();
        break;

    case 'variedades':
        if (!isset($params[1]))
            $variedadController->showHome($params);
        else
            $variedadController->showHome();
        break;

    case 'login':
        $loginController->showLogin();
        break;

    case 'logout':
        $loginController->logOut();
        break;

    case 'verify':
        $loginController->verifyLogin();
        break;

    case 'agregarproducto':
        $productoController->formProducto();
        break;

    case 'agregarvariedad':
        $variedadController->formVariedad();
        break;

    case 'agregar-producto':
        $productoController->addProducto();
        break;

    case 'agregar-variedad':
        $variedadController->addVariedad();
        break;


    case 'tablaproductos':
        $productoController->showTableOfProductos();
        break;

    case 'tablavariedades':
        $variedadController->showTableOfVariedades();
        break;

    case 'borrarproducto':
        if (isset($params[1]))
            $productoController->deleteProducto($params[1]);
        break;

    case 'borrarvariedad':
        if (isset($params[1]))
            $variedadController->deleteVariedad($params[1]);
        else
            $variedadController->redirectHome();
        break;

    case 'editarproducto':
        if (isset($params[1])) {
            $productoController->editProducto($params[1]);
        } else
            $productoController->showHome();
        break;

    case 'editarvariedad':
        if (isset($params[1]))
            $variedadController->editVariedad($params[1]);
        else
            $variedadController->redirectHome();
        break;



    default:
        echo "404 NOT FOUND";
        break;
}