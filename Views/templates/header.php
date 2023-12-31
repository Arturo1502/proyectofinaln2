<?php

// print_r($userData);
$user = '';
$titulo = '';
if ($userData['rol_id'] == 1) {
    $user = 'Administrador';
    $titulo = 'Admin';
} elseif ($userData['rol_id'] == 2) {
    $user = 'Maestro';
    $titulo = 'Maestro';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/board.css">
    <title>Universidad</title>
    <link rel="shortcut icon" href="/assets/logo.jpg">


    <script src="/JS/main.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/2ed691f658.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e40dfd2f11.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body>
    <div class="menu">
        <div class="dlogo">
            <img src="../assets/logo.jpg" class="logo" alt="">
            <p>Universidad</p>

        </div>
        <hr>
        <div class="role">
            <h3><?= $titulo ?></h3>
            <p><?= $user ?> </p>
        </div>
        <hr>
        <ul>
            <h4>Menu <?= $user ?></h4>
            <?php foreach ($menu as $key => $options) : ?>
                <li> <a href="<?= $options ?>"><?= $key ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <section class="main">
        <nav>
            <div class="home">
                <i class="fa-solid fa-bars"></i>
                <a href="index.php?">Home</a>
            </div>
            <div class="rigth">
                <p><?= $user ?></p>
            <div class="dropdown">
                <div class="contenidoDropDown">
                <button class="dropbtn" onclick="toggleDropdown()"><i id="flecha" class="fa fa-caret-down"></i></button>

                    <div class="dropdown-content" id="dropdown-content">
                        <div class="contenidoDrop">
                            <a href="index.php?" class="fa-solid fa-circle-user" style="color: #4f4e4e;"></i>
                                <p>Dashboard</p>
                            </a>
                            
                            <hr>
                            <a class="logout" href="index.php?controller=AuthController&action=logout"><span class="material-symbols-outlined">exit_to_app</span>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </nav>