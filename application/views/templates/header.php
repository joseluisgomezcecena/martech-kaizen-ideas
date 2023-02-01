<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<title>Personnel Distribution - CI Software</title>


	<!-- Generics -->
	<link rel="icon" href="<?php echo  base_url() ?>assets/img/icon.jpg" sizes="32x32">
	<link rel="icon" href="<?php echo  base_url() ?>assets/img/icon.jpg" sizes="128x128">
	<link rel="icon" href="<?php echo  base_url() ?>assets/img/icon.jpg" sizes="192x192">

	<!-- Android -->
	<link rel="shortcut icon" href="<?php echo  base_url() ?>assets/img/icon.jpg" sizes="196x196">

	<!-- iOS -->
	<link rel="apple-touch-icon" href="<?php echo  base_url() ?>assets/img/icon.jpg" sizes="152x152">
	<link rel="apple-touch-icon" href="<?php echo  base_url() ?>assets/img/icon.jpg" sizes="167x167">
	<link rel="apple-touch-icon" href="<?php echo  base_url() ?>assets/img/icon.jpg" sizes="180x180">

	<link rel="stylesheet" href="<?php echo  base_url() ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo  base_url() ?>assets/datatables/dataTables.css" />
	<!--
	<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
	-->
	<style>
		.menu-bar.menu-wide .menu-items .menu-detail{
			overflow: overlay;
		}
		.menu-bar.menu-wide .menu-items .menu-detail .menu-detail-wrapper{
			overflow-y: overlay !important;
		}
		.dot {
			height: 11px;
			width: 11px;
			background-color: #02be8b;
			border-radius: 50%;
			display: inline-block;
		}
	</style>
</head>

<body>

