<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>titre</h1>

    <h1 id="ex1">Exercice 1 :</h1>

    <p>
        <?php 
            if(isset($_GET["ville"]) && isset($_GET["transport"])) {
                echo "La ville choisie est " . $_GET["ville"] . " et le voyage se fera en " . $_GET["transport"];
            }
        ?>
    </p>
    
    <p>Mettre cette URL : <a href="http://formulaire/index.php?ville=Bordeaux&transport=Train">http://formulaire/index.php?ville=Bordeaux&transport=Train</a></p>

    <h1 id="ex2">Exercice 2 :</h1>

    <form action="index.php#ex2" method="GET">
        <label for="animal">Votre animal préféré</label>
        <input type="text" id="animal" name="animal">
        <input type="submit">
    </form>
    <?php 
        if(isset($_GET["animal"])) {
            $animal = $_GET['animal'];
    ?>
    <p>Votre animal choisi est <?php echo $animal; ?></p>
    <?php } ?>

    <h1 id="ex3">Exercice 3 :</h1>

    <form action="index.php#ex3" method="POST">
        <input type="color" id="color" name="color">
        <label for="user">Nom d'utilisateur</label>
        <input type="text" id="user" name="user">
        <input type="submit">
    </form>

    <?php 
        if(isset($_POST["user"]) && isset($_POST['color'])) {
            $bgColor = $_POST['color'];
            $user = $_POST['user'];
    ?>
    <p>Bienvenue <?php echo $user ?></p>
    <style>
        body {
            background-color: <?php echo $bgColor; ?>;
        }
    </style>
    <?php } ?>

    <h1 id="ex4">Exercice 4 :</h1>

    <form action="index.php#ex4" method="POST">
        <input type="number" id="dice" name="dice">
        <input type="submit">
    </form>

    <?php 
        if(isset($_POST["dice"])) {
            $dice = $_POST['dice'];
 
            if($dice % 6 == 0) {
                echo "Vous avez choisi un dès de " . $dice;
            } else {
                echo "Le dès n'est pas un multiple de 6";
            }
        } 
    ?>

    <h1 id="ex5">Exercice 5 :</h1>

    <form action="index.php#ex5" method="POST">
        <label for="utilisateur">Nom d'utilisateur</label>
        <input type="text" id="utilisateur" name="utilisateur">
        <label for="mdp">Mot de passe :</label>
        <input type="text" id="mdp" name="mdp">
        <input type="submit">
    </form>

    <?php 
        if(isset($_POST["utilisateur"]) && isset($_POST["mdp"])) {
            $utilisateur = $_POST['utilisateur'];
            $mdp = $_POST['mdp']; 
            if($utilisateur == 'admin' && $mdp == 1234) {
                header("location:succes.php");
                exit;
            } else {
                echo "Ce n'est pas le bon mot de passe";
            }
        }
    ?>

    <h1 id="ex6">Exercice 6 :</h1>

    <form action="index.php#ex6" method="POST">
        <label for="n1">Premier Nombre</label>
        <input type="number" name="n1" id="n1">
        <label for="n2">Deuxième Nombre</label>
        <input type="number" name="n2" id="n2">
        <select name="math" id="math-list">
            <option value="addition">Addition</option>
            <option value="soustraction">Soustraction</option>
            <option value="multiplication">Multiplication</option>
            <option value="division">Division</option>
        </select>
        <input type="submit">
    </form>

    <?php 
        if(isset($_POST["n1"]) && isset($_POST["n2"]) && isset($_POST['math'])) {
            $math = $_POST['math'];
            $n1 = $_POST['n1'];
            $n2 = $_POST['n2'];
            if($math == 'addition') {
                $result = $n1 + $n2;
            } else if($math == 'soustraction') {
                $result = $n1 - $n2;
            } else if($math == 'multiplication') {
                $result = $n1 * $n2;
            } else if($math == 'division') {
                $result = $n1 / $n2;
            }
    ?>

    <p>Le résultat est : <?php echo $result?></p>
    <?php } ?>

    <h1 id="ex7">Exercice 7 :</h1>

    <form action="index.php#ex7" method="post">
        <label>Montant en euros :</label>
        <input type="number" name="montant" step="0.01">
        <label>Devise :</label>
        <select name="devise">
            <option value="USD">Dollar ($)</option>
            <option value="GBP">Livre (£)</option>
            <option value="JPY">Yen (¥)</option>
            <option value="CHF">Franc suisse</option>
        </select>
        <input type="submit" value="Convertir">
    </form>

    <?php
    if (isset($_POST['montant']) && isset($_POST['devise'])) {

        $montant = floatval($_POST['montant']);
        $devise = $_POST['devise'];

        $taux = [
            "USD" => 1.10,
            "GBP" => 0.86,
            "JPY" => 160.50,
            "CHF" => 0.97
        ];

        if (array_key_exists($devise, $taux)) {
            $resultat = $montant * $taux[$devise];
            echo "<p>$montant € = " . number_format($resultat, 2) . " $devise</p>";
        }
    }
    ?>

    <h1 id="ex8">Exercice 8 :</h1>

    <form action="index.php#ex8" method="post">
        <p>1 - Quelle est la capitale de la France ?</p>
        <input type="radio" name="q1" value="Paris"> Paris<br>
        <input type="radio" name="q1" value="Lyon"> Lyon<br>
        <input type="radio" name="q1" value="Marseille"> Marseille<br>
        <input type="radio" name="q1" value="Nice"> Nice<br>

        <?php 
        if (isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3'])) {
            if ($_POST["q1"] == "Paris") {
                echo "<p> Vrai ! </p>";
            } else {
                echo "<p> Raté, la bonne réponses était Paris </p>";
            }
        } 
        ?>

        <p>2 - Combien y a-t-il de continents ?</p>
        <input type="radio" name="q2" value="5"> 5<br>
        <input type="radio" name="q2" value="6"> 6<br>
        <input type="radio" name="q2" value="7"> 7<br>
        <input type="radio" name="q2" value="8"> 8<br>

        <?php 
        if (isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3'])) {
            if ($_POST["q2"] == "7") {
                echo "<p> Vrai ! </p>";
            } else {
                echo "<p> Raté, la bonne réponses était 7 </p>";
            }
        } 
        ?>

        <p>3 - Quel langage est utilisé côté serveur ?</p>
        <input type="radio" name="q3" value="PHP"> PHP<br>
        <input type="radio" name="q3" value="HTML"> HTML<br>
        <input type="radio" name="q3" value="CSS"> CSS<br>
        <input type="radio" name="q3" value="JavaScript"> JavaScript<br>

        <?php 
        if (isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3'])) {
            if ($_POST["q3"] == "PHP") {
                echo "<p> Vrai ! </p>";
            } else {
                echo "<p> Raté, la bonne réponses était PHP </p>";
            }
        } 
        ?>

        <br>
        <button type="submit">Valider le quiz</button>
    </form>

    <?php
    if (isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3'])) {
        $score = 0;

        if ($_POST["q1"] === "Paris") $score++;
        if ($_POST["q2"] === "7") $score++;
        if ($_POST["q3"] === "PHP") $score++;

        echo "<h3>Résultat</h3>";
        echo "<p>Votre score : <strong>$score / 3</strong></p>";

        if ($score === 3) {
            echo "<p>Félicitations ! Quiz réussi.</p>";
        } else {
            echo "<p >Certaines réponses sont incorrectes.</p>";
        }
    }
    ?>

    <h1 id="ex9">Exercice 9 :</h1>

    <p>Devinez un nombre compris entre <strong>0 et 1000</strong>.</p>

    <form action="index.php#ex9" method="post">
        <input type="number" name="find" min="0" max="1000">
        <input type="submit" value="Tester">
    </form>

    <?php
    if (!isset($_SESSION['mystere'])) {
        $_SESSION['mystere'] = rand(0, 1000);
    }

    if (isset($_POST['find'])) {
        if($_POST['find'] < $_SESSION['mystere']) {
            echo "<p> Le nombre à trouvé est plus grand </p>";
        } else if($_POST['find'] > $_SESSION['mystere']) {
            echo "<p> Le nombre à trouvé est plus petit </p>";
        } else {
            echo 
            "<p> Bravo tu as trouver </p>
            <a href=\"index.php\">Reset le nombre</a>";
            unset($_SESSION['mystere']);
        }
    }
    ?>

    <h1 id="ex10">Exercice 10 :</h1>

    <form action="index.php#ex10" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Uploadé">
    </form>

    <?php
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

        $tmpName = $_FILES['image']['tmp_name'];
        $originalName = $_FILES['image']['name'];

        $imageInfo = getimagesize($tmpName);

        if ($imageInfo !== false) {

            $extension = pathinfo($originalName, PATHINFO_EXTENSION);

            $newName = uniqid("img_", true) . "." . $extension;

            $destination = "uploads/" . $newName;

            move_uploaded_file($tmpName, $destination);

            echo "<p>Image uploadée avec succès !</p>";

            echo "<img src='$destination' width='300'>";

        } else {
            echo "<p>Le fichier n'est pas une image valide.</p>";
        }

    } else {
        echo "<p>Erreur lors de l'upload.</p>";
    }
    ?>



</body>
</html>