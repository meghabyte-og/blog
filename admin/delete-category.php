<?php 
require 'config/database.php';
if(isset($_GET['id'])){
    //get from db
    $id= filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

    //update category id of posts to that of uncategorized category

    $update_query = "UPDATE posts set category_id=12 WHERE category_id= $id;";
    $update_result=mysqli_query($connection,$update_query);

    $query="DELETE FROM categories WHERE id=$id;";
    $result= mysqli_query($connection, $query);
    $_SESSION['delete-category-success']="Category deleted successfully";

    }
   
header('location: ' . ROOT_URL . 'admin/manage-categories.php');
die();