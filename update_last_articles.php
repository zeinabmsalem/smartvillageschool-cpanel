<?php

require_once 'dbconn.php';
session_start();


if (isset($_POST['edit'])) {

    $title = $_POST['title'];
    
    $summary = $_POST['summary'];
    
    $article_id = $_POST['activites_id'];
    
    $website_image = isset($_FILES['image']['name']) ? $_FILES['image']['name']: '';
        
        if($website_image!=''){
           $target_dir = "upload/"; 
           $target_file = $target_dir . basename($_FILES['image']['name']);
        }
        
   
    $sql = "update last_articles
            set title = '$title',
            summary = '$summary',
            img_url = '$target_file'
            where id = " . $article_id;

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
            header("Location:last_articles.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

   