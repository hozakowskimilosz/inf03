<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>piłka nożna</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div class="banner">
        <h3>Reprezentacja polski w piłce nożnej</h3>

        <img src="obraz1.jpg" alt="reprezentacja">
    </div>

    <div class="submain-container">
        <div class="submain-left">
            <form action="liga.php" method="post">
                <select name="select" id="">
                    <option value=""></option>
                    <option value="1">Bramkarze</option>
                    <option value="2">Obrońcy</option>
                    <option value="3">Pomocnicy</option>
                    <option value="4">Napastnicy</option>
                </select>

                <input type="submit" value="Zobacz">
            </form>

            <img src="zad2.png" alt="piłka">

            <p>Autor: Ja</p>
        </div>

        <div class="submain-right">
            <ol>
                <?php
                    $conn = new mysqli('localhost', 'root', '', 'egzamin');
                    
                    if(!empty($_POST['select'])) {
                        $query1 = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id=" . $_POST['select'] . ";";
                        $sql = $conn->query($query1);

                        while($row=$sql->fetch_assoc()) {
                            echo "<li><p>" . $row['imie'] . " " . $row['nazwisko'] . "</p></li>";
                        }
                    }
                ?>
            </ol>
        </div>
    </div>

    <div class="main">
        <h3>Liga mistrzów</h3>
    </div>

    <div class="league">
        <?php
            $query2 = "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC;";
            $sql = $conn->query($query2); 

            while($row=$sql->fetch_assoc()) {
                echo "<div class='league-div'><h2>".$row['zespol']."</h2><h1>".$row['punkty']."</h1><p>grupa:".$row['grupa']."</div>";
            }

            $conn->close();
        ?>
    </div>
</body>
</html>