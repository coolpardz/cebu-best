<?php include('admin-panel/admin-header.php'); ?>
	<?php include('admin-panel/admin-sidebar.php'); ?>
		   <?php echo br(1); ?>
	
		
		 <div class="row admin-news">
		     <div class="col-lg-8">
	
			    <h4>CREATE NEWS</h4>
				<?php echo br(2); ?>
		
			 </div>
		   
		
		
			<?php echo validation_errors(); ?>
			<?php echo form_open('main/create_cat');?>
		
			
			 <div class="col-md-5">	News Title
			<input type="text" name="title" class="search-box" required>
			<?php echo br(1); ?></div>
			
	

			 <div class="col-md-8 col-offset-2">	
			News Content
			<textarea name="description" class="new-box" rows="15" required></textarea>
			</div>
	   <?php echo br(1); ?>
	
	 			
					 <div class="col-md-6">	
                         <button type="submit" class="btn btn-md btn-primary" name="submit">SUBMIT NEWS</button>
				     </div>
					</form>
		
						

<?php include('footer.php'); ?>