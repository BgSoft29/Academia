<?php
    // echo DIRECTORY_SEPARATOR;
    // echo __dir__; -> C:\xampp\htdocs\dw2021-2\04 CMS\recursos
    # -> \
    # -> /
    # c:/xampp/app/public
    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
    
    
    // RUTAS RELATIVAS
    defined("TEMPLATE") ? null : define("TEMPLATE", "recursos/templates");

    // echo TEMPLATE_FRONT;

    // DEFINIR PARAMETROS DE CONEXION COMO CONSTANTES
    defined("DB_HOST") ? null : define("DB_HOST", "localhost");
    defined("DB_USER") ? null : define("DB_USER", "root");
    defined("DB_PASS") ? null : define("DB_PASS", "");
    defined("DB_NAME") ? null : define("DB_NAME", "academiabuttgenbach");

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


    require_once("funciones.php");

?>