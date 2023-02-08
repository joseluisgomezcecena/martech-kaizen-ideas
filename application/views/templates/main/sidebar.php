<!-- Side Nav START -->
<div style="" class="side-nav">
	<div class="side-nav-inner">
		<ul class="side-nav-menu scrollable">
			<!--Main-->
			<li class="nav-item dropdown open">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa fa-id-card fa-lg"></i>
                                </span>
					<span class="title">Pantalla Principal</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<?php if (isset($this->session->userdata['logged_in'])) : ?>
							<a href="<?php echo base_url() ?>/admin">Principal</a>
						<?php else : ?>
							<a href="<?php echo base_url() ?>/">Regresar</a>
						<?php endif; ?>

					</li>
				</ul>
			</li>


			<?php if (isset($this->session->userdata['logged_in'])) : ?>

			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa fa-lightbulb fa-lg"></i>
                                </span>
					<span class="title">Ideas</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<!--
					<li>
						<a href="<?php echo base_url() ?>admin/ingredients">Planners</a></li>
					<li>
						<a href="<?php echo base_url() ?>admin/sizes">Horarios</a>
					</li>
					-->
				</ul>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
<!-- Side Nav END -->

