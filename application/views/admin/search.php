<div class="row">
	<div class="col-lg-6 offset-lg-3">

		<?php if($this->session->flashdata('idea_not_found')): ?>

			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>😞 No se encontro la idea.</strong> <?php echo $this->session->flashdata('idea_not_found') ?>
				Si no recuerdas tu folio o numero de empleado de registro comunicate con Mejora Continua.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		<?php endif; ?>

		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>💁 Recuerda</strong> Para modificar tu idea o ver el status de tu idea debes contar el número de folio
			de tu idea y el número de empleado con el que fue registrada, si no cuentas con ellos acércate con Mejora Continua.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>


		<div class="card">
			<div class="card-header">
				<h3 class="font-weight-bolder mt-3">Busca tu idea</h3>
			</div>
			<div class="card-body">
				<?php echo validation_errors(); ?>

				<?php echo form_open_multipart(base_url() . "ideas/search"); ?>

				<div class="row">
					<div class="form-group col-lg-12">
						<label for="body">Nombre del empleado</label>
						<input id="editor2" type="password" class="form-control"  name="numero_empleado" placeholder="Numero de empleado" required>
					</div>
					<div class="form-group col-lg-12">
						<label for="body">Folio de la idea</label>
						<input id="editor2" class="form-control"  name="id" placeholder="Folio de la idea" required>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<button type="submit" class="btn btn-primary">Buscar</button>
					</div>
				</div>

				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>
