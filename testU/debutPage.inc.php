
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Festival Folklorique</title>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="bootstrap/css/theme.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <div class="row">
                    <img alt="html5" src="img/html5.jpg" />
                </div>
        </div>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                

                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        </a>
                    <a class="navbar-brand" href="index.php">Festival Folklorique</a>
                    <button type="button" class="navbar-toggle" data-toggle=" 
                            collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span>   

                    </button>

                </div>
                <?php if (isset($_SESSION["email"])): ?>
                    <div id="navbar" class="navbar-collapse collapse" >
                        <ul class="nav navbar-nav"> 
                            <li><a class="navbar-brand" href="gestionEtablissements.php">
                                    Gestion des établissements</a></li>
                            <li><a class="navbar-brand" href="gestionGroupes.php">Gestion des groupes</a></li>
                            <li><a class="navbar-brand" href="gestionAttributions.php">Gestion des attributions</a></li>
                        </ul>
                    <?php endif; ?>
                    <?php if (!isset($_SESSION["email"])): ?>
                        <form  method="post" class="navbar-form navbar-right" role="form" 
                               action="index.php">

                            <div class="form-group">

                                <input name="user" type="text" placeholder="Email" class="form-control">

                            </div>
                            <div class="form-group">
                                <input name="mdp" type="password" placeholder="Password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">S'authentifier</button>

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

                </div>
            </div>
        </nav>


        <br />

