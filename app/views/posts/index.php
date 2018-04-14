<?php require_once APPROOT.'/views/includes/header.php'; ?>
<?php if(isset($_SESSION['user_id'])): ?>
    <div class="row">
        <div class="col-sm-6 mx-auto mt-5">
           <?php foreach ($data as $post): ?>
                 <!--Card-->
                    <div class="card">

                <!--Card image-->
                        <div class="view overlay">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%287%29.jpg" class="img-fluid" alt="">
                            <a href="#">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            
                            <h1 class="card-title"><?php echo $post->title; ?></h1>
                            <!--Text-->
                            <p class="card-text"><?php echo substr($post->body,0,100).'...'; ?></p>
                            <a href="<?php echo URL.'postscontroller/postview/'.$post->id; ?>" class="btn btn-primary">read full post</a>
                        </div>

                    </div>
                <!--/.Card-->

           <?php endforeach; ?>
        </div>
    </div>

<?php else: ?>

    <div class="card text-center p-sm-4 mx-auto w-75 mt-5 p-sm-4 hoverable">
        <h1>Please signin or register to view the page</h1>
        <p class="card-text">
            <a class="btn btn-success mx-sm-auto m-2" href="<?php echo URL.'userscontroller/login'; ?>">LOGIN</a>
            <a class="btn btn-info mx-sm-auto m-2" href="<?php echo URL.'userscontroller/register'; ?>">RESGISTER</a>
        </p>
    </div>

<?php endif; ?>    