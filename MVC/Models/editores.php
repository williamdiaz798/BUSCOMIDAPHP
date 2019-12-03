<?php
    function agregarRestaurante($nombreRestaurante, $especialidadRestaurante, $direccionRestaurante, $categoriaRestaurante, $latRestaurante, $logRestaurante){
        $con = conector();

        $rsRestaurantes = restauranteUltimo();

        while($rowRestaurantes = mysqli_fetch_assoc($rsRestaurantes)){
            $ultimo =  $rowRestaurantes['IdRestaurante'] + 14;
            
        }

        $sql2 = "insert into tblrestaurante(IdRestaurante, NombreRestaurante, LatRestaurante, LogRestaurante, EspecialidadRestaurante, IdCategoria, DireccionRestaurante) values ('".$ultimo."','".$nombreRestaurante."','".$latRestaurante."','".$logRestaurante."','".$especialidadRestaurante."','".$categoriaRestaurante."','".$direccionRestaurante."');";
        $rsRestaurantes2 = mysqli_query($con, $sql2);

        header('location:?url=index');
    }

    function actualizarRestaurante($idRestaurante,$nombreRestaurante, $especialidadRestaurante, $direccionRestaurante, $categoriaRestaurante, $latRestaurante, $logRestaurante){
        $con = conector();
        
        $sql2 = "update tblrestaurante set NombreRestaurante = '".$nombreRestaurante."', LatRestaurante = '".$latRestaurante."', LogRestaurante = '".$logRestaurante."', EspecialidadRestaurante = '".$especialidadRestaurante."', IdCategoria = '".$categoriaRestaurante."', DireccionRestaurante = '".$direccionRestaurante."' where IdRestaurante = '".$idRestaurante."'";
        
        echo $sql2;

        $rsRestaurantes2 = mysqli_query($con, $sql2);

        header('location:?url=index');
    }

    function agregarCategoria($nombreCategoria){
        $con = conector();

        $rsCategoria = categoriasUltimo();

        while($rowCategoria = mysqli_fetch_assoc($rsCategoria)){
            $ultimo =  $rowCategoria['IdCateria'] + 1;
        }//NombreCateria

        $sql2 = "insert into tblcateria(IdCateria, NombreCateria) values ('".$ultimo."','".$nombreCategoria."');";

        echo $sql2;

        $rsRestaurantes2 = mysqli_query($con, $sql2);

        header('location:?url=cate');
    }
    

    function actualizarCategoria($idCategoria, $nombreCategoria){
        $con = conector();

        $sql2 = "update tblcateria set NombreCateria = '".$nombreCategoria."' where IdCateria = '".$idCategoria."';";

        echo $sql2;

        $rsRestaurantes2 = mysqli_query($con, $sql2);

        header('location:?url=cate');
    }
?>