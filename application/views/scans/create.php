<section class="breadcrumb">
	<h1><?php echo $location['location_name'] ?></h1>
	<ul>
		<li><a href="#">Escaneo de Gafetes</a></li>
		<li class="divider la la-arrow-right"></li>
		<li><?php echo $location['location_name'] ?></li>
	</ul>
</section>



<?php if($this->session->flashdata('creado')): ?>

	<div class="alert alert_primary mb-5">
		<strong class="uppercase"><bdi>Registrado Exitosamente!</bdi></strong>
		Se ha registrado la asistencia.

		<?php echo $this->session->flashdata('creado') ?>

		<button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
	</div>

<?php endif; ?>






<div class="grid lg:grid-cols-1 gap-5">
	<!-- Summaries -->
	<div class="grid sm:grid-cols-1 gap-5 justify-center items-center">



		<div class="card p-5 min-w-0">
			<h3>Escanea tu Gafete turno: <?php echo $shift; ?></h3>
			<div class="mt-5 min-w-0">

				<?php echo form_open(base_url() . 'scans/create/' . $location['location_id']) ?>

				<div class=""></div>

				<div class="">
					<div style="text-align: center;" class="justify-center items-center object-center">
						<?php echo validation_errors(); ?>

							<input type="hidden" name="location_id" value="<?php echo $location['location_id'] ?>">

							<img style="width: 325px; text-align: center" class="img-fluid justify-center object-center" src="<?php echo base_url() ?>assets/img/scan2.gif" alt="scan image">


							<div style="opacity: 0;" class="col-lg-12">
								<input  type="text" class="form-control" id="code" name="work_id" value="" autofocus >
							</div>
					</div>
				</div> <!--end row-->



				<div class="">
					<input style="width: 100%; opacity: 0;" type="submit" name="save_asistencia" id="submitbarcode" class="btn btn-danger text-white btn-lg" value="Guardar">
				</div>

				<?php echo form_close(); ?>

			</div>
		</div>


	</div>
</div>




<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
-->
<script src="<?php echo base_url() ?>assets/datatables/jquery.js"></script>


<script>
	$(document).ready(function(){
		var interval = 1000;
		setInterval(function(){
			$("#code").val('');
		}, interval);
	})


	$('#code').keyup(function(){
		if(this.value.length <= 9){
			$('#submitbarcode').click();
		}
	});
</script>

