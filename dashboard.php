<?php include_once "portalheader.php" ?>
    <main>
        <h2>Dashboard</h2>
       
        Welcome  <?php 
        if (isset($_SESSION['firstname'])){ 
            echo $_SESSION['firstname'];
        }
        ?>
        <?php 
        if (isset($_SESSION['lastname'])){
             echo $_SESSION['lastname'];
            }
        ?>
            <!-- Icon Cards-->
            <div class="row justify-content-center">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-users" style='font-size:24px'></i>
                </div>
                <div class="mr-5">USERS</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="allusers.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-list"></i>
                </div>
                <div class="mr-5">HOSPITALS</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="allhos.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
       <div class="mt-5" style="padding:70px"></div>   
          
   </main>
<?php include_once "portalfooter.php" ?>