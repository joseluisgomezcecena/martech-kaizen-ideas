<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<h3 class="font-weight-bolder mt-3">Registra tu idea</h3>
			</div>
			<div class="card-body">
				<?php echo validation_errors(); ?>

				<?php echo form_open_multipart(base_url() . "ideas/create"); ?>

				<div class="row">
					<div class="form-group col-lg-8">
						<label for="body">Nombre del empleado</label>
						<input id="editor2" class="form-control"  name="nombre" placeholder="Nombre Y Apellidos" required>
					</div>
					<div class="form-group col-lg-2">
						<label for="body">Numero de empleado</label>
						<input id="editor2" class="form-control"  name="numero_empleado" placeholder="Numero de Empleado" required>
					</div>
					<div class="form-group col-lg-2">
						<label for="body">Fecha</label>
						<input id="editor2" class="form-control"  name="fecha" placeholder="Fecha" value="<?php echo date("m/d/Y") ?>" disabled>
					</div>
				</div>

				<div class="row">
					<div class="col form-group">
						<label for="body">Planta(en la que labora)</label>
						<select class="form-control" name="plant" required>
							<option value="">Selecciona una planta</option>
							<option value="1">Planta 1</option>
							<option value="2">Planta 2</option>
							<option value="3">Planta 3</option>
							<option value="4">Planta 4</option>
							<option value="6">Planta 6</option>
						</select>
					</div>
					<div class="col form-group">
						<div class="form-check mt-5">
							<input class="form-check-input" type="checkbox" id="check1" name="has_team" value="1" >
							<label class="form-check-label">Tengo un equipo de trabajo o más personas me están ayudando</label>
						</div>
					</div>
				</div>

				<div id="equipo" class="row">
					<div class="form-group col">
						<label for="body">Nombre del empleado #1</label>
						<input id="editor2" class="form-control"  name="equipo[]" placeholder="Nombre Y Apellidos" >
					</div>
					<div class="form-group col">
						<label for="body">Nombre del empleado #2</label>
						<input id="editor2" class="form-control"  name="equipo[]" placeholder="Nombre Y Apellidos" >
					</div>
					<div class="form-group col">
						<label for="body">Nombre del empleado #3</label>
						<input id="editor2" class="form-control"  name="equipo[]" placeholder="Nombre Y Apellidos" >
					</div>
				</div>

				<div class="row mt-3">
					<div class="form-group col">
						<label for="title">Nombre de la idea</label>
						<input type="text" class="form-control" name="idea_title" placeholder="Titulo o Nombre de la Idea.">
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<label for="body">Descripción</label>
						<textarea id="editor1" class="form-control" rows="5" name="description" placeholder="Descripción"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<label for="body">Que se espera de la mejora</label>
						<textarea id="editor1" class="form-control" rows="6" name="resultado_esperado" placeholder="Que se espera?"></textarea>
					</div>
					<div class="form-group col">
						<label for="body">Impacto</label>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="calidad" >
							<label class="form-check-label">CALIDAD</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="entregas" >
							<label class="form-check-label">ENTREGAS A TIEMPO</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="eficiencia" >
							<label class="form-check-label">EFICIENCIA</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="ambiente" >
							<label class="form-check-label">AMBIENTE LABORAL</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="productividad" >
							<label class="form-check-label">PRODUCTIVIDAD</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="check1" name="impacto[]" value="seguridad" >
							<label class="form-check-label">SEGURIDAD E HIGIENE</label>
						</div>
						<div class="form-check mt-2">
							<input class="form-check-input" type="checkbox" id="checkotro" name="impacto[]" value="otro" >
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
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="userfile"  onchange="alert('Archivo seleccionado: '+ $('input[type=file]').val());">
							<label class="custom-file-label" for="customFile">Adjuntar Un Archivo</label>
						</div>
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
