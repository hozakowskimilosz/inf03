<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
  </head>
  <body>
    <div class="banner-container">
        <div class="banner-left">
            <h2>Nasze osiedle</h2>
        </div>

        <div class="banner-right">
            <?php   
                $conn=new mysqli('localhost', 'root', '', 'portal');

                $query1 = "SELECT COUNT(id) FROM dane;";
                $sql=$conn->query($query1);
                while($row=$sql->fetch_assoc()) {
                    echo "<h5>Liczba użytkowników portalu: " . $row['COUNT(id)'] . "</h5>";
                }
            ?>
        </div>
    </div>

    <div class="main-container">
        <div class="main-left">
            <form action="uzytkownicy.php" method="post">
                login<br>
                <input type="text" name="login"><br>
                haslo<br>
                <input type="password" name="password"><br>
                <input type="submit" value="Zaloguj">
            </form>
        </div>

        <div class="main-right">
            <h3>Wizytówka</h3>

            <?php
                $login=$_POST['login'];
                $password=$_POST['password'];

                if(!empty($login) && !empty($password)) {
                    $query2 = "SELECT haslo FROM uzytkownicy WHERE login LIKE '{$login}';";
                    $sql = $conn->query($query2);
                    
                    if(mysqli_num_rows($sql)==0) {
                        echo "Login nie istnieje";
                    }
                    else {
                        $unhashedPassword = sha1($password);

                        if(mysqli_num_rows($sql)==1) {
                            while($row=$sql->fetch_assoc()) {
                                if($unhashedPassword==$row['haslo']) {
                                    $query3 = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy INNER JOIN dane USING(id) WHERE uzytkownicy.login LIKE '{$login}';";
                                    $sql = $conn->query($query3);

                                    while($row=$sql->fetch_assoc()) {
                                        $age = 2023 - $row['rok_urodz'];
                                        echo "<div class='card'>";
                                        echo "<img src='{$row['zdjecie']}' alt='osoba'";
                                        echo "<h4>{$row['login']} ({$age})</h4>";
                                        echo "<p>hobby: {$row['hobby']}</p>";
                                        echo "<h1><img src='icon-on.png' class='photo'>{$row['przyjaciol']}</h1>";
                                        echo "<a href='dane.html'><button>Więcej informacji</button></a>";
                                    }
                                }
                                else {
                                    echo "Nieprawidłowe hasło";
                                }
                            }
                        }
                    }
                }
                $conn->close();
            ?>
        </div>
    </div>

    <div class="footer">
        <p>Stronę wykonał: Ja</p>
    </div>

    <script src="script.js"></script>
  </body>
</html>
