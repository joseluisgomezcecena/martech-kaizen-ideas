
<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Usuarios</h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<div class="d-md-flex">
				<ol class="breadcrumb ms-auto">
					<li><a href="#" class="fw-normal">Lista de usuarios</a></li>
				</ol>
			</div>
		</div>
	</div>
	<!-- /.col-lg-12 -->
</div>


<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Three charts -->
	<!-- ============================================================== -->
	<div class="row justify-content-center">

		<div class="col-lg-12">
			<div class="white-box analytics-info">
				<h3 class="box-title">Usuarios</h3>
				<div class="table-responsive">
					<table style="width: 100%" id="entries-list" class="table">
						<thead>
						<th>ID</th>
						<th>Usuario</th>
						<th># Empleado</th>
						<th>Departamento</th>
						<th>Correo Electronico</th>
						<th>Acciones</th>
						</thead>
						<tbody>
						<?php
						foreach ($users as $user):
							?>

							<tr>
								<td><?php echo $user['user_id'] ?></td>
								<td><?php echo $user['user_name'] ?></td>
								<td><?php echo $user['user_martech_number'] ?></td>
								<td><?php echo $user['department_name'] ?></td>
								<td><?php echo $user['email'] ?></td>
								<td><a class="btn btn-primary" href="<?php echo base_url() ?>users/<?php echo $user['user_id'] ?>">Administrar</a></td>
							</tr>

						<?php endforeach; ?>
						</tbody>

					</table>
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
		"oLanguage": {
			"sEmptyTable": "No hay informacion...",
			"sZeroRecords": "No se encontro el usuario ...",
		}
		//'bSort': false
		//'scrollCollapse': true,
	});
</script>




