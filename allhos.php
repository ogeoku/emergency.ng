<?php include_once "portalheader.php" ?>
    <main>
        <h2>All User</h2>
<table class="table table-border table-striped">
    <thead>
        <th>#</th>
        <th>Hospital Name</th>
        <th>Hospital Type</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>State</th>
        <th>Description</th>
        <th>Date</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
       
            include_once "myfolder/emergencyhospitals.php";
            // create instance of  student class
            $obj = new Hospital();

            $allhos = $obj->getAllHospitals();
            echo "<pre>";
            print_r($allhos);
            echo "</pre>";

            //check if there are elements in the array
            if(count($allhos) > 0){
                $kounter = 0;
                foreach ($allhos as $key => $value ){

           ?>
    <tr>
                    <td><?php echo ++$kounter;?></td>
                    <td><?php echo $value['hospital_name'];?></td>
                    <td><?php echo $value['hospital_type'];?></td>
                    <td><?php echo $value['contact'];?></td>
                    <td><?php echo $value['email'];?></td>
                    <td><?php echo $value['state_name'];?></td>
                    <td><?php echo $value['description'];?></td>
                    <td><?php echo date('D, j F Y',strtotime($value['created_at']));?></td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                        <a href="deletehos.php" class= " btn btn-danger btn-sm">Delete</a>
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