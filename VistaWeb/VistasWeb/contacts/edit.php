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
              <input id="email" type="text" name="email" class="validate">
              <label for="email">Email</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">https</i>
              <input id="phone" type="text" name="phone" class="validate">
              <label for="phone">Phone</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">https</i>
              <input id="position" type="text" name="position" class="validate">
              <label for="position">Position</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 offset-m3">
            <i class="material-icons prefix">group</i>
              <select id = "tipo">
                <option value="" disabled selected></option>
                            
              </select>
              <label>Client</label>
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
    <!--Metodo que carga los datos en la interfaz obtenidos en la base de datos con el get-->
    <script>
    $(document).ready(function(){
      var id= "<?php echo $_GET["id"]  ?>";

      $.ajax({
        url: "http://localhost:3000/contacts/"+id,
        type: "get",
        datatype: 'application/json',
        success:function(response){
          document.getElementById("name").value = response.name;
          document.getElementById("last_name").value = response.last_name;
          document.getElementById("email").value = response.email;
          document.getElementById("phone").value = response.phone;
          document.getElementById("position").value = response.position;
          document.getElementById("tipo").value = response.tipo;
          $(document).ready(function() {
            M.updateTextFields()
      });
          
        }
      });
    });
    </script>

    <!-- Metodo para cargar los clientes que hay al select que muestro en la interfaz -->
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

  <!--Metodo para editar el contacto, mandandole los parametros ya cargados en la interfaz -->
  <script>
    function editar(){
      var id= "<?php echo $_GET["id"]  ?>";
      var name = $("#name").val();
      var lastName = $("#last_name").val();
      var email = $("#email").val();
      var phone = $("#phone").val();
      var position = $("#position").val();
      var tipo = $("#tipo").val();

      var parametros = {
        "name": name,
        "last_name": lastName,
        "email": email,
        "phone": phone,
        "position": position,
        "tipo": tipo
      };
      $.ajax({
      data:JSON.stringify(parametros),
      datatype: "application/json",
      url:"http://localhost:3000/contacts/"+id,
      type:"PATCH",
      success:function(response){
        alert("Editado");
        window.location.replace("http://localhost/VistaWeb/VistasWeb/contacts/contacts.php");
      },dataType: "json",
  contentType: "application/json"
    });

   }
  </script>
  <!--Metodo para redigir al index.php y se le manda el cerrar por url a validar al index y asi destruir la session -->
  <script>
    function cerrar(){
      window.location.replace("http://localhost/VistaWeb/VistasWeb/index.php?cerrar=exit");
    }
  </script>
</body>
</html>