<?php
    session_start();

    include('MVC\View\PrincipalModules.php');
    
    include('MVC\Controles\validaciones.php');

    include('MVC\Models\datos.php');
    include('MVC\Models\editores.php');

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

                case 'cate':
                    listaCategorias();
                break;

                case 'crearCate':
                    crearEditaCategoria(null);
                break;

                case 'editarCate':
                    if(isset($_GET['idCate'])){
                        crearEditaCategoria($_GET['idCate']);
                    }
                break;

                case 'agregarCate':
                    if(isset($_POST['enviar'])){
                        agregarCategoria($_POST['NombreProd']);
                    }else{
                        principalPage();
                    }
                break;

                case 'actualizarCate':
                    if(isset($_POST['enviar'])){
                        actualizarCategoria($_POST['idCate'], $_POST['NombreProd']);
                    }else{
                        principalPage();
                    }
                break;

                case 'atualizarRestaurante':
                    if(isset($_POST['enviar'])){
                        actualizarRestaurante($_POST['idRestaurante'], $_POST['NombreProd'],$_POST['Especialidad'],$_POST['Direccion'],$_POST['Categoria'],$_POST['latitudRestaurante'],$_POST['longitudRestaurante']);
                    }else{
                        principalPage();
                    }
                    
                break;

                case 'agregarRestaurante':
                    if(isset($_POST['enviar'])){
                        agregarRestaurante($_POST['NombreProd'],$_POST['Especialidad'],$_POST['Direccion'],$_POST['Categoria'],$_POST['latitudRestaurante'],$_POST['longitudRestaurante']);
                    }else{
                        principalPage();
                    }
                break;

                case 'cerrar':
                    cerrarSession();
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