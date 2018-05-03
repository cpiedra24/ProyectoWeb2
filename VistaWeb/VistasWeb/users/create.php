<?php 
  session_start();
  if(!isset($_SESSION["token"])){
    header('Location: http://localhost/VistaWeb/VistasWeb/index.php');
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
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body>
<nav class="black" role="navigation">
    <a href="../principalAdmin.php" class="brand-logo">PrograWeb</a>
    <div class="nav-wrapper container">
      <ul class="inverse hide-on-med-and-down">
      <?php if(ltrim($_SESSION["token"][1]) == "admin"){  ?>
              <li><a href="http://localhost/VistaWeb/VistasWeb/users/users.php" class="modal-trigger grey-text">Users</a></li>
       <?php } ?>
        <li><a href="http://localhost/VistaWeb/VistasWeb/contacts/contacts.php" class="modal-trigger grey-text">Contacts</a></li>
        <li><a href="http://localhost/VistaWeb/VistasWeb/clients/clients.php" class="modal-trigger grey-text">Clients</a></li>
        <li><a href="http://localhost/VistaWeb/VistasWeb/meetings/meetings.php" class="modal-trigger grey-text">Meetings</a></li>
        <li><a href="http://localhost/VistaWeb/VistasWeb/tickets/tickets.php" class="modal-trigger grey-text">Suport</a></li>
        <ul class="right hide-on-med-and-down">
              <li><a class="modal-trigger grey-text" onclick="cerrar()">LogOut</a></li>
        </ul>  
      </ul>
    </div>
  </nav>
 <br>
 <br>
  <div id="registro" class="">
    <div class="content">
      <div class="row ">
        
          <div class="row ">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">account_circle</i>
              <input id="name" type="text" name="name" class="validate">
              <label for="name">Name</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">account_circle</i>
              <input id="last_name" type="text" name="last_name" class="validate">
              <label for="last_name">Last Name</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">assignment_ind</i>
              <input id="username" type="text" name="username" class="validate">
              <label for="username">User Name</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">https</i>
              <input id="password" type="password" name="password" class="validate">
              <label for="password">Password</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
            <i class="material-icons prefix">group</i>
              <select id = "tipo">
                <option value="" disabled selected>Choose your option</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
                
              </select>
              <label>User Type</label>
            </div>
            </div>
            <a class="waves-effect waves-light btn-large col s12 m2 offset-m5" onclick="insertar();" ><i class="material-icons left">forward</i>Create</a>
         </div>
          
     
      </div>


    </div>
    
  </div>
         <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script src="../js/indexAnimation.js"></script>
  <script>
  //Metodo para insertar un usuario en la base de datos, cambiando a formato json
    function insertar(){
        var name = $("#name").val();
        var lastName = $("#last_name").val();
        var username = $("#username").val();
        var tipe = $("#tipo").val();
        var password = $("#password").val();

        var parametros = {
          "name": name,
          "last_name": lastName,
          "username": username,
          "user_type": tipe,
          "password": password
        };
        $.ajax({
        data:JSON.stringify(parametros),
        datatype: "application/json",
        url:"http://localhost:3000/users",
        type:"post",
        success:function(response){
        //  alert("Registrado");
          window.location.replace("http://localhost/VistaWeb/VistasWeb/users/users.php");
        },dataType: "json",
    contentType: "application/json"
      });
      }
  </script>
  <script>
    function cerrar(){
      window.location.replace("http://localhost/VistaWeb/VistasWeb/index.php?cerrar=exit");
    }
  </script>
</body>
</html>