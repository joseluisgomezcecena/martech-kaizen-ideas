
<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Pedir Insertos</h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<div class="d-md-flex">
				<ol class="breadcrumb ms-auto">
					<li><a href="#" class="fw-normal">Pedir Insertos</a></li>
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
				<h3 class="box-title">Sups</h3>
				<div class="table-responsive">
					<table style="width: 100%" id="entries-list" class="table">
						<thead>
							<th>ID</th>
							<th>Sup</th>
							<th>Revision</th>
							<th>Maquina</th>
							<th>Partes</th>
							<th>Acciones</th>
						</thead>
						<tbody>
							<?php
							foreach ($sups as $sup):
							?>

								<tr>
									<td><?php echo $sup['id'] ?></td>
									<td><?php echo $sup['boy_sup'] ?></td>
									<td><?php echo $sup['revision'] ?></td>
									<td><?php echo $sup['maquina'] ?></td>
									<td><?php echo $sup['partno'] ?><br><?php echo $sup['partno_descrip'] ?></td>
									<td><a class="btn btn-primary" href="<?php echo base_url() ?>request/sup/<?php echo $sup['id'] ?>">Pedir</a></td>
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
			"sEmptyTable": "No hay informacion... <a href='<?php echo base_url() ?>request/new' class='btn btn-primary'>Agregar Aqui</a>",
			"sZeroRecords": "No se encontro el sup ... <a href='<?php echo base_url() ?>request/new' class='btn btn-primary'>Agregar Aqui</a>"
		}
		//'bSort': false
		//'scrollCollapse': true,
	});
</script>




<script>
	(function reloadfun() {
		$.ajax({
			url: '<?php echo base_url() ?>pages/view',
			success: function(data) {
				$("#pendingdiv").load(location.href+" #pendingdiv>*","");//logged_in
			},
			complete: function() {
				// Siguiente peticion de ajax cuando la actual este terminada
				setTimeout(reloadfun, 300000);

			}
		});
	})();
</script>
