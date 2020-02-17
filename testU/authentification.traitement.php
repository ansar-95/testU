<?php


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

function verification($email, $motDePasse) {
    $compteExistant = false;
    $pdo = gestionnaireDeConnexion();
    if ($pdo != null) {
        $sql = "SELECT count(*) as nb FROM membre "
                . " WHERE email=:email AND motDePasse=:motDePasse";
        $prep = $pdo->prepare($sql);
        $prep->bindParam(':email', $email, PDO::PARAM_STR);
        $prep->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
        $prep->execute();
        $resultat = $prep->fetch();
        if ($resultat["nb"] == 1) {
            $compteExistant = true;
        }
        $prep->closeCursor();
    }
    return $compteExistant;
}