<?php
    $conn=new mysqli('localhost', 'root', '', 'dane');

    if(!empty($_POST['number'])) {
        $query4="DELETE FROM produkty WHERE id={$_POST['number']};";
        $conn->query($query4);
    }

    $conn->close();
    header('location:video.php');
?>