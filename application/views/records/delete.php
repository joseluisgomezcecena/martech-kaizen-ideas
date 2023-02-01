<section class="breadcrumb">
	<h1>Registros</h1>
	<ul>
		<li><a href="#">Eliminar Registros</a></li>
		<li class="divider la la-arrow-right"></li>
		<li>Registros</li>
	</ul>
</section>

<div class="alert alert_warning mb-8">
	<strong class="uppercase"><bdi>Aviso:</bdi></strong>
	Una vez que se edite este registro esta acción no se podrá deshacer, debe ser muy cuidadoso en la información que captura.
	<button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
</div>

<div class="card p-4 flex flex-wrap gap-5">
	<?php echo form_open(base_url() . 'records/delete/'. $scan['id'], array('class' => 'form-horizontal')); ?>

	<input type="hidden" name="id" value="<?php echo $scan['id']; ?>">

	<div class="grid grid-cols-5 gap-4">

		<div style="margin: 15px;">
			<label class="col-sm-12">Numero de empleado</label>
			<div class="col-sm-12">
				<input type="number" class="form-control" id="emp_number"
					   name="emp_number" placeholder="Numero de empleado" value="<?php echo $scan['emp_number'] ?>" disabled>
			</div>
		</div>

		<div style="margin: 15px;">
			<label class="col-sm-12">Planning Group</label>
			<div class="col-sm-12">
				<select class="form-control" id="location" name="location"  disabled>
					<option value="">Seleccione una opción</option>
					<?php foreach ($locations as $location): ?>
						<option value="<?php echo $location['location_id'] ?>" <?php if ($location['location_id'] == $scan['location']) echo 'selected'; ?>><?php echo $location['planner_id']. " - " . $location['location_name'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div style="margin: 15px;">
			<label class="col-sm-12">Horario</label>
			<div class="col-sm-12">
				<select class="form-control" id="schedule" name="schedule" disabled>
					<option value="">Seleccione una opción</option>
					<option <?php if($scan['schedule'] == 'reg1'){echo "selected";}else{echo "";} ?> value="reg1">Regular Primer Turno</option>
					<option <?php if($scan['schedule'] == 'reg2'){echo "selected";}else{echo "";} ?> value="reg2">Regular Segundo Turno</option>
					<option <?php if($scan['schedule'] == 'reg3'){echo "selected";}else{echo "";} ?> value="reg3">Regular Tercer Turno</option>
					<option <?php if($scan['schedule'] == 'rot1'){echo "selected";}else{echo "";} ?> value="rot1">4x3 06:00 - 18:00</option>
					<option <?php if($scan['schedule'] == 'rot2'){echo "selected";}else{echo "";} ?> value="rot2">4x3 18:00 - 06:00</option>
					<option <?php if($scan['schedule'] == 'w1'){echo "selected";}else{echo "";} ?> value="w1">Fin de Semana 06:00 - 18:00</option>
					<option <?php if($scan['schedule'] == 'w2'){echo "selected";}else{echo "";} ?> value="w2">Fin de Semana 18:00 - 06:00</option>
					<option <?php if($scan['schedule'] == 'extra'){echo "selected";}else{echo "";} ?> value="extra">T.Extra</option>
				</select>
			</div>
		</div>

		<div style="margin: 15px;">
			<label class="col-sm-12">Hora de entrada</label>
			<div class="col-sm-12">
				<input onchange="calculateDT()" type="datetime-local" class="form-control" id="check_in" name="check_in" placeholder="Hora de entrada" value="<?php echo $scan['check_in'] ?>" disabled>
			</div>
		</div>

		<div style="margin: 15px;">
			<label class="col-sm-12">Hora de salida</label>
			<div class="col-sm-12">
				<input onchange="calculateDT()" type="datetime-local" class="form-control" id="check_out" name="check_out" placeholder="Hora de salida" value="<?php echo $scan['check_out'] ?>" disabled>
			</div>
		</div>

		<div style="margin: 15px;">
			<label class="col-sm-12">Horas Trabajadas</label>
			<div class="col-sm-12">
				<input style="background-color: rgba(128,128,128,0.44)" type="number" class="form-control" id="hours_worked"
					   name="hours_worked" placeholder="Horas Trabajadas" value="<?php echo $scan['hours_worked'] ?>" disabled>
			</div>
		</div>

		<div style="margin: 15px;">
			<div class="col-sm-12">
				<label class="col-sm-12">Click para borrar</label>
				<button class="btn_danger btn" type="submit" name="save"><i class="la la-trash"></i> &nbsp; Eliminar</button>
			</div>
		</div>

	</div>
	<?php echo form_close(); ?>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script>
	$('#entries-list').DataTable({
		'scrollX': true,
		'bSort': false
		//'scrollCollapse': true,
	});

	function calculateDT() {
		//var oneD = 1000 * 60 * 60 * 24;

		var oneD = 1000 * 60 * 60;
		var startDT = ($("#check_in").val());
		var endDT = ($("#check_out").val());
		var sMS = new Date(startDT);
		var eMS = new Date(endDT);

		//var result = (eMS.getTime() - sMS.getTime()) / oneD;
		var result = Math.round((eMS.getTime() - sMS.getTime()) / oneD *1000) / 1000;
		//return Math.round((eMS.getTime() - sMS.getTime()) / oneD);
		//alert(result);
		$("#hours_worked").val(result);
	}

	//calculateDT();

</script>




