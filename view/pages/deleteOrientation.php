<?php
    include '../../controller/orientationC.php';
    $orientationC = new orientationC();
    $orientationC->deleteOrientation($_GET["id"]);
    header('Location:tables.php');

