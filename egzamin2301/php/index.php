<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="main-wrapper">
        <div class="left">
            <h1>Akta pracownicze</h1>

            <?php
                $conn=new mysqli('localhost', 'root', '', 'firma');

                $query1="SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id=2;";
                $sql=$conn->query($query1);

                while($row=$sql->fetch_assoc()) {
                    echo "<h3>Dane</h3>";
                    echo "<p>{$row['imie']} {$row['nazwisko']}</p>";
                    echo "<hr>";
                    echo "<h3>adres</h3>";
                    echo "<p>{$row['adres']}</p><p>{$row['miasto']}</p>";
                    echo "<hr>";
                    if($row['czyRODO']==1) {
                        echo "<p>RODO: podpisano</p>";
                    }
                    else {
                        echo "<p>RODO: niepodpisano</p>";
                    }
                    if($row['czyBadania']==1) {
                        echo "<p>Badania: aktualne</p>";
                    }
                    else {
                        echo "<p>Badania: nieaktualne</p>";
                    }
                }
            ?>

            <hr>

            <h3>Dokumenty pracownika</h3>

            <a href="cv.txt">Pobierz</a>

            <h1>Liczba zatrudnionych pracowników</h1>

            <p>
                <?php
                    $query2="SELECT COUNT(*) FROM pracownicy;";
                    $sql=$conn->query($query2);
                    
                    while($row=$sql->fetch_assoc()) {
                        echo $row['COUNT(*)'];
                    }
                ?>
            </p>
        </div>

        <div class="right">
            <?php
                $query3="SELECT id, imie, nazwisko FROM pracownicy WHERE id=2;";
                $sql=$conn->query($query3);

                while($row=$sql->fetch_assoc()) {
                    echo "<img src='{$row['id']}.jpg' alt='pracownik'";
                    echo "<h2>{$row['imie']} {$row['nazwisko']}</h2>";
                }

                $query4="SELECT pracownicy.id, stanowiska.opis, stanowiska.nazwa FROM pracownicy INNER JOIN stanowiska ON pracownicy.stanowiska_id=stanowiska.id LIMIT 1;";
                $sql=$conn->query($query4);

                while($row=$sql->fetch_assoc()) {
                    echo "<h4>{$row['nazwa']}</h4>";
                    echo "<h5>{$row['opis']}</h4>";
                }

                $conn->close();
            ?>
        </div>
    </div>

    <div class="footer">
        <p>Autorem aplikacji jest: <i>Miłosz Hozakowski</i></p>

        <ul>
            <li><a href="http://agencjareklamowa543.pl/" target="_blank">skontaktuj się</a></li>
            <li><a href="mailto:ja@portal.pl">poznaj naszą firmę</a></li>
        </ul>
    </div>
</body>
</html>