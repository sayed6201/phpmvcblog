<?php require_once APPROOT.'/views/includes/header.php' ?>


<div class="card mx-auto hoverable w-75 mt-sm-5">
  <div class="card-header">
    About Project
  </div>
  <div class="card-body">

    <blockquote class="blockquote mb-0">
      <p><?php echo $data['message'] ?></p>

      <footer class="blockquote-footer">

      	DEVELOPED BY: <cite title="Source Title"><?php echo $data['title'] ?></cite><br>
      	Daffodil International University, BANGLADESH <br>
      	sayed7041@gmail.com

      </footer>
    </blockquote>
  </div>
</div>