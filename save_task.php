<?php

include("db.php");

if (isset($_POST['save_task'])) {
    $title = $_POST['tittle'];
    $description = $_POST['description'];


    $query = "INSERT INTO tarea(title, description) values ('$title', '$description')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'task saved succesfully';
    $_SESSION['message_type'] = 'success';
    
    header("Location: index.php");
}

?>