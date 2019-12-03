<?php

    function valSesion(){
        $estado;

        if(isset($_SESSION['usuario'])){
            $estado = true;
        }else{
            $estado = false;
        }

        return $estado;
    }

    function inicaSession($Usuario, $PassW){
        $rsUsuarios = usuarios();

        $pass = hash('sha256', $PassW);

        $pass2 = hash('sha256', hash('sha256', $PassW) . 'hola');

        while($rowUsuario = mysqli_fetch_assoc($rsUsuarios)){
            $nombre = $rowUsuario['NombreUsuario'];

            if($Usuario == $rowUsuario['NombreUsuario']  && $rowUsuario['TipoUsuario'] == 1 && $pass2 == $rowUsuario['Password']){
                $_SESSION['usuario'] = $Usuario;

                header('location:?url=index');
            }else{
                header('location:?url=login');
            }
        }
    }

    function cerrarSession(){
        session_destroy();
        header('location:?url=index');
    }

?>