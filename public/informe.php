<?php include "templates/header.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="jspdf.min.js"></script>
    <script src="informe.js"></script>


</head>

<body>
    <div class="container">
    <section class="row"><a class="waves-effect waves-light btn-large" type="submit" href="vinculacion.php">Regresar</a></section>
        <h3 class="center-align">Informe de Actividades</h3>
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
                
                <div class="input-field col s12">
                    <input type="text" class="validate" id="nombre" oninput="convertirAMayusculas(this)">
                    <label for="nombre">Nombre del alumno (Empezando por apellidos) </label>
                </div>


                
                <div class="input-field col s12">
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
            </div>
            <div class="input-field col s6">
                <select id="gen">
                    <option value="" disabled selected>Selecciona a que generación perteneces</option>
                    <option value="2021-2024">2021-2024</option>
                    <option value="2022-2025">2022-2025</option>
                    <option value="2023-2026">2023-2026</option>
                    <option value="2024-2027">2024-2027</option>
                    <option value="2025-2028">2025-2028</option>
                    <option value="2026-2029">2026-2029</option>
                    <option value="2027-2030">2027-2030</option>
                    <option value="2028-2031">2028-2031</option>
                    <option value="2029-2032">2029-2032</option>
                    <option value="2030-2033">2030-2033</option>
                    <option value="2031-2034">2031-2034</option>
                </select>
                <label>Grupo</label>
            </div>
            <div class="row">
    <div class="input-field col s6">
        <input type="text" id="fechInicio" class="datepicker" placeholder="YYYY-MM-DD">
        <label for="fechInicio">Fecha de inicio</label>
    </div>
    <div class="input-field col s6">
        <input type="text" id="fechFin" class="datepicker" placeholder="YYYY-MM-DD">
        <label for="fechFin">Fecha de fin</label>
    </div>
