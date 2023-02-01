<!-- Menu Bar -->
<aside class="menu-bar menu-sticky">
	<div class="menu-items">
		<div class="menu-header hidden">
			<a href="#" class="flex items-center mx-8 mt-8">
				<!--
				<span class="avatar w-16 h-16">JD</span>
				-->
				<div class="ltr:ml-4 rtl:mr-4 ltr:text-left rtl:text-right">
					<h5>Martech Medical West.</h5>
					<p class="mt-2">Distribución de empleados</p>
					<?php if (isset($this->session->userdata['logged_in'])) : ?>
						<p class="mt-2"><span class="dot"></span>&nbsp;Sesión: <b><?php echo $this->session->userdata['user_id']['user_name']; ?></b></p>
					<?php endif; ?>
				</div>
			</a>
			<hr class="mx-8 my-4">
		</div>
		<a href="<?php echo base_url() ?>" class="link" data-toggle="tooltip-menu" data-tippy-content="Dashboard">
			<span class="icon la la-laptop"></span>
			<span class="title">Inicio</span>
		</a>
		<a href="<?php echo base_url() ?>scans/location" class="link" data-target="[data-menu=pages]" data-toggle="tooltip-menu" data-tippy-content="Pages">
			<span class="icon la la-id-card"></span>
			<span class="title">Escanear Gafetes</span>
		</a>
		<a href="<?php echo base_url() ?>keyboards/type" class="link" data-target="[data-menu=pages]" data-toggle="tooltip-menu" data-tippy-content="Pages">
			<span class="icon la la-keyboard"></span>
			<span class="title">Captura Manual</span>
		</a>
		<a href="<?php echo base_url() ?>reports" class="link" data-target="[data-menu=pages]" data-toggle="tooltip-menu" data-tippy-content="Pages">
			<span class="icon la la-file-alt"></span>
			<span class="title">Reportes</span>
		</a>
		<a href="<?php echo base_url() ?>records" class="link" data-target="[data-menu=pages]" data-toggle="tooltip-menu" data-tippy-content="Pages">
			<span class="icon la la-edit"></span>
			<span class="title">Editar Registros</span>
		</a>
		<a href="#no-link" class="link" data-target="[data-menu=ui]" data-toggle="tooltip-menu" data-tippy-content="UI">
			<span class="icon la la-cube"></span>
			<span class="title">Configuración</span>
		</a>

		<!--
		<a href="#no-link" class="link" data-target="[data-menu=applications]" data-toggle="tooltip-menu"
		   data-tippy-content="Applications">
			<span class="icon la la-store"></span>
			<span class="title">Applications</span>
		</a>
		<a href="#no-link" class="link" data-target="[data-menu=menu]" data-toggle="tooltip-menu"
		   data-tippy-content="Menu">
			<span class="icon la la-sitemap"></span>
			<span class="title">Menu</span>
		</a>
		<a href="blank.html" class="link" data-toggle="tooltip-menu" data-tippy-content="Blank Page">
			<span class="icon la la-file"></span>
			<span class="title">Blank Page</span>
		</a>
		<a href="https://yeti.yetithemes.net/docs" target="_blank" class="link" data-toggle="tooltip-menu"
		   data-tippy-content="Docs">
			<span class="icon la la-book-open"></span>
			<span class="title">Docs</span>
		</a>
		-->
	</div>

	<!-- Dashboard -->
	<!--
	<div class="menu-detail" data-menu="dashboard">
		<div class="menu-detail-wrapper">
			<a href="index.html">
				<span class="la la-cube"></span>
				Default
			</a>
			<a href="index.html">
				<span class="la la-file-alt"></span>
				Content
			</a>
			<a href="index.html">
				<span class="la la-shopping-bag"></span>
				Ecommerce
			</a>
		</div>
	</div>
	-->

	<!-- UI -->
	<div class="menu-detail" data-menu="ui">
		<div class="menu-detail-wrapper">
			<h6 class="uppercase">Ubicaciónes</h6>
			<a href="form-components.html">
				<span class="la la-file-alt"></span>
				Alta de ubicaciones
			</a>
			<a href="form-input-groups.html">
				<span class="la la-sort-numeric-asc"></span>
				Alta de Planning Number
			</a>


			<a href="<?= base_url('reports/tempus') ?>">
				<span class="la la-sort-numeric-asc"></span>
				Reporte de tempus
			</a>

		</div>
	</div>


</aside>