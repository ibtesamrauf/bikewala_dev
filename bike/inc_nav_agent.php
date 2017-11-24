<?php require('inc_session.php'); ?>
<nav class="b-nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-xs-8">
                <div class="b-nav__list wow slideInRight" data-wow-delay="0.3s">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse navbar-main-slide" id="nav">
                        <ul class="navbar-nav-menu">
                            <li><a href="agent_main.php">Agent Area</a></li>
                            <li><a href="bikeadd_agent.php">Add Bike Detail</a></li>
                            <li><a href="bikeadd.php">View Requests</a></li>
                            <li><a href="#">Profile</a></li> [You are logged in as <font color=red><?php echo $_SESSION['user_name'];?></font>]
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav><!--b-nav-->