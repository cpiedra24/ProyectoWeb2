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
              <input id="meeting_title" type="text" name="meeting_title" class="validate">
              <label for="meeting_title">Meeting Title</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">account_circle</i>
              <input id = "meeting_date" type="text" class="datepicker">
              <label for="meeting_date">Meeting Date</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
            <i class="material-icons prefix">group</i>
              <select id = "userId">
                <option value="" disabled selected></option>
                 </select>

              <label>User</label>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">https</i>
              <label>
                 <input id = "virtual" type="checkbox" />
                <span>Virtual</span>
             </label>
            </div>
            </div>
            <a class="waves-effect waves-light btn-large col s12 m2 offset-m5" onclick="editar();" ><i class="material-icons left">forward</i>Edit</a>
         </div>
         </div>
    </div>
  </div>
         <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script src="../js/indexAnimation.js"></script>
   <!--Metodo para cargar los meetings en la interfaz-->
    <script>
    $(document).ready(function(){
      var id= "<?php echo $_GET["id"]  ?>";

      $.ajax({
        url: "http://localhost:3000/meetings/"+id,
        type: "get",
        datatype: 'application/json',
        success:function(response){
          document.getElementById("meeting_title").value = response.meeting_title;
          document.getElementById("meeting_date").value = response.meeting_date;
          document.getElementById("userId").value = response.user_id;
          document.getElementById("virtual").value = response.virtual;
            $(document).ready(function() {
            M.updateTextFields()
      });
          
        }
      });
    });
    </script>
  <!--Metodo para editar meeting -->
  <script>
    function editar(){
      var id= "<?php echo $_GET["id"]  ?>";
      var meeting_title = $("#meeting_title").val();
      var meeting_date = $("#meeting_date").val();
      var userId = $("#userId").val();
      var virtual = $("#virtual").val();

      var parametros = {
        "meeting_title": meeting_title,
        "meeting_date": meeting_date,
        "user_id": userId,
        "virtual": virtual
      };
      $.ajax({
      data:JSON.stringify(parametros),
      datatype: "application/json",
      url:"http://localhost:3000/meetings/"+id,
      type:"PATCH",
      success:function(response){
        alert("Editado");
        window.location.replace("http://localhost/VistaWeb/VistasWeb/meetings/meetings.php");
      },dataType: "json",
  contentType: "application/json"
    });

   }
  </script>
  <!--Metodo para cargar los usuarios en el select de la interfaz-->
  <script>
    $(document).ready(function(){
     $.ajax ({
       url:"http://localhost:3000/users",
       type:"get",
       datatype: 'application/json',
    success:function(response){
          for (var i = 0; i < response.length; i++) {       
          var option = "<option value='"+response[i].id+"'>"+response[i].name+"</option>";
          $("#userId").append(option);
          $('select').formSelect();
        }
      }
       });
         $('.datepicker').datepicker({dateFormat: "yyyy-mm-dd"});
        
    });
  </script>
 <!--Metodo para cerrar la session, redirige a index.php para que se haga la validacion-->
  <script>
    function cerrar(){
      window.location.replace("http://localhost/VistaWeb/VistasWeb/index.php?cerrar=exit");
    }
  </script>
</body>
</html>