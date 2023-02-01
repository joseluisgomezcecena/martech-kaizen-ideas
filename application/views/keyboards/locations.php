
<div class="row height d-flex justify-content-center align-items-center mt-2 mb-5">
	<div class="col-md-6">
		<div class="form">
			<i class="fa fa-search"></i>
			<input id="myInput"  type="text" class="form-control form-input" onkeyup="filterTextInput()" placeholder="Busca el numero de planner o nombre de la celda...">
		</div>
	</div>
</div>

<div class="row">

	<?php foreach ($locations as $location): ?>

	<!--col start-->
	<div class="col-md-6 col-lg-4 div" data-content="<?php echo $location['planner_id'] ?> <?php echo $location['location_name'] ?>">
		<div class="card card-hover">
			<a href="<?php echo base_url() ?>keyboards/new/<?php echo $location['location_id'] ?>/<?php echo $type ?>">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<div>
							<h6 class="m-b-0">
								<span><?php echo $location['location_name'] ?></span>
							</h6>
							<h5 class="m-b-0">
								<span><?php echo $location['planner_id'] ?></span>
							</h5>
							<h5 class="m-b-0">
								<span>Planta: <?php echo $location['plant_id'] ?></span>
							</h5>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
	<!--col end-->
	<?php endforeach; ?>

</div>

<script>
	function filterTextInput()
	{
		var input, radios, radio_filter, text_filter, td0, i, divList;
		input = document.getElementById("myInput");
		text_filter = input.value.toUpperCase();
		divList = $(".div");

		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < divList.length; i++)
		{
			td0 = divList[i].getAttribute('data-content');
			if (td0)
			{
				if (td0.toUpperCase().indexOf(text_filter) > -1) {
					divList[i].style.display = "";
				}
				else
				{
					divList[i].style.display = "none";
				}
			}
		}
	}
</script>


