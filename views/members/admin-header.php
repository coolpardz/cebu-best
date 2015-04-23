<?php include('head.php') ?>
<body onunload="">	
    <div id="wrapper">
        <div class="container-fluid">
            <div class="center-nav">
        <nav>
             <div class="row top-nav">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
             <span class="top-left-admin">Welcome! admin</span> 
              <a href="<?php echo  base_url()?>main/">   View Main Site</a>
                 </div>
             <div class="col-lg-6 col-md-6 col-sm-6  col-xs-5 pull-right">

            		<div class="dropdown">
			<ul class="list-unstyled list-inline tab-right pull-right" role="menu" aria-labelledby="dLabel">			
				<li><a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
		   			User Panel <span class="caret"></span></a>
		  			    <ul class="dropdown-menu dropdown-login" role="menu" aria-labelledby="dLabel">
		    				<li><a href="<?php echo  base_url()?>main/members">View Account</a></li>
		  					<li><a href="<?php echo  base_url()?>main/">Manage Resume</a></li>
			  				<li><a href="<?php echo  base_url()?>main/">Edit Settings</a></li>
		  				</ul>
		        </li>
				<li><a href="<?php echo  base_url()?>main/logout">Logout</a>
				  	
				 </li>		
			</ul>
		</div><!--dropdown-->
                 </div>               
                  
               </div>
        </nav>
          
       <header>
         <div class="row  head-top">
            
             <div class="col-lg-12 col-md-12 col-sm-12">
               <img src="<?php echo base_url() ?>images/logo.png">
             </div>
        
        </header>
        <section>
           <div class="row mid-head">

                     <div class="col-lg-8 col-md-8 col-sm-6  col-xs-12 header-md">
                         <ul>
                           <li><a href="">APPLICANTS</a></li>
                             <li><a href="">TOP SEARCHES</a></li>
                             <li><a href="">COMPANY INTERVIEW</a></li>
                         </ul>
             </div>
                     <div class="col-lg-4 col-md-4 col-sm-6  col-xs-12  header-search">
                  <!--   <?php// echo validation_errors(); ?>
	       <?php //$attributes = array('class' => 'form-horizontal login-input', 'role' => 'form'); 
	  	  //echo form_open('show/search', $attributes); ?>
                         <div class="input-group search">
                             <input type="text" name="search" class="form-control search-box" placeholder="web dev"/> <span class="input-group-addon go-box">GO!</span></div>
             <?php //echo form_close(); ?>-->
               </div>
     
              </div>
            </section>
               <main>

