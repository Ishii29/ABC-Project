<?php /*
    
    
    // PHP program to pop an alert
    // message box on the screen
    
    // Function definition
    function function_alert($message) {
        
        // Display the alert box 
        echo "<script>alert('$message');</script>";
        
    }
    
     
    */?>
<?php

    //include constants.php
    include('../config/constants.php');
    //get the id
    $id = $_GET['id'];
    //Create SQL query
    $sql = "DELETE FROM tbl_admin WHERE id=? ";

    // //execute the query
    // $res = mysqli_query($conn, $sql);
    $stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);





$res = mysqli_stmt_get_result($stmt);


    //check the query execution
    if($res==TRUE){
        //echo "Admin Deleted";
        //create session varibale to disply message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
        
    }
    else{
        $_SESSION['delete'] = "<div class='error'>Falied to delete admin</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //Redirect to manage admin page


?>