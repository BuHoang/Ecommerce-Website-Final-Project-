<h1 align="center">Change Password</h1>
<form action="" method="post">
    <div class="form-group"> 
        <label>Old Password</label>  
        <input type="password" name="old_password" class="form-control" required>    
    </div>
    <div class="form-group">    
        <label>New Password</label>    
        <input type="password" name="new_password" class="form-control" required>    
    </div>
    <div class="form-group">   
        <label>Re-enter New Password</label>    
        <input type="password" name="new_password_again" class="form-control" required>    
    </div>
    <div class="text-center"> 
        <button type="submit" name="submit" class="btn btn-success">confirm change password</button>
    </div>
</form>

<?php  
    if (isset($_POST['submit'])) {
        $c_email = $_SESSION['customer_email'];
        $c_old_password = $_POST['old_password'];
        $c_new_password = $_POST['new_password'];
        $c_new_password_again = $_POST['new_password_again'];
        $sel_c_old_password = "select * from customers where customer_password = '$c_old_password'";
        $run_c_old_password = mysqli_query($con, $sel_c_old_password);
        $check_c_old_password = mysqli_fetch_array($run_c_old_password);
        if ($check_c_old_password==0) {
            echo "<script>alert('Your old password is invalid. Please try again')</script>";
            exit();
        }
        if ($c_new_password!=$c_new_password_again) {
            echo "<script>alert('Your new password does not match')</script>";
            exit();
        }
        $update_c_password = "update customers set customer_password = '$c_new_password' where customer_email = '$c_email'";
        $run_c_password = mysqli_query($con, $update_c_password);
        if ($run_c_password) {
            echo "<script>alert('Your password has been updated')</script>";
            echo "<script>window.open('my_account.php?my_orders', '_self')</script>";
        }
    }
?>