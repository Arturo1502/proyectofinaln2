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
    position: absolute;
    top: 60px;
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
    font-family: 'Noto Sans', sans-serif ;
}

.dropdown-content>.contenidoDrop>.logout {

    color: #EB5757;

}


.dropdown-content>.contenidoDrop>a>p{
    font-family:  'Noto Sans', sans-serif;
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

    <div class="row">
        
        <div class="col-12">
            <table id="datatable_users" class="table table-striped">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nombre del alumno</th>
                        <th>Calificacion</th>
                        <th>Mensajes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Carlos Quijano</td>
                        <td> </td>
                        <td>No hay mensajes</td>
                        <td></td>
                        <td>
                            <a class="fa-regular fa-pen-to-square" style="color: green;"></a>

                        </td>
                    </tr>

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
                pageLength: 10
            });
        });
    </script>
</body>

</html>