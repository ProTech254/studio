<?php
    session_start();
    include_once "../config.php";
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $account_type = mysqli_real_escape_string($conn, $_POST['account_type']);
    if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password) && !empty($account_type)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
                         }else{
                                $insert_query = mysqli_query($conn, "INSERT INTO users (first_name, last_name, email, password, account_type)
                                VALUES ('{$first_name}','{$last_name}', '{$email}', '{$password}', '{$account_type}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['user_id'] = $result['user_id'];
                                          if($result['account_type'] == 'admin'){
                echo "admin";
                            }else{
                   echo "user";
             }
                                    }else{
                                        echo "This email address not Exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        
                    
                }
                else{
                    echo "Please enter a valid email";
                }
            }else{
        echo "All input fields are required!";
    }
?>