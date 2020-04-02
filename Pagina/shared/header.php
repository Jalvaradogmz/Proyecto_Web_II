<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="./../css/materialize.min.css"  media="screen,projection"/>
<title>Proyect Page</title>
</head>
<body>
<nav>
   <div class="nav-wrapper teal darken-2">
    <a href="./"> <img class="circle" src="images/valknut2.0.jpg"></a>
    <ul class="right hide-on-med-and-down">
      <?php 
      if (isset($_SESSION['user_id'])) { ?>
        <li><p>Bienvenido:</p></li>
        <li><div class="navbar-item has-dropdown is-hoverable">
            <a class="waves-effect waves-light btn-large button is-rounded" href="/"><?= $_SESSION['user_name'] ?></a>
          <div class="navbar-dropdown">
            <a class='navbar-item' href='/Registro_Informacion.php'>Registro de Informacion</a>
            <a class='navbar-item' href='/Experience.php'>Experience</a>
            <a class='navbar-item' href='/Education.php'>Education</a>
            <a class='navbar-item' href='/Skills.php'>Skills</a>
            <a class='navbar-item' href='/Projects.php'>Projects</a>
            <a class='navbar-item' href='/Hobbies.php'>Hobbies</a>
            <a class='navbar-item' href='/Contributions.php'>Contributions</a>
            <a class='navbar-item' href='/Contact.php'>Contact</a>
          </div>
        </div></li>
        <li><a class="waves-effect waves-light btn-large button is-rounded" href="/logout.php">Log out</a></li>
        <?php } 
      else { ?>
        <li><a class="waves-effect waves-light btn-large button is-rounded" href="/login.php">Log in</a></li>
        <?php } ?>
      <li><a href="/registro.php" class="waves-effect waves-light btn-large button is-rounded">Registro</a></li>
    </ul>
   </div>
</nav>
<section class="section">
    <div class="container">
            
          
            
            