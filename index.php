<html>
<head>
    <title></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />        
</head>
<body>

</body>
</html>

<?php
require_once 'model/database.php';

session_start();

if(isset($_SESSION['sesion_iniciada'])==true){        
    $controller = 'pedido';

    // Todo esta lógica hara el papel de un FrontController
    if(!isset($_REQUEST['c'])){
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;
        $controller->Index();    
    }else{
        // Obtenemos el controlador que queremos cargar
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

        // Instanciamos el controlador
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;

        // Llama la accion
        call_user_func( array( $controller, $accion ) );
    }
}else{
    echo "<p>No has iniciado sesion</p>";
    echo "<p>Haz click en el botón de abajo para dirigirte a la página de login</p>";
    echo "<a href='login.php' class=\"btn btn-info\">Iniciar sesión</a>";
}

?>