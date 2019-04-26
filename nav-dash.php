<nav class="navbar navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Easy Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Acceuil</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="formulaire.php"  ><span class="glyphicon glyphicon-user"></span>Salut <?php echo $_SESSION['nom'].' '.$_SESSION['prenom'];?></a></li>
      <li><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Se Déconnecté</a></li>
    </ul>
  </div>
</nav>
