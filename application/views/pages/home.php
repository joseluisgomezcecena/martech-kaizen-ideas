<div class="container">
	<div class="row mt-5">
		<div class="col">
			<?php if($this->session->flashdata('idea_created')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Idea registrada con exito</strong> <?php echo $this->session->flashdata('idea_created'); ?>.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<div class="container">
	<div class="row mt-5">
		<div class="col-lg-8">
			<div style="min-height: 400px" class="card">
				<div class="card-body">
					<p style="font-size: 1.6rem !important; " class="text-center mt-2 m-b-0 font-weight-bolder text-dark">
						¿Tienes una idea de mejora?<br/>
						Registra tu idea Aqui 💡
					</p>
					<hr>
					<p class="mt-3 mb-5">
						Registra una idea de mejora! En caso de tener una idea para mejorar las condiciones de un proceso,
						en beneficio de la ergonomía de la operación, mejora de la calidad o tiempos de entrega.
					</p>

					<span class="mt-5" style="text-decoration: none; font-weight: bold; font-size: 1.0rem">
						<a class="" href="<?php echo base_url() ?>users/ideas/new">Registrar una idea ></a><br><br/>
						<a class="" href="<?php echo base_url() ?>users/ideas/search">Modificar mi idea o ver status de mi idea ></a>
					</span>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div style="min-height: 400px" class="card">
				<div class="card-body">
					<p style="font-size: 1.6rem !important; " class="text-center mt-2 m-b-0 font-weight-bolder text-dark">
						Acceso de Administrador 🔑
					</p>
					<hr>
					<br>
					<span class="mt-5" style="text-decoration: none; font-weight: bold; font-size: 1.0rem">
						<a class="" href="<?php echo base_url() ?>auth/login">Iniciar Sesión ></a><br><br/>
						<a class="" href="<?php echo base_url() ?>ideas/update">Olvide Mi Contraseña ></a>
					</span>
				</div>
			</div>
		</div>

	</div>
</div>

