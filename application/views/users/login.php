
<div class="container flex items-center justify-center mt-20 py-10">
	<div class="w-full md:w-1/2 xl:w-1/3">
		<div class="mx-5 md:mx-10">
			<div class="alert alert_secondary">
				<strong class="uppercase"><bdi>Aviso:</bdi></strong>
				Esta sección esta protegida.
				<button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
			</div>
			<?php echo validation_errors(); ?>

			<?php if($this->session->flashdata('login_success')): ?>

				<div class="alert alert_success">
					<strong class="uppercase"><bdi>Logged:</bdi></strong>
					Logged in.
					<button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
				</div>

			<?php endif; ?>

			<?php if($this->session->flashdata('login_failed')): ?>

				<div class="alert alert_danger">
					<strong class="uppercase"><bdi>No autorizado:</bdi></strong>
					usuario y/o contraseña incorrectos.
					<button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
				</div>

			<?php endif; ?>

		</div>

		<div class="card mt-5 p-5 md:p-10" action="index.html">
			<?php echo form_open(base_url() . 'users/login') ?>

			<div class="mb-5">
				<label class="label block mb-2" for="email">Usuario</label>
				<input  type="text" class="form-control" id="username" name="username" placeholder="Usuario" >
			</div>
			<div class="mb-5">
				<label class="label block mb-2" for="password">Password</label>
				<label class="form-control-addon-within">
					<input id="password" name="password" type="password" class="form-control border-none" value="12345">
					<span class="flex items-center ltr:pr-4 rtl:pl-4">
                            <button type="button"
									class="btn btn-link text-gray-300 dark:text-gray-700 la la-eye text-xl leading-none"
									data-toggle="password-visibility"></button>
                        </span>
				</label>
			</div>
			<div class="flex items-center">
				<a href="#" class="text-sm uppercase">Olvide mi contraseña</a>
				<button type="submit" class="btn btn_primary ltr:ml-auto rtl:mr-auto uppercase">Login</button>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>

<!--
<div class="container-fluid">

	<div class="justify-content-center">
		<div class="col-lg-12">
			<div class="gray-box analytics-info">
				<h3 class="box-title"></h3>

				<div class="row">

					<div class="row mt-5">
						<div class="col-lg-12 ">

							<div id="messages" class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3">
								<?php if($this->session->flashdata('login_success')): ?>

									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong class="uppercase"><bdi>Inicio de Sesión Exitoso</bdi></strong>
										El usuario ha sido autorizado exitosamente.
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>

								<?php endif; ?>

								<?php if($this->session->flashdata('login_failed')): ?>

									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong class="uppercase"><bdi>Error de Autenticación</bdi></strong>
										Usuario y/o Contraseña Incorrecta.
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>

								<?php endif; ?>

								<?php echo validation_errors(); ?>

							</div>



							<div style="border-radius: 5%;" class="card border shadow col-lg-4 offset-lg-4 col-sm-8 offset-sm-2">

								<div style="background-color: transparent !important;" class="card-header font-bold">TOOLING SOFTWARE</div>

								<?php echo form_open(base_url() . 'users/login') ?>
								<div class="card-body">


									<div class="col-lg-12 mt-4">
										<label for="username">Usuario</label>
										<input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
									</div>


									<div class="col-lg-12 mb-5 mt-3">
										<label for="password">Contraseña</label>
										<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
									</div>


									<div class="col-lg-12 mb-3 mt-3">
										<button style="width:100%" class="btn btn-primary btn-block" type="submit"> <i class="fa fa-accessible-icon"></i> Iniciar Sesión</button>
									</div>
								</div>
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




