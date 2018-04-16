<!--Navbar-->

<nav class="navbar navbar-expand-lg navbar-dark primary-color sticky-top">
<div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="<?php echo URL; ?>">PHPMVC</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse ">

        <!-- Links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href=<?php echo URL; ?>>Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL.'postscontroller/index' ?>">Posts</a>
            </li>
            
            <!-- logged in options -->
            <?php if(isset($_SESSION['user_name'])): ?>
                <!-- profile viewin -->
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL.'userscontroller/index'; ?>">profile</a>
                    </li>         

                <!-- profile viewin -->
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL.'postscontroller/dashboard'; ?>">Dashboard</a>
                    </li>                            

                <!-- Dropdown -->
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user_name']; ?></a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo URL.'userscontroller/logout'; ?>">Logout</a>
                    </div>
                    </li>
            <?php endif; ?>  

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL.'pagescontroller/about' ?>">About</a>
                    </li>  

        </ul>
        <!-- Links -->

        <!-- <form class="form-inline">
            <div class="md-form mt-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </div>
        </form> -->
    </div>
    <!-- Collapsible content -->
</div>
</nav>
<!--/.Navbar-->
