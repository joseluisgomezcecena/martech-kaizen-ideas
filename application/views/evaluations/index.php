<div class="row">

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">
				<h3 class="font-weight-bolder mt-3">Evaluar</h3>
			</div>
			<div class="card-body">

				<?php echo validation_errors(); ?>

				<?php
					if(isset($upload_error))
					{
						echo $upload_error;
					}
				?>

				<?php echo form_open_multipart(base_url() . "evaluations/index/" . $idea['id']); ?>

				<div class="row">
					<div class="form-group col">
						<label for="body">Resultado de la evaluación</label>
						<select class="form-control" id="status" name="status">
							<option value="">Seleccione</option>
							<option value="1">Aceptado</option>
							<option value="2">Premiado</option>
							<option value="3">Rechazado</option>
						</select>
					</div>
				</div>



				<div class="row mt-2 mb-5">
					<div class="col">
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="userfile"  onchange="alert('Archivo seleccionado: '+ $('input[type=file]').val());">
							<label class="custom-file-label" for="customFile">Adjuntar Un Archivo</label>
						</div>
					</div>
				</div>



				<div id="retro" class="row">
					<div class="form-group col">
						<label for="body">Retroalimentación</label>
						<textarea class="form-control" id="retroalimentacion" name="retroalimentacion" rows="3"></textarea>
					</div>
				</div>



				<div class="row">
					<div class="form-group col">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>


				<?php echo form_close(); ?>

			</div>




		</div>
	</div>

	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">
				<h3 class="font-weight-bolder mt-3">Datos de la idea</h3>
			</div>
			<div class="card-body">

				<table id="data-table" class="table dataTable">
					<thead>
							<th></th>
							<th></th>
					</thead>
					<tbody>
						<tr>
							<td><b>Titulo: </b><?php echo $idea['title'] ?></td>
							<td><b>Fecha: </b><?php echo $idea['fecha'] ?></td>
						</tr>
						<tr>
							<td><b>Nombre: </b><?php echo $idea['nombre'] ?></td>
							<td><b>Numero de empleado: </b><?php echo $idea['numero_empleado'] ?></td>
						</tr>
						<tr>
							<td><b>Planta: </b><?php echo $idea['plant'] ?></td>
							<td></td>
						</tr>
						<?php if($idea['has_team']): ?>
						<tr>
							<td>
								<b>Equipo: </b>
								<?php
								if ($idea['has_team'] == 1) {
									echo "Si";
								}
								?>
							</td>
							<td>
								<?php
								echo $idea['equipo1'] = $idea['equipo1'] == "" ? "N/A<br>" : "<b>Miembro del equipo: </b>". $idea['equipo1']."<br>";
								echo $idea['equipo2'] = $idea['equipo2'] == "" ? "N/A<br>" : "<b>Miembro del equipo: </b>".$idea['equipo2']."<br>";
								echo $idea['equipo3'] = $idea['equipo3'] == "" ? "N/A<br>" : "<b>Miembro del equipo: </b>".$idea['equipo3']."<br>";
								?>
							</td>
						</tr>
						<?php endif; ?>
						<tr>
							<td><b>Descripción: </b><br><?php echo $idea['description'] ?></td>
							<td><b>Que se espera mejorar: </b><br><?php echo $idea['resultado_esperado'] ?></td></td>
						</tr>

						<tr>
							<td>
								<b>Impacto: </b><?php echo $idea['impacto']; ?>
								<?php if($idea['impacto_otro'] != ""){echo $idea['impacto_otro'];}else{echo"";} ?>
							</td>
							<td>
								<b>Archivo Adjunto:</b><a href="<?php echo base_url() ?>assets/uploads/<?php echo $idea['archivo'] ?>"><?php echo $idea['archivo'] ?></a>
							</td>
						</tr>

					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>


<script>

</script>
