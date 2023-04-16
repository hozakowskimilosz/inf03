<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css" />
  </head>
  <body>
    <div class="banner">
      <div class="banner-left">
        <h1>Internetowa wypożyczalnia filmów</h1>
      </div>

      <div class="banner-right">
        <table>
          <tr>
            <td>Kryminał</td>
            <td>Horror</td>
            <td>Przygodowy</td>
          </tr>

          <tr>
            <td>20</td>
            <td>30</td>
            <td>20</td>
          </tr>
        </table>
      </div>
    </div>

    <div class="container">
        <div class="reccomendations">
          <h3>Polecamy</h3>
          
          <?php
            $conn=new mysqli('localhost', 'root', '', 'dane3');
            
            $query1='SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id=18 OR id=22 OR id=23 OR id=25;';
            $sql=$conn->query($query1);
    
            while($row=$sql->fetch_assoc()) {
                echo "<div class='movie'>";
                echo "<h4>{$row['id']}. {$row['nazwa']}</h4>";
                echo "<img src='{$row['zdjecie']}' alt='film'>";
                echo "<p>{$row['opis']}</p>";
                echo "</div>";
            }
          ?>
        </div>
    
        <div class="fantastic">
          <h3>Filmy fantastyczne</h3>
    
          <?php
            $query2='SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id=12;';
            $sql=$conn->query($query2);
    
            while($row=$sql->fetch_assoc()) {
                echo "<div class='movie'>";
                echo "<h4>{$row['id']}. {$row['nazwa']}</h4>";
                echo "<img src='{$row['zdjecie']}' alt='film'>";
                echo "<p>{$row['opis']}</p>";
                echo "</div>";
            }
          ?>
        </div>
    </div>

    <div class="footer">
      <form action="video.php" method="post">
        <input type="number" name="number" />
        <input type="submit" value="Usuń film" />

        <?php
            if(!empty($_POST['number'])) {
                $query3="DELETE FROM produkty WHERE id={$_POST['number']};";
                $conn->query($query3);
            }

            $conn->close();
        ?>
      </form>

      <p>Stronę wykonał: <a href="mailto:ja@poczta.fm">Ja</a></p>
    </div>
  </body>
</html>
