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
    .subtitle {
        font-size: 1.2rem;
    }

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

    .rolAdmin {
        display: flex;
        background-color: #FCC118;
        color: #866001;
        width: 110px;
        height: 24px;
        padding-left: 4px;
        border-radius: 10px;
    }

    .rolMaestro {
        display: flex;
        background-color: #86C0CB;
        color: #D6FAFB;
        width: 70px;
        height: 24px;
        padding-left: 5px;
        border-radius: 10px;
    }

    .activo {
        display: flex;
        background-color: #2BA647;
        color: #fafffa;
        width: 58px;
        height: 24px;
        padding-left: 5px;
        border-radius: 10px;
    }

    .inactivo {
        display: flex;
        background-color: #DC3644;
        color: #fafffa;
        width: 70px;
        height: 24px;
        padding-left: 5px;
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

    .form-switch .form-check-input {
        margin-left: 0;
    }

    .form-check-label {
        margin-bottom: 0;
        margin-left: 40px;
    }

    .form-check-input:checked {
        background-color: #26A842;
        border-color: #26A842;
    }

    .form-check-input {

        background-color: #d35858;
        border: 1px solid rgb(28 3 3 / 25%);
    }
</style>

<body>
    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h2 class="titulo">Lista de Materias</h2>
            </div>
        </div>
    </div>

    <div>
        <h2 class="subtitle">Informacion de Permisos</h2>
    </div>
    <!-- Tu tabla existente -->
    <div class="row">
        <div class="col-md-11">
            <table id="datatable_users" class="table table-striped">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th class="text-center col-md-1">#</th>
                        <th class="col-md-4">Email</th>
                        <th class="col-md-2">Permiso</th>
                        <th class="col-md-2">Estado</th>
                        <th class="col-md-1">Acciones</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($data as $usuario) : ?>
                        <tr>
                            <td><?= $usuario['id'] ?></td>
                            <td><?= $usuario['email'] ?></td>
                            <td><?php if (($usuario['rol_id'] == 1)) : ?>
                                    <div class="rolAdmin">
                                        <p>Administrador</p>
                                    </div>
                                <?php else : ?>
                                    <div class="rolMaestro">
                                        <p>Maestro</p>
                                    </div>

                                <?php endif ?>
                            </td>
                            <td><?php if (($usuario['status'] == 1)) : ?>
                                    <div class="activo">
                                        <p>Activo</p>
                                    </div>
                                <?php else : ?>
                                    <div class="inactivo">
                                        <p>Inactivo</p>
                                    </div>

                                <?php endif ?>
                            </td>

                            <td>
                                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

                                <!-- JavaScript de Bootstrap (requiere jQuery) -->
                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


                                <a href="#" data-toggle="modal" data-target="#actualizarPermiso<?= $usuario['id'] ?>" class="fa-regular fa-pen-to-square" style="color: green;"></a>



                                <div class="modal fade" id="actualizarPermiso<?= $usuario['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="actualizarPermisoLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="actualizarPermisoLabel">Actualizar Permiso</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="../index.php?controller=PermisosController&action=update" method="POST">
                                                    <div class="mb-3">
                                                        <label for="email">Correo Electronico</label>
                                                        <input type="text" name="email" class="form-control" placeholder="Actualice su correo" value="<?= $usuario['email'] ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="rol_id">Rol del usuario</label>
                                                        <select class="form-select" name="rol_id" id="rol_id">
                                                            <option value="" disabled selected><strong>Rol del Usuario</strong></option>
                                                            <?php foreach ($roles as $rol) : ?>
                                                                <option value="<?= $rol['id'] ?>"><?= $rol['rol']  ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-10">
                                                        <div class="form-check form-switch">
                                                            <input type="hidden" name="status_actual" value="<?= $usuario['status'] ?>">
                                                            <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked" <?= ($usuario['status'] == 1) ? 'checked' : ''; ?>>
                                                            <label class="form-check-label" for="flexSwitchCheckChecked">
                                                                <?php echo ($usuario['status'] == 1) ? 'Usuario Activo' : 'Usuario Inactivo'; ?>
                                                            </label>
                                                        </div>
                                                    </div>


                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-secondary">enviar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


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