</div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="nombreInstitucion" class="validate" oninput="convertirAMayusculas(this)">
                    <label for="nombreInstitucion">Nombre de la institución o empresa</label>
                </div>
            </div>

            <div class="input-field col s6">
                <select id="hrs">
                    <option value="" disabled selected>Selecciona el número de horas que duro tus PEC o Servicio Social
                    </option>
                    <option value="100">100</option>
                    <option value="480">480</option>
                </select>
                <label>Horas</label>
            </div>

            <div class="row">
                <p>Describe una actividad que hayas realizado en tu escenario real. Precisa en los detalles de la misma.
                    Puedes usar estas preguntas a forma de guía:
                    ¿Cuál era el objetivo?, ¿Que heramientas utilizaste (SOFTWARE, HARDWARE)?, ¿Qué habilidades
                    desarrollaste?(máximo 300 caracteres)</p>
                <div class="input-field col s12">
                    <textarea id="act1" class="materialize-textarea" maxlength="300"></textarea>
                    <label for="act1">Actividad Número 1 (máximo 300 caracteres):</label>
                </div>
            </div>

            <div class="row">
                <p>Describe una actividad que hayas realizado en tu escenario real. Precisa en los detalles de la misma.
                    Puedes usar estas preguntas a forma de guía:
                    ¿Cuál era el objetivo?, ¿Que heramientas utilizaste (SOFTWARE, HARDWARE)?, ¿Qué habilidades
                    desarrollaste?(máximo 300 caracteres)</p>
                <div class="input-field col s12">
                    <textarea id="act2" class="materialize-textarea" maxlength="300"></textarea>
                    <label for="act2">Actividad Número 2 (máximo 300 caracteres):</label>
                </div>
            </div>

            <div class="row">
                <p>Describe una actividad que hayas realizado en tu escenario real. Precisa en los detalles de la misma.
                    Puedes usar estas preguntas a forma de guía:
                    ¿Cuál era el objetivo?, ¿Que heramientas utilizaste (SOFTWARE, HARDWARE)?, ¿Qué habilidades
                    desarrollaste?(máximo 300 caracteres)</p>
                <div class="input-field col s12">
                    <textarea id="act3" class="materialize-textarea" maxlength="300"></textarea>
                    <label for="act3">Actividad Número 3 (máximo 300 caracteres):</label>
                </div>
            </div>
            <div class="row">
            <div class="input-field col s12">
                <input type="text" id="nombreRes" class="validate" oninput="convertirAMayusculas(this)">
                <label for="nombreRes">Nombre completo de tu encargado </label>
            </div>
            <div class="input-field col s12">
                <input type="text" id="cargo" class="validate" oninput="convertirAMayusculas(this)">
                <label for="cargo">Cargo del encargado</label>
            </div>
        </div>



            <div class="input-field col s12">
    <select id="docente">
      <option value="" disabled selected>Selecciona al docente encargado de visita</option>
      <option value="MTRA. BLANCA FLOR SORIANO RIVERO">Mtra. Blanca Flor Soriano Rivero.</option>
      <option value="ING. ALEJANDRO ERNESTO GARCÍA VELASCO">Ing. Alejandro Ernesto García Velasco</option>
      <option value="MTRA. MA. ANTONIETA DE LAS NIEVES MORENO GONZÁLEZ">Mtra. Ma. Antonieta de las Nieves Moreno González</option>
      <option value="MTRA. ANA GABRIELA MORALES BALDERAS">Mtra. Ana Gabriela Morales Balderas</option>
      <option value="DRA. MA. GUADALUPE CABRERA CHAVIRA">Dra. Ma. Guadalupe Cabrera Chavira</option>
      <option value="MTRA. LAURA LUCIA CHAVIRA TAPIA">Mtra. Laura Lucia Chavira Tapia</option>
      <option value="DR. SERGIO ELIAS CASTAÑON NAVARRO">Dr. Sergio Elias Castañón Navarro</option>
      <option value="ING. CRISTIAN JESÚS RAMÍREZ GUZMÁN">Ing. Cristian Jesús Ramírez Guzmán</option>
      <option value="ING. NUBIA HERNÁNDEZ CASTRO">Ing. Nubia Hernández Castro</option>
      <option value="ING. BRANDON FRANCISCO ROMO ROMERO">Ing. Brandon Francisco Romo Romero</option>
      <option value="MTRO. JONATAN REPIZO PANTALEÓN">Mtro. Jonatan Repizo Pantaleón</option>
      <option value="MTRA. MONSERRATT VÁZQUEZ LÓPEZ">Mtra. Monserratt Vázquez López</option>
    </select>
    <label>Selecciona al Docente</label>
  </div>


            <button type="submit" class="btn waves-effect waves-light">Generar PDF
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


  <script>
       $(document).ready(function(){
      $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        i18n: {
          cancel: 'Cancelar',
          clear: 'Limpiar',
          done: 'Aceptar',
          months: [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
          ],
          monthsShort: [
            'Ene',
            'Feb',
            'Mar',
            'Abr',
            'May',
            'Jun',
            'Jul',
            'Ago',
            'Sep',
            'Oct',
            'Nov',
            'Dic'
          ],
          weekdays: [
            'Domingo',
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sábado'
          ],
          weekdaysShort: [
            'Dom',
            'Lun',
            'Mar',
            'Mié',
            'Jue',
            'Vie',
            'Sáb'
          ],
          weekdaysAbbrev: ['D','L','M','M','J','V','S']
        }
      });
    });
  </script>
    <script>
   document.addEventListener('DOMContentLoaded', function () {
    var selects = document.querySelectorAll('select');
    M.FormSelect.init(selects);

    var textareas = document.querySelectorAll('.materialize-textarea');
    M.CharacterCounter.init(textareas);

   

    var form = document.getElementById('form');
    if (form) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            // Aquí coloca el resto de tu lógica para manejar el envío del formulario
        });
    } else {
        console.error("El elemento con ID 'form' no se encontró en el documento.");
    }
});



function convertirAMayusculas(input) {
    input.value = input.value.toUpperCase();
}

    </script>
</body>

</html>



<?php include "templates/footer.php"; ?>