<?php
require 'config/database.php';

//get data if submit button is clicked.

if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $admin = filter_var($_POST['userrole'],FILTER_SANITIZE_NUMBER_INT);
    $avatar= $_FILES['avatar'];

    //input value validation (check if they are empty)

    if(!$firstname){
        $_SESSION['add-user'] = "Please enter your First Name";
    }
    elseif(!$lastname){
        $_SESSION['add-user'] = "Please enter your Last Name";
    }
    elseif(!$username){
        $_SESSION['add-user'] = "Please enter Username";
    }
    elseif(!$email){
        $_SESSION['add-user'] = "Please enter a valid email";
    }
    elseif(strlen($createpassword)<8){
        $_SESSION['add-user'] = "Password should be 8+ characters";
    }
    elseif(!$avatar['name']){
        $_SESSION['add-user'] = "Please add avatar";
    }
    else{

        //check if passwords match
        if($createpassword !== $confirmpassword){
            $_SESSION['add-user'] = "Password do not match";
        }
        else{
            //hash password
            $hashed_password=password_hash($createpassword, PASSWORD_DEFAULT);


            //check if username or email already exists in DB
            $user_check_query= "SELECT * FROM users WHERE username='$username' OR email='$email' ";
            $user_check_result=mysqli_query($connection,$user_check_query);
            if(mysqli_num_rows($user_check_result)>0){
                $_SESSION['add-user']="Username or Email already exsits.";
            }
            else{
                //work on avatar
                //rename avatar
                $time=time();  //unique for every output
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name= $avatar['tmp_name'];
                $avatar_destination_path= '../images/' . $avatar_name;


                //make sure file is an image
                $allowed_files= ['png','jpg','jpeg'];
                $extension = explode('.',$avatar_name);
                $extension= end($extension);
                if(in_array($extension, $allowed_files)){
                    //make sure that the file size is not too big >1MB
                    if($avatar['size']< 10000000){
                        //upload picture
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    }
                    else{
                        $_SESSION['add-user']="File size too big. Should be < 1MB";
                    }
                }
                else{
                    $_SESSION['add-user']="File should be png, jpg, jpeg";
                }


            }



        }



    }
    // redirect back to add-user page if there is error
    if($_SESSION['add-user']){
        //pass form data abck to add-user page
        $_SESSION['add-user-data']= $_POST;
        header('location: ' . ROOT_URL . 'admin/add-user.php');
        die();
    }
    else{
        //insert new user into database;
        $insert_user_query= "INSERT INTO users(firstname, lastname, username, email, password, avatar, admin)
         values('$firstname','$lastname','$username','$email','$hashed_password','$avatar_name',$admin);";
         $insert_user_result= mysqli_query($connection, $insert_user_query);

         if(!mysqli_errno($connection)){
            //redirect to login page with success message
            $_SESSION['add-user-success']="New user $firstname $lastname added successfully";
            header('location: ' . ROOT_URL . 'admin/manage-users.php');
            die();
         }

    }
    
}
else{
    //take back to singup page if the button was not clicked
    header('location: ' . ROOT_URL . 'admin/add-user.php');
    die();
}