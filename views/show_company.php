<?php include('sidebar.php'); ?>
	
			
<div class="row">
    <?php foreach($show_company as $row):?>
    <div class="col-md-3">
        <div class="company-box">
        <h1><?php echo $row->Name; ?></h1>
        <p>
          Location : <span><?php echo $row->Location; ?></span><br/>
                      Category : <span><?php echo $row->Category; ?></span><br/>
                      Contact : <span><?php echo $row->Contact; ?></span><br/>
            <?php if($row->Website != NULL): ?>         
            Website : <span><?php echo $row->Website; ?></span><br/>
            <?php endif; ?>
        </p>
            <button>View Company Profile</button>
            </div>
    </div>
    <?php endforeach; ?>
</div>
		</div>
<?php include('footer.php'); ?>