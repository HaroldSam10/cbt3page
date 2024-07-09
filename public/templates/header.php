<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CBT 3 ZUMPANGO</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/materialize.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    
</head>

<body>
    <div class="D_de_secion">
        <!--Menu-->
        <nav class="white-text green darken-4">
            <div class="nav-wrapper container">
                <a href="index.php" class="brand-logo"><img src="img/logo-final-CBT.png" height="65" width="65"></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="Oferta_educativa.php">Oferta Educativa</a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="departamentos">Departamentos Educativos</a></li>
                    <li><a href="Contacto.php">Contacto</a></li>
                    <li><a href="organigrama.php">Organigrama</a></li>
                    <li><a href="Acerca_de_nosotros.php">Acerca de Nosotros</a></li>
                </ul>
            </div>
        </nav>

        <!-- Dropdown Content -->
        <ul id="departamentos" class="dropdown-content">
            <li><a href="subdireccion.php" class="black-text">Subdirección Escolar</a></li>
            <li class="divider"></li>
            <li><a href="secretario.php" class="black-text">Secretaría Escolar</a></li>
            <li class="divider"></li>
            <li><a href="vinculacion.php" class="black-text">Vinculación</a></li>
        </ul>

        <!-- Sidenav for Mobile -->
        <ul class="sidenav" id="mobile-demo">
            <li><a href="Oferta_educativa.php">Oferta Educativa</a></li>
            <li><a href="Contacto.php">Contacto</a></li>
            <li><a href="organigrama.php">Organigrama</a></li>
            <li><a href="Acerca_de_nosotros.php">Acerca de Nosotros</a></li>
            <li><a href="#" class="dropdown-trigger" data-target="mobile-departamentos">Departamentos Educativos</a></li>
        </ul>

        <!-- Dropdown Content for Mobile -->
        <ul id="mobile-departamentos" class="dropdown-content">
            <li><a href="subdireccion.php" class="black-text">Subdirección Escolar</a></li>
            <li class="divider"></li>
            <li><a href="secretario.php" class="black-text">Secretaría Escolar</a></li>
            <li class="divider"></li>
            <li><a href="vinculacion.php" class="black-text">Vinculación</a></li>
        </ul>
    </div>

    <script>
  
  document.addEventListener('DOMContentLoaded', function() {
   var elemss=document.querySelectorAll('.modal');
  var instancess =M.Modal.init(elemss, Option);
  
  
   var elems = document.querySelectorAll('.slider');
    var instancees = M.Slider.init(elems, {
    });
    M.AutoInit();
  });  
  M.resizeMasonryCards();
  var instance = M.Carousel.init({
  fullWidth: true,
  indicators: true,
  duration: 200
});
  
</script>
    <script>
      $(document).ready(function(){
         $('.modal').modal();
         $('.materialboxed').materialbox();
         $('.parallax').parallax();
         $('.collapsible').collapsible();
         $('.sidenav').sidenav();
         
      });
      
  </script>




</body>

</html>