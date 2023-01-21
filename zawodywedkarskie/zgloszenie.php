<?php
    $conn = new mysqli('localhost', 'root', '', 'wedkarstwo');
    $query1 = "INSERT INTO `zawody_wedkarskie`(`Karty_wedkarskie_id`, `Lowisko_id`, `data_zawodow`, `sedzia`) VALUES (0, " . $_POST['lowisko'] . ", '".$_POST['data']."', '".$_POST['sedzia']."');";
    $conn->query($query1);
    $conn->close();

    header('location:zawody.html');
?>