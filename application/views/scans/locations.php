
<section class="breadcrumb">
	<h1>Escaneo de Gafetes</h1>
	<ul>
		<li><a href="#">Elección de Ubicación</a></li>
		<li class="divider la la-arrow-right"></li>
		<li>Escaneo de Gafetes</li>
	</ul>
</section>



<div class="grid lg:grid-cols-1 gap-5">
	<div class="grid sm:grid-cols-3 gap-5">





		<?php foreach ($locations as $location): ?>


		<div class="div" data-content="<?php echo $location['planner_id'] ?>">
			<div class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
				<a href="<?php echo base_url() ?>scans/new/<?php echo $location['location_id'] ?>">
					<div>
						<span class="text-primary text-5xl leading-none la la-id-card"></span>
						<p class="mt-2"><?php echo $location['location_name'] ?></p>
						<div class="text-primary mt-5 text-3xl leading-none">Planner #:<?php echo $location['planner_id'] ?></div>
						<div class="text-primary mt-5 text-3xl leading-none">Plant #:<?php echo $location['plant_id'] ?></div>
					</div>
				</a>
			</div>
		</div>
		<?php endforeach; ?>

	</div>
</div>
<!--
<script
		src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous"></script>
-->
<script src="<?php echo base_url() ?>assets/datatables/jquery.js"></script>

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


