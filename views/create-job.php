<?php include('admin-panel/admin-header.php'); ?>
	<?php include('admin-panel/admin-sidebar.php'); ?>
   		<?php echo validation_errors(); ?>

<div class="row create-job"><div class="col-md-8 col-lg-8">
		<?php   echo form_open('main/add_job')
		?>
		<div class="col-12">
		 <div class="col-4 col-offset-8">	<h3>Post a Job</h3>
			<small>Your email : <?php  echo $this->session->userdata('email'); ?></small>
		<?php echo br(2); ?></div>
		</div>
		

         <div class="col-md-6 col-lg-6"><h5>Choose a company </h5>
                <select class="form-control select-reset" name="company">
            <?php 
             foreach($show_company as $row)
                {
                   echo "<option>" . $row->Name . "</option>";
                }
            ?>
            </select></div>


			
			 <div class="col-md-6 col-lg-6"><h5>Choose a category</h5>
						<select class="form-control select-reset" name="category">
					<?php 
					 foreach($show_cat as $row)
						{
						   echo "<option value='". $row->categoryID ."'>" . $row->title . "</option>";
						}
					?>
					</select></div>
                
                
			
			<?php echo br(1); ?>
				
				 <div class="col-md-6 col-lg-6">		Enter Position
				<input type="text" name="position" class="form-control" placeholder="Web Developer" required>
				<?php echo br(1); ?></div>
    <div class="clear"></div>
			
	
<script>
$(document).ready(function(){
        $(".bold-text").click(function(){
            $(".text-details").val(function(index, old) { return '<strong>' + old; });   
    });
    
});
$(document).ready(function(){   
            $("#show-salary-option").hide();
    
        $("#select-option>option").val(function(){
           $("#show-salary-option").hide();
           });
        });     
var input = document.getElementById('input'),
    output = document.getElementById('output');
    output.value = input.value.replace(/<(.|\n)*?>/, '').replace(/<\/(.|\n)*?>/, '');

</script>

						
						 <div class="col-md-12 col-lg-12 col-offset-2">	

 <script type="text/javascript" src="<?php echo base_url(); ?>js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: '#textedit',
    plugins: 'link image code',
    relative_urls: false
});
</script>
        <h4>Job Details</h4>
        <textarea id="textedit" name="details" cols="65" rows="10"></textarea>
						<?php echo br(1); ?></div>
						
				

<div class="date-option"><div class="col-md-6 col-lg-6">

                      Schedule
                        <select name="sched-position" class="form-control">
                        <option value="Full-Time Position">Full-Time Position</option>
                        <option value="Part-Time Position">Part-Time Position</option>
                        <option value="OJT">OJT Traings</option>
                        <option value="On Call">On Call</option>
                        </select>
            
                </div>
	<input type="hidden" name="deadline" value="02/25" class="form-control" >
				 <div class="col-md-6 col-lg-6"> Experienced Needed
						               <select name="experienced" class="form-control">
									<option value="Day">Entry level</option>
									<option value="Night">6 mos./1 year</option>
									<option value="Day / Night">1-2 years</option>
                                    <option value="Day / Night">3-5 years</option>
                                    <option value="Day / Night">more than 5 yrs</option>
                                           </select>
							</div>
    				 <div class="col-md-6 col-lg-6 ">Salary Expectation
						               <select name="shift" class="form-control">
									<option value="Day">Minimum wage</option>
									<option value="Night">P10,000 - P15,000</option>
									<option value="Day / Night">P15,000 - P30,000</option>
                                    <option value="Day / Night">P30,000 - P50,000</option>
                                    <option value="Day / Night">P30,000 - P70,000</option>
                                    <option id="select-option" value="select option" selected="selected">Select option</option>
                                           </select>
                         
                
                         
							</div>
</div>

<br/>

							
                
		
    <div class="col-md-6 col-lg-6"><p>Date:</p> <input type="text" id="datepicker" name="shift"></div>
				
				 <div class="col-md-6 col-lg-6">	
				<div class="checkbox">
				      <label>
				        <input type="checkbox"> By checking the box you agree with our terms and condition
						<?php echo br(1); ?><a href="">Review Terms and Conditions</a>	
				      </label>
                     </div></div>        <div class="col-md-6 col-lg-6"></div>
                    <div class="col-md-6 col-lg-6">
                        <br/>
<input type="submit" class="btn btn-md btn-primary" value="SUBMIT THIS JOB" name="submit">
				<?php echo br(1); ?></div>
				
				</form>
		</div></div>
	<?php include('footer.php'); ?>