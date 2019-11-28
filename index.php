<?php
    session_start();

    include('MVC\View\PrincipalModules.php');
    
    include('MVC\Controles\validaciones.php');

    include('MVC\Models\datos.php');

    headerPage();

    navPage();

    if(valSesion()){

        if(isset($_GET['url'])){
            switch ($_GET['url']){
                case 'crearRestaurante':
                    crearEditaRestaurante(null);
                break;

                case 'editarRestaurante':
                    if(isset($_GET['idRestaurante'])){
                        crearEditaRestaurante($_GET['idRestaurante']);
                    }
                break;

                default:
                    principalPage();
                break;
            }
        }else{
            principalPage();
        }

    }else{

        if(isset($_GET['url'])){
            if($_GET['url'] == 'iniciarSession'){
                if(isset($_POST['userCM']) || isset($_POST['userCM']) ){
                    inicaSession($_POST['userCM'],$_POST['passCM']);
                }else{
                    login();
                }
            }else{
                login();
            }
        }else{
            login();
        }
    }

    footerPage();
?>