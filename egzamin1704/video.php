<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="banner">
        <div class="banner-left">
            <h1><a href="skrypt.html">Internetowa wypożyczalnia filmów</a></h1>
        </div>

        <div class="banner-right">
            <table>
                <tr>
                    <td>Rodzaj</td> <td>ilość</td>
                </tr>

                <?php
                    $conn=new mysqli('localhost', 'root', '', 'dane');
                    if($conn) {
                        $query1='SELECT rodzaje.nazwa, COUNT(produkty.nazwa) FROM rodzaje INNER JOIN produkty ON rodzaje.id=produkty.Rodzaje_id WHERE rodzaje.id=7 OR rodzaje.id=12 GROUP BY rodzaje.nazwa;';
                        $sql=$conn->query($query1);

                        while($row=$sql->fetch_assoc()) {
                            echo "<tr> <td>{$row['nazwa']}</td> <td>{$row['COUNT(produkty.nazwa)']}</td> </tr>";
                        }
                    }
                ?>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="reccomendations">
            <h3>Polecamy</h3>

            <div class="movies-container">
                <?php
                    if($conn) {
                        $query2='SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id=18 OR id=22 OR id=23 OR id=25;';
                        $sql=$conn->query($query2);

                        while($row=$sql->fetch_assoc()) {
                            echo "<div class='movie'>";
                            echo "<h4> {$row['id']} {$row['nazwa']}</h4>";
                            echo "<img src='{$row['zdjecie']}' title='{$row['nazwa']}' alt='film'>";
                            echo "<p>{$row['opis']}</p>";
                            echo "</div>";
                        }
                    }
                ?>
            </div>
        </div>

        <hr>

        <div class="movies">
            <p>
                <form action="video.php" method="post">
                    <select name="select">
                        <option value="7">7</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                    </select>

                    <input type="submit" value="Wyświetl">
                </form>
            </p>

            <div class="movies-container">
                <?php
                    if($conn) {
                        if(!empty($_POST['select'])) {
                            $query3="SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id='{$_POST['select']}';";
                            $sql=$conn->query($query3);
    
                            while($row=$sql->fetch_assoc()) {
                                echo "<div class='movie'>";
                                echo "<h4> {$row['id']} {$row['nazwa']}</h4>";
                                echo "<img src='{$row['zdjecie']}' title='{$row['nazwa']}' alt='film'>";
                                echo "<p>{$row['opis']}</p>";
                                echo "</div>";
                            }
                        }
                    }

                    $conn->close();
                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-left">
            <form action="usun.php" method="post">
                <input type="number" name="number" placeholder="Usuń film nr.:">

                <input type="submit" value="Usuń film">
            </form>
        </div>

        <div class="footer-mid">
            <a href="mailto:wideo@video.pl">skontaktuj się z nami</a>
        </div>

        <div class="footer-right">
            <ul>
                <li>Autorem strony jest: Hozakowski</li>
                <li>Prawa autorskie zastrzeżone &copy;</li>
            </ul>
        </div>
    </div>
</body>
</html>
