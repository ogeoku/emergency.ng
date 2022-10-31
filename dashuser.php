<?php
    //protect all users end pages
    if (!isset($_SESSION['user_id'])) {
       header("Location: userlogin.php");
        exit();        
	}
?>
<style type="text/css">
    #nav,#nav1,#nav2,#nav3,#nav4,#nav5{
        text-decoration:none;
        color:black;
        font-size:18px;
    }
    ul{
        list-style-type:none;
    }
    #nav,#nav1,#nav2,#nav3,#nav4,#nav5:hover{
        color:black;
    }
    .item{
        margin:10px;
    }

</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card-header text-center mb-4 mt-5">
                <h2 class="mt-3">User</h2>
            </div>
               
    
                <div class="card-body">

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="userprofile.php" id="nav">
                            <i class="fa-sharp fa-solid fa-user"></i>    
                            <span class="item">Profile</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edituserprofile.php" id="nav1">
                            <i class="fa-solid fa-user-pen"></i>    
                            <span class="item">Edit Profile</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addproduct.php" id="nav2">
                            <i class="fa-solid fa-file-circle-plus"></i>    
                            <span class="item">Help Someone</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allproducts.php" id="nav3">
                            <i class="fa-solid fa-list"></i>
                            <span class="item">I Need Help</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" id="nav3">
                            <i class="fa-solid fa-cart-shopping"></i>    
                            <span class="item">My Emergencies</span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" id="nav3">
                            <i class="fa-solid fa-right-from-bracket"></i>    
                            <span class="item">Logout</span></a>
                        </li>
                    </ul>
                </div>
           
        </div>
    </div>
</div>

