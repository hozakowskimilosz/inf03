<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="banner">
        <h1>Forum miłośników psów</h1>
    </div>

    <div class="container">
        <div class="left">
            <img src="Avatar.png" alt="Użytkownik forum">

            <?php
                $conn=mysqli_connect('localhost', 'root', '' , 'forumpsy');
                $query="SELECT konta.nick, konta.postow, pytania.pytanie FROM konta INNER JOIN pytania USING(id) WHERE pytania.id=1;";

                $sql=$conn->query($query);

                while($row=$sql->fetch_assoc()) {
                    echo "<h4>Użytkownik: ".$row['nick']."</h4>";
                    echo "<p>".$row['postow']." postow</p>";
                    echo "<p>".$row['pytanie']."</p>";
                }
            ?>

            <video controls loop>
                <source src="video.mp4">
            </video>
        </div>

        <div class="right">
            <form action="index.php" method="POST">
                <textarea name="textarea" cols="40" rows="4"></textarea>
                <br>
                <input type="submit" value="Dodaj odpowiedź">

                <?php
                    $query2 = "INSERT INTO `odpowiedzi`(`Pytania_id`, `konta_id`, `odpowiedz`) VALUES (2, 6,'" . $_POST['textarea'] . "');";

                    if(!is_null($_POST['textarea'])) {
                        $sql2=$conn->query($query2);
                    }
                ?>
            </form>

            <h2>Odpowiedzi na pytanie</h2>

            <ol>
                <?php
                    $query3="SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi INNER JOIN konta ON odpowiedzi.konta_id=konta.id WHERE Pytania_id=1;";

                    $sql3=$conn->query($query3);

                    while($row=$sql3->fetch_assoc()) {
                        echo "<li>" . $row['odpowiedz'] . " <em>" . $row['nick'] . "</em><hr></li>"; 
                    }
                ?>
            </ol>
        </div>
    </div>

    <div class="footer">
        <p>Autor: Ja <span><a href="http://mojestrony.pl/" target="_blank">Zobasz nasze realizacje</a></span></p>
    </div>
</body>
</html>