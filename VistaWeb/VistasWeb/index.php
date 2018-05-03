<?php 
  session_start();
  if(isset($_GET["cerrar"])){
    unset($_SESSION["token"]);

    //unset($_SESSION["token"][1]);
  }
  if(isset($_SESSION["token"])){
    header('Location: principalAdmin.php');
  }
  if(isset($_GET["token"]) && isset($_GET["tipo"])){
    $_SESSION["token"][0] = $_GET["token"];
    $_SESSION["token"][1] = $_GET["tipo"];
    header('Location: principalAdmin.php');
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

  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Empresa</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#modalIngresar" class="modal-trigger">Ingresar</a></li>
      </ul>
    </div>
  </nav>
  <!-- Modal para ingresar -->
  <div id="modalIngresar" class="modal">
    <div class="modal-content">
      
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="usernames" name="username" type="text" class="validate">
            <label for="username">User name</label>
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">https</i>
            <input id="passwords" name="password" type="password" class="validate">
            <label for="password">Password</label>
          </div>
          <a class="waves-effect waves-light btn-large" onclick="validar()" ><i class="material-icons left">forward</i>Login</a>
        </div>
     
    </div>
  </div>

  <!-- fin -->

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Welcome</h1>
        <div class="row center">
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="img/adsa.jpg" alt="Unsplashed background img 1"></div>
  </div>
  <!-- Modal para registro -->
  <div id="modalRegistro" class="modal">
    <div class="modal-content">
      <div class="row">
        <form action="RegistrarUsuario" method="POST" enctype="multipart/form-data" class="col s10  offset-s1">
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">account_circle</i>
              <input id="name" type="text" name="name" class="validate">
              <label for="name">Name</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">account_circle</i>
              <input id="last_name" type="text" name="last_name" class="validate">
              <label for="last_name">Last Name</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">assignment_ind</i>
              <input id="username" type="text" name="username" class="validate">
              <label for="username">User Name</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">https</i>
              <input id="password" type="password" name="password" class="validate">
              <label for="password">Password</label>
            </div>

          </div>
          <button type="submit" id="botoRegistrar" class="waves-effect waves-light btn-large"><i class="material-icons left">forward</i>Register</button>
        </form>
      </div>


    </div>
  </div>
  <!-- fin -->

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">assignment_turned_in</i></h2>
            <h5 class="center">Meetings</h5>

            <p class="light"></p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Contacts</h5>

            <p class="light"></p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Tickets</h5>

            <p class="light">
              <Info></Info>
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div class="parallax"><img src="img/Negocios.jpg" alt="Unsplashed background img 2"></div>
  </div>
  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4></h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra
            ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices
            erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div>
      </div>

    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div class="parallax"><img src="img/empre.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Empresa</h5>
          <p class="grey-text text-lighten-4">Lore.</p>
        </div>
      </div>
    </div>

  </footer>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/indexAnimation.js"></script>

  <script>
    function validar(){
      var user = document.getElementById("usernames").value;
      var pass = document.getElementById("passwords").value;
      var parametros = {
        "username":user,
        "password":pass
      }
      $.ajax({
      data:parametros,
      url:"http://localhost:3000/sessions",
      type:"post",
           success:function(response){
            response = response.split(",");
        window.location.replace("http://localhost/VistaWeb/VistasWeb/index.php?token="+response[0]+"&tipo="+response[1]);
       
      }
    });
    }
  </script>
 
</body>

</html>
