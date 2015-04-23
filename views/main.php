<?php include('sidebar.php'); ?>

<div class="job-show-xs">
               <p class="date"> <!--MAR 17             <small class="visible-xs pull-right">Viewing : <span class="view-at">HOME - IT/Computers </span></small>--></p>
                         	<?php 
    foreach($viewpage as $row){
               
  $datestring = "%M<strong> %d</strong>";
 $time = $row->DatePosted;
 $change_to_timesamp = strtotime($time);
 $modifydate =  mdate($datestring, $change_to_timesamp);

        echo " <div class='xs-job odd'>
                      <a href='". base_url()."show/jobs/". $row->JobID. "'><h4>". $row->Position."</h4></a>
                     <span class='small-content'>". $row->Experience ."</span>
                     <div class='details'>Details<br/>" . $row->Company ."
                      <span class='pull-right'>". $row->Location."</span><br/>
                      <p class='small-content'>". $row->Website. "<span class='pull-right'> ". $row->Address."</span></p>
                    </div></div>";
        
        
        
    } ?>
                    
		<?php 
  
			echo $page ;
		
			?>               
                </div><!-- end of job show -->
            
                <small class="hidden-xs"><!--Viewing : <span class="view-at">HOME - IT/Computers </span>--></small>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<table class="tb-job-content">
                  <tr><th>Date</th><th>Position</th><th>Details <span>(Company - Experience - Salary)</span></th><th>Location</th></tr>
                    
                    	
  <?php  foreach($viewpage as $row): ?>
  <?php             
  $datestring = "%M<strong> %d</strong>";
 $time = $row->DatePosted;
 $change_to_timesamp = strtotime($time);
 $modifydate =  mdate($datestring, $change_to_timesamp);
$salary = "1 - 2 years &nbsp;&nbsp; -&nbsp;&nbsp; Day&nbsp; Shift &nbsp;&nbsp; -&nbsp;&nbsp;  P30,000/month"; 
    ?>
<script type="text/javascript">
$(document).ready(function(){ 
    
    $(".tb-job-content tr td:nth-child(2) a#job-<?php echo $row->JobID; ?>").hover(function(){
        $(".tb-job-content tr td:nth-child(2) p#<?php echo $row->JobID; ?>").delay().fadeIn();
        },function(){
             $(".tb-job-content tr td:nth-child(2) p#<?php echo $row->JobID; ?>").delay().fadeOut();
    });
});

</script>
        <?php
              echo " <tr><td>" . $modifydate ." </td><td><a href='". base_url()."show/jobs/". $row->JobID . "' id='job-". $row->JobID ."'>" . $row->Position . "</a><br/><p id='". $row->JobID ."'><span>30 </span>views | <span>30</span> applicants</p></td><td>" . $row->Company . "<br/><span class='small-content'>" . $salary ."</span></td><td>" . $row->Location . "<br/><span class='small-content'>" . $row->Address . "</span></td></tr>"; ?>
    
       <?php endforeach ?>
               </table>
		<?php //echo $page; ?>
    
                </table>
                
              </div>
        
            </div>

<?php include('footer.php'); ?>