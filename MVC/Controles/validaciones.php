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

    function inicaSession($Usuario, $Pass){
        $rsUsuarios = usuarios();

        while($rowUsuario = mysqli_fetch_assoc($rsUsuarios)){
            $nombre = $rowUsuario['NombreUsuario'];
            $pass = $rowUsuario['Password'];

            if($Usuario == $rowUsuario['NombreUsuario']  && $rowUsuario['TipoUsuario'] == 1){
                $_SESSION['usuario'] = $Usuario;
                header('location:?url=index');
            }else{
                header('location:?url=login');
            }
        }
    }

?>