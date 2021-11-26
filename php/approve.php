<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        include_once "../config.php";
        $approve = mysqli_real_escape_string($conn, $_GET['approve_id']);
        if(isset($approve)){
            $status = "APPROVED";
            $sql = mysqli_query($conn, "UPDATE bursary_details SET status = '{$status}' WHERE applicant_id={$_GET['approve_id']}");
            if($sql){

                          echo '<script language="javascript">';
echo 'alert("Bursary approved successfuly")';
echo '</script>';
echo ("<script>location.href ='../applications.php'</script>");

            }
        }else{
          echo '<script language="javascript">';
echo 'alert("Bursary rejected")';
echo '</script>';
           
        }
    }else{  
        header("location: ../login.php");
    }
?>