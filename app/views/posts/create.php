<?php require_once APPROOT.'/views/includes/header.php'; ?>
<h3 class="text-center m-sm-4">Create Post</h3>
<div class="row">
	<div class="col-sm-6 mx-auto">
		
			<!-- Material form contact -->
			<form class="mb-sm-3" action="<?php echo URL.'postscontroller/postcreate'; ?>" method="post">
			    
			    
			    <!-- Material input subject -->
			    <div class="md-form">
			        <i class="fa fa-tag prefix grey-text"></i>
			        <input type="text" id="materialFormContactSubjectEx" class="form-control">
			        <label for="materialFormContactSubjectEx">Title</label>
			    </div>
			    
			    <!-- Material textarea message -->
			    <div class="md-form">
			        <i class="fa fa-pencil prefix grey-text"></i>
			        <textarea type="text" id="materialFormContactMessageEx" class="form-control md-textarea" rows="3"></textarea>
			        <label for="materialFormContactMessageEx">Content</label>
			    </div>

			    <div class="text-center mt-4">
			        <button class="btn btn-success" type="submit">Save<i class="fa fa-save ml-2"></i></button>
			    </div>
			</form>
			<!-- Material form contact -->
                      
	</div>
</div>