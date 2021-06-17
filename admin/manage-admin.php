<?php include('partials/menu.php');?>
  <div class="main-content">
    <div class="wrapper2">
      <h1>MANAGE ADMIN</h1>
        <br><br>
        <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add']; //Displaying Session Message
            unset($_SESSION['add']); //Removing Session Message
          }
        ?>
        <br><br>
        <a href="#" class="btn2-primary">ADD ADMIN</a>
        <br><br>
       <table>
         <tbody>
          <tr>
            <thead>
              <tr> 
                <th>Sr. No.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
          </thead>
        </tr>
      <?php 
        //Query to Get all Admin
         $sql = "SELECT * FROM tbl_admin";
         //Execute the Query
         $res = mysqli_query($conn, $sql);
         //Check if query was executed
         if($res==TRUE){
        // Count Rows to CHeck whether we have data in database or not
        $count = mysqli_num_rows($res); // Function to get all the rows in database
        $sn=1; //Create a Variable and Assign the value
        //Check the num of rows
                            if($count>0)
                            {
                                //We still have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using While loop to get all the data from database.
                                    //And while loop will run as long as we have data in database

                                    //Get individual DAta
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    //Display the Values in our Table
                                    ?>
                                    
                                    <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>

                                    <?php

                                }
                            }
                            else{
                                //We Do not Have Data in Database
                            }
                        }

                    ?>


                      </tbody>
    </table>
                <div class="clearfix"></div>
            </div>
            
        </div>
<?php include('partials/footer.php');?>
