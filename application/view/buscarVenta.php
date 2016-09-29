<?php include('header.php');?>
<?php include('nav_menu.php'); ?>
<?php include('userNav.php'); ?>
<div class="contentMain">
	<form class="form-horizontal">
			<fieldset class="addProductFormWidth">
				<!-- Form Name -->
				<legend>Agregar Vendedor</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="searchSale">Ingrese número de venta</label>  
					<div class="col-md-4">
						<input name="searchSale" id="searchSale" type="text" placeholder="12345678" class="form-control input-md" >
					</div>
				</div>
				<!-- Button (Double) -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="searchSaleButton"></label>
					<div class="col-md-8">
						<button type="button" id="searchSaleButton" name="searchSaleButton" class="btn btn-success">Buscar</button>
					</div>
				</div>
			</fieldset>
		</form>
</div>
<?php include('footer.php'); ?>

