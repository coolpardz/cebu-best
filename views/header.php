<?php include('head.php') ?>
<body onunload="">	
    <div id="wrapper">
        <div class="container-fluid">
            <div class="center-nav">
        <nav>
             <div class="row top-nav">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
          <ul class="home-ul">
                    <li><a href="<?php echo base_url() ?>">Home</a></li> 
                    <li class="hidden-xs"><a href="<?php echo  base_url()?>browse/company">Companies</a></li>
                    <li class="hidden-xs"><a href="<?php echo  base_url()?>browse/trainings">Trainings</a></li>
                       </ul>
                 </div>
             <div class="col-lg-6 col-md-6 col-sm-6  col-xs-5 pull-right">
                  <ul class="top-right pull-right login">
                    <li><a href="<?php echo  base_url()?>main/login">Login</a></li> 
                    <li><a href="<?php echo  base_url()?>main/register">Sign Up</a></li>
                       </ul>
                 </div>               
                  
               </div>
        </nav>
          
       <header>
         <div class="row  head-top">
            
             <div class="col-lg-12 col-md-12 col-sm-12 col-bk-right">
               <div class="logo-block"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>images/logo.png"></a>
                 
                   <p>Find the best jobs offer in cebu</p>
                 </div>
             </div>
        
        </header>
        <section>
           <div class="row mid-head">

                     <div class="col-lg-8 col-md-8 col-sm-6  col-xs-12 header-md">
                         <ul>
                           <li><a href="">Create Resume</a></li>
                             <li><a href="">Match Job</a></li>
                             <li><a href="">Schedule Interview</a></li>
                         </ul>
             </div>
                     <div class="col-lg-4 col-md-4 col-sm-6  col-xs-12  header-search">
	       <?php  $attributes = array('class' => 'form-horizontal login-input', 'role' => 'form'); 
	  	  echo form_open('show/search', $attributes); ?>
                        
                         <div class="input-group search">
                             <input type="text" name="search" class="search-box" placeholder="Search Here..."/><span class="input-group-addon go-box">GO!</span></div>
             <?php echo form_close(); ?>
               </div>
     
              </div>
            </section>
               <main>