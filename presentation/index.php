<?php
session_start(); 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Login with Facebook</title>
 </head>
  <body>
  <?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
    <link rel="stylesheet" type="text/css" href="acc.css">
     <meta charset = "UTF-8">
    <script type="text/javascript" src="js/header.js"></script>
<header>
  <div id="my_header"> MyImmoTime
    <form name ="Choix">
      <select name="liste" onChange="lien()" class="box">
      <option value=""> <?php echo $_SESSION['FULLNAME']; ?> </option>
      <option value="logout.php"> Deconnexion </option>
      </select>
    </form>
  </div>
</header>
<?php
include 'connection.php';  
$nomcomplet = $_SESSION['FULLNAME'];
$nomcomplet = explode(' ',$nomcomplet);
$nom = $nomcomplet[0];
$prenom = $nomcomplet[1];
$mail = $_SESSION['FBID'];
$req = $bdd->prepare('INSERT INTO personne (id, nom, prenom, 
cp, ville, sit_am, statut, nbr_enf, mail, tel, endroit, connexion, mdp)
VALUES ("", "'.$nom.'", "'.$prenom.'", "", "", "", "",
"", "'.$mail.'", "", "", "", "")'); 
$req -> execute();

?>

<h1>Bienvenue !</h1>
<p class="texte">MyImmotime vous permet d'étre tenu au courant en temps réels des informations utiles dans l'immobilier</p>
<div class="po">
  <div class="col">
    <p>Localisez les maisons à vendre autour de vous!</p>
    <a href="carte/geoloo.html"><img src="img/proximity-150698_640.png"></a>
  </div>
</div>
<div class="po">
  <div class="col">
    <p>Recherchez les maisons à vendre dans les villes de votre choix</p>
    <a href="tchat.html"><img src="img/rech.png.jpg"></a>
  </div>
</div>
<div class="po">
  <div class="col">
    <p>Déposez une annonce</p>
    <a href="ajout.html"><img src="img/a-vendre.png.jpg"></a>
  </div>
</div>
<div class="po">
  <div class="col">
    <p>Devenez agent immobilier</p>
    <a href="tchat.html"><img src="img/exp.png"></a>
  </div>
</div>
</ul></div></div>
    <?php else: ?>    <!-- Before login --> 
      <link rel="stylesheet" type="text/css" href="style.css">

<h1>My Immotime</h1>
  <body>

    <body class="align">

  <div class="site__container">

    <div class="grid__container">

      <form action="php/get_mail.php" method="post" class="form form--login">

        <div class="form__field">
          <label class="fontawesome-user" for="login__email"><span class="hidden">Email</span></label>
          <input id="login__email" name="login_email" type="email" class="form__input" placeholder="Email" >
        </div>

        <div class="form__field">
          <label class="fontawesome-lock" for="login__password"><span class="hidden">Password</span></label>
          <input id="login__password" name = "login_password"type="password" class="form__input" placeholder="Password">
        </div>

        <div class="form__field">
          <input type="submit" name="sign_in"value="Sign In">
        </div>
        <div class="form__field">
          <a class = "facebook" href="fbconfig.php">Sign in with Facebook</a></div>
      </form>
      <p class="text--center">Not a member? <a href="inscription/formulaire.html">Sign up now</a> <span class="fontawesome-arrow-right"></span></p>
    </div>

  </div>
      
	  </div>
      </div>
    <?php endif ?>
  </body>
</html>
