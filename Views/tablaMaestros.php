<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad </title>



    <script src="/JS/main.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
<style>
    .table {
        width: 90%;
        margin: 20px auto;
        padding: 0;
    }

    .nav {
        background-color: #007bff;
        border: 10px solid red;
        height: 40px;
        text-align: left;
    }

    body {
        background-color: #F5F6FA;
    }

    .kk {
        display: flex;
        background-color: #FEBF06;
        width: 110px;
        height: 24px;
        padding-left: 4px;
        border-radius: 10px;
    }

    /* Dropdown container - needed to position the dropdown content */
    .dropdown {
        float: left;
        overflow: hidden;

    }


    /* Style the dropdown button to fit inside the topnav */
    .dropdown .dropbtn {
        font-size: 17px;
        border: none;
        outline: none;
        color: #333333;
        padding: 10px 12px;
        background-color: inherit;
        font-family: inherit;
        margin-right: 20px;
    }


    /* Style the dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        position: fixed;
        top: 50px;
        right: 20px;
        background-color: #f9f9f9;
        min-width: 160px;
        border-radius: 12px;
        border: solid 1px #E0E0E0;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.1);
        z-index: 1;
    }

    /* Style the links inside the dropdown */
    .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: flex;
        text-align: left;
        align-items: center;
        flex-direction: row;
        justify-content: flex-start;
    }

    .dropdown-content>.contenidoDrop {
        display: block;
        align-items: center;
        display: inline-block;
        margin: 14px 16px;
        font-family: 'Noto Sans', sans-serif;
    }

    .dropdown-content>.contenidoDrop>.logout {

        color: #EB5757;

    }


    .dropdown-content>.contenidoDrop>a>p {
        font-family: 'Noto Sans', sans-serif;
        font-weight: 400;
        margin: 10px;
    }

    /* Add a dark background on topnav links and the dropdown button on hover */
    .topnav a:hover,
    .dropdown:hover .dropbtn {
        background-color: #d6d6d6;

    }

    /* Add a grey background to dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
        color: black;
        border-radius: 12px;
    }

    .show {
        display: block;
    }
</style>

<body>
    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h2 class="titulo">Lista de Maestros</h2>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">

                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nuevo Usuario
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="../index.php?controller=AuthController&action=store" method="POST">
                            <div class="mb-3">
                                <label for="email"><strong>Correo Electronico</strong></label>
                                <input type="text" name="email" class="form-control" placeholder="Ingresa email">
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="nombre"><strong>Nombre(s)</strong></label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Ingresa nombre(s) ">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="apellido"><strong>Apellido(s)</strong></label>
                                <input type="text" name="apellido" class="form-control" placeholder="Ingresa apellido(s)">
                            </div>
                            <div class="mb-3">
                                <label for="password"><strong>Contraseña</strong></label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <label for="direccion"><strong>Direccion</strong></label>
                                <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                            </div>
                            <div class="mb-3">
                                <label for="fechaNacimiento"><strong>Fecha de Nacimiento</strong></label>
                                <input type="date" name='nacimiento' class="form-control" id="nacimiento">
                            </div>
                            <div class="mb-3">
                                <select name="rol_id" class="form-select">
                                    <option value="" disabled selected><strong>Seleccionar Rol</strong></option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Maestro</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="materia_id" id="materia_id">
                                    <option value="" disabled selected><strong>Seleccionar Asignatura</strong></option>
                                    <?php foreach ($materias as $materia) : ?>
                                        <option value="<?= $materia['id'] ?>"><?= $materia['materia']  ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            

                    </div>

                    <div class="text-center pb-4"> 
                        <button type="submit" class="btn btn-secondary">Enviar</button>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <table id="datatable_users" class="table table-striped">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Fec. de Nacimiento</th>
                        <th>Clase Asignada</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($data as $usuario) : ?>
                        <tr>
                            <td><?= $usuario['id'] ?></td>
                            <td><?= $usuario['nombre'] . " " . $usuario['apellido']  ?></td>
                            <td><?= $usuario['email'] ?></td>
                            <td><?= $usuario['direccion'] ?></td>
                            <td><?= $usuario['nacimiento'] ?></td>
                            <td><?php if (!isset($usuario['materia'])) : ?>
                                    <div class="kk">
                                        <p>Sin asignación</p>
                                    </div>
                                <?php else : ?>
                                    <?= $usuario['materia'] ?>

                                <?php endif ?>
                            </td>
                            <td>
                                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

                                <!-- JavaScript de Bootstrap (requiere jQuery) -->
                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


                                <a href="#" data-toggle="modal" data-target="#actualizarUsuario<?=$usuario['id'] ?>" class="fa-regular fa-pen-to-square" style="color: green;"></a>



                                <div class="modal fade" id="actualizarUsuario<?=$usuario['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="actualizarUsuarioLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="actualizarUsuarioLabel">Actualizar Usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="../index.php?controller=MaestroController&action=update&id=<?= $usuario['id'] ?> " method="POST">
                                                    <div class="mb-3">
                                                        <label for="email">Correo Electronico</label>
                                                        <input type="text" name="email" class="form-control" placeholder="Actualice su correo" value="<?= $usuario['email'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="mb-3">
                                                            <label for="nombre">Nombre(s)</label>
                                                            <input type="text" name="nombre" class="form-control" placeholder="Ingresa nombre(s) ">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="apellido">Apellidos(s)</label>
                                                        <input type="text" name="apellido" class="form-control" placeholder="Ingresa apellido(s)">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="direccion">Direccion</label>
                                                        <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="fechaNacimiento"><strong>Fecha de Nacimiento</strong></label>
                                                        <input type="date" name='nacimiento' class="form-control" id="nacimiento">
                                                    </div>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-secondary">enviar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <a href="../index.php?controller=MaestroController&action=destroy&id=<?= $usuario['id'] ?>" class="fa-solid fa-trash-can " style="color: rgb(170, 11, 11);;"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- Scripts JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable_users').DataTable({
                lengthMenu: [5, 10, 15, 20],
                searching: true,
                pageLength: 5
            });
        });
    </script>
</body>

</html>