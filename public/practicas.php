
<?php include "templates/header.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="css/materialize.css" rel="stylesheet" type="text/css">
    <link href="css/materialize.min.css" rel="stylesheet" type="text/css">
    <script src="jspdf.min.js"></script>
    <script src="appi.js"></script>
</head>

<body>
    <div class="container">
        <section class="row"><a class="waves-effect waves-light btn-large" type="submit" href="vinculacion.php">Regresar</a></section>
        <h3 class="center-align">Registro</h3>
        <form id="form">
            <div class="input-field">
                <select id="servicio">
                    <option value="" disabled selected>Selecciona la Etapa de tu Trayectoria Académica Laboral</option>
                    <option value="PEC I">PEC I</option>
                    <option value="PEC II">PEC II</option>
                    <option value="PEC III">PEC III</option>
                    <option value="SERVICIO SOCIAL">SERVICIO SOCIAL</option>
                    <option value="ESTADIAS">ESTADIAS</option>
                </select>
                <label>Etapa Académica</label>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="date" id="fechInicio" class="datepicker">
                    <label for="fechInicio">Fecha de inicio</label>
                </div>
                <div class="input-field col s6">
                    <input type="date" id="fechFin" class="datepicker">
                    <label for="fechFin">Fecha de fin</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" class="validate" id="nombre" oninput="convertirAMayusculas(this)">
                    <label for="nombre">Nombre del alumno iniciando por apellidos</label>
                </div>
                <div class="input-field col s6">
                    <input type="tel" class="validate" id="numeroTelefono">
                    <label for="numeroTelefono">Teléfono del estudiante</label>
                </div>
            </div>

            <div class="input-field">
                <select id="grupo">
                    <option value="" disabled selected>Selecciona tu grupo</option>
                    <option value="1°1">1°1</option>
                    <option value="1°2">1°2</option>
                    <option value="2°1">2°1</option>
                    <option value="2°2">2°2</option>
                    <option value="3°1">3°1</option>
                    <option value="3°2">3°2</option>
                </select>
                <label>Grupo</label>
            </div>

            <div class="input-field">
                <input type="text" id="Dias" class="validate" oninput="convertirAMayusculas(this)">
                <label for="Dias">Días de ejecución</label>
            </div>

            <div class="input-field">
                <select id="semestre">
                    <option value="" disabled selected>Seleccione el semestre</option>
                    <option value="PRIMER SEMESTRE">PRIMER SEMESTRE</option>
                    <option value="SEGUNDO SEMESTRE">SEGUNDO SEMESTRE</option>
                    <option value="TERCER SEMESTRE">TERCER SEMESTRE</option>
                    <option value="CUARTO SEMESTRE">CUARTO SEMESTRE</option>
                    <option value="QUINTO SEMESTRE">QUINTO SEMESTRE</option>
                    <option value="SEXTO SEMESTRE">SEXTO SEMESTRE</option>
                </select>
                <label>Semestre</label>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="nombreInstitucion" class="validate" oninput="convertirAMayusculas(this)">
                    <label for="nombreInstitucion">Nombre de la institución o empresa</label>
                </div>
                <div class="input-field col s6">
                    <input type="tel" id="numeroTelefonoInst" class="validate">
                    <label for="numeroTelefonoInst">Teléfono de la institución o empresa</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="nombreRes" class="validate" oninput="convertirAMayusculas(this)">
                    <label for="nombreRes">Nombre del Responsable del Escenario</label>
                </div>
                <div class="input-field col s6">
                <input type="text" id="cargo" class="validate" oninput="convertirAMayusculas(this)">
                    <label for="cargo" >Cargo</label>
                </div>
            </div>
            
   

            <div class="row">
    <div class="input-field col s6">
        <label for="direccion" class="active">Calle:</label>
        <input type="text" id="direccion" class="validate" oninput="convertirAMayusculas(this)">                   
    </div>
    <div class="input-field col s6">
        <label for="num" class="active">Núm:</label>
        <input type="text" id="num" class="validate" oninput="convertirAMayusculas(this)">                   
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        <label for="colonia" class="active">Colonia:</label>
        <input type="text" id="colonia" class="validate" oninput="convertirAMayusculas(this)">                   
    </div>
    <div class="input-field col s6">
        <label for="municipio" class="active">Municipio:</label>
        <input type="text" id="municipio" class="validate" oninput="convertirAMayusculas(this)">                   
    </div>
</div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="email" class="validate" id="correo">
                    <label for="correo">Correo electrónico de la empresa</label>
                </div>
            </div>

            <div class="input-field">
                <input type="text" id="nombreTut" class="validate" oninput="convertirAMayusculas(this)">
                <label for="nombreTut">Nombre del padre o tutor</label>
            </div>
            <div class="input-field">
                <input type="tel" id="telTut" class="validate">
                <label for="telTut">Teléfono del padre o tutor</label>
            </div>

            <div class="file-field input-field">
            <p><strong>Instrucciones: Sube una foto vertical de hombros hacia arriba hasta el fin del cabello, donde se aprecie claramente tu rostro de frente con el uniforme de gala y un fondo blanco.</strong></p>
                <div class="btn">
                    <span>Imagen de rostro</span>
                    <input type="file" id="inputImage2" accept="image/*">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

            <div class="file-field input-field">
            <p><strong>Instrucciones: (IMPORTANTE: Es importante que previamente hayas tomado una captura en horizontal del mapa de Google Maps donde se ubica tu escenario real) Sube una captura de pantalla en horizontal de Google Maps donde  se vean las calles de alrededor de tu escenario real.</strong></p>

                <div class="btn">
                    
                    <span>Imagen de escenario</span>
                    <input type="file" id="inputImage" accept="image/*">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

            <button type="submit" class="btn waves-effect waves-light">Generar PDF
                <i class="material-icons right">send</i>
            </button>
        </form>
     
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
            var datepickers = document.querySelectorAll('.datepicker');
            var datepickerInstances = M.Datepicker.init(datepickers, {
                format: 'yyyy-mm-dd',
                autoClose: true
            });
            var textareas = document.querySelectorAll('.materialize-textarea');
            var textareaInstances = M.CharacterCounter.init(textareas);
        });


        function convertirAMayusculas(input) {
            input.value = input.value.toUpperCase();
        }
    </script>
</body>

</html>

<?php include "templates/footer.php"; ?>