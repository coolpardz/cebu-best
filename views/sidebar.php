<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=307019962775863";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="row mid-head">
                 <div class="col-xs-12">
                                <button id="flip">Show Job Category</button>
        <div id="panel"> 
                    <ul>
                        <li><a href=""> IT/Computers</a></li>
                        <li><a href=""> Medical/Hospital</a></li>
                        <li><a href=""> Manufactoring</a></li>
                        <li><a href=""> Education/School</a></li>
                        <li><a href=""> IT/Computers</a></li>
                        <li><a href=""> Medical/Hospital</a></li>
                        <li><a href=""> Manufactoring</a></li>
                        <li><a href=""> Education/School</a></li>
                     </ul></div> </div>                                        
                                  
             <div class="sidebar col-xs-12">
            
                 <div class="cat-links hidden-xs">
                                <h2>Top Categories</h2>
                       <ul>
 <?php 
	foreach($jobcat as $row)
	{
        
        if($row->curEntry != 0)
		{
         //   if($row->categoryID == $currentID){
         //   			echo "<li class='active current-category'><a href='" . base_url()  . "browse/category/". $row->categoryID ."'>" . $row->title . "</a></li>";
         //   }
        //     else{
			echo "<li><a href='" . base_url()  . "browse/category/". $row->categoryID ."'>" . $row->title . "</a></li>";
         //    }
            }            
		}  
  ?>
   </ul>
                   <!-- <div class="fb-page" data-href="https://www.facebook.com/pages/Cebu-Best-Jobs/417530721682316?ref=hl" data-width="200px" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/Cebu-Best-Jobs/417530721682316?ref=hl"><a href="https://www.facebook.com/pages/Cebu-Best-Jobs/417530721682316?ref=hl">Cebu Best Jobs</a></blockquote></div></div>-->

                 </div>
              </div>
              <!--contain data-->
            <div class="content">