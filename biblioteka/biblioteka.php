<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app">
        <div class="banner">
            <h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
        </div>

        <div class="main">
            <div class="main-left">
                <h3>W naszych zbiorach znajdziesz dzieła następujących autorów</h3>

                <ul>
                    <?php
                        $conn=new mysqli('localhost', 'root', '', 'biblioteka');
                        $query1="SELECT imie, nazwisko FROM autorzy;";
                        $sql=$conn->query($query1);

                        while($row=$sql->fetch_assoc()) {
                            echo "<li>{$row['imie']} {$row['nazwisko']}</li>";
                        }
                    ?>
                </ul>
            </div>

            <div class="main-mid">
                <h3>Dodaj nowego czytelnika</h3>

                <form action="biblioteka.php" method="post">
                    imię: <input type="text" name="name"><br>
                    nazwisko: <input type="text" name="surname"><br>
                    rok urodzenia: <input type="text" name="year"><br>
                    <input type="submit" value="DODAJ"><br>

                    <?php
                        echo "Czytelnik {$_POST['name']} {$_POST['surname']} został dodany do bazy danych";

                        $code=strtoupper($_POST['name'][0].$_POST['name'][1].$_POST['surname'][0].$_POST['surname'][1]).$_POST['year'][2].$_POST['year'][3];
                        $query2="INSERT INTO `czytelnicy` (`id`, `imie`, `nazwisko`, `kod`) VALUES (NULL, '{$_POST['name']}', '{$_POST['surname']}', '{$code}');";
                        $conn->query($query2);

                        $conn->close();
                    ?>
                </form>
            </div>

            <div class="main-right">
                <img src="biblioteka.png" alt="książki">

                <h4>
                    ul. Czytelnicza<br>
                    12-120 Książkowice<br>
                    tel.: 123123123<br>
                    email: <a href="mailto:biuro@biblioteka.pl">biuro@biblioteka.pl</a>
                </h4>
            </div>
        </div>

        <div class="footer">
            <p>Projekt strony: Ja</p>
        </div>
    </div>
</body>
</html>
