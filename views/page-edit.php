<?php include('admin-panel/admin-header.php'); ?>
	<?php include('admin-panel/admin-sidebar.php'); ?>

	<?php 
	  
		foreach($edit_page as $row)
		{
		  $title = $row->Title;
		 $content = $row->Content;
		  $id = $row->PageID;	
		
		} ?>
	
		   <div class="row edit-page">
		     <div class="col-lg-12">
			<div class="col-md-12">
			    <h4>EDIT YOUR PAGE NOW</h4>
				<?php echo br(2); ?>
			</div>
		
		
		
			<?php echo validation_errors(); ?>
			<?php echo form_open('main/page_update');?>
				<?php echo form_hidden('id',$id); ?>
			
			 <div class="col-md-5">	Page Title
			<input type="text" name="title" class="search-box" value="<?php echo  $title ?>" required>
			<?php echo br(1); ?></div>
			
	   	
			 <div class="col-md-10 col-offset-2">	
			Page Content   
			<textarea name="content" class="new-box" rows="15" required><?php echo $content; ?></textarea>
			</div><br/>
           
	   <?php echo br(1); ?>
	
	 				<div class="col-md-4">	 
                        <button type="submit" class="" value="SUBMIT PAGE" name="submit">SUMBIT PAGE</button></div>		</form>

	<?php //include('custom-content.php'); ?>
				    
					</div></div>
</div>

	
	<?php include('footer.php'); ?>