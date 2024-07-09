<?php include "templates/header.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Javooo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/materialize.css">

    <style>
    body {
        display: flex;
        flex-wrap: wrap;

        /* Cambia el color de fondo según tu preferencia */
    }

    main{
        flex: 1;
        min-width: 250px;
    }

    .main-container {
        margin-top: 20px;
        /* Ajusta el margen superior según tu preferencia */
    }

    .search-row {
        margin-bottom: 20px;
    }

    h2 {
        font-size: 2rem;
        color: #333;
    }

    label {
        font-size: 1rem;
    }

    select,
    input {
        width: 100%;
    }

    table {
        margin-top: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <main class="container main-container">
        <a class="waves-effect waves-light btn-large" type="submit" href="vinculacion.php">Regresar</a>
        <h2 class="center-align">Directorio de Escenarios</h2>

        <div class="row search-row">
            <div class="input-field col s12 m6 l4">
                <label for="num_registros" class="active">Mostrar:</label>
                <select name="num_registros" id="num_registros" class="browser-default">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="125">125</option>
                    <option value="150">150</option>
                </select>
            </div>

            <div class="input-field col s12 m6 l4">
                <label for="campo">Buscar:</label>
                <input type="text" name="campo" id="campo" class="validate">
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <table class="responsive-table striped highlight">
                    <thead>
                        <tr>
                            <th class="sort asc">Id</th>
                            <th class="sort asc">Escenarios</th>
                            <th class="sort asc">Encargado</th>
                            <th class="sort asc">Puesto</th>
                            <th class="sort asc">Calle</th>
                            <th class="sort asc">Colonia</th>
                            <th class="sort asc">Barrio</th>
                        </tr>
                    </thead>

                    <!-- El id del cuerpo de la tabla. -->
                    <tbody id="content"></tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m4">
                <label id="lbl-total"></label>
            </div>

            <div class="col s12 m4" id="nav-paginacion"></div>

            <input type="hidden" id="pagina" value="1">
            <input type="hidden" id="orderCol" value="0">
            <input type="hidden" id="orderType" value="asc">
        </div>

        <div class="div s12" id="6">
            <ul class="collapsible popout">
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>¡AGREGA MÁS ESCENARIOS!</div>
                    <div class="collapsible-body">
                            <form class="col s12" action="validar.php" method="post">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" class="validate" name="usuario">
                                    <label for="icon_prefix">Usuario</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="icon_telephone" type="password" class="validate" name="contra">
                                    <label for="icon_telephone">Contraseña</label>
                                </div>
                            </div>
                                <center>
                                <button type="submit" class="btn waves-effect waves-light">Inicio de sesión
                                    <i class="material-icons right">send</i>
                                </button>
                                </center>
                            </form>                
                    </div>
                </li>
            
            </ul>
        </div>    

        <br>
    </main>
    <script>
    document.addEventListener("DOMContentLoaded", getData);

    function getData() {
        let input = document.getElementById("campo").value;
        let num_registros = document.getElementById("num_registros").value;
        let content = document.getElementById("content");
        let pagina = document.getElementById("pagina").value || 1;
        let orderCol = document.getElementById("orderCol").value;
        let orderType = document.getElementById("orderType").value;

        let formData = new FormData();
        formData.append('campo', input);
        formData.append('registros', num_registros);
        formData.append('pagina', pagina);
        formData.append('orderCol', orderCol);
        formData.append('orderType', orderType);

        fetch("load.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data && data.data) {
                content.innerHTML = data.data;
                let totalFiltrado = parseInt(data.totalFiltro);
                let totalRegistros = parseInt(data.totalRegistros);
                let desde = (pagina - 1) * num_registros + 1;
                let hasta = Math.min(pagina * num_registros, totalFiltrado);

                // Calcular el rango de registros mostrados
                let registrosMostrados = hasta - desde + 1;

                document.getElementById("lbl-total").textContent = `Mostrando ${desde} - ${hasta} de ${totalFiltrado} registros`;
                document.getElementById("nav-paginacion").innerHTML = data.paginacion;

                // Si la página actual no tiene resultados y no es la primera página, ir a la primera página
                if (data.data.includes('Sin resultados') && parseInt(pagina) !== 1) {
                    nextPage(1);
                }
            } else {
                content.innerHTML = '<tr><td colspan="7">Error al obtener datos</td></tr>';
            }
        })
        .catch(err => {
            console.error('Error al obtener datos:', err);
            content.innerHTML = '<tr><td colspan="7">Error de conexión</td></tr>';
        });
    }

    function nextPage(pagina) {
        document.getElementById('pagina').value = pagina;
        getData();
    }

    function ordenar(e) {
        let elemento = e.target;
        let orderType = elemento.classList.contains("asc") ? "desc" : "asc";

        document.getElementById('orderCol').value = elemento.dataset.column;
        document.getElementById("orderType").value = orderType;
        elemento.classList.toggle("asc");
        elemento.classList.toggle("desc");

        getData();
    }

    document.getElementById("campo").addEventListener("keyup", getData);
    document.getElementById("num_registros").addEventListener("change", () => {
        document.getElementById("pagina").value = 1; // Reiniciar a la primera página al cambiar el número de registros por página
        getData();
    });

    let columns = document.querySelectorAll(".sort");
    columns.forEach(column => {
        column.addEventListener("click", ordenar);
    });

    // Inicializar select de Materialize
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, {});
    });
</script>


</body>

</html>

<?php include "templates/footer.php"; ?>

