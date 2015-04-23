<?php include('admin-panel/admin-header.php'); ?>

	<?php include('admin-panel/admin-sidebar.php'); ?>

		<div class="row admin-panel">
		<div class="col-12"><h4>Welcome to your control panel</h4></div>
		<div class="col-lg-6 col-md-6 admin-info">
		  Your email : <?php  echo $this->session->userdata('email'); ?>
		</div>
			<div class="col-lg-6 col-md-6 admin-info">This is your right side</div></div>
	<?php include('footer.php'); ?>