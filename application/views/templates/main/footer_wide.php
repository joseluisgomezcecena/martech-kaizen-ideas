<!-- Core Vendors JS -->
<script src="<?php echo base_url() ?>assets/js/vendors.min.js"></script>

<!-- Datatables -->
<script src="<?php echo base_url() ?>assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables/dataTables.bootstrap.min.js"></script>


<!-- page js -->
<script src="<?php echo base_url() ?>assets/vendors/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/dashboard-crm.js"></script>

<!-- Core JS -->
<script src="<?php echo base_url() ?>assets/js/app.min.js"></script>

<script>
	$('#data-table').DataTable();

</script>

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

<script>

	var checkbox1 = document.getElementById("check1");

	if(checkbox1.checked) {
		$("#equipo").show();
	} else {
		$("#equipo").hide();
	}

	checkbox1.addEventListener( 'change', function() {
		if(this.checked) {
			$("#equipo").show(300);
		} else {
			$("#equipo").hide(200);
		}
	});

	//$("#equipo").hide();



	/*
	$("#check1").click(function() {
		if($(this).is(":checked")) {
			$("#equipo").show(300);
		} else {
			$("#equipo").hide(200);
		}
	});*/
</script>

<script>
	$("#otro").hide();
	$("#checkotro").click(function() {
		if($(this).is(":checked")) {
			$("#otro").show(300);
		} else {
			$("#otro").hide(200);
		}
	});

</script>

</body>

</html>
