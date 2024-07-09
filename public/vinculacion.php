<?php include "templates/header.php"; ?>

<div class="D_de_secion">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="materialize.min.css">
<link rel="stylesheet" href="materialize.css">

<style>
        /* Estilos personalizados para el menú */
        .menu-section {
            background-color: #4CAF50; /* Color de fondo verde */
            padding: 20px;
            color: white; /* Color de texto blanco */
        }
        .menu-section ul {
            padding-left: 20px; /* Espacio para las viñetas */
        }
        .menu-section li::before {
            content: "\2022"; /* Código Unicode para el punto como viñeta */
            color: white; /* Color de la viñeta */
            display: inline-block;
            width: 1em; /* Tamaño de la viñeta */
            margin-left: -1em; /* Alineación de la viñeta */
        }
        .menu-section a {
            color: white !important; /* Color de texto blanco */
            margin-right: 20px;
            font-size: 24px; /* Tamaño de fuente grande */
        }
        
    </style>

    <div class="section white">
        <div class="container">
            <div id="todo" class="row">

                <h3 class="center-align">VINCULACIÓN</h3>

                <div class="row">

                    <div class="col s0 m1"></div>
                    <!--card-->
                    <div class="col s612 m10">
                        <div class="card horizontal z-depth-5 grey lighten-2">
                            <div class="card-image">
                                <img src="img/personal/Maria.jpeg">
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                    <span class="card-title">Profesora a cargo.</span>
                                    <h5>Mtra. Maria Antonieta de las Nieves Moreno Gonzàlez</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card --->
                    <div class="col s0 m1"></div>

                </div>
                <!--<div class="col s12 m12 divider"></div>
                <div class="row">

                    <div class="col s12 m12">
                        <h4 class="center-align">Directorio </h4>
                    </div>
                </div>-->
                <div class="col s12 m12 divider"></div>
            
            <div class="row">

                <div class="col s12 m12">
                    <h4 class="center-align">Proceso de titulación.  </h4>

                    <!--card-->
                    <div class="col s12 m6">
                        <div class="card">
                            <div class="card-image">
                                <img src="img/titulacion/3t.jpeg">
                                <span class="card-title"></span>
                            </div>
                        </div>
                    </div>
                    <!--card-->

                    <!--card-->
                    <div class="col s12 m6">
                        <div class="card">
                            <div class="card-image">
                                <img src="img/titulacion/2t.jpeg">
                                <!--<span class="card-title">Card Title</span>-->
                            </div>
                        </div>
                    </div>
                    <!--card-->

                    <!--card-->
                    <div class="col s12 m6">
                        <div class="card">
                            <div class="card-image">
                                <img src="img/titulacion/4t.jpeg">
                                <!--<span class="card-title">Card Title</span>-->
                            </div>
                        </div>
                    </div>
                    <!--card-->

                    <!--card-->
                    <div class="col s12 m6">
                        <div class="card">
                            <div class="card-image">
                                <img src="img/titulacion/1t.jpeg">
                                <!--<span class="card-title">Card Title</span>-->
                            </div>
                        </div>
                    </div>
                    <!--card-->

                </div>
               
            </div>


    <section class="row">

        <div class="div s12" id="6">

            <ul class="collapsible popout">
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>¡CONOCE LOS LUGARES DONDE PODRÁS REALIZAR TUS PRÁCTICAS DE EJECUCIÓN DE COMPETENCIAS PROFESIONALES, SERVICIO SOCIAL O ESTADÍAS!</div>
                    <div class="collapsible-body">
                        <p>
                            Mira nuestro amplio catálogo de escenarios reales con los que tenemos contrato:
                        </p>
                        <p>
                            <a class="waves-effect waves-light btn-large" href="directorio.php">¡Directorio de escenarios!</a>
                        </p>                       
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>¡REALIZA TU REGISTRO DE PRÁCTICAS DE EJECUCIÓN DE COMPETENCIAS PROFESIONALES, SERVICIO SOCIAL O ESTADÍAS!</div>
                    <div class="collapsible-body">
                         <p>Imprime tu registro de Prácticas Profesionales, Servicio Social y Estadías</p>
                         <p>
                            <a class="waves-effect waves-light btn-large" href="practicas.php">¡VAMOS A LLENAR TU FORMATO!</a>
                        </p>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">description</i>¡GENERA TU INFORME DE ACTIVIDADES!</div>
                    <div class="collapsible-body">
                        <p>
                            Redacta las actividades que desarrollaste en tu escenario real en los periodos de Prácticas de Ejecución de Competencias 
                            Profesionales o Servicio Social
                        </p>
                        <p>
                            <a class="waves-effect waves-light btn-large" href="informe.php">¡INFORME DE ACTIVIDADES!</a>
                        </p>                       
                    </div>
                </li>

            </ul>
        </div>    
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


        </div>
    </div>
</div>
</div>


<?php include "templates/footer.php"; ?>