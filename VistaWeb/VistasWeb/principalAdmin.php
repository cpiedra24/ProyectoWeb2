<?php
  session_start();
  
  if(!isset($_SESSION["token"])){
  header('Location: index.php');
  } 
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PrograWeb</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

</head>

<body>

  <nav class="black" role="navigation">
    <a href="#" class="brand-logo">PrograWeb</a>
    <div class="nav-wrapper container">
      <ul class="inverse hide-on-med-and-down">
      <?php if(ltrim($_SESSION["token"][1]) == "admin"){  ?>
              <li><a href="http://localhost/VistaWeb/VistasWeb/users/users.php" class="modal-trigger grey-text">Users</a></li>
       <?php } ?>
        <li><a href="contacts/contacts.php" class="modal-trigger grey-text">Contacts</a></li>
        <li><a href="clients/clients.php" class="modal-trigger grey-text">Clients</a></li>
        <li><a href="meetings/meetings.php" class="modal-trigger grey-text">Meetings</a></li>
        <li><a href="tickets/tickets.php" class="modal-trigger grey-text">Suport</a></li>
        <ul class="right hide-on-med-and-down">
              <li><a class="modal-trigger grey-text" onclick="cerrar()">LogOut</a></li>
        </ul>
      </ul>
    </div>
  </nav>

  <div class="parallax-container valign-wrapper">
    <div class=""><img src="img/thumb-1920-602223.jpg"></div>
  </div>

  </footer>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
    function cerrar(){
      eliminarSes();
      window.location.replace("http://localhost/VistaWeb/VistasWeb/index.php?cerrar=exit");
    }
  </script>
   <!--Metodo para eliminar las sessiones -->
   <script>
  function eliminarSes(){
    var request = new XMLHttpRequest();
    request.open('DELETE', 'http://localhost:3000/sessions/1053', true);
    request.send(null);
    if(request.status == 200){
      alert("Eliminado");
    }
}
  </script>
</body>

</html>
