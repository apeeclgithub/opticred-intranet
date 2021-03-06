<?php include('header.php');?>
<div class="container">
	<div class="row">
		<div class="contentLogin">
			<h4 style="border-bottom: 1px solid #c5c5c5;">
				<i class="glyphicon glyphicon-user">
				</i>
				Acceso
			</h4>
			<div style="padding: 20px;" id="form-olvidado">
				<h4 class="">
					Iniciar Sesión
				</h4>
				<fieldset>
					<div class="form-group input-group">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-user"></i>
						</span>
						<input id="userRut" class="form-control" placeholder="Rut" name="rut" type="text" autofocus="">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-lock">
							</i>
						</span>
						<input id="userPass" class="form-control" placeholder="Password" name="password" type="password" value="">
					</div>
					<div class="form-group">
						<button onclick="login()" type="submit" class="btn btn-primary btn-block">
							Ingresar
						</button>
						<p class="help-block">
							<a class="pull-right text-muted noHover" href="#" id="olvidado"><small>¿Olvidó su contraseña?</small></a>
						</p>
					</div>
				</fieldset>
			</div>
			<div style="display: none;" id="form-olvidado1">
				<h4 class="">
					¿Olvidó su contraseña?
				</h4>
				<div accept-charset="UTF-8" role="form" id="login-recordar" method="post">
					<fieldset>
						<span class="help-block">
							Ingrese Rut que utiliza para iniciar sesión.
							<br><br>
							Su contraseña será enviada al e-mail asociado al rut ingresado.
						</span>
						<div class="form-group input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
							<input class="form-control" id="rutRecover" placeholder="Rut" name="rutRecover" type="text" >
						</div>
						<button type="submit" onclick="recoverPasword()" class="btn btn-primary btn-block" id="btn-olvidado">
							Continuar
						</button>
						<p class="help-block">
							<a class="text-muted noHover" href="#" id="acceso1"><small>Acceso</small></a>

						</p>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
<script src="../../public/js/zLogin.js"></script>