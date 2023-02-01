<!-- Footer -->
<footer class="mt-auto">
	<div class="footer">
		<span class='uppercase'>&copy; <?php echo date("Y") ?> MMW CI Software</span>
		<nav>
			<a href="#">Support</a>
			<span class="divider">|</span>
			<a href="#" target="_blank">Docs</a>
		</nav>
	</div>
</footer>

</main>

<!-- Scripts -->
<!--
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
-->
<script src="<?php echo base_url() ?>assets/datatables/jquery.js"></script>

<script src="<?php echo  base_url() ?>assets/js/vendor.js"></script>
<!--
<script src="<?php echo  base_url() ?>assets/js/chart.min.js"></script>
-->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1"></script> -->
<script src="<?php echo  base_url() ?>assets/js/script.js"></script>
<!--
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
-->
<script src="<?php echo base_url() ?>assets/datatables/datatables.js"></script>

<script>
	$(document).ready( function () {
		$('#ingredientsTable').DataTable();
	} );

	function check_empty() {
		if($(this).val().length ===0){
			alert("empty");
		}
	}

</script>
</body>

</html>
