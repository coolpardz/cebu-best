<?php include('members-header.php'); ?>
	<?php include('sidebar.php'); ?>
		<div class="content">
		Hello user
		  <?php  echo $this->session->userdata('email'); ?>
		</div>
		<div class="clear"></div>

	<?php include('footer.php'); ?>