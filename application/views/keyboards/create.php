<?php if($this->session->flashdata('creado')): ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Registrado</strong>&nbsp;&nbsp;
		<?php echo $this->session->flashdata('creado') ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>'
<?php endif; ?>

<div class="row">
	<div class="col-lg-6 offset-3">
		<?php echo validation_errors(); ?>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="cards">
			<div class="row text-center mt-5">
				<div class="col">
					<h1 class="font-weight-bold">
						<?php echo $location['location_name'] ?>
					</h1>
					<h3 class="font-weight-bold">
						Planning Group: <b class="text-primary"><?php echo $location['planner_id'] ?></b>
					</h3>
				</div>
			</div>

			<?php echo form_open(base_url() . 'keyboards/create/' . $location['location_id'] . '/' . $type)  ?>

			<input type="hidden" name="location_id" value="<?php echo $location['location_id'] ?>">
			<input type="hidden" name="type" value="<?php echo $type ?>">
			<input style="opacity: 0" id="date" name="date" type="datetime-local" class="form-control" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly>


			<div class="row height d-flex justify-content-center align-items-center mt-2 mb-5">
				<div class="col-md-6">
					<div class="form">
						<i class="fa fa-search"></i>
						<input list="employees" name="work_id" id="work_id" class="form-control form-input"  placeholder="Ingresa el numero de empleado...">
						<datalist id="employees">
							<?php foreach($employees as $employee): ?>
								<option value="<?php echo $employee['id'] ?>"><?php echo $employee['name'] ?></option>
							<?php endforeach; ?>
						</datalist>
					</div>

					<div class="mt-5">
						<input style="" type="submit" name="save_asistencia" id="submitbarcode" class="btn btn-dark text-white btn-lg float-right" value="Guardar">
					</div>
				</div>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>
