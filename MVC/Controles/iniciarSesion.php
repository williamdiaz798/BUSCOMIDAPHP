<?php

    session_start();

    $_SESSION['usuario'] = $_POST['userCM'];

    header('location:../../../../Buscomida');

?>