<!-- Top Bar -->
<header style="background-color: black" class="top-bar">

	<!-- Menu Toggler -->
	<button type="button" class="menu-toggler la la-bars" data-toggle="menu"></button>

	<!-- Brand -->
	<span class="brand"><img class="image" src="<?php echo base_url() ?>assets/img/logoblack.png" alt="Logo" width="150"></span>

	<!-- Search -->
	<form class="hidden md:block ltr:ml-10 rtl:mr-10" action="#">
		<label class="form-control-addon-within rounded-full">
			<input id="myInput" type="text" class="form-control border-none" onkeyup="filterTextInput()" placeholder="Busqueda De Planner">
			<button type="button"
					class="btn btn-link text-gray-300 dark:text-gray-700 dark:hover:text-primary text-xl leading-none la la-search ltr:mr-4 rtl:ml-4"></button>
		</label>
	</form>

	<!-- Right -->
	<div class="flex items-center ltr:ml-auto rtl:mr-auto">

		<!-- Dark Mode -->
		<label class="switch switch_outlined" data-toggle="tooltip" data-tippy-content="Toggle Dark Mode">
			<input id="darkModeToggler" type="checkbox">
			<span></span>
		</label>

		<!-- Fullscreen -->
		<button id="fullScreenToggler" type="button"
				class="hidden lg:inline-block btn-link ltr:ml-3 rtl:mr-3 px-2 text-2xl leading-none la la-expand-arrows-alt"
				data-toggle="tooltip" data-tippy-content="Fullscreen">

		</button>

		<!-- Apps -->
		<div class="dropdown self-stretch">
			<button type="button"
					class="flex items-center h-full btn-link ltr:ml-4 rtl:mr-4 lg:ltr:ml-1 lg:rtl:mr-1 px-2 text-2xl leading-none la la-box"
					data-toggle="custom-dropdown-menu" data-tippy-arrow="true" data-tippy-placement="bottom">
			</button>
			<div class="custom-dropdown-menu p-5 text-center">
				<div class="flex justify-around">
					<a href="#" class="p-5 text-normal hover:text-primary">
						<span class="block la la-id-card text-5xl leading-none"></span>
						<span>Gafetes</span>
					</a>
					<a href="#" class="p-5 text-normal hover:text-primary">
						<span class="block la la-cube text-5xl leading-none"></span>
						<span>Configuración</span>
					</a>
				</div>
				<div class="flex justify-around">
					<a href="#" class="p-5 text-normal hover:text-primary">
						<span class="block la la-file-alt text-5xl leading-none"></span>
						<span>Reportes</span>
					</a>
					<!--
					<a href="#" class="p-5 text-normal hover:text-primary">
						<span class="block la la-dollar text-5xl leading-none"></span>
						<span>Shop</span>
					</a>
					-->
				</div>
			</div>
		</div>






		<!-- Notifications
		<div class="dropdown self-stretch">
			<button type="button"
					class="relative flex items-center h-full btn-link ltr:ml-1 rtl:mr-1 px-2 text-2xl leading-none la la-bell"
					data-toggle="custom-dropdown-menu" data-tippy-arrow="true" data-tippy-placement="bottom-end">
                    <span
						class="absolute top-0 right-0 rounded-full border border-primary -mt-1 -mr-1 px-2 leading-tight text-xs font-body text-primary">3</span>
			</button>
			<div class="custom-dropdown-menu">
				<div class="flex items-center px-5 py-2">
					<h5 class="mb-0 uppercase">Notifications</h5>
					<button class="btn btn_outlined btn_warning uppercase ltr:ml-auto rtl:mr-auto">Clear All</button>
				</div>
				<hr>
				<div class="p-5 hover:bg-primary hover:bg-opacity-5">
					<a href="#">
						<h6 class="uppercase">Heading One</h6>
					</a>
					<p>Lorem ipsum dolor, sit amet consectetur.</p>
					<small>Today</small>
				</div>
				<hr>
				<div class="p-5 hover:bg-primary hover:bg-opacity-5">
					<a href="#">
						<h6 class="uppercase">Heading Two</h6>
					</a>
					<p>Mollitia sequi dolor architecto aut deserunt.</p>
					<small>Yesterday</small>
				</div>
				<hr>
				<div class="p-5 hover:bg-primary hover:bg-opacity-5">
					<a href="#">
						<h6 class="uppercase">Heading Three</h6>
					</a>
					<p>Nobis reprehenderit sed quos deserunt</p>
					<small>Last Week</small>
				</div>
			</div>
		</div>
		-->
		<?php if(isset($this->session->userdata['logged_in'])): ?>
		<div class="dropdown">
			<button class="flex items-center ltr:ml-4 rtl:mr-4" data-toggle="custom-dropdown-menu"
					data-tippy-arrow="true" data-tippy-placement="bottom-end">
				<span class="avatar">
					<?php if(isset($this->session->userdata['logged_in'])): ?>
						<?php echo substr($this->session->userdata['user_id']['user_name'],0,1); ?>
					<?php endif; ?>
				</span>
			</button>
			<div class="custom-dropdown-menu w-64">
				<div class="p-5">
					<h5 class="uppercase"><?php echo $this->session->userdata['user_id']['user_name'] ?></h5>
					<p>Administrador</p>
				</div>
				<!--
				<hr>
				<div class="p-5">
					<a href="#" class="flex items-center text-normal hover:text-primary">
						<span class="la la-user-circle text-2xl leading-none ltr:mr-2 rtl:ml-2"></span>
						View Profile
					</a>
					<a href="#" class="flex items-center text-normal hover:text-primary mt-5">
						<span class="la la-key text-2xl leading-none ltr:mr-2 rtl:ml-2"></span>
						Change Password
					</a>
				</div>
				-->
				<hr>
				<div class="p-5">
					<a href="<?php echo base_url() ?>users/logout" class="flex items-center text-normal hover:text-primary">
						<span class="la la-power-off text-2xl leading-none ltr:mr-2 rtl:ml-2"></span>
						Cerrar Sesión.
					</a>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<!--User Menu -->
	</div>
</header>
