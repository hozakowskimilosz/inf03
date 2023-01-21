<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gromady kręgowców</title>
    <link rel="stylesheet" href="style12.css  ">
</head>
<body>
    <div id="menu">
        <a href="gromada-ryby.html">gromada ryb</a>

        <a href="gromada-ptaki.html">gromada ptaków</a>

        <a href="gromada-ssaki.html">gromada ssaków</a>
    </div>

    <div id="logo">
        <h2>GROMADY KRĘGOWCÓW</h2>
    </div>

    <div id="main">
        <div id="left">
            <?php
                $conn=mysqli_connect("localhost", "root", "", "baza");

                $q1="SELECT zwierzeta.id, zwierzeta.Gromady_id, zwierzeta.gatunek, zwierzeta.wystepowanie, gromady.nazwa FROM zwierzeta INNER JOIN gromady ON zwierzeta.Gromady_id=gromady.id WHERE gromady.id=4 OR gromady.id=5;";

                $result=mysqli_query($conn, $q1);

                while($row=mysqli_fetch_assoc($result)) {
                    echo "<p>".$row["id"].". ".$row["gatunek"]."</p>";
                    echo "<p>Występowanie: ".$row["wystepowanie"].", "."gromada ".$row["nazwa"]."</p>";
                    echo "<hr>";
                }

                mysqli_close($conn);
            ?>
        </div>

        <div id="right">
            <h1>PTAKI</h1>

            <ol>
                <?php
                    $conn2=mysqli_connect("localhost", "root", "", "baza");

                    $q2="SELECT gatunek, obraz FROM zwierzeta INNER JOIN gromady ON zwierzeta.Gromady_id=gromady.id WHERE gromady.id=4;";
                
                    $result2=mysqli_query($conn2, $q2);

                    while($row2=mysqli_fetch_assoc($result2)) {
                        echo "<li><a href='".$row2["obraz"]."'>".$row2["gatunek"]."</a></li>";
                    }

                    mysqli_close($conn2);
                ?>
            </ol>

            <img src="sroka.jpg" alt="Sroka zwyczajna, gromada ptaki">
        </div>
    </div>

    <div id="footer">
        Stronę o kręgowcach przygotował: Miłosz Hozakowski
    </div>
</body>
</html>