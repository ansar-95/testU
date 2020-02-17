<?php
session_start();
include_once 'authentification.traitement.php';

if (isset($_REQUEST["logout"])){
    session_unset();
}

if (isset($_REQUEST["email"]) && isset($_REQUEST["motDePasse"])) {
    $resultat = verification($_REQUEST["email"], $_REQUEST["motDePasse"]);
    if ($resultat == true) {
        $_SESSION["email"] = $_REQUEST["email"];
        $_SESSION["motDePasse"] = $_REQUEST["motDePasse"];
    }
}

if (!preg_match('/\index.php$/i', $_SERVER['REQUEST_URI'])) {
    if (!(isset($_SESSION["email"]) && isset($_SESSION["motDePasse"])))
        header("Location: index.php");
}
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"> 
    <title>Page</title>
  </head>
  <body>
	
		<nav class="navbar navbar-dark bg-primary">
		  <a class="navbar-brand">Navbar</a>
                 <?php if (isset($_SESSION["email"])): ?>
                            <a class="navbar-brand" href="#">Fonction en plus 1</a></li>
                           <a class="navbar-brand" href="#">Fonction en plus 2</a></li>
                    <?php endif; ?>
                
                    <?php if (!isset($_SESSION["email"])): ?>
		  <form class="form-inline">
			<input class="form-control mr-sm-2" name="email" type="email" placeholder="Indentifiant">
			<input class="form-control mr-sm-2" name="motDePasse" type="password" placeholder="mot de passe">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Connexion</button>
		  </form>
                <?php else: ?>
                        <div class="nav navbar-nav pull-right"> 

                            <span class="glyphicon glyphicon-user white xsTabulation" aria-hidden="true">
                            </span>
                            <span class="text-center white xsTabulation"><?php echo $_SESSION["email"]; ?>
                            </span>
                            <span>
                                <a href="<?php echo $_SERVER["PHP_SELF"]; ?>?logout" class="white">
                                    <span class="glyphicon glyphicon-log-out " aria-hidden="true" title="log-out">
                                    </span>    
                                </a>
                            </span>

                        </div>

                    <?php endif; ?>
		</nav>
      
      <?php if (!isset($_SESSION["email"])): ?>
		<center class="text-uppercase"> inscription </center> 
		<div class="container mt-5">
			<div class= "card">
                            <form method='post' action='consultationMembre.traitement.php'>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon minTextBox bgColorTheme" >Nom</span>
                                            <input type="text"  class="form-control" name="nom" id="nom" pattern="[A-Za-z]{3-15}"  required>
                                            
                                        </div>
                                        <span id="nom_manquant"></span>
                                    </div>
                                    <br><br><br>
                                     <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon minTextBox bgColorTheme" >Prenom</span>
                                            <input type="text"  class="form-control" name="prenom" id="prenom" pattern="[A-Za-z]{3-15}"  required>
                                        </div>
                                         <span id="prenom_manquant"></span>
                                    </div>                                   
                                </div>                                
                                <br>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group ">
                                            <span class="input-group-addon bgColorTheme minTextBox">Adresse email</span>
                                            <input type="email" name="email" id="email" class="form-control"  maxlength="45" required>

                                        </div>                                        
                                        <span id="email_manquant"></span>
                                    </div>
                                </div>
                                
                                <br>                                
                                                           
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group ">
                                            <span class="input-group-addon bgColorTheme minTextBox">Mot De Passe</span>
                                            <input type="password" name="motDePasse" id="motDePasse" class="form-control"  maxlength="45" required>

                                        </div>
                                        
                                        <span id="motDePasse_manquant"></span>
                                    </div>
                                </div>
                                
                                <br><br><br>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group ">
                                            <span class="input-group-addon bgColorTheme minTextBox">Date de naissance</span>
                                            <input type="date" id="dateDeNaissance"  min="1905-01-01" name="dateDeNaissance" required>
                                        </div>
                                        <span id="dateDeNaissance_manquant"></span>                                       
                                    </div>
                                </div>       
                                
                                
                      <br>       
                    <div class="row">
                        <div class="col-md-5">
                            <div class="radio-inline">
                                <input type='radio' name='genre' id="genre" value='M'/>  
                                <label for="autre">Homme</label>
                            </div>
                            
                            <div class="radio-inline">
                                <input type='radio' name='genre' id="genre" value='F'/>  
                                <label for="autre">Femme</label>
                            </div>
                            
                        </div>
                    </div>
                    <br />

				  

				  
				  <button type="submit" class="btn btn-primary" id="valider">Inscription</button>
				  
				</form>				
			</div>
		</div>
	<?php endif; ?>	
		

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    
    <script>
        var valider = document.getElementById('valider');
        var nom = document.getElementById('nom');
        var nom_m = document.getElementById('nom_manquant');
        
   
        var prenom = document.getElementById('prenom');
        var prenom_m = document.getElementById('prenom_manquant');

        var motDePasse = document.getElementById('motDePasse');
        var motDePasse_m = document.getElementById('motDePasse_manquant');
        
        var email = document.getElementById('email');
        var email_m = document.getElementById('email_manquant');
        
        var dateNais = document.getElementById('dateDeNaissance');
        var dateNais_m = document.getElementById('dateDeNaissance_manquant');
        

        
        
        valider.addEventListener('click',formulaireV);
        
        function formulaireV(i){
            if(nom.validity.valueMissing){
                nom_m.textContent = 'nom manquant';
                nom_m.style.color = 'red';
                i.preventDefault();
 
            }
            
            if(prenom.validity.valueMissing){
                prenom_m.textContent = 'Saisir un prenom ';
                prenom_m.style.color = 'red';
                i.preventDefault();
            }
            
            if(email.validity.valueMissing){
                email_m.textContent = ' Saisir un email ';
                email_m.style.color = 'red';
                i.preventDefault();
            }            
            
            if(motDePasse.validity.valueMissing){
                motDePasse_m.textContent = 'Saisir mot de Passe';
                motDePasse_m.style.color = 'red';
                i.preventDefault();
                
            }
            
            if(dateNais.validity.valueMissing){
                dateNais_m.textContent = 'Saisir la date de naissance';
                dateNais_m.style.color = 'red';
                i.preventDefault();
                
            } 
            
         
            
            
        }
    </script>
    
    
  </body>
</html>