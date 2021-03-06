<?php echo $headercat;?>
   <div class="row" style="display:<?php if (!isset($mensaje) || $mensaje=="") echo "none"; ?>">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="alert <?php echo $tipoAlerta;?>">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<?php echo $mensaje;?>	
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1" >
				<div class="panel panel-default">
			  	<!-- Default panel contents -->
			  		<div class="panel-heading" > <?php echo $page_title;?>  </div>
			  			<div class="panel-body">
							
							<form action="<?php echo site_url('catalogos/proyecto/edit'); ?>" method="post">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
												value="<?php echo $this->security->get_csrf_hash(); ?>">
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group <?php if(form_error('idproyecto')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Código: </label>
											<input class="form-control" readonly type="text" name="idproyecto" id="idproyecto" value="<?php echo $datosproyecto->idproyecto; ?>" maxlength="40">
											<?php echo form_error('idproyecto','<div class="help-block" >','</div>'); ?>
										</div>
									</div>
									<div class="col-lg-8">
										<div class="form-group <?php if(form_error('nombre')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Nombre: </label>
											<input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $datosproyecto->nombre; ?>" maxlength="40">
											<?php echo form_error('nombre','<div class="help-block" >','</div>'); ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group <?php if(form_error('nombreedificio')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Nombre del edificio: </label>
											<input class="form-control" type="text" name="nombreedificio" id="nombreedificio" value="<?php echo $datosproyecto->nombreedificio; ?>" maxlength="60">
											<?php echo form_error('nombreedificio','<div class="help-block" >','</div>'); ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group <?php if(form_error('entidadvendedora')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Entidad vendedora: </label>
											<input class="form-control" type="text" name="entidadvendedora" id="entidadvendedora" value="<?php echo $datosproyecto->entidadvendedora; ?>" maxlength="60">
											<?php echo form_error('entidadvendedora','<div class="help-block" >','</div>'); ?>
										</div>
									</div>
								</div>
								<div class="row">
	                  				<div class="col-lg-4">
		                  					<div class="form-group <?php if(form_error('dialimite')) echo 'has-error'; ?>">
												<label class="control-label" for="name"> Día inicio mora: </label>
												<input class="form-control" type="text" name="dialimite" id="dialimite" value="<?php echo $datosproyecto->dialimite; ?>" maxlength="2">
												<?php echo form_error('dialimite','<div class="help-block" >','</div>'); ?>
											</div>
									</div>
									<div class="col-lg-4">
		                  					<div class="form-group <?php if(form_error('porcentajemora')) echo 'has-error'; ?>">
												<label class="control-label" for="name"> Porcentaje de mora (%): </label>
												<input class="form-control" type="text" name="porcentajemora" id="porcentajemora" value="<?php echo $datosproyecto->porcentajemora; ?>" maxlength="6">
												<?php echo form_error('porcentajemora','<div class="help-block" >','</div>'); ?>
											</div>
									</div>
									<div class="col-lg-4">
	                  					<div class="form-group <?php if(form_error('valortipocambio')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Tipo de cambio: </label>
											<input class="form-control" type="text" name="valortipocambio" id="valortipocambio" value="<?php echo $datosproyecto->valortipocambio; ?>" maxlength="6">
											<?php echo form_error('valortipocambio','<div class="help-block" >','</div>'); ?>
										</div>
									</div>
								</div>
								<div class="row">
                  					<div class="col-lg-4">
	                  					<div class="form-group <?php if(form_error('finca')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Finca: </label>
											<input class="form-control" type="text" name="finca" id="finca" value="<?php echo $datosproyecto->finca; ?>" maxlength="10">
											<?php echo form_error('finca','<div class="help-block" >','</div>'); ?>
										</div>
									</div>
									<div class="col-lg-4">
	                  					<div class="form-group <?php if(form_error('folio')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Folio: </label>
											<input class="form-control" type="text" name="folio" id="folio" value="<?php echo $datosproyecto->folio; ?>" maxlength="10">
											<?php echo form_error('folio','<div class="help-block" >','</div>'); ?>
										</div>
									</div>	
									<div class="col-lg-4">
	                  					<div class="form-group <?php if(form_error('libro')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Libro: </label>
											<input class="form-control" type="text" name="libro" id="libro" value="<?php echo $datosproyecto->libro; ?>" maxlength="10">
											<?php echo form_error('libro','<div class="help-block" >','</div>'); ?>
										</div>
									</div>								
								</div>

								<div class="row">
                  					<div class="col-lg-3 ">
	                  					<div class="form-group <?php if(form_error('area')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Área del edificio (m2): </label>
											<input class="form-control" type="text" name="area" id="area" value="<?php echo $datosproyecto->area; ?>" maxlength="10">
											<?php echo form_error('area','<div class="help-block" >','</div>'); ?>
										</div>
									</div>		
									<div class="col-lg-6 ">
	                  					<div class="form-group <?php if(form_error('direccion')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Dirección del edificio: </label>
											<input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $datosproyecto->direccion; ?>" maxlength="110">
											<?php echo form_error('direccion','<div class="help-block" >','</div>'); ?>
										</div>
									</div>	
									<div class="col-lg-3 ">
	                  					<div class="form-group <?php if(form_error('fechavencimiento')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Fecha vencimiento proyecto: </label>
											<input class="form-control" type="text" name="fechavencimiento" id="fechavencimiento" value="<?php echo $datosproyecto->fechavencimiento; ?>" maxlength="10">
											<?php echo form_error('fechavencimiento','<div class="help-block" >','</div>'); ?>
										</div>
									</div>
								</div>
								<div class="row">
                  					<div class="col-lg-4 ">
	                  					<div class="form-group <?php if(form_error('nombre_rep')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Nombre del representante: </label>
											<input class="form-control" type="text" name="nombre_rep" id="nombre_rep" value="<?php echo $datosproyecto->nombre_rep; ?>" maxlength="60">
											<?php echo form_error('nombre_rep','<div class="help-block" >','</div>'); ?>
										</div>
									</div>
									<div class="col-lg-4">
	                  					<div class="form-group <?php if(form_error('fechanac_rep')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Fecha de nacimiento: </label>
											<input class="form-control" type="text" name="fechanac_rep" id="fechanac_rep" value="<?php echo $datosproyecto->fechanac_rep; ?>" maxlength="10">
											<?php echo form_error('fechanac_rep','<div class="help-block" >','</div>'); ?>
										</div>
									</div>	
									<div class="col-lg-2">
	                  					<div class="form-group">
											<input type="hidden" name="hestadocivil_rep" id="hestadocivil_rep" value="<?php echo $datosproyecto->estadocivil_rep; ?>" />
											<label class="control-label" for="name"> Estado civil: </label>
											<select class="form-control" name="estadocivil_rep" id="estadocivil_rep"></select>										
										</div>
									</div>				
									<div class="col-lg-2">
	                  					<div class="form-group <?php if(form_error('dpi_rep')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> DPI: </label>
											<input class="form-control" type="text" name="dpi_rep" id="dpi_rep" value="<?php echo $datosproyecto->dpi_rep; ?>" maxlength="13">
											<?php echo form_error('dpi_rep','<div class="help-block" >','</div>'); ?>
										</div>
									</div>				
								</div>
								<div class="row">
                  					<div class="col-lg-12 ">
	                  					<div class="form-group <?php if(form_error('descripcion_rep')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Descripcion del representante: </label>
											<input class="form-control" type="text" name="descripcion_rep" id="descripcion_rep" value="<?php echo $datosproyecto->descripcion_rep; ?>" maxlength="110">
											<?php echo form_error('descripcion_rep','<div class="help-block" >','</div>'); ?>
										</div>
									</div>			
								</div>

								<div class="row">
                  					<div class="col-lg-5 ">
	                  					<div class="form-group <?php if(form_error('fechaactanotarial')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Fecha acta notarial: </label>
											<input class="form-control" type="text" name="fechaactanotarial" id="fechaactanotarial" value="<?php echo $datosproyecto->fechaactanotarial; ?>" maxlength="10">
											<?php echo form_error('fechaactanotarial','<div class="help-block" >','</div>'); ?>
										</div>
									</div>	
									<div class="col-lg-7 ">
	                  					<div class="form-group <?php if(form_error('notario')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Notario: </label>
											<input class="form-control" type="text" name="notario" id="notario" value="<?php echo $datosproyecto->notario; ?>" maxlength="60">
											<?php echo form_error('notario','<div class="help-block" >','</div>'); ?>
										</div>
									</div>		
								</div>
								<div class="row">
                  					<div class="col-lg-3 ">
	                  					<div class="form-group <?php if(form_error('registro')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Registro: </label>
											<input class="form-control" type="text" name="registro" id="registro" value="<?php echo $datosproyecto->registro; ?>" maxlength="10">
											<?php echo form_error('registro','<div class="help-block" >','</div>'); ?>
										</div>
									</div>	
									<div class="col-lg-3 ">
	                  					<div class="form-group <?php if(form_error('folio_reg')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Folio: </label>
											<input class="form-control" type="text" name="folio_reg" id="folio_reg" value="<?php echo $datosproyecto->folio_reg; ?>" maxlength="10">
											<?php echo form_error('folio_reg','<div class="help-block" >','</div>'); ?>
										</div>
									</div>	
									<div class="col-lg-3 ">
	                  					<div class="form-group <?php if(form_error('libro_reg')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Libro: </label>
											<input class="form-control" type="text" name="libro_reg" id="libro_reg" value="<?php echo $datosproyecto->libro_reg; ?>" maxlength="10">
											<?php echo form_error('libro_reg','<div class="help-block" >','</div>'); ?>
										</div>
									</div>
									<div class="col-lg-3 ">
	                  					<div class="form-group <?php if(form_error('fecha_reg')) echo 'has-error'; ?>">
											<label class="control-label" for="name"> Fecha del registro: </label>
											<input class="form-control" type="text" name="fecha_reg" id="fecha_reg" value="<?php echo $datosproyecto->fecha_reg; ?>" maxlength="10">
											<?php echo form_error('fecha_reg','<div class="help-block" >','</div>'); ?>
										</div>
									</div>	
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-12">
										<label class="control-label" for="name"> Texto para email de recordatorio de pago: </label>
									</div>
									<div class="col-lg-12">
											<textarea id="textocorreo" name="textocorreo" type="text" class="textarea form-control block" rows="12" maxlength="500"></textarea>
											<br>
									</div>
								</div>

								<div style="text-align:center">
									<button class="btn btn-lg btn-negro">Modificar</button>
								</div>
							</form>


						</div>
    				
				</div>
			</div>
		</div>
	<div>
	<script src="<?php echo base_url().'assets/js/tabla.js';?>"></script> 
	<script src="<?php echo base_url().'assets/js/bootstrap-birthday.js';?>"></script>
	
	<?php echo $footer;?>
	<script>
		$('.textarea').wysihtml5({
			"link": false,
			"image": false,
			"color": false,
			"html": false
		});

		$('.textarea').val("<?php echo $datosproyecto->textocorreo; ?>");

		
		
		$('input[name=nombre]').focus();

		$('#fechaactanotarial').datepicker({'format':'yyyy-mm-dd'});
		$('#fecha_reg').datepicker({'format':'yyyy-mm-dd'});
		$('#fechavencimiento').datepicker({'format':'yyyy-mm-dd'});
		$("#fechanac_rep").bootstrapBirthday({
			dateFormat: "bigEndian",
			monthFormat: "long", 
			onChange: function(){ 
				calcularEdad($("#fechanac_rep").val()); 
			} 
		});

		$(document).ready(function()
		{
			if($('#estadocivil_rep').length > 0)
				cargarEstadoCivil();
		});

		function cargarEstadoCivil()
		{
			var $option ='';
			$option = ($('#hestadocivil_rep').val() == 'Soltero' ? $('<option selected>') : $('<option>'));
			$option.val('S');
			$option.html('Soltero');
			$('#estadocivil_rep').append($option);
			$option = ($('#hestadocivil_rep').val() == 'Casado' ? $('<option selected>') : $('<option>'));
			$option.val('C');
			$option.html('Casado');
			$('#estadocivil_rep').append($option);
		}
		
		
		
	</script>