<div class="navbar navbar-default navbar-fixed-top colorFixNav" role="navigation" id="userDataLogged">
    <div class="container"> 

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle colorUserBtn" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        <strong>Usuario</strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="text-left"><strong><?php echo $_SESSION['user']['name']?></strong></p>
                                        <p class="text-left"><?php echo $_SESSION['user']['mail']?></p>
                                    </div>
                                    <?php if($_SESSION['user']['type'] == 1){?>
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-success col-lg-12" data-toggle="modal" data-target="#cambiarDeTienda">Cambiar de tienda</button>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </li>
                        <li class="divider navbar-login-session-bg"></li>
                        <li class="navbar-login-session-bg">
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>
                                            <a href="cambiarDatosUsuario.php" class="btn btn-primary btn-block">Cambiar Datos</a>
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p>
                                            <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="modal fade" id="cambiarDeTienda" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualmente se encuentra en la tienda del "<?php echo ($_SESSION['user']['store'] == 2)? 'Quinto' : 'Tercero' ?>"</h4>
            </div>
            <div class="modal-body">
                <p>¿Desea cambiar a la tienda del "<?php echo ($_SESSION['user']['store'] == 1)? 'Quinto' : 'Tercero' ?>"</p>
            </div>
            <div class="modal-footer">
                <button onclick="cambiarTienda('<?php echo $_SESSION['user']['store']; ?>')" data-dismiss="modal" type="button" class="btn btn-success">Aceptar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>