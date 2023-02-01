<div class="row">
	<div class="col">
		<h3><?= $title; ?></h3>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="mt-5 mb-5">
			<?php echo form_open(base_url() . 'reports/index', array('class' => 'form-inline')); ?>
				<div class="form-group mb-2">
					<label for="">Fecha de Inicio: </label>
					<input type="date" class="form-control" id="datepicker" name="date_start" placeholder="Inicio" value="">
				</div>
				<div class="form-group mx-sm-3 mb-2">
					<label for="">Fecha de Fin: </label>
					<input type="date" class="form-control" id="datepicker" name="date_end" placeholder="Fin" value="">
				</div>
			<button type="submit" class="btn btn-primary btn-rounded mb-2">Buscar</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<div class="card p-4  gap-5 mt-2">

	<div class="flex flex-col gap-y-5">
		<div class="p-5">
			<h3 class="mb-4">Registro de checadas</h3>
			<table style="width: 100%; font-size: 12px;" id="data-table" class="table table_striped mt-3">
				<thead>
				<tr>
					<th class="ltr:text-left rtl:text-right uppercase">ID</th>
					<th class="ltr:text-left rtl:text-right uppercase">Numero de empleado</th>
					<th class="ltr:text-left rtl:text-right uppercase">Ubicación</th>
					<th class="ltr:text-left rtl:text-right uppercase">Planning Group</th>
					<th class="ltr:text-left rtl:text-right uppercase">Entrada</th>
					<th class="ltr:text-left rtl:text-right uppercase">Salida</th>
					<th class="ltr:text-left rtl:text-right uppercase">Horas Trabajadas</th>
					<th class="ltr:text-left rtl:text-right uppercase">Fecha de Registro</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($scans as $scan): ?>
					<tr>
						<td  class=""><?php echo $scan['id']; ?></td>
						<td  class=""><?php echo $scan['emp_number']; ?></td>
						<td  class=""><?php echo $scan["location_name"]; ?></td>
						<td  class=""><?php echo $scan["planner_id"]; ?></td>
						<td  class=""><?php echo $scan["check_in"]; ?></td>
						<td  class=""><?php echo $scan["check_out"]; ?></td>
						<td  class=""><?php echo round($scan["hours_worked"],2) ; ?></td>
						<td  class=""><?php echo $scan["created_at"]; ?></td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>





<div class="card p-4  gap-5 mt-5">

	<div class="flex flex-col gap-y-5">
		<div class="p-5">
			<h3>Horas por planning group</h3>
			<table style="width: 100%; font-size: 12px;" id="entries-list" class="table table_striped w-full mt-3">
				<thead>
				<tr>
					<th class="ltr:text-left rtl:text-right uppercase">Planta</th>
					<th class="ltr:text-left rtl:text-right uppercase">Numero De Planner</th>
					<th class="ltr:text-left rtl:text-right uppercase">Horas Trabajadas.</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($hours_by_planning_group as $hour): ?>
					<tr>
						<td  class=""><?php echo $hour['plant_id']; ?></td>
						<td  class=""><?php echo $hour["planner_id"]; ?></td>
						<td  class=""><?php echo round($hour["hours_worked"],3) ; ?></td>

					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<!--
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script>
	$('#entries-list').DataTable({
		'scrollX': true,
		'bSort': false
		//'scrollCollapse': true,
	});
</script>
-->



