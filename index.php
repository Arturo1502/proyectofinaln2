<?php

session_start();
if (isset($_SESSION['userData'])) {
    $userData = $_SESSION['userData'];


    $maestro = ['Clases' => ['icon' => 'fas fa-graduation-cap', 'url' => 'index.php?controller=LoginMaestroController&action=index']];
    $admin = [
        'Permisos' => ['icon' => 'fas fa-user-lock', 'url' => 'index.php?controller=PermisosController&action=index'],
        'Maestros' => ['icon' => 'fas fa-chalkboard-user', 'url' => 'index.php?controller=MaestroController&action=index'],
        'Clases' => ['icon' => 'fas fa-chalkboard', 'url' => 'index.php?controller=MateriaController&action=index']
    ];

    if ($userData['rol_id'] === 1) {
        $menu = $admin;
    } else if ($userData['rol_id'] === 2) {
        $menu = $maestro;
    }
} else {
    echo 'error en datos de credenciales';
    header('location: ./Views/login.php');
}



require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/header.php';

if (isset($_GET['action']) && isset($_GET['controller'])) {

    require_once './Controllers/' . $_GET['controller'] . '.php';

    $controller = new $_GET['controller'];

    $controller->{$_GET['action']}();
} else {
    require_once './Views/dashboard.php';
}
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/footer.php';
