<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognoza pogody Poznań</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div class="banner">
        <div class="banner-left">
            <p>maj, 2019 r.</p>
        </div>

        <div class="banner-mid">
            <h2>Prognoza dla Poznania</h2>
        </div>

        <div class="banner-right">
            <img src="logo.png" alt="prognoza">
        </div>
    </div>

    <div class="section">
        <div class="section-left">
            <a href="kwerendy.txt">Kwerendy</a>
        </div>

        <div class="section-right">
            <img src="obraz.jpg" alt="Polska, Poznań">
        </div>
    </div>

    <div class="main">
        <table>
            <?php
                $conn=mysqli_connect('localhost', 'root', '' , 'prognoza');
                $query='SELECT * FROM pogoda WHERE miasta_id=2 ORDER BY data_prognozy DESC;';

                $sql=$conn->query($query);
                echo "<tr><th>Lp.</th> <th>DATA</th> <th>NOC-TEMPERATURA</th> <th>DZIEŃ-TEMPERATURY</th> <th>OPADY [mm/h]</th> <th>CIŚNIENIE [hPa]</th></tr>";
                echo "<tr>";
                $i=1;
                while($row=$sql->fetch_assoc()) {
                    echo "<td>".$i."</td>"."<td>".$row['data_prognozy']."</td>"."<td>".$row['temperatura_noc']."</td>"."<td>".$row['temperatura_dzien']."</td>"."<td>".$row['opady']."</td>"."<td>".$row['cisnienie']."</td>";
                    echo "</tr>";
                    $i++;
                }
                $conn->close();
            ?>
        </table>
    </div>

    <div class="footer">
        <p>Stronę wykonał: 000000000</p>
    </div>
</body>
</html>
