<?php include('sidebar.php'); ?>
 	<?php 
	      foreach($getjobdetails as $row)
	{
		  
		 $cat = $row->Category;
		 $exp = $row->Experience;
		 $worksched = $row->DailySched;
		 $position = $row->Position;
		 $desc = $row->Description;
		 $company = $row->Company;
		 $details = $row->Details;
         $datePost = $row->DatePosted;
               $location = $row->Location;
               $Address = $row->Address;
           $catid = $row->Category;
 $datestring = "%M %d , %Y";
 $time = $row->DatePosted;
 $change_to_timesamp = strtotime($datePost);
 $modifydate =  mdate($datestring, $change_to_timesamp);
        
		 	
	}
	  ?>
	   <div class="job-content">
            <div class="container-fluid">
               <div class="row">
                 <div class="col-lg-11">
                     <div class="col-sm-4 col-md-3 col-lg-3 h1-title">
                         <h1>Job Details</h1></div><div class="hidden-xs col-sm-8 col-md-9 col-lg-9 border-header"></div>
                     <div class="row">
                        <div class="col-md-6"> 
                            <div class="content-span">
                                  <h2><?php echo $position; ?></h2>
                                <p>Position : <span><?php echo " " . $worksched ?></span><br/>
                                   Schedule : <span><?php echo " " . $exp ?></span><br/>
                                   Salary : <span><?php echo "P20,000 / Month "; ?></span>
                                </p>
                                </div>

                         </div>
                             <div class="col-md-3">
                                    <p class="date-content">Posted on <span><?php echo $modifydate; ?></span><br/>
                   Total ad views : 30 </p>

                         </div>
                     </div>
                   </div>
                <!--
                 <div class="col-lg-4">
                       <p>Get Hired By <br/><strong><?php echo $company; ?></strong> company located in <span class="job-loc-top"><?php echo $location; ?></span> <br/><small> <?php echo $Address; ?></small></p><br/><span class="top-share">Click to share this job</span> 
                     <ul class="list-unstyled list-inline social-ico">
	<li><a href="https://www.facebook.com/pages/Cebu-Best-Job/417530721682316"><img src="<?php echo  base_url()?>images/32-facebook.png" width="32" height="32"/></a></li>
			<li><a href=""><img src="<?php echo  base_url()?>images/32-instagram.png" width="32" height="32"/></a></li>
					<li><a href=""><img src="<?php echo  base_url()?>images/32-googleplus.png" width="32" height="32"/></a></li>
                  </div>
                     
                   <div class="col-lg-3">
                    <a class="btn-next-job" href="#" role="button">Browse Next Job<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a><br/><br/>
                       Or go back to <a href="<?php echo base_url() ?>browse/category/'<?php echo $catid; ?>"<><strong><?php echo $cat?></strong></a> category
                     </div>
                </div> -->
 
            
                 <div class="col-lg-8">
                    <div class="job-desc">
                            <h3>Job Description and Requirements</h3>
	        <?php echo $details; ?>
	       </div>
                     </div>
            
                   <div class="col-lg-8">
                       <div class="company-info">
                           <h4>COMPANY OVERVIEW</h4>
	        <h5><?php echo $company; ?></h5> 
	        <p class="company-desc"><?php echo nl2br($desc); ?></p> 
                     <br/>
                     <p class="p-website">You may also check our website <br/>
                        <a href="">www.yahoo.com</a>
                     </p>
                       </div>
	           </div>
                  
               <div class="col-lg-8">
                       <div class="company-info">
                           <h4>APPLY NOW</h4> 
	        <div class="col-lg-6 col-md-6"><input type="text" name="search" class="search-box" placeholder="FULL NAME"></div>
                                   <div class="col-lg-6 col-md-6"><input type="text" name="search" class="search-box" placeholder="EMAIL"></div>
                                   <div class="col-lg-6 col-md-6"><input type="text" name="search" class="search-box" placeholder="CONTACT NO"></div>
                           <div class="col-lg-12  col-md-12"><textarea rows="8" cols="50" class="search-box" >COVER LETTER</textarea></div>
                           <div class="col-lg-3 col-md-4">
                               Upload your resume :
                               <div class="upload-resume">
                               <input type="file" name="userfile" size="20" class="upload-file" /></div></div> <div class="col-lg-9 col-md-8"></div> <div class="clear"></div>
                     <div class="col-lg-3  col-md-4">      
                         <button>SUBMIT</button></div>
                 
                       </div>
                   <div class="clear"></div>
	           </div>
           
                 <div class="col-lg-8">
                     <div class="job-detail-fb">
                     <h5></h5>
<div class="fb-send" data-href="https://developers.facebook.com/docs/plugins/" data-width="70" data-height="40" data-colorscheme="light"></div> this job to your facebook friends
            
               </div></div>
           
                     </div><!-- row- -->
                   </div>
               
	</div>
	
<?php include('footer.php'); ?>