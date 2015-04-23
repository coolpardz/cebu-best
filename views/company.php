<?php include('admin-panel/admin-sidebar.php'); ?>
		
	<?php echo br(2); ?>
	<div class="row">
	
	    <div class="col-md-6"><h4>MANAGE COMPANY</h4></div>
	
	</div>
				<?php echo br(2); ?>
				
	
						 <div class="col-md-2 col-offset-2"><a href="<?php echo base_url()?>main/manage_company/add/company" class="btn btn-primary btn-color">Add Company</a>
								</div>
								
								  <div class="col-md-6">
								    <div class="input-group">
								      <input type="text" class="form-control">
								      <span class="input-group-btn">
								        <button class="btn btn-default" type="button">Search!</button>
								      </span>
								    </div><!-- /input-group -->
								  </div><!-- /.col-lg-6 -->
				
			
			<div class="cl-md-8">
				<table class="table table-condensed table-hover">
			<tr class="table-th"><th>ID</th><th>NAME</th><th>LOCATION</th><th>CATEGORY</th><th>CONTAC</th></tr>

			<?php 
			
			$edit = "edit / delete";
			      foreach($show_company as $row)
			{
				  echo "<tr><td><a href='". base_url() ."main/company_modify/edit/". $row->CompanyID ."'>" . $row->CompanyID . "</a></td><td><a href='". base_url() ."main/company_modify/edit/". $row->CompanyID ."'>" . $row->Name."</a></td><td>" . $row->Location . "</td><td>" . $row->Category ."</a></td><td>". $row->Contact ."</td></tr>";
			}

			  ?>
				  </table>
			</div>
	
	
	<?php include('footer.php'); ?>