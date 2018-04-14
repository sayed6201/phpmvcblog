<?php require_once APPROOT.'/views/includes/header.php'; ?>
<?php require_once APPROOT.'/views/includes/alert.php'; ?>

<!-- errors display -->
<div class="text-center" style="color: red;">
            <p><?php echo $data['email_err'];  ?></p>
            <p><?php echo $data['password_err'];  ?></p>
</div>


<div class="row mt-sm-5">
	<div class="col-sm-6 mx-auto">

    <!--  form login --> 
<form class="mx-auto" method="post" action="<?php echo URL."userscontroller/login" ?>">
    <p class="h4 text-center mb-4">Sign in</p>

    <!--  input email -->
    <div class="md-form">
        <i class="fa fa-envelope prefix grey-text"></i>
        <input type="email" name="email" class="form-control" value="<?php echo $data['email'];  ?>">
        <label for="materialFormLoginEmailEx">Your email</label>
    </div>

    <!--  input password -->
    <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" name="password" class="form-control" value="<?php echo $data['password'];  ?>">
        <label for="materialFormLoginPasswordEx">Your password</label>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-default" type="submit">Login</button>
    </div>

</form>
	</div>
</div>
<!--  form login -->
                      