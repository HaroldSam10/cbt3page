<?php
//Seguridad papi
session_start();
error_reporting();
$varsesion= $_SESSION['usuario'];
if($varsesion== null || $varsesion==''){
    header("location:index.php");
    die();
}

?>

<?php include "templates/header.php"; ?>


<div class="container"> 
    <h3 class="center-align">¡AGREGA O ELIMINA UN ESCENARIO REAL!</h3>
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="vinculacion.php">Vinculación</a></li>
        <li><a href="directorio.php">Directorio</a></li>
        <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
    </ul>
    <a class="btn dropdown-trigger" href="#!" data-target="dropdown2">Acciones<i class="material-icons right">arrow_drop_down</i></a>
    <div class="row">
        <div class="card">
            <div class="card-content">
                <p>¿Desea agregar un nuevo escenario o por el contrario eliminarlo?</p>
            </div>
            <div class="card-tabs">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a href="#test4">¡Agregar escenario!</a></li>
                    <li class="tab"><a class="active" href="#test5">¡Elimina un escenario!</a></li>
                </ul>
            </div>
            <div class="card-content grey lighten-4">
                <div id="test4">
                <div class="row">
                    <form class="col s12" method="post">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_balance</i>
                            <input type="text" id="escenario" class="validate" name='escenario' oninput="convertirAMayusculas(this)">
                            <label for="escenario">Nombre del escenario:</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" id="nombre" class="validate" name='nombre' oninput="convertirAMayusculas(this)">
                            <label for="nombre">Nombre del encargado:</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">assistant</i>
                            <input type="text" id="puesto" class="validate" name='puesto' oninput="convertirAMayusculas(this)">
                            <label for="puesto">Puesto del encargado:</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">map</i>
                            <input type="text" id="calle" class="validate" name='calle' oninput="convertirAMayusculas(this)">
                            <label for="calle">Calle donde se ubica:</label>
                        </div>
                        <p>IMPORTANTE: Verificar si el escenario pertenece a Barrio o Colonia. Solamente llenar solo el campo correspondiente.</p>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">developer_board</i>
                            <input type="text" id="colonia" class="validate" name='colonia' oninput="convertirAMayusculas(this)">
                            <label for="colonia">Colonia donde se ubica:</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">domain</i>
                            <input type="text" id="barrio" class="validate" name='barrio' oninput="convertirAMayusculas(this)">
                            <label for="barrio">Barrio donde se ubica:</label>
                        </div>  
                        <center>
                            <button type="submit" class="btn waves-effect waves-light" name='enviar'>¡AGREGAR!
                                <i class="material-icons right">send</i>
                            </button>
                        </center>
                    </form>
                </div>

                </div>

                <div id="test5">
                    <div class="row">
                        <form class="col s12" method="post">
                            <p>Escriba el identificador que le corresponde al escenario que desee <b>eliminar</b>
                                (Puede revisarlo en el <a href="directorio.php">Directorio</a>)</p>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_balance</i>
                                <input type="text" id="id" class="validate" name='id' oninput="convertirAMayusculas(this)">
                                <label for="id">ID del escenario a eliminar</label>
                            </div>
                            <center>
                                <button type="submit" class="btn waves-effect waves-light" name='enviar2'>¡Eliminar!
                                    <i class="material-icons right">send</i>
                                </button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    function convertirAMayusculas(input) {
        input.value = input.value.toUpperCase();
    }
</script>

<?php
include("conexion.php");

if (isset($_POST['enviar'])) {
    if (strlen($_POST['escenario']) >= 1 &&
        strlen($_POST['nombre']) >=1 &&
        strlen($_POST['puesto']) >=1 &&
        strlen($_POST['calle']) >=1 &&
        strlen($_POST['colonia']) >=0 &&
        strlen($_POST['barrio']) >=0 ){
        $escenario= trim($_POST['escenario']);
        $nombre= trim($_POST['nombre']);
        $puesto= trim($_POST['puesto']);
        $calle= trim($_POST['calle']);
        $colonia= trim($_POST['colonia']);
        $barrio= trim($_POST['barrio']);
        $consul= "INSERT INTO escenarios(escenario, encargado, puesto, calle, colonia, barrio) VALUES ('$escenario','$nombre','$puesto','$calle','$colonia','$barrio')" ;
        $result= mysqli_query($conexion, $consul);
        if ($result){
            ?>
            <script>
                alert('¡Escenario agregado! Cierre Sesión');
                const destino2 = 'directorio.php';
                document.location.href = destino2;
            </script>
            <?php
        } else {
            ?>
            <script>alert('Algo anda mal. Inténtalo de nuevo')</script>
            <?php
        }
    }
}

if (isset($_POST['enviar2'])) {
    if (strlen($_POST['id']) >= 1 ){
        $id = trim($_POST['id']);
        
        // Eliminar el registro con el ID proporcionado
        $consuldelete = "DELETE FROM escenarios WHERE id= '$id'";
        $result_delete = mysqli_query($conexion, $consuldelete);
        
        if ($result_delete) {
            // Actualizar los IDs para eliminar cualquier hueco en la secuencia
            $consul_update = "SET @autoid :=0;
                              UPDATE escenarios SET id = @autoid := (@autoid+1);
                              ALTER TABLE escenarios AUTO_INCREMENT = 1;";
            $result_update = mysqli_multi_query($conexion, $consul_update);
            
            if ($result_update) {
                ?>
                <script>
                    alert('¡Escenario eliminado y IDs actualizados correctamente!');
                    const destino = 'directorio.php';
                    document.location.href = destino;
                </script>
                <?php
            } else {
                ?>
                <script>alert('Error al actualizar los IDs.')</script>
                <?php
            }
        } else {
            ?>
            <script>alert('Error al eliminar el escenario. Inténtalo de nuevo.')</script>
            <?php
        } 
    }
}
?>

<?php include "templates/footer.php"; ?>