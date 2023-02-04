<div class="row">

	<div class="col-lg-12">
		<?php echo form_open(base_url() . "evaluations/index"); ?>
		<div class="row">
			<div class="col">
				<h5 class="font-weight-bolder">Por Parametros</h5>
			</div>
		</div>
		<div class="row">
			<div class="form-group col">
				<label for="body">Buscar por numero de empleado</label>
				<input type="text" class="form-control" id="numero_empleado" name="numero_empleado">
			</div>
			<div class="form-group col">
				<label for="status">Buscar Status</label>
				<select class="form-control" id="status" name="status">
					<option value="">Seleccione</option>
					<option value="1">Aceptado</option>
					<option value="2">Premiado</option>
					<option value="3">Rechazado</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h5 class="font-weight-bolder">Rango De Fechas</h5>
			</div>
		</div>
		<div class="row">

			<div class="form-group col">
				<label for="desde">Desde</label>
				<input type="date" class="form-control" id="desde" name="desde">
			</div>
			<div class="form-group col">
				<label for="hasta">Hasta</label>
				<input type="date" class="form-control" id="hasta" name="hasta">
			</div>
		</div>
		<div class="row">
			<div class="form-group col">
				<button type="submit" class="btn btn-primary" onclick="validateForm()">Buscar</button>
			</div>
		</div>

		<input type="hidden" name="field" id="field">

		<?php echo form_close() ?>
	</div>

	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="font-weight-bolder mt-3">Resultados de la busqueda</h3>
			</div>
			<div class="card-body">

				<table id="data-table" class="table dataTable">
					<thead>
							<th>Titulo</th>
							<th>Descripción</th>
							<th>Nombre</th>
							<th>Numero de empleado</th>
							<th>Fecha</th>
							<th>Planta</th>
							<th>Equipo</th>
							<th>Estado</th>
							<th>Acciones</th>
					</thead>
					<tbody>
						<?php foreach (): ?>

						<?php endforeach ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	function validateForm()
	{
		var status = document.getElementById("status").value;
		var empleado = document.getElementById("numero_empleado").value;
		//var desde = document.getElementById("desde").value;

		if (status == null || status == "", empleado == null || empleado == "")
		{
			alert("Favor de llenar alguno de los parametros de busqueda");
		}
		else
		{
			document.getElementById("fields").value = "filled";
		}
	}
</script>
