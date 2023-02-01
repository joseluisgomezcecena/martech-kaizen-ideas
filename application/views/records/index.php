<section class="breadcrumb">
	<h1>Reportes</h1>
	<ul>
		<li><a href="#">Escaneo de Gafetes</a></li>
		<li class="divider la la-arrow-right"></li>
		<li>Reportes</li>
	</ul>
</section>

<?php if($this->session->flashdata('record_updated')): ?>
<div class="alert alert_success">
	<strong class="uppercase"><bdi>Registro Editado</bdi></strong>
	El registro fue editado con exito.
	<button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
</div>
<?php endif; ?>


<?php if($this->session->flashdata('record_deleted')): ?>
	<div class="alert alert_success">
		<strong class="uppercase"><bdi>Registro Borrado</bdi></strong>
		El registro fue eliminado con exito.
		<button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
	</div>
<?php endif; ?>


<div class="card p-4 flex flex-wrap gap-5">
	<?php echo form_open(base_url() . 'records/index', array('class' => 'form-horizontal')); ?>
	<div class="grid grid-cols-5 gap-4">
		<div style="margin: 15px;">
			<label class="col-sm-12">Fecha de inicio</label>
			<div class="col-sm-12">
				<input type="date" class="form-control" id="datepicker" name="date_start" placeholder="Fecha de inicio" value="">
			</div>
		</div>

		<div style="margin: 15px;">
			<label class="col-sm-12">Fecha de inicio</label>
			<div class="col-sm-12">
				<input type="date" class="form-control" id="datepicker" name="date_end" placeholder="Fecha de inicio" value="">
			</div>
		</div>

		<div style="margin: 15px;">
			<div class="col-sm-12">
				<label class="col-sm-12">Click para buscar</label>
				<button class="btn_primary btn" type="submit" name="search"><i class="fa fa-search"></i> Buscar</button>
			</div>
		</div>

	</div>
	<?php echo form_close(); ?>

</div>


<div class="card p-4  gap-5 mt-5">

	<div class="container-fluid">

		<div class="row justify-content-center">

			<div class="col-lg-12 mt-5">
				<div class="white-box analytics-info">
					<h3 class="box-title">Registros</h3>
					<div class="">
						<table style="width: 100%; font-size: 10px;" id="entries-list" class="table table_hoverable table_striped">
							<thead>
							<th>ID</th>
							<th>Numero de empleado</th>
							<th>Ubicación</th>
							<th>Entrada</th>
							<th>Salida</th>
							<th>Horas trabajadas</th>
							<th>Fecha de registro</th>
							<th>Opciones</th>

							</thead>
							<tbody>
							<?php foreach ($scans as $scan): ?>
								<tr>
									<td class="text-center justify-center items-center"><?php echo $scan['id']; ?></td>
									<td class="text-center justify-center items-center"><?php echo $scan['emp_number']; ?></td>
									<td class="text-center justify-center items-center"><?php echo $scan["location_name"]; ?></td>
									<td class="text-center justify-center items-center"><?php echo $scan["check_in"]; ?></td>
									<td class="text-center justify-center items-center"><?php echo $scan["check_out"]; ?></td>
									<td class="text-center justify-center items-center"><?php echo round($scan["hours_worked"],2) ; ?></td>
									<td class="text-center justify-center items-center"><?php echo $scan["created_at"]; ?></td>
									<td class="text-center justify-center items-center">
										<a href="<?php echo base_url() ?>records/edit/<?php echo $scan['id']; ?>" class="btn_primary btn">Editar</a>
										<a href="<?php echo base_url() ?>records/delete/<?php echo $scan['id']; ?>" class="btn btn_danger btn_outlined">Eliminar</a>
									</td>
								</tr>
							<?php endforeach ?>
							</tbody>

						</table>
					</div>
				</div>
			</div>


		</div>
	</div>


</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script>
	$('#entries-list').DataTable({
		'scrollX': true,
		'bSort': false
		//'scrollCollapse': true,
	});
</script>




