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
    <table>
       <thead>
         <tr>
             <th>Name</th>
             <th>Last Name</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Position</th>
             <th>Client</th>
             <th></th>
             <th></th>
         </tr>
       </thead>

       <tbody id="tabla">
        
       </tbody>
     </table>
     <div class="fixed-action-btn">
        <a class="btn-floating btn-large  waves-effect waves-light red" href="create.php">
          <i class="large material-icons">add</i>
        </a>
        
      </div>
    </footer>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script src="../js/indexAnimation.js"></script>
  <script>
  $(document).ready(function(){


    $.ajax({
      url:"http://localhost:3000/contacts",
      type:"get",
      datatype: 'application/json',
      success:function(response){

        for (var i = 0; i < response.length; i++) {
          var id = response[i].client_id;
          var tr = "<tr>"+
                  "<td>"+response[i].name+"</td>"+
                  "<td>"+response[i].last_name+"</td>"+
                  "<td>"+response[i].email+"</td>"+
                  "<td>"+response[i].phone+"</td>"+
                  "<td>"+response[i].position+"</td>"+
                  "<td>"+response[i].client_id+"</td>"+
                  "<td><a class='btn green' href='edit.php?id="+response[i].id+"'>Edit</a></td>"+
                  "<td><a class='btn red' onclick='eliminar("+response[i].id+");'>Delete</a></td>"
                  +"</tr>";
          $("#tabla").append(tr);
        }
      }
    });
   

    });
  </script>
  <script>
    function eliminar(id){
        $.ajax({
        url: "http://localhost:3000/contacts/"+id,
        type:"DELETE",
        success:function(response){
        alert("Eliminado");
        window.location.replace("http://localhost/VistaWeb/VistasWeb/contacts/contacts.php");
        }
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
