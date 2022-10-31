<?php include_once "portalheader.php" ?>
    <main>
        <h2>All User</h2>
<table class="table table-border table-striped">
    <thead>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>Gender</th>
        <th>Date</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
       
            include_once "myfolder/emergencyusers.php";
            // create instance of  student class
            $obj = new User();

            $alluser = $obj->getUsers();
            echo "<pre>";
            print_r($alluser);
            echo "</pre>";

            //check if there are elements in the array
            if(count($alluser) > 0){
                $kounter = 0;
                foreach ($alluser as $key => $value ){

           ?>
    <tr>
                    <td><?php echo ++$kounter;?></td>
                    <td><?php echo $value['firstname'];?></td>
                    <td><?php echo $value['lastname'];?></td>
                    <td><?php echo $value['phone'];?></td>
                    <td><?php echo $value['email'];?></td>
                    <td><?php echo $value['gender'];?></td>
                    <td><?php echo date('D, j F Y',strtotime($value['created_at']));?></td>
                    <td>
                        <a href="" class= " btn btn-primary btn-sm">Edit</a>
                        <a href="" class= " btn btn-danger btn-sm">Delete</a>
                </td>




    </tr>


<?php

}
            }
?>
    </tbody>
</table>
       
   </main>
<?php include_once "portalfooter.php" ?>