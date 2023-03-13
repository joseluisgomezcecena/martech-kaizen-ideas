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
	<div class="row mt-5">
		<div class="col">
			<?php if($this->session->flashdata('errors')): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Error</strong> <?php echo $this->session->flashdata('errors'); ?>.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<div class="container">

	<div style="background: rgb(19,234,149); background: linear-gradient(90deg, rgba(19,234,149,1) 0%, rgba(63,63,225,1) 57%, rgba(0,212,255,1) 80%); background-repeat: no-repeat; background-size: cover; background-position: center center;" class="col-lg-12 card">
		<div class="card-body">
			<h1 class="font-weight-bolder text-white">
				Tutorial de uso de la plataforma
			</h1>
			<button class="btn btn-secondary btn-rounded bold" data-toggle="modal" data-target="#exampleModal">Tutorial Aqui</button>
		</div>
	</div>


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
						<a class="" href="http://mxmtsvrandon1/authentication">Olvide Mi Contraseña ></a>
					</span>
				</div>
			</div>
		</div>

	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<video width="100%"  controls>
					<source src="<?php echo base_url() ?>assets/uploads/tutorial2.mp4" type="video/mp4">
					Tu explorador no soporta los videos HTML.
				</video>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
