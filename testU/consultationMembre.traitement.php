<?php

if (isset($_REQUEST)) {
        $prenom = $_REQUEST['prenom'];
	$nom = $_REQUEST['nom'];
	$email = $_REQUEST['email'];
	$motDePasse = $_REQUEST['motDePasse'];
	$dateNais = $_REQUEST['dateDeNaissance'];
	$genre = $_REQUEST['genre'];

    creationMembre($prenom,$nom,$email,$motDePasse,$dateNais,$genre);
  
}

	function gestionnaireDeConnexion() {
		$pdo = null;
		try {
			$pdo = new PDO(
					'mysql:host=localhost;dbname=projet', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			);
		} catch (PDOException $err) {
			$messageErreur = $err->getMessage();
			error_log($messageErreur, 0);
		}
		return $pdo;
	}
	
	
function creationMembre($prenom,$nom,$email,$motDePasse,$dateNais,$genre) {
    $pdo = gestionnaireDeConnexion();
    if($pdo != null)
	{
            $prenom = $pdo->quote($prenom);
            $nom = $pdo->quote($nom);
            $email = $pdo->quote($email);
            $motDePasse = $pdo->quote($motDePasse);
            $dateNais = $pdo->quote($dateNais);
            $genre = $pdo->quote($genre);
			
            $req = "insert into membre (prenom,nom,email,motDePasse,dateNais,genre)"
            . "values($prenom,$nom,$email,$motDePasse,$dateNais,$genre)";
			
            $pdo->exec($req);
			
	}
}//finfonction
header("Location:index.php");
?>