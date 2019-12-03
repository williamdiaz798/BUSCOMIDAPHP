<?php


    function headerPage(){
        ?>
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">

                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <link type="text/css" rel="stylesheet" href="MVC/View/materialize/css/materialize.min.css"  media="screen,projection"/>
                <link type="text/css" rel="stylesheet" href="MVC/View/materialize/css/mycss.css"  media="screen,projection"/>

                <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
                

                <title>BusComida</title>
            </head>
        <?php
    }

    function navPage(){

        if(valSesion()){
            ?>
                <nav class="color" role="navigation">
                    <div class="nav-wrapper container">
                        <a id="logo-container" href="?url=index" class="brand-logo">BusComida</a>
                        <ul class="right hide-on-med-and-down">
                        <li><a href="?url=index">Lista Restaurantes</a></li>
                        <li><a href="?url=cate">Lista Castegorias</a></li>
                        <li><a href="?url=cerrar">Cerrar Sesion</a></li>
                        </ul>
                
                        <ul id="nav-mobile" class="sidenav">
                        <li><a href="?url=index">Lista Restaurantes</a></li>
                        <li><a href="?url=cate">Lista Castegorias</a></li>
                        <li><a href="?url=cerrar">Cerrar Sesion</a></li>
                        </ul>
                        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    </div>
                </nav>
                <br>
            <?php
        }else{
            
        ?>
            <nav role="navigation distance-bottom" class="color">
                <div class="nav-wrapper container ">
                    <a id="logo-container" href="?url=index" class="brand-logo">BusComida</a>
                </div>
            </nav>
            <br>
        <?php
        }

    }

    function login(){
        ?>
            <center>
            <br><br><br>
            <div class="container min-height distance-top-2">
                <div class="section">
                    <div class="row">
                        <div class="col s12">
                            <div class="icon-block">
                                <form class="container" method="post" action="?url=iniciarSession">
                                    <img src="MVC/View/img/login.png" alt="">
                                    <br><br>
                                    <h5>Iniciar Sesion</h5>
                                    <input type="text" name='userCM' placeholder='Usuario' required>
                                    <input type="password" name='passCM' placeholder='Cotraseña' required>
                                    <br><br>
                                    <input type="submit" class = 'btn color' value = 'Iniciar Sesion'>
                                </form>
                            </div>
                        </div>         
                    </div>
                </div>
            </div>
            </center>
        <?php
    }

    function principalPage(){
        $rsRestaurantes = restaurantes();
        

        ?>
            <div class="container min-height">
                <h3><a href="?url=crearRestaurante">Añadir Restaurantes</a></h3>
                    <table class="striped">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Localizacion</th>
                        <th></th>
                    </tr>
                </thead>
        <?php

        while($rowRestaurantes = mysqli_fetch_assoc($rsRestaurantes)){
            $rsCategorias = categorias();
            ?>
            
    
            <tbody>
                <tr>
                    <td><?php echo $rowRestaurantes['NombreRestaurante']?></td>
                    <td>
                    <?php
                        while($rowCategorias = mysqli_fetch_assoc($rsCategorias)){
                            if( $rowRestaurantes['IdCategoria'] == $rowCategorias['IdCateria']){
                                echo $rowCategorias['NombreCateria'];
                                break;
                            }
                        }
                    ?></td>
                    <th><?php echo $rowRestaurantes['LatRestaurante']; echo ' , '; echo $rowRestaurantes['LogRestaurante'];?></th>
                    <th><a href="?url=editarRestaurante&idRestaurante=<?php echo $rowRestaurantes['IdRestaurante']?>">Editar</a></th>
                </tr>
            </tbody>
            <?php
        }

        ?>
            </table>
        </div>
        <?php
    }

    function crearEditaRestaurante($idRestaurante){
        if($idRestaurante!=null){
            $rsRestaurantes = restaurantes();
            
            

            while($rowRestaurantes = mysqli_fetch_assoc($rsRestaurantes)){
                if($idRestaurante == $rowRestaurantes['IdRestaurante']){
                    ?>
                        <div class="container min-height">
                            <div class="container min-height">
                                    <form action="?url=atualizarRestaurante" method="post" enctype="multipart/form-data">
                                        <label for="nombreprod">Nombre</label>
                                        <textarea name="NombreProd" id="nombreprod" cols="30" rows="10" class = 'materialize-textarea'><?php echo $rowRestaurantes['NombreRestaurante'];?></textarea>
                                        <br>
                                        <label for="especialidad">Especialidad</label>
                                        <textarea name="Especialidad" id="especialidad" cols="30" rows="10" class = 'materialize-textarea'><?php echo $rowRestaurantes['EspecialidadRestaurante'];?></textarea>
                                        <br>
                                        <label for="direccion">Direccion</label>
                                        <textarea name="Direccion" id="direccion" cols="30" rows="10" class = 'materialize-textarea'><?php echo $rowRestaurantes['DireccionRestaurante'];?></textarea>
                                        <br>
                                        <label for="categoria">Categoria</label>
                                        <br><br>
                                        <input type="hidden" name="idRestaurante" value = <?php echo $rowRestaurantes['IdRestaurante'];?>>
                                        <select name="Categoria" id = 'categoria' style="display: block;">                                         <!-- En caso de no aparecer ingresar el style-->
                                        <?php
                                        $rsCategorias = categorias();
                                            while($rowCategorias = mysqli_fetch_assoc($rsCategorias)){
                                                
                                                if( $rowRestaurantes['IdCategoria'] == $rowCategorias['IdCateria']){
                                                    ?>
                                                        <option value="<?php echo $rowCategorias['IdCateria'];?>" selected><?php echo $rowCategorias['NombreCateria'];?></option>
                                                    <?php
                                                    break;
                                                }
                                            }
                                        ?>

                                            <?php
                                                $rsCategorias = categorias();
                                                while($rowCategorias = mysqli_fetch_assoc($rsCategorias)){
                                                    ?>
                                                        <option value="<?php echo $rowCategorias['IdCateria'];?>" ><?php echo $rowCategorias['NombreCateria'];?></option>
                                                    <?php
                                                }
                                            ?>
                                        
                                        </select>
                                        <br>
                                        <br><br><br>   
                                        <label for="latitudRestaurante">Latitud</label>
                                        <input type="number" name="latitudRestaurante" id="latitudRestaurante" required value = <?php echo $rowRestaurantes['LatRestaurante'];?>>
                                        <br><br><br>
                                        <label for="longitudRestaurante">Longitud</label>
                                        <input type="number" name="longitudRestaurante" id="longitudRestaurante" required value = <?php echo $rowRestaurantes['LogRestaurante'];?>>
                                        <br>
                                        <!-- <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=san%20salvador&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.utilitysavingexpert.com">Utility Saving Expert</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div> -->
                                        <br><br>
                                        <input type="submit" value="Editar Restaurante" class="btn color"  name = 'enviar'>
                                        
                                        <br><br>
                                    </form>
                                </div>
                    </div>
                    <?php
                    
                }else{
                    //header('location:?url=index');
                }
            }
        }else{
            ?>
            <div class="container min-height">
                <div class="container min-height">
                        <form action="?url=agregarRestaurante" method="post" enctype="multipart/form-data">
                            <label for="nombreprod">Nombre</label>
                            <input type="text" name="NombreProd" id="nombreprod" required>
                            <br>

                            <label for="especialidad">Especialidad</label>
                            <input type="text" name="Especialidad" id="especialidad" required>
                            <br><br>
                            <label for="direccion">Direccion</label>
                            <textarea name="Direccion" id="direccion" cols="30" rows="10" class = 'materialize-textarea'></textarea>
                            <br>
                            <label for="categoria">Categoria</label>
                            <br>
                            <br>
                            <select name="Categoria" style="display: block;">                                         <!-- En caso de no aparecer ingresar el style-->
                                <option value="" disabled selected>Selecione una categoria</option>
                                <?php
                                    $rsCategorias = categorias();
                                    while($rowCategorias = mysqli_fetch_assoc($rsCategorias)){
                                        ?>
                                            <option value="<?php echo $rowCategorias['IdCateria'];?>" ><?php echo $rowCategorias['NombreCateria'];?></option>
                                        <?php
                                    }
                                ?>
                            
                            </select>
                            <br>
                            <br>
                            <label for="latitudRestaurante">Latitud</label>
                            <input type="number" name="latitudRestaurante" id="latitudRestaurante" required step = 'any'>
                            <br><br><br>
                            <label for="longitudRestaurante">Longitud</label>
                            <input type="number" name="longitudRestaurante" id="longitudRestaurante" required step = 'any'>
                            <br>
                            <!-- <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=san%20salvador&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.utilitysavingexpert.com">Utility Saving Expert</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div> -->
                            <br><br>
                            <input type="submit" value="Agregar Restaurante" class="btn color" name = 'enviar'>
                            
                            <br><br>
                        </form>
                    </div>
        </div>
        <?php
        }
    }

    function listaCategorias(){
        ?>
            <div class="container min-height">
            <h3>Lista de Categorias</h3>
            <div class="row">
                <div class="col s6">
                    <a href="?url=crearCate">
                        <h3>Añadir</h3>
                    </a>
                </div>
                
            </div>
            <table class="striped">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $rsCategorias = categorias();
                        while($rowCategorias = mysqli_fetch_assoc($rsCategorias)){
                            ?>
                                <tr>
                                    <td><?= $rowCategorias['NombreCateria']?></td>
                                    <th><a href="?url=editarCate&idCate=<?php echo $rowCategorias['IdCateria'];?>">Editar</a></th>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
    }


    function crearEditaCategoria($idCategoria){
        if($idCategoria != null){
            $rsCategorias = categorias();
            while($rowCategorias = mysqli_fetch_assoc($rsCategorias)){
                if($rowCategorias['IdCateria'] == $idCategoria){
                ?>
                    <div class="container min-height">
                        <div class="container min-height">
                                <form action="?url=actualizarCate" method="post" enctype="multipart/form-data">
                                    <label for="nombreprod">Nombre</label>
                                    <textarea name="NombreProd" id="nombreprod" cols="30" rows="10" class = 'materialize-textarea'><?= $rowCategorias['NombreCateria']?></textarea>

                                    <input type="hidden" name="idCate" value = <?= $rowCategorias['IdCateria']?>>

                                    <br/>
                                    <br/>
                                    <input type="submit" value="Agregar Categoria" class="btn color" name = 'enviar'>
                                    
                                    <br><br>
                                </form>
                            </div>
                        </div>
                <?php
                }
            }
        }else{
            ?>
                <div class="container min-height">
                <div class="container min-height">
                        <form action="?url=agregarCate" method="post" enctype="multipart/form-data">
                            <label for="nombreprod">Nombre</label>
                            <input type="text" name="NombreProd" id="nombreprod" required>
                            <br/>
                            <br/>
                            <input type="submit" value="Agregar Categoria" class="btn color" name = 'enviar'>
                            
                            <br><br>
                        </form>
                    </div>
                </div>
            <?php
        }
    }

    function footerPage(){
        ?><br>
            <footer class="page-footer color">
                <div class="container">
                    <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Buscomida</h5>
                        <p class="grey-text text-lighten-4">Esta pagina es unicamente para control de la APP.</p>


                    </div>
                    
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                    Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
                    </div>
                </div>
            </footer>


            <script src="MVC/View/materialize/js/materialize.js"></script>
            <script src="MVC/View/materialize/js/init.js"></script>

        <?php
    }
?>