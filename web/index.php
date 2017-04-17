<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>

    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <meta charset="utf-8">

    <script src="./jquery.min.js"></script>
    <script src="js/ajax.js"></script>

    <title>Web Evenementiel</title>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#contents').load('pages/home.html');
        });
    </script>

</head>
<body>

<header>
    <h1>Le web evenementiel</h1>
    <nav>
        <ul>
            <li class="active">Accueil</li>
            <li>Créer un événement</li>
            <li>Mes événements</li>
            <li>Mon compte</li>
            <li>Nous contacter</li>
        </ul>
    </nav>
    <div id="login">
        <div class="login_helper">
            <a id="signin_button" href=""><span>Connexion</span></a>
            <br>
            <a id="signup_button" href="create_profile.php"><span>Inscription</span></a>
        </div>
    </div>
</header>
	
<section id="contents">

</section>

</body>
</html>		