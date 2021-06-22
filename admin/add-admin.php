<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['add'])){
                 //Checking whether the Session is Set of Not{
                echo $_SESSION['add']; //Display the session message if set
                unset($_SESSION['add']); //Remove Session Message. If you refresh added admin will vanish.
            }
        ?>
        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter name">
                    </td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter username">
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>
<?php 
    //Process the Value from Form and Save it in Database
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked"; avoid doing echo since we don't want to display all the data.
        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5. MD5 is a one-way encryption.

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password ='$password'
        ";
 
       //3. Executing Query and Saving Data into Datbase
       //$conn=mysqli_connect('localhost','root','')or die(mysqli_error());
       $res = mysqli_query($conn, $sql) or die(mysqli_error());

       //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
       if($res==TRUE)
       {
           //Data Inserted
           //echo "Data Inserted";
           //Create a Session Variable to Display Message
           $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
           //Redirect Page to Manage Admin when success 
           header("location:".SITEURL.'admin/manage-admin.php'); //. is used to concatenate
       }
       else
       {
           //Failed to Insert Data
           //Create a Session Variable to Display Message
           $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
           //Redirect Page to Add Admin
           header("location:".SITEURL.'admin/add-admin.php');
       }
   }   
?>
