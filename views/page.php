<?php include('admin-panel/admin-header.php'); ?>
	<?php include('admin-panel/admin-sidebar.php'); ?>

		<div class="row">
		 <div class="col-md-6">
			<?php echo br(1); ?>
			<h4>Create or Edit Page</h4>
		  </div>
	
	
			<?php echo br(1); ?>
			
					 <div class="col-md-8">
				<table class="table table-condensed table-hover">
			<tr class="table-th"><th>ID</th><th>TITLE</th><th>DATE</th><th>EDIT / DELETE</th></tr>

			<?php 
			
			$edit = "edit / delete";
			      foreach($show_page as $row)
			{
				  echo "<tr><td><a href='". base_url() ."main/page_change/edit/". $row->PageID ."'>" . $row->PageID . "</a></td><td><a href='". base_url() ."main/page_change/edit/". $row->PageID ."'>" . $row->Title."</a></td><td>" . $row->DatePosted . "</td><td>" . $edit ."</a></td></tr>";
			}

			  ?>
				  </table>
            </div>
            	</div>
<?php include('footer.php'); ?>