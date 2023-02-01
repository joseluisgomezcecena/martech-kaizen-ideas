<section class="breadcrumb">
	<h1><?php echo $location['location_name'] ?></h1>
	<ul>
		<li><a href="#">Captura Manual de Empleados T.Extra</a></li>
		<li class="divider la la-arrow-right"></li>
		<li><?php echo $location['location_name'] ?></li>
	</ul>
</section>



<?php if($this->session->flashdata('creado')): ?>

	<div class="alert alert_success mb-5">
		<strong class="uppercase"><bdi>Registrado Exitosamente!</bdi></strong>
		Se ha registrado la asistencia.

		<?php echo $this->session->flashdata('creado') ?>

		<button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
	</div>

<?php endif; ?>


<div class="grid lg:grid-cols-1 gap-5">

	<!-- Content -->
	<div class="lg:col-span-4 xl:col-span-4">
		<div class="card p-5">

			<h3 class="mt-5 mb-5">
				Celda: <b class="text-primary"><?php echo $location['location_name'] ?></b>
				Planning Group: <b class="text-primary"><?php echo $location['planner_id'] ?></b>
			</h3>
			<?php echo validation_errors(); ?>

			<?php echo form_open(base_url() . 'keyboards/create_extra/' . $location['location_id']) ?>

				<input type="hidden" name="location_id" value="<?php echo $location['location_id'] ?>">


				<div class="mb-5 xl:w-1/2">
					<label class="label block mb-2" for="title">Numero de Empleado</label>
					<input id="work_id" name="work_id" type="text" class="form-control">
				</div>

				<div style="opacity: 0" class="mb-5 xl:w-1/2">
					<label class="label block mb-2" for="slug">Fecha y Hora de Entrada</label>
					<input id="date" name="date" type="datetime-local" class="form-control" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly>
				</div>

				<div class="">
					<input style="" type="submit" name="save_asistencia" id="submitbarcode" class="btn btn_danger text-white btn-lg" value="Guardar">
				</div>

			<?php echo form_close() ?>
		</div>
	</div>
</div>



<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
-->
