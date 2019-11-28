<?php
    function conector(){
        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "dbobuscomida";
        $con = new mysqli($server, $user, $pass, $db);
        if(mysqli_error($con))
		{
			die('Conecion fallida '.mysqli_error($con));
			echo 'no hay conexion';
		}
		else
		{
			//echo 'Si exite conexion';
		}
		
		mysqli_set_charset($con, "utf-8");
		return $con;
    }
?>