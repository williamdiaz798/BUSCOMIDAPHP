<?php
    include('MVC/Models/db.php');

    function restaurantes(){
        
        $con = conector();
        $sql = "Select * from tblrestaurante";
        $rsRestaurantes = mysqli_query($con, $sql);
        if(mysqli_num_rows($rsRestaurantes) > 0){
            return $rsRestaurantes;
        }else{
            unset($_GET["url"]);
        }
    }

    function restauranteUltimo(){
        
        $con = conector();
        $sql = "Select * from tblrestaurante ORDER by IdRestaurante DESC LIMIT 1";
        $rsRestaurantes = mysqli_query($con, $sql);
        if(mysqli_num_rows($rsRestaurantes) > 0){
            return $rsRestaurantes;
        }else{
            unset($_GET["url"]);
        }
    }

    function categoriasUltimo(){
        
        $con = conector();
        $sql = "Select * from tblcateria ORDER by IdCateria DESC LIMIT 1";
        $rsCategorias = mysqli_query($con, $sql);
        if(mysqli_num_rows($rsCategorias) > 0){
            return $rsCategorias;
        }else{
            unset($_GET["url"]);
        }
    }

    function categorias(){
        
        $con = conector();
        $sql = "Select * from tblcateria";
        $rsCategorias = mysqli_query($con, $sql);
        if(mysqli_num_rows($rsCategorias) > 0){
            return $rsCategorias;
        }else{
            unset($_GET["url"]);
        }
    }

    function usuarios(){
        $con = conector();
        $sql = "Select * from tblusuarios";
        $rsUsuarios = mysqli_query($con, $sql);
        if(mysqli_num_rows($rsUsuarios) > 0){
            return $rsUsuarios;
        }else{
            unset($_GET["url"]);
        }
    }
?>