<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metal records</title>
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />

    <!-- CSS FILE-->
    <link rel="stylesheet" href="css/main.css" />

    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet" />

</head>

<body>

    <?php

    $band = $_POST['banda'];
    $titol = $_POST['titol'];
    $any = $_POST['any'];
    $missatgeError = "Registre ja introduït";


    try {

        $connexio = new PDO("mysql:host=localhost;dbname=metalrecords", "root", "");

        $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $connexio->exec("SET CHARACTER SET utf8");

        $sql = "INSERT INTO albums (nomBanda,titol, any) values (?,?,?)";

        $resultat = $connexio->prepare($sql);

        $resultat->execute(array($band, $titol, $any));



        //header("refresh:15;url=opcions.php");

        //if ($_POST['titol'] == $titol && $_POST['banda'] == $banda) {

            echo "<h1 >L´album s´ha introduït correctament a la base de dades</h1>";
            echo "<h2>Has introduït el següent registre:</h2>";
            echo "<h3>Banda:  $band</h3>";
            echo "<h3>Títol:  $titol</h3>";
            echo "<h3>Any:  $any</h3>";
            echo "<a href='opcions.php' type='button' class='btn btn-dark btn-lg'>Menú</a>";
            echo "<footer>Sergi Sánchez 2020 @Copyright</footer>";
       // } else {

            echo "<h1> $missatgeError<h1>";
            echo "<a href='insertar.html' type='button' class='btn btn-dark btn-lg'>Tornar</a>";
            echo "<footer>Sergi Sánchez 2020 @Copyright</footer>";
       // }
    } catch (Exception $e) {
        die("Error" . $e->getMessage());
        echo " Hi ha un error  a la línia" . $e->getLine();
    }
    ?>

</body>

</html>