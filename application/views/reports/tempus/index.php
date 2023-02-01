<section class="breadcrumb">
	<h1><?= $title ?></h1>
	<ul>
		<li><a href="#">Reportes</a></li>
		<li class="divider la la-arrow-right"></li>
		<li>Horas Tempus</li>
	</ul>
</section>




<?php if ($this->session->flashdata('success_message')) : ?>
	<div class="alert alert_success mb-5">

		<?php echo $this->session->flashdata('success_message') ?>
		<button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
	</div>

<?php endif; ?>

<?php if ($this->session->flashdata('error_message')) : ?>
	<div class="alert alert_danger mb-5">

		<?php echo $this->session->flashdata('error_message') ?>
		<button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
	</div>

<?php endif; ?>


<div class="card p-4 flex flex-wrap gap-5">


	<div class="grid grid-cols-2 gap-4">

		<form method="get" action="<?= base_url('reports/tempus') ?>" class="form-horizontal">
			<div class="grid grid-cols-5 gap-4">
				<div style="margin: 15px;">
					<label class="col-sm-12">Buscar Semana</label>
					<div class="col-sm-12">
						<input type="date" class="form-control" id="datepicker" name="date" placeholder="Elejir Semana" value="<?= $date ?>">
					</div>
				</div>


				<div style="margin: 15px;">
					<div class="col-sm-12">
						<label class="col-sm-12">Click para buscar</label>
						<button class="btn_primary btn" type="submit" name="search"><i class="fa fa-search"></i> Buscar</button>
					</div>
				</div>
			</div>
		</form>


		<?php echo form_open(base_url() . 'reports/tempus/import', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
		<div class="grid grid-cols-1 gap-4">


			<div style="margin: 0px;">
				<div class="col-sm-12">
					<input type="file" style="width: 400px;" class="form-control" id="inputFileCSV" name="csv_file" accept=".csv">
				</div>
				<label class="col-sm-12">
					<button class="btn_primary btn" type="submit" name="search"><i class="fa fa-search"></i> Importar Datos</button>
				</label>
			</div>


		</div>
		<?php echo form_close(); ?>

	</div>

</div>


<div class="card p-4  gap-5 mt-5">

	<div class="flex flex-col gap-y-5">
		<div class="p-5">
			<h3>Registros</h3>
			<table style="width: 100%; font-size: 12px;" id="entries-list" class="table table_striped w-full mt-3">
				<thead>
					<tr>
						<th class="ltr:text-left rtl:text-right uppercase">ID</th>
						<th class="ltr:text-left rtl:text-right uppercase">FECHA</th>
						<th class="ltr:text-left rtl:text-right uppercase">Numero de empleado</th>
						<th class="ltr:text-left rtl:text-right uppercase">Nombre</th>
						<th class="ltr:text-left rtl:text-right uppercase">Horas Ordinarias</th>
						<th class="ltr:text-left rtl:text-right uppercase">Horas Extra</th>
						<th class="ltr:text-left rtl:text-right uppercase">Total de Horasa</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tempus_hours as $item) : ?>
						<tr>
							<td class=""><?php echo $item->tempus_id; ?></td>
							<td class=""><?php echo $item->Fecha; ?></td>
							<td class=""><?php echo $item->TarjetaID; ?></td>
							<td class=""><?php echo $item->NombreCompleto; ?></td>

							<td class=""><?php echo $item->Ordinarias; ?></td>
							<td class=""><?php echo $item->ExtCalc; ?></td>
							<td class=""><?php echo $item->TotalHours; ?></td>

						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
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