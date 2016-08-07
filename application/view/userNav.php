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
                                        <p>
                                         <?php   if ( isset($_POST['editNameUser'] ) ) {
                                                $_SESSION['user']['name']   = $value['usu_name'];}
                                                if ( isset($_POST['editMailUser'] ) ) {
                                                $_SESSION['user']['mail']   = $value['usu_mail'];}

                                                if ( isset($_POST['editRutUser'] ) ) {
                                                $_SESSION['user']['rut']   = $value['usu_rut'];}

                                                if ( isset($_POST['editPassUser'] ) ) {
                                                $_SESSION['user']['pass']   = $value['usu_pass'];
                                            }
                                         ?>
                                            <button onclick="location.href = 'cambiarDatosusuario.php';updateUserLogged(
                                            '<?php echo $value['usu_id']; ?>',
                                            '<?php echo $value['usu_name']; ?>',
                                            '<?php echo $value['usu_mail']; ?>',
                                            '<?php echo $value['usu_rut'];  ?>',
                                            '<?php echo $value['usu_pass']; ?>)" class="btn btn-primary btn-block">Cambiar Datos</button>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider navbar-login-session-bg"></li>
                        <li class="navbar-login-session-bg">
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
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