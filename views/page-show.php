<?php include('sidebar.php'); ?>
		<div class="row show-page">
	    <div class="col-md-9 col-lg-9">
		<?php 

			foreach($display_page as $row)
			{
			  $title = $row->Title;
			  $content = $row->Content;
			  $id = $row->PageID;	

			} ?>
			
					<div class="col-md-11 col-lg-11">
						<h4><?php echo $title; ?></h4>
						<p><?php echo nl2br($content); ?></p>
					</div>
		
	  </div>
            </div>
	</div><!--mainContent-->
	<?php include('footer.php'); ?>