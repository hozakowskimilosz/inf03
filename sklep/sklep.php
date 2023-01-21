<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div class="banner-container">
        <div class="banner-left">
            <h1>Internetowy sklep z eko-warzywami</h1>
        </div>

        <div class="banner-right">
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li> <a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
            </ol>
        </div>
    </div>

    <div class="main-container">
        <?php
            $conn = new mysqli('localhost', 'root', '', 'dane2');
            $query1 = 'SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE Rodzaje_id=1 OR Rodzaje_id=2';
            $sql = $conn->query($query1);

            while($row=$sql->fetch_assoc()) {
                echo "<div class='main-div'><img src='".$row['zdjecie']."'> <h5>".$row['nazwa']."</h5> <p>opis: ".$row['opis']."</p> <p>na stanie: ".$row['ilosc']."</p> <h2>".$row['cena']."</h2></div>";
            }
        ?>
    </div>

    <div class="footer">
        <form action="sklep.php" method="POST">
            Nazwa: <input type="text" name="name">
            Cena: <input type="text" name="price">
            <input type="submit" value="Dodaj produkt">
        </form>

        <?php
            if(!empty($_POST['name']) && !empty($_POST['price'])) {
                $query2 = "INSERT INTO `produkty`(`Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES (1, 4, '".$_POST['name']."', 10, '', ".$_POST['price'].", 'owoce.jpg');";

                $conn->query($query2);
            }

            $conn->close();
        ?>

        <p>Stronę wykonał: Ja</p>
    </div>
</body>
</html>