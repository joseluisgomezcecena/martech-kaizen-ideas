<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h4 class="page-title">Usuarios.</h4>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="d-md-flex">
				<ol class="breadcrumb ms-auto">
					<li><a href="#" class="fw-normal">Detalles De Usuarios.</a></li>
				</ol>
			</div>
		</div>
	</div>
	<!-- /.col-lg-12 -->
</div>




<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Contenido -->
	<!-- ============================================================== -->
	<div class="row justify-content-center">
		<div class="col-lg-12 col-md-12">




			<?php if($this->session->flashdata('user_registered')): ?>

				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong class="uppercase"><bdi>Usuario Registrado</bdi></strong>
					El usuario ha sido registrado exitosamente.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>

			<?php endif; ?>


			<div class="white-box analytics-info">
				<?php echo form_open( base_url() . 'users/register') ?>

				<h3 class="box-title">ADMINISTRACION DE USUARIO</h3>

				<div class="row">
					<div class="col-lg-12">
						<?php echo validation_errors(); ?>



						<div class="row mb-5">

							<div class="form-group col-lg-4 mb-4 mt-4 ">
								<label for="">Nombre de ususario (Firma Martech)</label>
								<input type="text" class="form-control text-uppercase" name="user_name" value="<?php echo $user['user_name'] ?>" required>
								<small class="text-danger">* Campo requerido</small>
							</div>




							<div class="form-group col-lg-3 mb-4 mt-4 ">
								<label for="">Numero de empleado</label>
								<input type="number" class="form-control text-uppercase" name="user_martech_number" value="<?php echo $user['user_martech_number'] ?>" required>
								<small class="text-danger">* Campo requerido</small>
							</div>


							<div class="form-group col-lg-5 mb-4 mt-4 ">
								<label for="">Email</label>
								<input type="email" class="form-control text-uppercase" name="email" value="<?php echo $user['email'] ?>" required>
								<small class="text-danger"></small>
							</div>

							<div class="form-group col-lg-6 mb-2 mt-2">
								<label for="">Departamento</label>
								<select class="form-control text-uppercase" name="user_department_id" required>
									<option value="">Seleccione Departamento</option>
									<?php foreach($departments as $department): ?>
										<option <?php if($user['user_department_id'] == $department['department_id']){echo "selected";}else{ echo "";} ?> value="<?php echo $department['department_id'] ?>"><?php echo $department['department_name'] ?></option>
									<?php endforeach; ?>
								</select>
								<small class="text-danger">* Campo requerido</small>
							</div>



							<div class="form-group col-lg-6 mb-2 mt-2 ">
								<label for="">Contraseña</label>
								<input type="password" class="form-control text-uppercase" name="password" required>
								<small class="text-danger">* Campo requerido</small>
							</div>


						</div>
					</div>
				</div> <!--end row-->



				<!--newcode-->


				<div class="col-lg-12">
					<input  type="submit" name="save_user" class="btn btn-primary text-white" value="Editar Usuario">
					<button style="float: right" type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Eliminar
					</button>
				</div>

				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php echo form_open(base_url() . 'useraccounts/delete/'. $user['user_id']) ?>
			<input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				El siguiente usuario sera eliminado: <b><?php echo $user['user_name'] ?></b> haga click en eliminar para
				confirmar.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger text-white">Eliminar</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
