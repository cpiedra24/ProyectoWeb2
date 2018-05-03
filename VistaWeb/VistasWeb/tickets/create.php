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
              <input id="problem_title" type="text" name="problem_title" class="validate">
              <label for="problem_title">Problem Title</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">account_circle</i>
              <input id="detail" type="text" name="detail" class="validate">
              <label for="detail">Detail</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">assignment_ind</i>
              <input id="who_report" type="text" name="who_report" class="validate">
              <label for="who_report">Who Report</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
            <i class="material-icons prefix">group</i>
              <select id = "tipo">
                <option value="" disabled selected>Choose your option</option>
                 </select>
              <label>Client</label>
            </div>
           </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
            <i class="material-icons prefix">group</i>
              <select id = "status">
                <option value="" disabled selected>Status</option>
                <option value="visto">Visto</option>
                <option value="proceso">Proceso</option>
                <option value="finalizado">Finalizado</option>
              </select>
              <label>Status</label>
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
       var problem_title = $("#problem_title").val();
      var detail = $("#detail").val();
      var who_report = $("#who_report").val();
      var client_id = $("#tipo").val();
      var tipe = $("#status").val();
      
      var parametros = {
        "problem_title": problem_title,
        "detail": detail,
        "who_report": who_report, 
        "client_id": client_id,
        "status": tipe
      };
      $.ajax({
      data:JSON.stringify(parametros),
      datatype: "application/json",
      url:"http://localhost:3000/tickets",
      type:"post",
      success:function(response){
       // alert("Registrado");
        window.location.replace("http://localhost/VistaWeb/VistasWeb/tickets/tickets.php");
      },dataType: "json",
       contentType: "application/json"
    });
  }

//  function insertar(){
//       var problem_title = $("#problem_title").val();
//       var detail = $("#detail").val();
//       var who_report = $("#who_report").val();
//       var client_id = $("#tipo").val();
//       var tipe = $("#status").val();
      
//       var parametros = {
//         "problem_title": problem_title,
//         "detail": detail,
//         "who_report": who_report, 
//         "client_id": client_id,
//         "status": tipe
//       };
//       var request = new XMLHttpRequest();
//         request.open('POST', "http://localhost:3000/tickets", false);
//         request.setRequestHeader("Content-type","application/json");
//         if (!request.send(JSON.stringify(parametros))) {
//           window.location.replace("http://localhost/VistaWeb/VistasWeb/tickets/tickets.php");
//         }
//   }
  </script>
  
  <!-- Metodo para cargar la opcion de ver los clientes que hay en el select -->
  <script>
    $(document).ready(function(){
     $.ajax ({
       url:"http://localhost:3000/clients",
       type:"get",
       datatype: 'application/json',
    success:function(response){
     
      
        for (var i = 0; i < response.length; i++) {
         
          var option = "<option value='"+response[i].id+"'>"+response[i].name+"</option>";
          $("#tipo").append(option);
          $('select').formSelect();
        }
      }
       });
    });
  </script>
  <script>
    function cerrar(){
      window.location.replace("http://localhost/VistaWeb/VistasWeb/index.php?cerrar=exit");
    }
  </script>
</body>
</html>