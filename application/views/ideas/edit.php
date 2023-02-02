<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<h3 class="font-weight-bolder mt-3">Actualiza tu idea <?php  echo $this->session->userdata['idea_id']; ?></h3>
			</div>
			<div class="card-body">
				<?php echo validation_errors(); ?>

				<?php
				//display upload errors
				if(isset($upload_error)){
					echo $upload_error;
				}


				?>

				<?php echo form_open_multipart(base_url() . "ideas/edit/" . $idea['id'] ); ?>

				<div class="row">
					<div class="form-group col-lg-8">
						<label for="body">Nombre del empleado</label>
						<input id="editor2" class="form-control"  name="nombre" placeholder="Nombre Y Apellidos" value="<?php echo $idea['nombre'] ?>" required>
					</div>
					<div class="form-group col-lg-2">
						<label for="body">Numero de empleado</label>
						<input id="editor2" class="form-control"  name="numero_empleado" placeholder="Numero de Empleado" value="<?php echo $idea['numero_empleado'] ?>" required>
					</div>
					<div class="form-group col-lg-2">
						<label for="body">Fecha</label>
						<input id="editor2" class="form-control"  name="fecha" placeholder="Fecha" value="<?php echo $idea['fecha'] ?>" disabled>
					</div>
				</div>

				<div class="row">
					<div class="col form-group">
						<label for="body">Planta(en la que labora)</label>
						<select class="form-control" name="plant" required>
							<option value="">Selecciona una planta</option>
							<option <?php if($idea['plant'] == "1"){echo "selected";}else{echo"";} ?> value="1">Planta 1</option>
							<option <?php if($idea['plant'] == "2"){echo "selected";}else{echo"";} ?> value="2">Planta 2</option>
							<option <?php if($idea['plant'] == "3"){echo "selected";}else{echo"";} ?> value="3">Planta 3</option>
							<option <?php if($idea['plant'] == "4"){echo "selected";}else{echo"";} ?> value="4">Planta 4</option>
							<option <?php if($idea['plant'] == "6"){echo "selected";}else{echo"";} ?> value="6">Planta 6</option>
						</select>
					</div>
					<div class="col form-group">
						<div class="form-check mt-5">
							<input class="form-check-input" type="checkbox" id="check1" name="has_team" value="1" <?php if($idea['has_team'] == 1){echo "checked";}else{echo"";} ?> >
							<label class="form-check-label">Tengo un equipo de trabajo o más personas me están ayudando</label>
						</div>
					</div>
				</div>

				<div id="equipo" class="row">
					<div class="form-group col">
						<label for="body">Nombre del empleado #1</label>
						<input id="editor2" class="form-control"  name="equipo[]" placeholder="Nombre Y Apellidos" value="<?php echo $idea['equipo1'] ?>" >
					</div>
					<div class="form-group col">
						<label for="body">Nombre del empleado #2</label>
						<input id="editor2" class="form-control"  name="equipo[]" placeholder="Nombre Y Apellidos" value="<?php echo $idea['equipo2'] ?>">
					</div>
					<div class="form-group col">
						<label for="body">Nombre del empleado #3</label>
						<input id="editor2" class="form-control"  name="equipo[]" placeholder="Nombre Y Apellidos"  value="<?php echo $idea['equipo3'] ?>">
					</div>
				</div>

				<div class="row mt-3">
					<div class="form-group col">
						<label for="title">Nombre de la idea</label>
						<input type="text" class="form-control" name="idea_title" placeholder="Titulo o Nombre de la Idea." value="<?php echo $idea['title'] ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<label for="body">Descripción</label>
						<textarea id="editor1" class="form-control" rows="5" name="description" placeholder="Descripción"><?php echo $idea['description'] ?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<label for="body">Que se espera de la mejora</label>
						<textarea id="editor1" class="form-control" rows="6" name="resultado_esperado" placeholder="Que se espera?"><?php echo $idea['resultado_esperado'] ?></textarea>
					</div>
					<div class="form-group col">

						<label for="body">Impacto</label>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="calidad" <?php echo $calidad ?> >
							<label class="form-check-label">CALIDAD</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="entregas" <?php echo $entregas ?>>
							<label class="form-check-label">ENTREGAS A TIEMPO</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="eficiencia" <?php echo $eficiencia ?> >
							<label class="form-check-label">EFICIENCIA</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="ambiente" <?php echo $ambiente ?> >
							<label class="form-check-label">AMBIENTE LABORAL</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="productividad" <?php echo $productividad ?>>
							<label class="form-check-label">PRODUCTIVIDAD</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="seguridad" <?php echo $seguridad  ?>>
							<label class="form-check-label">SEGURIDAD E HIGIENE</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="checkotro" name="impacto[]" value="otro" <?php echo $otro ?> >
							<label class="form-check-label">OTRO</label>
						</div>
						<div class="form-group mt-2" id="otro">
							<label for="title">OTRO</label>
							<input type="text" class="form-control" name="otro"  placeholder="Indique que se mejorara.">
						</div>
					</div>
				</div>

				<div class="row mt-2 mb-5">
					<div class="col">

						<!--file input-->
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="userfile"  onchange="alert('Archivo seleccionado: '+ $('input[type=file]').val());">
							<label class="custom-file-label" for="customFile">Adjuntar Un Archivo</label>
							<?php if($idea['archivo'] != "noimage.jpg"): ?>
								<small class="text-danger">Al adjuntar otro archivo se perdera el archivo anterior.</small>
							<?php endif; ?>
						</div>

						<!--previous uploaded file-->
						<?php if($idea['archivo'] != "noimage.jpg"): ?>
							<a class="btn btn-dark mt-3 mb-5" href="<?php echo base_url() ?>assets/uploads/<?php echo $idea['archivo'] ?>">Descargar Archivo Anterior</a>
						<?php endif; ?>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<button type="submit" class="btn btn-primary">Registrar</button>
					</div>
				</div>




				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>
