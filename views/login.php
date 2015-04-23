<?php include('sidebar.php'); ?>
	<div class="row">
    <div class="col-lg-10 col-md-10">
	 <div class="login-page"><div class="login-box">
	<h4>Login your account</h4>
	<span class="help-block">You may also login your facebook account.</span>
	
	<div class="col-lg-5 col-md-5 alert" role="alert"><?php echo validation_errors(); ?></div><div class="col-lg-6 col-md-6"></div>
         <div class="clear"></div>
	<?php  $attributes = array('class' => 'form-horizontal login', 'role' => 'form'); 
	  echo form_open('main/process_user', $attributes);
	?>
         
	  <div class="form-group">
	    <div class="col-lg-5">
	      <input type="email" class="search-box" id="inputEmail1" name="email" placeholder="EMAIL">
	    </div>
	  </div>
	  <div class="form-group">
	    
	    <div class="col-lg-5">
	      <input type="password" class="search-box" id="inputPassword1" name="password" placeholder="PASSWORD">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class=" col-lg-5">
	      <div class="checkbox">
	        <label>
	          <input type="checkbox"> Remember me
	        </label>
	      </div>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class=" col-lg-5">
	      <button type="submit" class="btn btn-default">Sign in</button>
	    </div>
	  </div>
<?php echo form_close(); ?>
        
 </div>
</div>
</div>
</div>

</div><!--mainContent-->
<?php include('footer.php'); ?>